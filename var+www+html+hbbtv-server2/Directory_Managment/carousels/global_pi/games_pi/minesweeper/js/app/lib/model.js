var Model = {

	init: function(data){
	    this.event_stack = {};
	    this.data = [];
	    this.length = 0;
	    this.loaded = false;
	    
	    if(data){
			$.extend(true, this, data);
		}	    
	    this.cb = null;
	    if(data && typeof data.cb == 'function'){
	    	this.cb = data.cb;
	    }
	    
	    if(data && typeof data.scope != 'undefined'){
	    	this.clickCallbackScope = data.scope;
	    }
	},
	
	requestOK: function(){

		APP.trigger('request.ok');
	},
    
	requestBAD: function(url, xhr, status, err){
		//APP.log('=========BAD request=========');
		//APP.log('Error: '+url);
    	//APP.log('statusText'+xhr.statusText);
    	//APP.log('status: '+xhr.status);
    	//APP.log('responseText'+xhr.responseText);
    	//APP.log('Error'+xhr);
		//APP.log('=========BAD request=========');
		this.loaded = true;
		
		if(CONFIG.showErrorMessage){
			Util.showError('ERROR:<br/>URL:'+url+'<br/>status: '+xhr.status);
		}
		
    	APP.trigger('request.error', xhr, status, err);
	},

	setRequest: function(){},
    fetchData: function(){}
};