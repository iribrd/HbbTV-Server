var Player = $.extend(true, {
    url: null,
    duration: 0,
    progress: 0,
    
    init: function(){
    this.hbbtv = Main.hbbtv;
		this.isFullscreen = true;
		this.isBuffered = false;
    this.isBroadcast = false;
    this.state = Main.state.INIT;
		this.trigger('init');
    },
    
    reset: function(){
		this.isBuffered = false;
		this.url = null;
		this.duration = 0;
		this.progress = 0;
    },
    
    bindKeys: function(){
		APP.on('key', function(keycode){
		    if(keycode == Main.key.PLAY){
				if(this.duration && this.state != Main.state.PLAYING){
          APP.log('play');
				    this.play();
				}
		    }
		    else if(keycode == Main.key.STOP){
          APP.log('stop');
		    	this.stop();
		    }
		    else if(keycode == Main.key.PAUSE){
          APP.log('pause');
		    	this.pause();
		    }
		    else if(keycode == Main.key.FF){
		    	this.forward();
		    }
		    else if(keycode == Main.key.RW){
		    	this.backward();
		    }
		    return false;
		}, this);
    },
    
    setContainers: function(containerId, videoId){
      this.containerId = containerId;
      this.videoId = videoId;
    },
    
    initBroadcast: function(){
      if(this.containerId && this.videoId){
        this.isBroadcast = this.hbbtv.create_broadcast(this.containerId, this.videoId);
      }
    },
    
    clearPlayer: function(){
      var status = this.hbbtv.stop_video(this.containerId, this.videoId);
      this.initBroadcast();
  		this.setURL('');
      this.trigger('clean');
    },
    
    setURL: function(url){
    	this.url = url;
    },
    
    play: function(url, offset){
    var status;
	if(! url){
	    url = this.url;
	    
	    if(this.duration && this.state == Main.state.PAUSED){
	    	return this.pause(false);
	    }
	    else{
	    	return;
	    }
	}
	
		this.url = url || '';
	    this.duration = 0;
	    this.progress = 0;
	    

	    if(! this.url){
	    	return false;
	    }
	    
				if(typeof this.url != 'undefined' && this.url){
					//APP.log('PLAYER='+this.url);
					//this.url = 'http://static.bouncingminds.com/ads/30secs/sexy_subaru_carwash.mp4';
            this.hbbtv.release_broadcast(this.containerId, this.videoId);
            this.isBroadcast = false;
				    if(offset){
              status = this.hbbtv.play_video(this.containerId, this.videoId, this.url);
				    }
				    else{
              status = this.hbbtv.play_video(this.containerId, this.videoId, this.url);
				    }
					this.trigger('play', this.url, status);
				}
				else{
					this.onError();
				}
    },
    
    stop: function(){
  		if(this.state == Main.state.INIT || this.state == Main.state.STOPPED || this.state == Main.state.FINISHED){
          this.initBroadcast();
  		    return false;
  		}
      var status = this.hbbtv.stop_video(this.containerId, this.videoId);
      APP.log('stop status: ' + status + '|'+this.hbbtv.playState);
  		this.setURL('');
  		
      this.initBroadcast();
  		this.trigger('stop', status);
    },
    
    pause: function(){
  		if(this.state == Main.state.PLAYING && this.isBuffered && this.progress > 0){

        var video_container = document.getElementById(this.videoId);
        if(!video_container) {
          return false;
        }
        else{
          video_container.play(0);
        }

  			this.trigger('pause');
  		}
  		else{
  		    return false;			
  		}
    },
    
    forward: function(seconds){
	 	 this.trigger('forward', (seconds || 10));
    },
    
    backward : function(seconds){
		  this.trigger('backward', seconds || 10);
    },
    
    seek: function(pos){
  		if(String(pos).match(/\%/)){
  		    // percent
  		    if(this.duration){
  				var p = Math.round(parseInt(this.duration) / 100 * parseFloat(pos));
  				var skip = p - this.progress;
  		
  				if(skip > 0){
  				    this.forward(skip);
  				    
  				}else{
  				    this.backward(skip);
  				}
  		    }
  		}else{
  		    // seconds
  		}
    },
    
    fullscreen: function(){
  		this.isFullscreen = true;
  		this.show();
    },
    
    smallView: function(){
  		this.isFullscreen = false;
  		this.show();
    },
    
    show: function(){
    },
    
    hide: function(){
    },
    
    onProgress: function(seconds){
  		var len = this.hbbtv.getLength();
  		var percent = 100 / len * seconds;
  		
  		if(! this.duration && len > 0){
  		    this.duration = len;
  		    this.trigger('duration', this.duration);
  		}
  		
  		if(! seconds){
  		    return;
  		}
  		//APP.log(seconds+'|'+len+'|'+percent);
  		this.progress = seconds;
  		this.trigger('progress', seconds, len, percent);
    },
    
    onStateChange: function(state){
	switch(state){
	case Main.state.INIT: 
		APP.log('state=init isBuffered='+Player.isBuffered);
		break;
	case Main.state.PLAYING: 
		APP.log('state=playing isBuffered='+Player.isBuffered);
		break;
	case Main.state.PAUSED: 
		APP.log('state=paused isBuffered='+Player.isBuffered);
		break;
	case Main.state.STOPPED: 
		APP.log('state=stopped isBuffered='+Player.isBuffered);
		break;
	case Main.state.BUFFERRING: 
		APP.log('state=buffering isBuffered='+Player.isBuffered);
		break;
	case Main.state.ERROR: 
		APP.log('state=error isBuffered='+Player.isBuffered);
		break;
	case Main.state.CONNECTING: 
		APP.log('state=connecting isBuffered='+Player.isBuffered);
		break;
	case Main.state.FINISHED:	
		APP.log('state=finished isBuffered='+Player.isBuffered);
		break;
	default:
		APP.log('state=unknown isBuffered='+Player.isBuffered);
		break;
	}
    	this.state = state;
    	this.trigger('state', this.state);
	
		if(this.state == Main.state.FINISHED){
      APP.log('CCC');
		    this.trigger('finished');
		}
    if(this.state == Main.state.ERROR){
      this.onError();
    }
		
		if(this.state == Main.state.BUFFERRING || this.state == Main.state.CONNECTING){
			this.isBuffered = true;
		    this.trigger('waiting');
		}
		
		//if(this.state == Main.state.PLAYING || this.state == Main.state.FINISHED){
		if(this.state == Main.state.PLAYING){
		    this.trigger('playing');
		}
    },
    
    onError: function(){
      this.initBroadcast();
    	this.trigger('error');
    },
    
    onBufferingProgress: function(bufferProgress){
    	this.trigger('buffering');
    }
    
}, Events);