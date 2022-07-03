CONFIG = {
    developer: {
		debug: true,
		active: true,
		console: true,
		rentdevice: false
	},environment:  'DEVELOPMENT', // 'DEVELOPMENT' or 'PRODUCTION'
    project:  'OCKO', // 'OCKO' or 'OCKOGOLD'
    version: '2.1.2',
    ver: 'v1',
	returnURL: "../../global_pi/index.html?autostart=true",

    debug: false,
    allkeys: false,
    lang: 'czech',
    GA: '',
    playerTimeout: 20000, // time how lond app tries to wait to stream after that error message is displayed
    proxy: '',
    showErrorMessage: false, // only for debugging. For production please set value to false
    deleteCookies: false
};
if (CONFIG.environment == 'DEVELOPMENT') {
    CONFIG.GA = '';
    CONFIG.debug = false;
}
window.CONFIG = CONFIG;


