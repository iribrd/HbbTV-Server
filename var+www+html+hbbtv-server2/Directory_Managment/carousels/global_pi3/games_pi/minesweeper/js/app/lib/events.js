var Events = {
    event_stack: {},
    
    trigger: function(event_name){
		var scope = this;
		var retStatus = true;
		var args = Array.prototype.slice.call(arguments, 1);
		
		if(this.event_stack[event_name]){
		    $.each(this.event_stack[event_name], function(i, cb){
				var fn, ret;
				if(typeof cb != 'undefined' && cb){
				    fn = cb[1];
				    ret = fn.apply(cb[0] || scope, args);
				    
				    if(ret === false){
						retStatus = false;
						return false;
				    }
				}
		    });
		    
		    if(this.event_stack['all']){
				$.each(this.event_stack['all'], function(i, cb){
				    var fn;
				    if(typeof cb != 'undefined' && cb){
						fn = cb[1];
						args.unshift(event_name);
						fn.apply(cb[0] || scope, args);
				    }
				});
		    }
		}
		
		return retStatus;
    },
    
    on: function(event_name, cb, scope){
		if(! this.event_stack[event_name]){
		    this.event_stack[event_name] = [];
		}
		
		this.event_stack[event_name].unshift([scope || this, cb]);
    },
    
    off: function(event_name, _cb, _scope){
		var scope = this;
		
		if(! this.event_stack[event_name]){
		    return false;
		}
		
		$.each(this.event_stack[event_name], function(i, cb){
		    if(cb && (cb[1] === _cb || ! _cb) && (! _scope || _scope === cb[0])){
		    	scope.event_stack[event_name].splice(i, 1);
		    }
		});
    }
};