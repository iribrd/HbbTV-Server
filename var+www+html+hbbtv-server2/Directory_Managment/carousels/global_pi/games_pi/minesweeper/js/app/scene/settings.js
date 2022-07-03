var Scene_Settings = function () {
    var scope = this;
    
    $.extend(this, Events, Scene, {
    init: function (name, args) {
        this.name = name;
        this.args = args;
        this.keysEnabled = true;
        
        this.el = this.createElement();
        this.el.appendTo('#viewport .content');
        APP.on('focus', this.onFocus, this);
        this.$focusable = this.el.find('li.focusable');
    },
        
    createElement: function () {
        return $('#scene-settings');
    },
        
    destroy: function () {
        this.el.hide();
    },
    show: function (data) {
		this.el.show();

		var index;
		if(APP.level == 'easy') index = 0;
		else if(APP.level == 'intermediate') index = 1;
		else index = 2;

		APP.focus(this.el.find('li.focusable').eq(index));
    },
        
    clean: function () {
        
    },
    focus: function () {
        if (this.coverflow) {
            this.coverflow.focus();
        }
    },
    onEnter: function(){
        var focused = $(Main.focused);
        var level = focused.attr('class').split(' ');
        APP.level = level[level.length-1];
        
        return false;
    },
    onFocus: function (el) {
        // for mouse control if you have to do something with focused element
    },
    onReturn: function(){
		document.getElementById("colorButtons").style.paddingLeft = "830px";
		document.getElementById("colorButtons").innerHTML = '<span class="btn red"></span><span id="redtxt">Ukončiť</span> <span class="btn yellow"></span><span id="bluetxt">Aplikácie</span>';
		APP.scene('welcome');
    },
    switchLevel: function (level) {
        if (level > 9)
            level = 9;
        this.el.find('.level span').html(level);
        
        this.level = level;
        this.resetGame();
    },
    navigate: function(direction){
        var focused = Main.focused;
        var index = this.$focusable.index(focused);
        
        index += direction == "down" ? 1 : -1;
        
        if(index < 0)
            index = this.$focusable.length - 1;
        if(index >= this.$focusable.length)
            index = 0;
        
        APP.focus(this.$focusable[index]);
        
        return false;
    },
    keyDown: function (keyCode, status) {
        console.log('agla' + keyCode);
        this.prevDirection = this.direction + "";
        
        switch (keyCode) {
            case Main.key.DOWN:
                this.navigate("down");
                break;
            case Main.key.UP:
                this.navigate("up");
                break;
            case Main.key.ENTER:
                this.onEnter();
				this.onReturn();
                break;
            case 461:
                this.onReturn();
                break;
                //            case Main.key.RIGHT:
                //                if (this.direction != "left")
                //                    this.direction = "right";
                //                break;
                //            case Main.key.LEFT:
                //                if (this.direction != "right")
                //                    this.direction = "left";
                //                break;
            default:
                return true;
        }
        
        return false;
    }
        
        });
    
    this.init.apply(this, arguments);
};
