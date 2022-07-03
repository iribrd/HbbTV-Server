var Scene = {
    el: null,
    cls: 'scene',
    name: '',
    args: [],
    isActive: false,

    init: function(name, args){
		this.name = name;
		this.args = args;

		this.keysEnabled = true;
		
		this.el = this.createElement();
		this.el.appendTo('#viewport .content');
    },
    
    createElement: function(){
    	return $('<div class="'+this.cls+'" id="scene-'+this.name+'" />');
    },
    
    activate: function(){
		this.isActive = true;
		this.clearTime();
		this.focus();
		
		APP.on('key', this.keyDown, this);
    },

	loadingStart: function(){
		Util.throbberBig();
		this.keysEnabled = false;
	},

	loadingFinish: function(){
		this.keysEnabled = true;
		Util.throbberBigHide();
	},    
    
    deactivate: function(){
		this.isActive = false;
		APP.off('key', this.keyDown, this);
    },
    
    show: function(){
	
    },
    
    hide: function(){
		this.deactivate();
    if(typeof this.unbindsnippets == 'function'){
      this.unbindsnippets();
    }
		this.trigger('unbind.snippet');
		this.destroy();
    },
    
    focus: function(){
	
    },
 
	clearTime: function(){
		if(Main.tv_timer){
			window.clearTimeout(Main.tv_timer);
			Main.tv_timer = null;
		}
	},
	
	showError: function(str){
		if(CONFIG.showErrorMessage){
			$('#error_message').show();
			$('#error_message span').empty();
			if(str){
		    	$('#error_message span').append(str);			
			}
			else{
		    	$('#error_message span').append(APP.lang.error_unknown);
			}
	    	window.setTimeout(function(){$('#error_message').fadeOut(2000);}, 10000);
		}
	},
	
	connectionProblem: function(){
	},
    
    destroy: function(){
		if(this.el){
		    this.el.remove();
		}
    },
    
    showPlayer: function(){
    	$('#viewport').addClass('transparent');
    	$('#viewport .content').addClass('transparent');
    },
    
    hidePlayer: function(){
    	$('#viewport').removeClass('transparent');
    	$('#viewport .content').removeClass('transparent');
    },
    
    // hide elem because of rendering problem...
    hideElem: function(){
    },
    // this is complementary method for hideElem
    showElem: function(){
    },

    keyDown: function(keyCode, status){
    	this.trigger('key', keyCode, status);
    }
};