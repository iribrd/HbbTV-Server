var App = function () {
    $.extend(this, Events, {
        init: function () {
            window.APP = this;
            this.excludededScenes = ['empty'];
            Util.disableSelection(document.body);

            this.appname = CONFIG.GA_name;


            var cls = CONFIG.project == 'OCKO' ? 'ocko' : 'gold';
            $('body').removeClass();
            $('body').addClass(cls);

            this.el_dialog = $('#dialog');

            this.event_stack = {};
            this.dialog = null;
            this.scenes = {};
            this.activeScene = null;
            this.sceneHistory = [];
            this.streamSec = 0;
            this.cumulateSec = { sec: 0, flag: false };
            this.clearCumulate = false;

            this.dataloading = false;

            this.language = CONFIG.lang;
            this.setLanguage();

            this.on('unload', function () {
                this.unLoad();
            });

            this.on('keyDown', function (keyCode) {
                this.keyDown(keyCode, true);
            });



            this.on('scene.show', function (name) {
                APP.activeSceneName = name;
            });
            this.on('scene.refresh', function (name) {
                if (typeof this.activeScene.refresh == 'function') {
                    this.activeScene.refresh();
                }
            });
            this.level = "easy";
            this.prepareScenes();
            this.loadConf();
        },

        unLoad: function () {
        },

        log: function () {
            return Main.log.apply(Main, arguments);
        },

        loadConf: function () {
            this.scene('welcome');

        },

        prepareScenes: function () {
            this.addScene('game', new Scene_Game('game'));
            this.addScene('welcome', new Scene_Welcome('welcome'));

            this.addScene('settings', new Scene_Settings('settings'));
            this.addScene('highscore', new Scene_Highscore('highscore'));
            this.addScene('about', new Scene_About('about'));
        },

        ready: function () {
            if (this.dialog) {
                this.dialog.close();
            }

            this.render();
        },

        setLanguage: function () {
        },

        render: function () {
        },

        focusable: function () {
            var scope = this;

            $('.focusable').live('mouseenter', function (e) {
                scope.focus(this);
            });

            $('.hoverable').live('mouseenter', function (e) {
                scope.hover(this, false);
            }).live('mouseleave', function (e) {
                var self = this;
                if ($(self).hasClass('hover')) {
                    $(self).removeClass('hover');
                }

                if (scope.returnFocusTimeout) {
                    clearTimeout(scope.returnFocusTimeout);
                }

                scope.returnFocusTimeout = setTimeout(function () {
                    if (!$(self).hasClass('focus')) {
                        return;
                    }
                    scope.blur(self);
                    if (!scope.getFocused() && Main.previousFocus) {
                        scope.focus(Main.previousFocus);
                    }
                }, 400);
            });
        },

        clickKey: function () {
            $('*[data-key]').live('click', function () {
                var key = $(this).attr('data-key');

                if (key) {
                    Main.keyDown(Main.key[key]);
                    return false;
                }
            });
        },
        setDialog: function (titleObj, text, cb) {
            if (typeof cb != 'function') {
                cb = function () { };
            }
            this.el_dialog.find('.title').html(titleObj.text).addClass(titleObj.cls ? titleObj.cls : '');
            this.el_dialog.find('.text').html(text);
            this.el_dialog.find('.close').bind('click', function () { APP.unsetDialog(); }).html(APP.lang.close);

            this.el_dialog.show();
            cb();
        },
        unsetDialog: function (cb) {
            if (typeof cb != 'function') {
                cb = function () { };
            }
            this.el_dialog.hide();
            this.el_dialog.find('.title').html('').removeClass().addClass('title');
            this.el_dialog.find('.text').html('');
            this.el_dialog.find('.close').unbind('click').html('');
            cb();
        },
        dialogIsDisplayed: function () {
            return APP.el_dialog.is(':visible');
        },
        keyDown: function (keyCode, key) {
            var status = true;
            this.eventStop = false;

            if (APP.dataloading) { return; }

            if (this.dialog) {
                this.trigger('key_dialog', keyCode, status);
            }
            else {
                if (keyCode == Main.key.YELLOW && this.dialogIsDisplayed()) {
                    this.trigger('yellow.button');
                }
                if (this.dialogIsDisplayed()) {
                    if (keyCode == Main.key.ENTER || keyCode == Main.key.RED || keyCode == Main.key.BACK || keyCode === 461) {
                        this.unsetDialog();
                    }
                    return;
                }
                if (keyCode == Main.key.STOP) {
                    if (key) {
                        APP.cumulateSec.flag = false;
                        APP.clearCumulate = true;
                    }
                    Player.stop();
                }
				if ((keyCode == Main.key.BLUE && this.activeScene.onReturn) && this.activeScene.name !== 'welcome'){
					this.activeScene.onReturn();
				}
				if(keyCode == Main.key.GREEN){
					AppShared.returnToMainMenu();
                }
                if(keyCode === Main.key.RED) {
                    HbbTV.closeApplication();
                }
                // if(keyCode == Main.key.RED && this.activeScene.onReturn)
                //     this.activeScene.onReturn();
                else
                    this.trigger('key', keyCode, status);

            }
        },

        focus: function (el, saveFocus) {
            if (typeof el == 'string' && el.substring(0, 1) != '#') {
                el = $('#' + el);
            }
            else {
                el = $(el);
            }

            el = el.eq(0);

            var id;

            if (!(id = el.attr('id'))) {
                id = 'uid-' + Math.round(Math.random() * 10000000);
                el.attr('id', id);
            }

            if (id == Main.getFocused()) {
                return;
            }

            if (this.returnFocusTimeout) {
                clearTimeout(this.returnFocusTimeout);
            }

            if (this.focused) {
                this.focused.trigger('blur');
            }

            Main.focus(id, saveFocus);
            this.focused = el;

            el.trigger('focus');
            this.trigger('focus', el);

            return el;
        },

        hover: function (el, saveFocus) {
            if (typeof el == 'string' && el.substring(0, 1) != '#') {
                el = $('#' + el);
            }
            else {
                el = $(el);
            }

            el = el.eq(0);

            var id;

            if (!(id = el.attr('id'))) {
                id = 'uid-' + Math.round(Math.random() * 10000000);
                el.attr('id', id);
            }

            //if(id == Main.getHovered()){
            //  return;
            //}

            if (this.hovered) {
                this.hovered.trigger('blur');
            }

            Main.hover(id, saveFocus);
            this.hovered = el;

            el.trigger('hover');
            this.trigger('hover', el);

            return el;
        },

        blur: function (el) {
            if (typeof el == 'string') {
                el = $('#' + el);

            } else {
                el = $(el);
            }

            el.trigger('blur');
            Main.blur(el.attr('id'));
            this.trigger('blur', el);

            return el;
        },

        getFocused: function () {
            var id = Main.getFocused(), el = $('#' + id);

            if (id && el && el.hasClass('focus')) {
                return el;
            }

            return false;
        },

        addScene: function (scene_name, cls, options) {
            this.scenes[scene_name] = cls;
        },

        getScene: function (scene_name) {
            if (this.scenes && this.scenes[scene_name]) {
                return this.scenes[scene_name];
            }

            return false;
        },

        clearHistory: function () {
            var screens = []; // scene names which be removed from history (You can use this if you want to remove logged screens)
            if (screens && screens.length) {
                var newhistory = [];
                for (var i in this.sceneHistory) {
                    if (this.sceneHistory[i][0] && $.inArray(this.sceneHistory[i][0], screens) > -1) {
                        this.log('Remove "' + this.sceneHistory[i][0] + '" from history');
                    }
                    else {
                        newhistory.push(this.sceneHistory[i]);
                    }
                }
                this.sceneHistory = newhistory;
            }
        },

        sceneBack: function () {
            var shift = this.sceneHistory.shift();
            var args = this.sceneHistory.shift();
            if (shift && args) {
                //APP.log(JSON.stringify(args));
                args = jQuery.grep(args, function (item) { return item != 'undefined'; });

                return this.scene.apply(this, args);
            }
            else {
                if (this.activeSceneName == 'home') {
                    this.exit();
                }
                else {
                    this.scene('home');
                }
            }
        },

        scene: function (scene_name) {
            var scene;
            var args = Array.prototype.slice.call(arguments, 1);

            if (args.length == 1 && args[0] == 'undefined') {
                args = [];
            }

            scene = this.scenes[scene_name]

            if (scene && String(this.sceneHistory[0]) != String(Array.prototype.slice.call(arguments, 0))) {
                var argsall = Array.prototype.slice.call(arguments, 0);

                argsall = $.grep(argsall, function (sc) { return (typeof sc != 'undefined'); });

                if (typeof argsall[0] != 'undefined' && $.inArray(argsall[0], this.excludededScenes) > -1) {
                    APP.log('DO NOT add "' + argsall + '" screen to history');
                }
                else {
                    this.sceneHistory.unshift(argsall);
                }

                if (this.activeScene) {
                    if (this.activeScene.hide() !== false) {
                        delete this.activeScene;
                    }
                }

                if (typeof scene == 'function') {
                    //APP.log('NEW SCENE');
                    this.activeScene = new scene(scene_name, args);

                } else {
                    this.activeScene = scene;
                }

                if (scene_name.match('player')) {
                    this.activeScene.showPlayer();
                }
                else {
                    this.activeScene.hidePlayer();
                }

                this.trigger('scene', scene_name, this.activeScene, args);

                this.activeScene.show.apply(this.activeScene, args);
                this.activeScene.activate();

                this.trigger('scene.show', scene_name, this.activeScene, args);

                return true;
            }
            else if (String(this.sceneHistory[0]) == String(Array.prototype.slice.call(arguments, 0))) {
                this.trigger('scene.refresh', scene_name, this.activeScene, args);
                return true;
            }

            return false;
        },

        reload: function () {
            this.splashscreen(true);
            Main.onRefresh();
        },

        shiftScene: function () {
            this.sceneHistory.shift();
        },

        splashscreen: function (flag) {
            if (flag) {
                $('#splashscreen').show();
            }
            else {
                $('#splashscreen').hide();
            }
        },

        bindPlayer: function () {
            var scope = this;
            Player.on('state', function (state) {
                if (state == Main.state.BUFFERRING || state == Main.state.CONNECTING) {
                    if (scope.timeoutTimer) {
                        window.clearTimeout(scope.timeoutTimer);
                        scope.timeoutTimer = null;
                    }
                    scope.timeoutTimer = window.setTimeout(function () {
                        APP.log('PLAYER TIMEOUT');
                        Player.onError();
                        clearTimeout(scope.timeoutTimer);
                        scope.timeoutTimer = null;
                    }, CONFIG.playerTimeout);
                }
                else {
                    window.clearTimeout(scope.timeoutTimer);
                    scope.timeoutTimer = null;
                }

                if (APP.getScene('player') == APP.activeScene && (state == Main.state.BUFFERRING || state == Main.state.CONNECTING || state == Main.state.PLAYING || state == Main.state.PAUSED)) {
                    APP.activeScene.cmenu.updatePlayer();
                }
                else if (APP.activeScene.cmenu) {
                    if (APP.getScene('home') == APP.activeScene) {
                        APP.activeScene.cmenu.update();
                    }
                }

                if (state == Main.state.BUFFERRING || state == Main.state.CONNECTING) {
                    Util.throbberBig('#player');
                }
                else {
                    Util.throbberBigHide('#player');
                    Util.throbberBigHide();
                }
            });
            Player.on('progress', function (seconds, len, percent) {
                APP.streamSec = seconds;
            });
            Player.on('stop', function () {
                //APP.log('stop:'+(APP.streamSec+APP.cumulateSec.sec)+'||'+APP.streamSec);
                //if(!APP.cumulateSec.flag){
                //  _gaq.push(['_trackEvent', 'liveExpresPlaybackSec', Math.round(APP.streamSec+APP.cumulateSec.sec).toString(), '', 0, false]);
                _gaq.push(['_trackEvent', 'liveExpresPlaybackSec', Math.round(APP.streamSec).toString(), '', 0, false]);
                APP.streamSec = 0;
                //}
                //if(APP.clearCumulate){
                //  APP.cumulateSec = {sec: 0, flag: false};
                //  APP.clearCumulate = false;
                //}
                APP.keyDown(Main.key.STOP);
                APP.getScene('menu').cmenu.update();
            });
            Player.on('finished', function () {
                try {
                    //APP.log('finish:'+(APP.streamSec+APP.cumulateSec.sec)+'||'+APP.streamSec);
                    //if(!APP.cumulateSec.flag){
                    //  _gaq.push(['_trackEvent', 'liveExpresPlaybackSec', Math.round(APP.streamSec+APP.cumulateSec.sec).toString(), '', 0, false]);
                    _gaq.push(['_trackEvent', 'liveExpresPlaybackSec', Math.round(APP.streamSec).toString(), '', 0, false]);
                    APP.streamSec = 0;
                    //}
                    //if(APP.clearCumulate){
                    //  APP.cumulateSec = {sec: 0, flag: false};
                    //  APP.clearCumulate = false;
                    //}
                    APP.keyDown(Main.key.STOP);
                }
                catch (e) { }
                Player.clearPlayer();
                if (APP.getScene('player') == APP.activeScene) {
                    APP.sceneBack();
                }
            });
            Player.on('error', function () {
                //APP.log('error:'+(APP.streamSec+APP.cumulateSec.sec)+'||'+APP.streamSec);
                //_gaq.push(['_trackEvent', 'liveExpresPlaybackSec', Math.round(APP.streamSec+APP.cumulateSec.sec).toString(), '', 0, false]);
                _gaq.push(['_trackEvent', 'liveExpresPlaybackSec', Math.round(APP.streamSec).toString(), '', 0, false]);
                APP.streamSec = 0;
                //APP.cumulateSec = {sec: 0, flag: false};
                APP.keyDown(Main.key.STOP);
                APP.setDialog({ text: APP.lang.error_title, cls: 'error' }, APP.lang.player_error);
                APP.getScene('menu').cmenu.update();
                Player.clearPlayer();
                if (APP.getScene('player') == APP.activeScene) {
                    APP.sceneBack();
                }
            });
        },

        initZoom: function () {
            var w = 1280; //screen.width;
            var h = 720; //screen.height;

            var bw = window.innerWidth;
            var bh = window.innerHeight;

            var wRatio = bw / w;
            var hRatio = bh / h;
            var ratio = (wRatio + hRatio) / 2;

            document.getElementsByTagName('body')[0].style.zoom = ratio;
            //     document.getElementsById('viewport').style.zoom = ratio;
        },

		returnToMainMenu: function() {
			var httpUrl = '../start/index.html?autostart=true';
			try {
				if (navigator.userAgent.indexOf('Philips') >= 0) {
					Device.exit()
				} else {
					window.location.href = httpUrl;
				}
				return;
			} catch (e) {
				window.close();
			}
		},

        exit: function () {
            Main.unload();
        }
    });

    this.init.apply(this, arguments);
};
