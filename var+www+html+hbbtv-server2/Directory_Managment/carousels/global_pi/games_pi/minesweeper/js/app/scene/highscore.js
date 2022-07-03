var Scene_Highscore = function () {
    var scope = this;
    
    $.extend(this, Events, Scene, {
    init: function (name, args) {
        this.name = name;
        this.args = args;
        this.keysEnabled = true;
        
        this.el = this.createElement();
        this.el.appendTo('#viewport .content');
    },
        
    createElement: function () {
        return $('#scene-highscore');
    },
        
    destroy: function () {
        this.el.hide();
    },
    show: function (data) {
        this.el.show();
        
        var easy = Storage.get('easy');
        var medium = Storage.get('medium');
        var hard = Storage.get('hard');
        
        hard = hard ? hard + " seconds" : "not played yet";
        easy = easy ? easy + " seconds" : "not played yet";
        medium = medium ? medium + " seconds" : "not played yet";
        
        this.el.find('.menu .easy .value').html(easy);
        this.el.find('.menu .medium .value').html(medium);
        this.el.find('.menu .hard .value').html(hard);
        
    },
        
    clean: function () {
        
    },
    onReturn: function(){
		document.getElementById("colorButtons").style.paddingLeft = "830px";
		document.getElementById("colorButtons").innerHTML = '<span class="btn red"></span><span id="redtxt">Ukončiť</span> <span class="btn yellow"></span><span id="bluetxt">Aplikácie</span>';
		APP.scene('welcome');
    },
    keyDown: function (keyCode, status) {
        switch (keyCode) {
            case 461:
                this.onReturn();
                break;
            default:
                return true;
        }
        
        return false;
    }
        
        });
    
    this.init.apply(this, arguments);
};
