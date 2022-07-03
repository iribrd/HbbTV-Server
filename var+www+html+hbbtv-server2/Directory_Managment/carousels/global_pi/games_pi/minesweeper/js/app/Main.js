if(typeof KeyEvent == 'undefined'){
  KeyEvent = {};
}

var Main = {
    app: null,
    hbbtv: HbbTV,

    key: {
    	RIGHT: KeyEvent.VK_RIGHT || 39,
    	LEFT: KeyEvent.VK_LEFT || 37,
    	UP: KeyEvent.VK_UP || 38,
    	DOWN: KeyEvent.VK_DOWN || 40,
//     	RETURN: KeyEvent.VK_BACK || 8,
    	ENTER: KeyEvent.VK_ENTER || 13,
//     	PLAY: KeyEvent.VK_PLAY,
//     	PAUSE: KeyEvent.VK_PAUSE,
    	STOP: KeyEvent.VK_STOP,
//     	FF: KeyEvent.VK_FF,
//     	RW: KeyEvent.VK_RW,
    	RED: KeyEvent.VK_RED || 82,
    	GREEN: KeyEvent.VK_GREEN || 71,
    	YELLOW: KeyEvent.VK_YELLOW || 89,
    	BLUE: KeyEvent.VK_BLUE || 66,

     	ONE: KeyEvent.VK_1  || 97,
     	TWO: KeyEvent.VK_2  || 98,
     	THREE: KeyEvent.VK_3|| 99,
     	FOUR: KeyEvent.VK_4 || 100,
     	FIVE: KeyEvent.VK_5 || 101,
     	SIX: KeyEvent.VK_6  || 102,
     	SEVEN: KeyEvent.VK_7|| 103,
     	EIGHT: KeyEvent.VK_8|| 104,
     	NINE: KeyEvent.VK_9 || 105,
     	ZERO: KeyEvent.VK_0 || 96,
    	EXIT: 'exit'
    },
    
    networkerror: false,
    hbbtv_init: false,
    
    state: {
		INIT:7, 
		PLAYING:1, 
		PAUSED:2, 
		STOPPED:0, 
		BUFFERRING:4, 
		ERROR:6, 
		CONNECTING:3, 
		FINISHED:5
    },
    
    loadJS: function(src){
		var s = document.createElement('script');
		s.src = src;
		document.body.appendChild(s);
    },

onLoad: function () {
      if(this.hbbtv && typeof this.hbbtv.init == 'function'){
        // if allkeys enabled then all keys on RC ara avalable others only color buttons and arrows/enter/back(return)/media keys
        this.hbbtv_init = this.hbbtv.init(CONFIG.allkeys ? 0x33F : 0x3F);
      }
     
			document.addEventListener('keydown', function(e){
        if(e.keyCode == 8){
    	   	// return
      		e.preventDefault();
        }
    	  Main.keyDown(e.keyCode);
     	}, false);

        if(this.hbbtv_init){
          this.log('SHOW='+this.hbbtv.show());
        }

    	if(! this.app){
		    try {
		    //Util.throbber();
        this.setCountry();
				this.app = new App();
				//this.app.on('render', function(){
				//	Util.throbberHide();
				//});
		    }catch(e){
                console.log("ERROR: ",e.message, " ", e.stack);
				for(var prop in e) {
					if(e.hasOwnProperty(prop))
						this.log('Exception '+prop+': '+e[prop]);
				}
		    }
		}
    },
    
    unload: function(){
		if(this.app){
		    this.app.trigger('unload');
		}
    },
    
    onRefresh: function(){
    	if(this.app){
    		if(this.app.activeScene){
			    if(this.app.activeScene.hide() !== false){
			    	delete this.app.activeScene;
			    }
			}
    		delete this.app;
    		this.app = null;
    	}
    	this.onLoad();
    },
    
    setCountry: function(){
        this.country = 'ir';
    },
    
    log: function(){
      if(CONFIG.debug){
        console.log.apply(console, arguments);
      }
    },
    
    keyDown: function(keycode){
		if(this.app && !this.networkerror){
		    this.app.trigger('keyDown', keycode);
		}
    },
    
    networkDown: function(){
    	this.networkerror = true;
		if(this.app){
		    this.app.trigger('networkDown');
		}
    },
    
    networkUp: function(){
    	this.networkerror = false;
		if(this.app){
		    this.app.trigger('networkUp');
		}
    },
    
    focus: function(id, saveFocus){
		var el = document.getElementById(id);
		
		if(el){
		    
		    if(this.focused && el !== this.focused){
			this.blur(this.focused);
		    }
		    
		    this.focused = el;
		    el.className = 'focus '+String(el.className).replace(/\s?focus\s/, '');
		    
		    if(saveFocus !== false){
			this.previousFocus = this.getFocused();
		    }
		    
		    return true;
		}
		
		return false;
    },

    hover: function(id, saveHover){
		var el = document.getElementById(id);
		
		if(el){
		    
		    if(this.hovered && el !== this.hovered){
			this.blur(this.hovered);
		    }
		    
		    this.hovered = el;
		    el.className = 'hover '+String(el.className).replace(/\s?hover\s/, '');
		    
		    if(saveHover !== false){
			     this.previousHover = this.getHovered();
		    }
		    
		    return true;
		}
		
		return false;
    },
    
    blur: function(id){
		var el = (typeof id == 'string' ? document.getElementById(id) : id);
		
		if(el){
		    el.className = String(el.className).replace(/\s?focus\s/, '');
		    return true;
		}
		
		return false;
    },
    
    getFocused: function(){
    	return (this.focused ? this.focused.id : null);
    },

    forceReturnFocus: function(id){
		if(id){
		    this.previousFocus = id;
		}
    },

    getHovered: function(){
    	return (this.hovered ? this.hovered.id : null);
    },

    forceReturnHover: function(id){
		if(id){
		    this.previousHover = id;
		}
    }
};

if(typeof document.head == 'undefined'){
    document.head = document.getElementsByTagName('head')[0];
}
