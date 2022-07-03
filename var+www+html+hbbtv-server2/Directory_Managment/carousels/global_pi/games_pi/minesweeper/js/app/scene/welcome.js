var Scene_Welcome = function () {
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
        return $('#scene-welcome');
    },

    destroy: function () {
        this.el.hide();
    },
    show: function (data) {
        this.el.show();

        APP.focus(this.el.find('li.focusable').first());
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
        if(focused.closest('#' + this.el.attr('id')).length < 1) return;

		if(!focused.hasClass('quit') && !focused.hasClass('new')){
			document.getElementById("colorButtons").style.paddingLeft = "690px";
            document.getElementById("colorButtons").innerHTML += '<span class="btn green"></span><span id="bluetxt">Späť</span>';
		}
		if(focused.hasClass('new'))
		{
			document.getElementById("colorButtons").style.paddingLeft = "540px";
			document.getElementById("colorButtons").innerHTML += '<span class="btn blue"></span><span id="bluetxt">Označiť</span>';
			document.getElementById("colorButtons").innerHTML += '<span class="btn green"></span><span id="bluetxt">Späť</span>';

			APP.scene('game');
		}
		else if(focused.hasClass('settings'))
			APP.scene('settings');
		else if(focused.hasClass('highscore'))
			APP.scene('highscore');
		else if(focused.hasClass('about'))
            APP.scene('about');
        else if (focused.hasClass('quit'))
            HbbTV.closeApplication();
		return false;
    },
    onFocus: function (el) {
        // for mouse control if you have to do something with focused element
    },
    onReturn: function(){
        AppShared.returnToMainMenu();
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
