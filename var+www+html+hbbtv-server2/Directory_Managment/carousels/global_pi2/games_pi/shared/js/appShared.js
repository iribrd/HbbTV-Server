/**
 * The same functions for the various apps
 * @type {{throbber: Function, throbberHide: Function}}
 */
var AppShared = {

	/**
	 * Shows throbber in the app.
	 * @param disableInputs
	 */
	throbber: function(disableInputs) {
		var $throbber, pos, width, max, scope;

		if (this.throbberIsShown) {
			return; // only one instance of throbber
		}
		if (disableInputs) {
			Control.disable(); // while throbber is loading, disable all controls
			Mouse.disable();
		}

		$throbber = $('<div class="throbber"></div>');
		$("body").append($throbber);

		this.throbberIsShown = true;

		// animation
		pos = 0;
		width = 64;
		max = -960;

		this.throbberInt = setInterval(function() {
			pos -= width;
			if (pos < max) {
				pos = 0;
			}
			$throbber.css("background-position", pos + 'px 0px');
		}, 95);

		scope = this;
		this.throbberTimeout = setTimeout(function() {
			scope.throbberHide(true);
			//App.systemMessage.render(go.configurationService.getDictionaryEntry("CONNECTION_LOST"));
		}, 45000);
	},

	/**
	 * Remove throbber from the app.
	 * @param enableInputs
	 */
	throbberHide: function(enableInputs) {
		if (this.throbberIsShown) {
			this.throbberIsShown = false;

			clearInterval(this.throbberTimeout);
			clearInterval(this.throbberInt);

			this.throbberInt = null;
			$(".throbber").remove();

			if (enableInputs) {
				Control.enable();
				Mouse.enable();
			}
		}
	},

	returnToMainMenu: function() {
		try {
			if (navigator.userAgent.indexOf('Philips') >= 0) {
				Device.exit()
			} else {
				window.location.href = CONFIG.returnURL;
			}
			return;
		} catch (e) {
			window.close();
		}
	},

	changeChannelLogo: function(id) {
		$('#snippet-head').find('.logo').removeClass().addClass('logo ' + id);
	}
};
