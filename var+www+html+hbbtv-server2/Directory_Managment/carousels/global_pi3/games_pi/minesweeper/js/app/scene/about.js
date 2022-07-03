var Scene_About = function () {
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
        return $('#scene-about');
    },

    destroy: function () {
        this.el.hide();
    },
    show: function (data) {
        this.el.show();
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
            case Main.key.RED:
                AppShared.returnToMainMenu();
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
