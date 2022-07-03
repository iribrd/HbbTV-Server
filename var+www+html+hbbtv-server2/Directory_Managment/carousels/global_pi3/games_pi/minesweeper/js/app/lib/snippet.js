var Snippet = {
    events: {},
    keyEvents: {},
    selector: '',
    focused: null,
    isBinded: false,
    
    init: function(scene){
		this.scene = scene;
		this.scene.on('unbind.snippet', this.unbind, this);
	    if(APP.dialog){
	    	APP.dialog.on('unbind.snippet', this.unbind, this);
	    }		
		this.el = $(this.selector);
	
		this.render();
		this.bind();
    },
    
    render: function(){
	
    },
    
    focus: function(){
		APP.focus(this.el);
    },
    
    hasFocus: function(){
		var focused = this.getFocused();
		return (focused ? focused.length : (this.el.hasClass('focus') ? true : false));
    },
    
    getFocused: function(){
		if(! APP.focused){
		    return null;
		}
		
		var el = APP.focused[0];
		
		while(el && typeof el.parentNode != 'undefined'){
		    el = el.parentNode;
		    if(el === this.el[0]){
		    	return APP.focused;
		    }
		}
		
		return null;
    },
    
    unbind: function(){
    	if(typeof this.fnKey == 'function'){
    		this.isBinded = false;
    		APP.off('key', this.fnKey, this);
    	}
    },

    mousebind: function(){
    	var scope = this;
		var el = this.el;
		
		$.each(scope.events, function(selector, action){
		    if(selector && scope[action]){
				el.find(selector).unbind('click').bind('click', function(e){
				    scope[action].call(scope, e, $(this));
				});
		    }
		    else if(selector == '' && scope[action]){
				el.unbind('click').bind('click', function(e){
				    scope[action].call(scope, e, el);
				});
		    }
		});
    },
    
    bind: function(){
    	if(this.isBinded){return;}

    	var scope = this;
		var el = this.el;
		
		$.each(scope.events, function(selector, action){
		    if(selector && scope[action]){
				el.find(selector).unbind('click').bind('click', function(e){
          if($(this).hasClass('hover')){
            scope[action].call(scope, e, $(this));
          }
				});
		    }
		    else if(selector == '' && scope[action]){
				el.unbind('click').bind('click', function(e){
          if(el.hasClass('hover')){
				    scope[action].call(scope, e, el);
          }
				});
		    }
		});
	
		this.fnKey = function(keycode, status){
		    var e, focused, ret = true;
		    if(status && (! this.scene || this.scene.isActive) && this.hasFocus() && ! event.stop){
				focused = this.getFocused();
			
				if(keycode == Main.key.ENTER){
				    // trigger click function on enter when focused
				    $.each(scope.events, function(selector, action){
				    	if(selector && focused.is(selector) && scope[action]){
						    scope[action].call(scope, e, focused);
						    ret = false;
						    
						}else if(selector == '' && scope[action]){
						    scope[action].call(scope, e, focused);
						    ret = false;
						}
				    });
				    return false;
				}
			
				$.each(scope.keyEvents, function(key, action){
				    if(keycode == Main.key[key] && scope[action]){
                       	event.stop = true;
                        if(scope[action].call(scope, keycode) === false){
						    ret = false;
						    return false;
						}
				    }
				});
		    }
		    else{
          try{
  		    	if(typeof event.stop != 'undefined'){
  			    	delete event['stop'];
  		    	}
          }
          catch(ex){
          }
        }
		};

		APP.off('key', this.fnKey, this);
 		APP.on('key', this.fnKey, this);
		this.isBinded = true;
    }
};