/**
 * Global Application Launcher
 * martin.henes@mautilus.com
 * @author Mautilus s.r.o.
 * @version 1.0.7
 */

if (typeof KeyEvent == 'undefined') {
	var KeyEvent = {};
}

Array.prototype.rotate = function(n) {
	while (this.length && n < 0) {
		n += this.length;
	}
	this.push.apply(this, this.splice(0, n));
	return this;
};

var Main = {
	visible: null, // Boolean variable for indication if the menu is visible
	config: null, // configuration object contains all applications shown in the menu
	selectedId: 0, // selectedIdx is used for selcted item in the menu
	currentApps: null,
	hidemenutimer: [], // timer for hidding menu container
	focusObj: null,
	loop: true, // default value for vertical navigation with loop

	key: {
		RIGHT: KeyEvent.VK_RIGHT || 39,
		LEFT: KeyEvent.VK_LEFT || 37,
		UP: KeyEvent.VK_UP || 38,
		DOWN: KeyEvent.VK_DOWN || 40,
		RETURN: KeyEvent.VK_BACK || 8,
		ENTER: KeyEvent.VK_ENTER || 13,
		RED: KeyEvent.VK_RED || 82,
		GREEN: KeyEvent.VK_GREEN || 71,
		YELLOW: KeyEvent.VK_YELLOW || 89,
		BLUE: KeyEvent.VK_BLUE || 66,
		ZERO: KeyEvent.VK_0 || 96
	},

	networkerror: false, // not used
	hbbtv_init: false, // boolean value used for indication if the application was started

	/**
	 * Initialize application
	 */
	init: function() {
		this.initVideo();
		this.menu = document.getElementById('menu');
		this.appmgr = document.getElementById('appmgr');
		this.loadConfig();
		this.initKeyListener();
		this.prepareMenu();
		this.showMenu();
		this.initApp();
	},

	/**
	 * [loadConfig description]
	 * @return {[type]} [description]
	 */
	loadConfig: function() {
		var url = 'apps.json?t=' + Math.ceil(Math.random() * 999999);
		this.config = this.loadJSON(url);
	},

	initVideo: function() {
		var videoElem = document.getElementById('video');
		try {
			videoElem.setFullScreen(true);
		} catch (e) {
			this.lastError = 'Error: video setFullScreen HbbTV API';
		}
		try {
			videoElem.bindToCurrentChannel();
		} catch (e) {
			this.lastError = 'Error: video bindToCurrentChannel HbbTV API';
		}
	},

	initApp: function() {
		var app, vid;

		try {
			app = this.appmgr.getOwnerApplication(document);
			app.show();
			app.activate();
		} catch (e) {
			this.lastError = 'Error: application manager getOwnerApplication';
		}
		try {
			app.show();
		} catch (e2) {
			this.lastError = 'Error: application show';
		}
		try {
			vid = document.getElementById('video');
			vid.style.left = '0px';
			vid.style.top = '0px';
			vid.style.width = '1280px';
			vid.style.height = '720px';
		} catch (e2) {
			this.lastError = 'Error: video set custom size';
		}
	},

	prepareMenu: function() {
		if (!this.config) {
			this.showError('Vyskytla se chyba při načítání aplikace');
			return;
		}

		var defaultIdx = null,
			i, subIdx = null;

		var title = this.createElement('div', 'menutitle');
		title.innerText = this.config.title;
		this.menu.appendChild(title);
		var ul = this.makeUL(this.config.applications, this.menu);
		this.currentApps = this.config.applications;
		this.focusObject(ul.firstChild);
		this.selectedId = 0;
	},

	focusObject: function(obj) {
		if (!obj) return false;
		removeClass(this.focusObj, 'focused');
		addClass(obj, 'focused');
		this.focusObj = obj;
		return obj;
	},

	makeUL: function(obj, parent) {
		var ul = this.createElement('ul');
		for (i = 0; i < obj.length; i++) {
			var item = obj[i];
			var li = this.createElement('li', 'menu-' + i);
			li.innerText = item.name;
			li.style.backgroundColor = item.bgcolor;
			li.style.color = item.fgcolor;
			if (item.applications) {
				addClass(li, 'submenu');
				li.innerHTML += '<img src="icons/right.png"></img>';
			}
			ul.appendChild(li);
		}
		if (parent) parent.appendChild(ul);
		this.activeUl = ul;
		return ul;
	},

	moveMenu: function(direction) {
		var newFocus;
		switch (direction) {
			case 'up':
				if (this.focusObject(this.focusObj.previousSibling)) --this.selectedId;

				break;
			case 'down':
				if (this.focusObject(this.focusObj.nextSibling)) ++this.selectedId;
				break;
			case 'sub':
				//var indexes = this.getIndexes(this.focusObj.id);
				var parent = this.currentApps;
				var current = this.currentApps[this.selectedId].applications;
				if (!current) return;
				this.currentApps = current;
				this.currentApps.parent = parent;
				this.selectedId = 0;
				var ul = this.makeUL(this.currentApps, this.activeUl);
				this.submenuId++;
				addClass(this.focusObj, 'selected');
				this.focusObject(ul.firstChild);
				this.menu.className = 'sub' + this.submenuId;
				break;
			case 'parent':
				if (this.currentApps.parent === undefined) return;
				var tempActive = this.activeUl.parentNode;
				this.activeUl.parentNode.removeChild(this.activeUl);
				this.activeUl = tempActive;
				var selected = this.activeUl.getElementsByClassName("selected");
				this.focusObj = selected[0];
				this.selectedId = [].indexOf.call(this.activeUl.children, this.focusObj);
				if (this.currentApps.parent) this.currentApps = this.currentApps.parent;
				addClass(selected[0], 'focused');
				removeClass(selected[0], 'selected');
				if (this.submenuId > 0) --this.submenuId;
				this.menu.className = 'sub' + this.submenuId;
				break;
		}
	},

	getIndexes: function(id) {
		var tostr = id.substring(5);
		var arrIdx = tostr.split('-');
		return arrIdx;
	},

	setKeySet: function(mask) {
		var elemcfg, app;
		elemcfg = document.getElementById('oipfcfg');
		try {
			elemcfg.keyset.value = mask;
		} catch (e) {
			this.lastError = 'Error: setKeySet mask';
		}
		try {
			elemcfg.keyset.setValue(mask);
		} catch (e) {
			this.lastError = 'Error: setKeySet';
		}
		try {
			app = this.appmgr.getOwnerApplication(document);
			app.privateData.keyset.setValue(mask);
			app.privateData.keyset.value = mask;
		} catch (e) {
			this.lastError = 'Error: setKeySet';
		}
	},

	initKeyListener: function() {
		var scope = this;
		document.addEventListener('keydown', function(e) {
			if (scope.handleKeyCode(e.keyCode)) {
				e.preventDefault();
			}
		}, false);

		this.setKeySet(0x1); // ColorKeys and Cursors
	},

	handleKeyCode: function(kc) {
		if (kc == this.key.RED) {
			this.handleRedKey();
			return true;
		} else if (kc == this.key.GREEN) {
			// show client informations
			return true;
		} else if (kc == this.key.BLUE) {
			// show server information
			return true;
		} else if (kc == this.key.YELLOW) {
			// hide/show menu
			return true;
		} else if (kc == this.key.ENTER) {
			this.handleEnterKey();
			return true;
		} else if (kc == this.key.LEFT) {
			this.moveMenu('parent');
			return true;
		} else if (kc == this.key.RIGHT) {
			this.moveMenu('sub');
			return true;
		} else if (kc == this.key.UP) {
			this.moveMenu('up');
			return true;
		} else if (kc == this.key.DOWN) {
			this.moveMenu('down');
			return true;
		}

		return false;
	},

	/*
	 * Key handlers
	 */
	handleEnterKey: function() {
		var app;
		app = this.currentApps[this.selectedId];
		if (app && app.url) this.runApplication(app.url);
	},

	handleRedKey: function() {
		if (this.visible) {
			this.hideMenu();
		} else if (this.isVisibleRB()) {
			this.showMenu();
		} else {
			this.showRButton();
		}
	},

	/*
	DOM elements functions
	*/
	createElement: function(tag, id, className, content) {
		var elem = document.createElement(tag);
		if (id) elem.id = id;
		if (className) elem.className = className;
		if (content) {
			var node = document.createTextNode(content);
			elem.appendChild(node);
		}
		return elem;
	},

	hideElement: function(element, duration) {
		var scope = this;
		if (this.hidemenutimer[element.id]) {
			clearTimeout(this.hidemenutimer[element.id]);
		}
		this.hidemenutimer[element.id] = setTimeout(function() {
			scope.hidemenutimer[element.id] = false;
			if (element.id === 'redbutton') scope.hideRButton();
			if (element.id === 'bluebutton') scope.hideBButton();
		}, duration, this);
	},

	showMenu: function() {
		if (this.config === null) this.prepareMenu();
		this.menu.style.display = 'block';
		this.visible = true;
		this.setKeySet(0x1 + 0x2 + 0x4 + 0x8 + 0x10); // ColorKeys and Cursors
	},

	hideMenu: function() {
		this.menu.style.display = 'none';
		this.visible = false;
		this.setKeySet(0x1); // ColorKeys and Cursors
	},

	/*
	Animation methods
	*/
	animateGroup: function(array, param, from, to) {
		for (var i = 0; i < array.length; i++) {
			array[i].style.width = '0px';
			array[i].style.display = 'block';
			this.animation(array[i], {
				'styl': 'width',
				'from': from,
				'to': to
			}, function() {
				array[i].style.display = 'block';
			});
		}
	},

	animation: function(element, param, callback) {
		var delta;
		var scope = this;
		delta = function(p) {
			return p;
		};
		element.style[param.styl] = param.from + 'px';
		setTimeout(function() {
			//console.log(' '+element.id+' '+param.duration+' '+param.from+' '+param.to+' '+param.styl+' '+scope.animate);
			scope.animate({
				id: element.id,
				delay: 10,
				duration: param.duration || 1000, // 1 sekunda defaultně
				delta: delta,
				step: function(delta) {
					var absStep = parseInt(param.from + (param.to - param.from) *
							delta) +
						'px';
					element.style[param.styl] = absStep;
				},
				onFinish: function() {
					//if (param.to < 0){
					//    element.setAttribute('style', param.styl+': ' + parseInt(param.to) + 'px; display: none');
					//}
					callback && callback();
				}
			});
		}, param.delay || 0);
	},

	animate: function(opts) {
		var start = new Date();
		//var scope = this;
		//var id =  opts.id;

		var animateInterval = setInterval(function() {
			var timePassed = new Date() - start;
			var progress = timePassed / opts.duration;

			if (progress > 1) progress = 1;

			var delta = opts.delta(progress);
			opts.step(delta);

			if (progress == 1) {
				clearInterval(animateInterval);
				if (opts.onFinish) opts.onFinish();
			}
		}, opts.delay || 10);
	},
	/*
	Utils
	*/
	runApplication: function(url) {
		if (!url || url === '') return;
		addClass(document.getElementById('submenu_' + this.activeId), 'hidden');
		this.hideMenu();
		document.location.href = url;
	},

	/**
	 * Get Parameter from URL
	 *
	 * @private
	 */
	getUrlParams: function() {
		var params = {};
		window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,
			function(str, key, value) {
				params[key] = value;
			});
		return params;
	},

	loadJSON: function(url) {
		var request, response, json;

		request = new XMLHttpRequest();
		request.open('GET', url, false);
		request.setRequestHeader('Cache-Control', 'no-cache');
		request.send(null);
		response = request.responseText;

		if (response == '{}' || request.status == 404) {
			return null;
		}
		try {
			json = JSON.parse(response);
		} catch (e) {
			this.lastError = 'Error: loadJSON';
		}
		return json;
	}
};


function hasClass(element, classToVerify) {
	if (!element) {
		return false;
	}
	if (element.classList) {
		return element.classList.contains(classToVerify);
	} else {
		return !!element.className.match(new RegExp('(\\s|^)' + classToVerify +
			'(\\s|$)'));
	}
}

function addClass(element, classToAdd) {
	if (!element) {
		return;
	}
	if (element.classList) {
		element.classList.add(classToAdd);
	} else if (!this.hasClass(element, classToAdd)) {
		element.className += ' ' + classToAdd;
	}
}

function removeClass(element, classToRemove) {
	if (!element) {
		return;
	}
	if (element.classList) {
		element.classList.remove(classToRemove);
	} else if (this.hasClass(element, classToRemove)) {
		var reg = new RegExp('(\\s|^)' + classToRemove + '(\\s|$)');
		element.className = element.className.replace(reg, '');
	}
}
