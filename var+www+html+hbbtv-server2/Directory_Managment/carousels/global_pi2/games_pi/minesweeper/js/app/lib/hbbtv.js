/**
 * You need to add the OIPF application manager and the OIPF configuration
 * embedded objects to your HTML DOM tree e.g.:
 *
 * <div style="visibility: hidden; display: none;">
 * <object type="application/oipfApplicationManager" id="oipfAppMan"> </object>
 * <object type="application/oipfConfiguration" id="oipfConfig"> </object>
 * </div>
 */
var HbbTV = {
  // OIPF DAE Application object
  application: null,
  //The OIPF keyset object used to request keys from terminal.
  keyset: null,
  keysetHidden: null,
  keysetVisible: null,

  /**
   * render error message
   */
  error: function(str){
    console.log(str);
  },

  /**
   * @return true if OIPF functions are available
   * @param keyset set of keys which should be enabled
   */
  init: function(keyset){
    try {
        if (this.application) return;

        var manager = null;
        var config = null;

        var objects = document.getElementsByTagName("object");
        for (var i = 0; i < objects.length; i++) {
            var sType = objects.item(i).getAttribute("type");
            if (sType == "application/oipfApplicationManager") {
                manager = objects.item(i);
            } else
            if (sType == "application/oipfConfiguration") {
                config = objects.item(i);
            }
        }
        if (manager && typeof(manager.getOwnerApplication) != "undefined")
            this.application = manager.getOwnerApplication(document);
        else {
            this.error("no application manager");
            this.application = null;
            return false;
        }

        try {
            // HbbTV 1.1.1
            this.keyset = this.application.privateData.keyset;
        } catch (e) {
            // HbbTV 0.5
            try {
                this.keyset = config.keyset;
                this.keyset.setValue = function(val) {
                    this.value = val;
                };
            } catch (ex) {
                this.keyset = null;
            }
        }

        if (this.keyset) {
            if (!this.keysetHidden) this.keysetHidden = this.keyset.RED;
            if (!this.keysetVisible){
              if(typeof keyset != 'undefined'){
                this.keysetVisible = keyset;
              }
              else{
                this.keysetVisible = 0x33F; // color + nav + vcr + numeric + alpha
              }
            }
        }
        return this.keyset != null;
    } catch (exc) {
        this.error(exc);
        this.application = null;
    }
    return false;
  },
  /**
   * @return true if application becomes visible
   */
  show: function(){
    try {
        this.application.show();
        if (typeof this.application.activate != "undefined") this.application.activate();
        if (typeof this.application.activateInput != "undefined") this.application.activateInput();
        this.keyset.setValue(this.keysetVisible);
        return true;
    } catch (e) {
        this.error(e);
        return false;
    }
  },
  /**
   * @return true if application becomes hidden
   */
  hide: function(){
    try {
        this.application.hide();
        this.keyset.setValue(this.keysetHidden);
        return true;
    } catch (e) {
        this.error(e);
        return false;
    }
  },
  
  /**
   * Overrides the default keysets.
   *
   * @param visibleSet a keyset bitmask
   * @param hiddenSet a keyset bitmask
   */
  setKeysets: function(visibleSet, hiddenSet){
    if (typeof visibleSet == "Number") this.keysetVisible = visibleSet;
    if (typeof hiddenSet == "Number") this.keysetHidden = hiddenSet;
  },
  /**
   * Starts a new application and destroys this application.
   *
   * @param dvbUrl DVB URL of the application to start
   * @param httpUrl HTTP URL of the application to start
   *
   * @return true if application is started
   */
  createApplication: function(dvbUrl, httpUrl) {
    if (this.application) {
        try {
            if (dvbUrl) {
                if (this.application.createApplication(dvbUrl, false)) {
                    this.application.destroyApplication();
                    return true;
                }
                this.error("Failed to launch DVB URL: " + dvbUrl);
            }
        } catch (ex) {
            this.error(ex);
        }
        try {
            if (httpUrl) {
                if (this.application.createApplication(httpUrl, false)) {
                    this.application.destroyApplication();
                    return true;
                }
                this.error("Failed to launch HTTP URL: " + httpUrl);
            }
        } catch (exc) {
            this.error(exc);
        }
        return false;
    } else if (httpUrl) {
        document.location.href = httpUrl;
    }
    this.error("OIPF application is not available");
    return false;
  },
  /**
   * Terminates this application.
   *
   * @param httpUrl the URL to go
   */
  closeApplication: function(httpUrl) {
    if (this.application) {
        try {
            this.application.destroyApplication();
        } catch (e) {
            this.error(e);
        }
    } else if (httpUrl) {
        document.location.href = httpUrl;
    } else {
        window.close();
    }
  },
  /**
   * Inits player, same for broadcast and A/V playback
   */
  initVideo: function() {
    try {
        document.getElementById(this.videoId).bindToCurrentChannel();
    } catch (e) {
        // ignore
    }
    try {
        document.getElementById(this.videoId).setFullScreen(false);
    } catch (e) {
        // ignore
    }
  },

  /**
   * Creates and initializes a broadcast video and if no video can be included
   * the picture is shown instead of the broadcast.
   *
   * @param broadcastId the id of the HTML container where the video/broadcast object will be added
   * @param videoId id which shall be set for the video/broadcast object
   * @param picture an optional picture to be shown if video/broadcast can not be added
   *
   * @return true if broadcast video is started
   */
  create_broadcast: function(broadcastId, videoId, picture) {
    try {
        var broadcast_container = document.getElementById(broadcastId);
        if (!broadcast_container) {
            this.error("No video/broadcast container");
            return false;
        }

        broadcast_container.innerHTML = '<object id="' + videoId + '" type="video/broadcast" style="visibility: visible;"> </object>';
        this.videoId = videoId;
        var broadcast_video = document.getElementById(videoId);
        this.initVideo();

        try {
            if (typeof(broadcast_video.bindToCurrentChannel) != 'undefined') {
                broadcast_container.style.display = 'block';
                broadcast_video.bindToCurrentChannel();
                return true;
            } else {
                this.error("video/broadcast object is not supported");
                broadcast_container.style.display = 'none';
            }
        } catch (ex) {
            this.error(ex);
        }
    } catch (e) {
        this.error(e);
    }
    if (picture) {
        broadcast_container.innerHTML = '<img id="' + videoId + '" src="' + picture + '" />';
    }
    return false;
  },

  /**
   * Releases the video/broadcast object and removes the object from the DOM.
   *
   * @param broadcastId the id of the HTML container where the video/broadcast object is
   * @param videoId id which is set for the video/broadcast object
   */
  release_broadcast: function(broadcastId, videoId) {
    try {
        var broadcast_video = document.getElementById(videoId);
        if (broadcast_video && typeof(broadcast_video.stop) != "undefined") {
            broadcast_video.stop();
        }

//         if (broadcast_video && typeof(broadcast_video.release) != "undefined") {
//             broadcast_video.release();
//         }
        var broadcast_container = document.getElementById(broadcastId);
        if (broadcast_container) {
            broadcast_container.style.display = 'block';
            broadcast_container.innerHTML = "";
        }
    } catch (e) {
        this.error(e);
    }
  },

  /**
   * Creates and initializes an MP4 video stream.
   *
   * @param containerId the id of the HTML container where the video will be added
   * @param videoId id which shall be set for the video/mp4 object
   * @param httpUrl HTTP URL of the video stream
   * @param picture an optional picture to be shown if video/broadcast can not be added
   *
   * @return true if video is started
   */
  play_video: function(containerId, videoId, httpUrl, picture) {
    try {
        var scope = this;
        var container = document.getElementById(containerId);
        if (!container) {
            this.error("No video container");
            return false;
        }
        this.videoId = videoId;

        container.style.display = 'block';
        //container.innerHTML = '<object id="' + videoId + '" type="video/mp4"><'+'/object>';
        container.innerHTML = '<object id="' + videoId + '" type="video/mpeg"><'+'/object>';
        var video = document.getElementById(videoId);
        this.initVideo();

        try {
            if (typeof(video.play) != 'undefined') {
                video.onPlayPositionChanged = function(){
                  //APP.log('Play pos = '+video.playPosition+'| Play time = '+video.playTime);
                };
                
                
                video.onPlayStateChange = function(){
                  scope.playState = video.playState;
                  
                  if(video.playState == Main.state.ERROR){
                    APP.log('video.error='+video.error);
                    switch(parseInt(video.error, 10)){
                      case 0: APP.log('A/V format not supported.'); 
                      break;
                      case 1: APP.log('cannot connect to server or connection lost.'); 
                      break;
                      case 2: APP.log('unidentified error.'); 
                      break;
                      case 3: APP.log('insufficient resources.'); 
                      break;
                      case 4: APP.log('content corrupt or invalid.'); 
                      break;
                      case 5: APP.log('content not available.'); 
                      break;
                      case 6: APP.log('content not available at given position.'); 
                      break;
                      default: APP.log('unknown error'); 
                      break;
                    }
                  }
                  if(video.playState == Main.state.PLAYING){
                    scope.showVidData();
                  }
                  
                  Player.onStateChange(video.playState);
                  if(video.playState == Main.state.ERROR){
                    scope.stop_video(containerId, videoId);
                  }
                };
                video.setFullScreen(false);
                video.data = httpUrl;
                
                this.videoPosition = 0;
                this.lastProgress = 0;
                this.startPosition = 0;
                this.endPosition = 0;
                video.play(1);
                this.showVidData();
                return true;
            } else {
                this.error("video play function is not supported");
            }
        } catch (ex) {
            this.error(ex);
        }
    } catch (e) {
        this.error(e);
    }
    if (picture) {
        container.innerHTML = '<img id="' + videoId + '" src="' + picture + '" />';
    }
    return false;
  },
//   play_video: function(containerId, videoId, httpUrl, picture) {
//     try {
//         var scope = this;
//         var container = document.getElementById(containerId);
//         if (!container) {
//             this.error("No video container");
//             return false;
//         }
//         this.videoId = videoId;
//         container.innerHTML = '<object id="' + videoId + '" type="video/mpeg" data="' + httpUrl + '"><param name="controller" value="true"></object>';
//         var video = document.getElementById(videoId);
// 
//         try {
//             if (typeof(video.play) != 'undefined') {
//                 video.onPlayPositionChanged = function(){
//                 };
//                 video.onPlayStateChange = function(){
//                   scope.playState = video.playState;
//                   Player.onStateChange(video.playState);
//                 };
//                 video.setFullScreen(true);
//                 video.play(1);
// 
//                 this.showVidData();
//                 return true;
//             } else {
//                 this.error("video play function is not supported");
//             }
//         } catch (ex) {
//             this.error(ex);
//         }
//     } catch (e) {
//         this.error(e);
//     }
//     if (picture) {
//         container.innerHTML = '<img id="' + videoId + '" src="' + picture + '" />';
//     }
//     return false;
//   },
  /**
   * timer for getting current position of the stream
   *
   */  
  showVidData: function() {
    try{
      if (this.vidtimer) {
        window.clearTimeout(this.vidtimer);
        this.vidtimer = null;
      }
      var scope = this;
      var video = document.getElementById(this.videoId);
      if(video){
        if(this.startPosition == 0 && video.playPosition > 0){
          this.startPosition = video.playPosition;
        }
        this.endPosition = video.playPosition;
        
        var progress = this.endPosition - this.startPosition;
        if(isNaN(progress)){
          progress = 0;
        }
        //else{
          this.lastProgress = progress; 
        //}
        //APP.log(this.lastProgress+'**'+this.videoPosition+'**'+video.playPosition + '***'+this.playState);
        Player.onProgress(this.lastProgress/1000);
        //Player.onProgress(this.videoPosition/1000);
        //Player.onProgress(video.playPosition/1000);
        if(this.playState != Main.state.INIT && this.playState != Main.state.ERROR && this.playState != Main.state.STOPPED && this.playState != Main.state.FINISHED){
          this.vidtimer = setTimeout(function() { if(scope.playState == Main.state.PLAYING){scope.videoPosition += 1000;} scope.vidtimer=null; scope.showVidData(); }, 1000);
        }
      }
    }
    catch(e){
      this.error("video timer is not supported");
    }
  },
  /**
   * Return length of playing stream 
   *
   * @return length in seconds if available, otherwise is returned -1
   */ 
  getLength: function(){
    var video = document.getElementById(this.videoId);
    if(video && video.playTime){
      return video.playTime/1000;
    }
    else{
      return -1;
    }
  },

  /**
   * Stops and remove a MP4 video stream.
   *
   * @param containerId the id of the HTML container where the video will be added
   * @param videoId id which shall be set for the video/mp4 object
   *
   * @return true if video is stopped
   */  
  stop_video: function(containerId, videoId){
    try {
        var container = document.getElementById(containerId);
        if (!container) {
            this.error("No video container");
            return false;
        }
        
        var video = document.getElementById(videoId);
            if (video && typeof(video.stop) != 'undefined') {
                video.onPlayStateChange = null;
                video.onPlayPositionChanged = null;
                video.stop();
                Player.onStateChange(Main.state.STOPPED);
                if (typeof(video.release) != "undefined") {
                    video.release();
                }
                this.playState = Main.state.INIT;
                container.innerHTML = '';
                return true;
            } else if(video){
                this.error("video stop function is not supported");
            } else {
                return true;
            }
    } catch (e) {
        this.error(e);
        return true;
    }    
  }  
};
