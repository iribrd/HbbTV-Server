!function(a){function b(d){if(c[d])return c[d].exports;var e=c[d]={i:d,l:!1,exports:{}};return a[d].call(e.exports,e,e.exports,b),e.l=!0,e.exports}var c={};b.m=a,b.c=c,b.d=function(a,c,d){b.o(a,c)||Object.defineProperty(a,c,{configurable:!1,enumerable:!0,get:d})},b.n=function(a){var c=a&&a.__esModule?function(){return a.default}:function(){return a};return b.d(c,"a",c),c},b.o=function(a,b){return Object.prototype.hasOwnProperty.call(a,b)},b.p="",b(b.s=6)}([function(a,b,c){"use strict";function d(){}function e(a,b){var c,e,f,g,h=J;for(g=arguments.length;g-- >2;)I.push(arguments[g]);for(b&&null!=b.children&&(I.length||I.push(b.children),delete b.children);I.length;)if((e=I.pop())&&void 0!==e.pop)for(g=e.length;g--;)I.push(e[g]);else"boolean"==typeof e&&(e=null),(f="function"!=typeof a)&&(null==e?e="":"number"==typeof e?e=String(e):"string"!=typeof e&&(f=!1)),f&&c?h[h.length-1]+=e:h===J?h=[e]:h.push(e),c=f;var i=new d;return i.nodeName=a,i.children=h,i.attributes=null==b?void 0:b,i.key=null==b?void 0:b.key,void 0!==H.vnode&&H.vnode(i),i}function f(a,b){for(var c in b)a[c]=b[c];return a}function g(a,b){return e(a.nodeName,f(f({},a.attributes),b),arguments.length>2?[].slice.call(arguments,2):a.children)}function h(a){!a._dirty&&(a._dirty=!0)&&1==M.push(a)&&(H.debounceRendering||K)(i)}function i(){var a,b=M;for(M=[];a=b.pop();)a._dirty&&C(a)}function j(a,b,c){return"string"==typeof b||"number"==typeof b?void 0!==a.splitText:"string"==typeof b.nodeName?!a._componentConstructor&&k(a,b.nodeName):c||a._componentConstructor===b.nodeName}function k(a,b){return a.normalizedNodeName===b||a.nodeName.toLowerCase()===b.toLowerCase()}function l(a){var b=f({},a.attributes);b.children=a.children;var c=a.nodeName.defaultProps;if(void 0!==c)for(var d in c)void 0===b[d]&&(b[d]=c[d]);return b}function m(a,b){var c=b?document.createElementNS("http://www.w3.org/2000/svg",a):document.createElement(a);return c.normalizedNodeName=a,c}function n(a){var b=a.parentNode;b&&b.removeChild(a)}function o(a,b,c,d,e){if("className"===b&&(b="class"),"key"===b);else if("ref"===b)c&&c(null),d&&d(a);else if("class"!==b||e)if("style"===b){if(d&&"string"!=typeof d&&"string"!=typeof c||(a.style.cssText=d||""),d&&"object"==typeof d){if("string"!=typeof c)for(var f in c)f in d||(a.style[f]="");for(var f in d)a.style[f]="number"==typeof d[f]&&!1===L.test(f)?d[f]+"px":d[f]}}else if("dangerouslySetInnerHTML"===b)d&&(a.innerHTML=d.__html||"");else if("o"==b[0]&&"n"==b[1]){var g=b!==(b=b.replace(/Capture$/,""));b=b.toLowerCase().substring(2),d?c||a.addEventListener(b,q,g):a.removeEventListener(b,q,g),(a._listeners||(a._listeners={}))[b]=d}else if("list"!==b&&"type"!==b&&!e&&b in a)p(a,b,null==d?"":d),null!=d&&!1!==d||a.removeAttribute(b);else{var h=e&&b!==(b=b.replace(/^xlink\:?/,""));null==d||!1===d?h?a.removeAttributeNS("http://www.w3.org/1999/xlink",b.toLowerCase()):a.removeAttribute(b):"function"!=typeof d&&(h?a.setAttributeNS("http://www.w3.org/1999/xlink",b.toLowerCase(),d):a.setAttribute(b,d))}else a.className=d||""}function p(a,b,c){try{a[b]=c}catch(a){}}function q(a){return this._listeners[a.type](H.event&&H.event(a)||a)}function r(){for(var a;a=N.pop();)H.afterMount&&H.afterMount(a),a.componentDidMount&&a.componentDidMount()}function s(a,b,c,d,e,f){O++||(P=null!=e&&void 0!==e.ownerSVGElement,Q=null!=a&&!("__preactattr_"in a));var g=t(a,b,c,d,f);return e&&g.parentNode!==e&&e.appendChild(g),--O||(Q=!1,f||r()),g}function t(a,b,c,d,e){var f=a,g=P;if(null!=b&&"boolean"!=typeof b||(b=""),"string"==typeof b||"number"==typeof b)return a&&void 0!==a.splitText&&a.parentNode&&(!a._component||e)?a.nodeValue!=b&&(a.nodeValue=b):(f=document.createTextNode(b),a&&(a.parentNode&&a.parentNode.replaceChild(f,a),v(a,!0))),f.__preactattr_=!0,f;var h=b.nodeName;if("function"==typeof h)return D(a,b,c,d);if(P="svg"===h||"foreignObject"!==h&&P,h=String(h),(!a||!k(a,h))&&(f=m(h,P),a)){for(;a.firstChild;)f.appendChild(a.firstChild);a.parentNode&&a.parentNode.replaceChild(f,a),v(a,!0)}var i=f.firstChild,j=f.__preactattr_,l=b.children;if(null==j){j=f.__preactattr_={};for(var n=f.attributes,o=n.length;o--;)j[n[o].name]=n[o].value}return!Q&&l&&1===l.length&&"string"==typeof l[0]&&null!=i&&void 0!==i.splitText&&null==i.nextSibling?i.nodeValue!=l[0]&&(i.nodeValue=l[0]):(l&&l.length||null!=i)&&u(f,l,c,d,Q||null!=j.dangerouslySetInnerHTML),x(f,b.attributes,j),P=g,f}function u(a,b,c,d,e){var f,g,h,i,k,l=a.childNodes,m=[],o={},p=0,q=0,r=l.length,s=0,u=b?b.length:0;if(0!==r)for(var w=0;w<r;w++){var x=l[w],y=x.__preactattr_,z=u&&y?x._component?x._component.__key:y.key:null;null!=z?(p++,o[z]=x):(y||(void 0!==x.splitText?!e||x.nodeValue.trim():e))&&(m[s++]=x)}if(0!==u)for(var w=0;w<u;w++){i=b[w],k=null;var z=i.key;if(null!=z)p&&void 0!==o[z]&&(k=o[z],o[z]=void 0,p--);else if(!k&&q<s)for(f=q;f<s;f++)if(void 0!==m[f]&&j(g=m[f],i,e)){k=g,m[f]=void 0,f===s-1&&s--,f===q&&q++;break}k=t(k,i,c,d),h=l[w],k&&k!==a&&k!==h&&(null==h?a.appendChild(k):k===h.nextSibling?n(h):a.insertBefore(k,h))}if(p)for(var w in o)void 0!==o[w]&&v(o[w],!1);for(;q<=s;)void 0!==(k=m[s--])&&v(k,!1)}function v(a,b){var c=a._component;c?E(c):(null!=a.__preactattr_&&a.__preactattr_.ref&&a.__preactattr_.ref(null),!1!==b&&null!=a.__preactattr_||n(a),w(a))}function w(a){for(a=a.lastChild;a;){var b=a.previousSibling;v(a,!0),a=b}}function x(a,b,c){var d;for(d in c)b&&null!=b[d]||null==c[d]||o(a,d,c[d],c[d]=void 0,P);for(d in b)"children"===d||"innerHTML"===d||d in c&&b[d]===("value"===d||"checked"===d?a[d]:c[d])||o(a,d,c[d],c[d]=b[d],P)}function y(a){var b=a.constructor.name;(R[b]||(R[b]=[])).push(a)}function z(a,b,c){var d,e=R[a.name];if(a.prototype&&a.prototype.render?(d=new a(b,c),F.call(d,b,c)):(d=new F(b,c),d.constructor=a,d.render=A),e)for(var f=e.length;f--;)if(e[f].constructor===a){d.nextBase=e[f].nextBase,e.splice(f,1);break}return d}function A(a,b,c){return this.constructor(a,c)}function B(a,b,c,d,e){a._disable||(a._disable=!0,(a.__ref=b.ref)&&delete b.ref,(a.__key=b.key)&&delete b.key,!a.base||e?a.componentWillMount&&a.componentWillMount():a.componentWillReceiveProps&&a.componentWillReceiveProps(b,d),d&&d!==a.context&&(a.prevContext||(a.prevContext=a.context),a.context=d),a.prevProps||(a.prevProps=a.props),a.props=b,a._disable=!1,0!==c&&(1!==c&&!1===H.syncComponentUpdates&&a.base?h(a):C(a,1,e)),a.__ref&&a.__ref(a))}function C(a,b,c,d){if(!a._disable){var e,g,h,i=a.props,j=a.state,k=a.context,m=a.prevProps||i,n=a.prevState||j,o=a.prevContext||k,p=a.base,q=a.nextBase,t=p||q,u=a._component,w=!1;if(p&&(a.props=m,a.state=n,a.context=o,2!==b&&a.shouldComponentUpdate&&!1===a.shouldComponentUpdate(i,j,k)?w=!0:a.componentWillUpdate&&a.componentWillUpdate(i,j,k),a.props=i,a.state=j,a.context=k),a.prevProps=a.prevState=a.prevContext=a.nextBase=null,a._dirty=!1,!w){e=a.render(i,j,k),a.getChildContext&&(k=f(f({},k),a.getChildContext()));var x,y,A=e&&e.nodeName;if("function"==typeof A){var D=l(e);g=u,g&&g.constructor===A&&D.key==g.__key?B(g,D,1,k,!1):(x=g,a._component=g=z(A,D,k),g.nextBase=g.nextBase||q,g._parentComponent=a,B(g,D,0,k,!1),C(g,1,c,!0)),y=g.base}else h=t,x=u,x&&(h=a._component=null),(t||1===b)&&(h&&(h._component=null),y=s(h,e,k,c||!p,t&&t.parentNode,!0));if(t&&y!==t&&g!==u){var F=t.parentNode;F&&y!==F&&(F.replaceChild(y,t),x||(t._component=null,v(t,!1)))}if(x&&E(x),a.base=y,y&&!d){for(var G=a,I=a;I=I._parentComponent;)(G=I).base=y;y._component=G,y._componentConstructor=G.constructor}}if(!p||c?N.unshift(a):w||(a.componentDidUpdate&&a.componentDidUpdate(m,n,o),H.afterUpdate&&H.afterUpdate(a)),null!=a._renderCallbacks)for(;a._renderCallbacks.length;)a._renderCallbacks.pop().call(a);O||d||r()}}function D(a,b,c,d){for(var e=a&&a._component,f=e,g=a,h=e&&a._componentConstructor===b.nodeName,i=h,j=l(b);e&&!i&&(e=e._parentComponent);)i=e.constructor===b.nodeName;return e&&i&&(!d||e._component)?(B(e,j,3,c,d),a=e.base):(f&&!h&&(E(f),a=g=null),e=z(b.nodeName,j,c),a&&!e.nextBase&&(e.nextBase=a,g=null),B(e,j,1,c,d),a=e.base,g&&a!==g&&(g._component=null,v(g,!1))),a}function E(a){H.beforeUnmount&&H.beforeUnmount(a);var b=a.base;a._disable=!0,a.componentWillUnmount&&a.componentWillUnmount(),a.base=null;var c=a._component;c?E(c):b&&(b.__preactattr_&&b.__preactattr_.ref&&b.__preactattr_.ref(null),a.nextBase=b,n(b),y(a),w(b)),a.__ref&&a.__ref(null)}function F(a,b){this._dirty=!0,this.context=b,this.props=a,this.state=this.state||{}}function G(a,b,c){return s(c,a,{},!1,b,!1)}Object.defineProperty(b,"__esModule",{value:!0}),c.d(b,"h",function(){return e}),c.d(b,"createElement",function(){return e}),c.d(b,"cloneElement",function(){return g}),c.d(b,"Component",function(){return F}),c.d(b,"render",function(){return G}),c.d(b,"rerender",function(){return i}),c.d(b,"options",function(){return H});var H={},I=[],J=[],K="function"==typeof Promise?Promise.resolve().then.bind(Promise.resolve()):setTimeout,L=/acit|ex(?:s|g|n|p|$)|rph|ows|mnc|ntw|ine[ch]|zoo|^ord/i,M=[],N=[],O=0,P=!1,Q=!1,R={};f(F.prototype,{setState:function(a,b){var c=this.state;this.prevState||(this.prevState=f({},c)),f(c,"function"==typeof a?a(c,this.props):a),b&&(this._renderCallbacks=this._renderCallbacks||[]).push(b),h(this)},forceUpdate:function(a){a&&(this._renderCallbacks=this._renderCallbacks||[]).push(a),C(this,2)},render:function(){}});var S={h:e,createElement:e,cloneElement:g,Component:F,render:G,rerender:i,options:H};b.default=S},function(a,b,c){"use strict";function d(a,b){for(var c in b)a[c]=b[c];return a}function e(a,b,c){void 0===c&&(c=v);var d,e=/(?:\?([^#]*))?(#.*)?$/,f=a.match(e),h={};if(f&&f[1])for(var i=f[1].split("&"),j=0;j<i.length;j++){var k=i[j].split("=");h[decodeURIComponent(k[0])]=decodeURIComponent(k.slice(1).join("="))}a=g(a.replace(e,"")),b=g(b||"");for(var l=Math.max(a.length,b.length),m=0;m<l;m++)if(b[m]&&":"===b[m].charAt(0)){var n=b[m].replace(/(^\:|[+*?]+$)/g,""),o=(b[m].match(/[+*?]+$/)||v)[0]||"",p=~o.indexOf("+"),q=~o.indexOf("*"),r=a[m]||"";if(!r&&!q&&(o.indexOf("?")<0||p)){d=!1;break}if(h[n]=decodeURIComponent(r),p||q){h[n]=a.slice(m).map(decodeURIComponent).join("/");break}}else if(b[m]!==a[m]){d=!1;break}return(!0===c.default||!1!==d)&&h}function f(a,b){var c=a.attributes||v,d=b.attributes||v;return c.default?1:d.default?-1:h(c.path)-h(d.path)||c.path.length-d.path.length}function g(a){return i(a).split("/")}function h(a){return(i(a).match(/\/+/g)||"").length}function i(a){return a.replace(/(^\/+|\/+$)/g,"")}function j(a){return null!=a.__preactattr_||"undefined"!=typeof Symbol&&null!=a[Symbol.for("preactattr")]}function k(a,b){void 0===b&&(b="push"),w&&w[b]?w[b](a):"undefined"!=typeof history&&history[b+"State"]&&history[b+"State"](null,null,a)}function l(){var a;return a=w&&w.location?w.location:w&&w.getCurrentLocation?w.getCurrentLocation():"undefined"!=typeof location?location:z,""+(a.pathname||"")+(a.search||"")}function m(a,b){return void 0===b&&(b=!1),"string"!=typeof a&&a.url&&(b=a.replace,a=a.url),n(a)&&k(a,b?"replace":"push"),o(a)}function n(a){for(var b=x.length;b--;)if(x[b].canRoute(a))return!0;return!1}function o(a){for(var b=!1,c=0;c<x.length;c++)!0===x[c].routeTo(a)&&(b=!0);for(var d=y.length;d--;)y[d](a);return b}function p(a){if(a&&a.getAttribute){var b=a.getAttribute("href"),c=a.getAttribute("target");if(b&&b.match(/^\//g)&&(!c||c.match(/^_?self$/i)))return m(b)}}function q(a){if(0==a.button)return p(a.currentTarget||a.target||this),r(a)}function r(a){return a&&(a.stopImmediatePropagation&&a.stopImmediatePropagation(),a.stopPropagation&&a.stopPropagation(),a.preventDefault()),!1}function s(a){if(!(a.ctrlKey||a.metaKey||a.altKey||a.shiftKey||0!==a.button)){var b=a.target;do{if("A"===String(b.nodeName).toUpperCase()&&b.getAttribute("href")&&j(b)){if(b.hasAttribute("native"))return;if(p(b))return r(a)}}while(b=b.parentNode)}}function t(){A||("function"==typeof addEventListener&&(w||addEventListener("popstate",function(){return o(l())}),addEventListener("click",s)),A=!0)}Object.defineProperty(b,"__esModule",{value:!0}),c.d(b,"subscribers",function(){return y}),c.d(b,"getCurrentUrl",function(){return l}),c.d(b,"route",function(){return m}),c.d(b,"Router",function(){return B}),c.d(b,"Route",function(){return D}),c.d(b,"Link",function(){return C});var u=c(0),v={},w=null,x=[],y=[],z={},A=!1,B=function(a){function b(b){a.call(this,b),b.history&&(w=b.history),this.state={url:b.url||l()},t()}return a&&(b.__proto__=a),b.prototype=Object.create(a&&a.prototype),b.prototype.constructor=b,b.prototype.shouldComponentUpdate=function(a){return!0!==a.static||(a.url!==this.props.url||a.onChange!==this.props.onChange)},b.prototype.canRoute=function(a){return this.getMatchingChildren(this.props.children,a,!1).length>0},b.prototype.routeTo=function(a){return this._didRoute=!1,this.setState({url:a}),this.updating?this.canRoute(a):(this.forceUpdate(),this._didRoute)},b.prototype.componentWillMount=function(){x.push(this),this.updating=!0},b.prototype.componentDidMount=function(){var a=this;w&&(this.unlisten=w.listen(function(b){a.routeTo(""+(b.pathname||"")+(b.search||""))})),this.updating=!1},b.prototype.componentWillUnmount=function(){"function"==typeof this.unlisten&&this.unlisten(),x.splice(x.indexOf(this),1)},b.prototype.componentWillUpdate=function(){this.updating=!0},b.prototype.componentDidUpdate=function(){this.updating=!1},b.prototype.getMatchingChildren=function(a,b,c){return a.slice().sort(f).map(function(a){var f=a.attributes||{},g=f.path,h=e(b,g,f);if(h){if(!1!==c){var i={url:b,matches:h};return d(i,h),Object(u.cloneElement)(a,i)}return a}return!1}).filter(Boolean)},b.prototype.render=function(a,b){var c=a.children,d=a.onChange,e=b.url,f=this.getMatchingChildren(c,e,!0),g=f[0]||null;this._didRoute=!!g;var h=this.previousUrl;return e!==h&&(this.previousUrl=e,"function"==typeof d&&d({router:this,url:e,previous:h,active:f,current:g})),g},b}(u.Component),C=function(a){return Object(u.h)("a",d({onClick:q},a))},D=function(a){return Object(u.h)(a.component,a)};B.subscribers=y,B.getCurrentUrl=l,B.route=m,B.Router=B,B.Route=D,B.Link=C,b.default=B},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){var c=document,d=c.getElementsByTagName("object"),e=void 0,f=void 0,h=void 0;if(d)for(e in d)if(d[e]&&d[e].id===a)return d[e];if(f=c.createElement("object"),f.id=a,"string"==typeof b)f.type=b;else if("object"===(void 0===b?"undefined":g(b)))for(h in b)b.hasOwnProperty(h)&&("style"===h?f.style.cssText=b[h]:f[h]=b[h]);return c.body.appendChild(f),f}Object.defineProperty(b,"__esModule",{value:!0});var f=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),g="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(a){return typeof a}:function(a){return a&&"function"==typeof Symbol&&a.constructor===Symbol&&a!==Symbol.prototype?"symbol":typeof a},h=function(){function a(){d(this,a),console.log("Device construct"),this.setKeys()}return f(a,[{key:"setKeys",value:function(){var a=void 0===window.KeyEvent?{}:window.KeyEvent;this.UP=a.VK_UP||38,this.DOWN=a.VK_DOWN||40,this.LEFT=a.VK_LEFT||37,this.RIGHT=a.VK_RIGHT||39,this.ENTER=a.VK_ENTER||13,this.RETURN=a.VK_BACK||8,this.RED=a.VK_RED||403,this.GREEN=a.VK_GREEN||404,this.YELLOW=a.VK_YELLOW||405,this.BLUE=a.VK_BLUE||406}},{key:"init",value:function(){this.OIPF_CAP=e("oipfCap",{type:"application/oipfCapabilities",style:"position: absolute; left: 0; top: 0; width: 0; height: 0"}),this.OIPF_APP_MAN=e("oipfAppMan",{type:"application/oipfApplicationManager"}),this.OIPF_CONFIG=e("oipfConfig",{type:"application/oipfConfiguration"});try{this.APP=this.OIPF_APP_MAN.getOwnerApplication(document),this.APP.show(),this.APP.activate()}catch(a){console.error("bad show or active app by oipfApplicationManager: "+a)}try{this.OIPF_CONFIG.keyset.value=31}catch(a){console.error("bad register keys by oipfConfiguration 1: "+a)}try{this.OIPF_CONFIG.keyset.setValue(31)}catch(a){console.error("bad register keys by oipfConfiguration 2: "+a)}try{this.APP.privateData.keyset.setValue(31),this.APP.privateData.keyset.value=31}catch(a){console.error("bad register keys: "+a)}}},{key:"exit",value:function(){try{return void this.APP.destroyApplication()}catch(a){window.close()}}}]),a}(),i=new h;b.Device=i},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(b,"__esModule",{value:!0});var e=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),f=function(){function a(){d(this,a);var b="/hbbtv_games/";this.config={developer:{active:!1,menu:"/",highscore:"/highscore/",game:"/game/",about:"/about/"},production:{start:b+"start/index.html",menu:b+"2048/index.html",highscore:b+"2048/highscore/index.html",game:b+"2048/game/index.html",about:b+"2048/about/index.html"}},this.version="1.0.1",this.links={},this.init()}return e(a,[{key:"init",value:function(){this.links.start=this.config.production.start,this.links.menu=this.config.developer.active?this.config.developer.menu:this.config.production.menu,this.links.game=this.config.developer.active?this.config.developer.game:this.config.production.game,this.links.highscore=this.config.developer.active?this.config.developer.highscore:this.config.production.highscore,this.links.about=this.config.developer.active?this.config.developer.about:this.config.production.about}}]),a}(),g=new f;b.Config=g},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){if(!a)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!b||"object"!=typeof b&&"function"!=typeof b?a:b}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}Object.defineProperty(b,"__esModule",{value:!0}),b.Colornav=void 0;var g=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),h=c(0),i=(c(5),c(3)),j=c(1),k=c(2),l=function(a){function b(a){d(this,b);var c=e(this,(b.__proto__||Object.getPrototypeOf(b)).call(this,a));return c.buttons=[],c}return f(b,a),g(b,[{key:"componentDidMount",value:function(){this.onkeyDown=this.onkeyDown.bind(this),window.addEventListener("keydown",this.onkeyDown)}},{key:"componentWillUnmount",value:function(){window.removeEventListener("keydown",this.onkeyDown)}},{key:"onkeyDown",value:function(a){switch(a.keyCode){case k.Device.RETURN:(0,j.route)(i.Config.links.menu);break;case k.Device.BLUE:this.buttons.indexOf("back")>-1&&(0,j.route)(i.Config.links.menu);break;case k.Device.RED:this.buttons.indexOf("exit")>-1&&k.Device.exit();break;case k.Device.GREEN:this.buttons.indexOf("apps")>-1&&(location.href=i.Config.links.start);break;case k.Device.YELLOW:this.buttons.indexOf("new")>-1&&this.props.props.newGame()}}},{key:"renderButtons",value:function(a){for(var b=a.props,c=[],d=0;d<b.buttons.length;d++)c.push((0,h.h)("div",{id:b.buttons[d].id},(0,h.h)("span",null),b.buttons[d].text)),this.buttons.push(b.buttons[d].id);return c}},{key:"render",value:function(a){var b=a.props;return(0,h.h)("div",{id:"color-nav"},this.renderButtons({props:b}))}}]),b}(h.Component);b.Colornav=l},function(a,b,c){"use strict";Object.defineProperty(b,"__esModule",{value:!0});var d={get:function(a){return e(a)},set:function(a,b){return f(a,b)}},e=function(a){return window.localStorage&&"function"==typeof window.localStorage.getItem?window.localStorage.getItem(a):g(a)},f=function(a,b){return window.localStorage&&"function"==typeof window.localStorage.setItem?window.localStorage.setItem(a,b):h(a,b)},g=function(a){var b=void 0,c=void 0,d=cookieName+"=",e=document.cookie.split(";"),f=e.length;for(b=0;b<f;b++){for(c=e[b];" "==c.charAt(0);)c=c.substring(1);if(0==c.indexOf(d))return c.substring(d.length,c.length)}return null},h=function(a,b){var c=void 0,d=new Date;d.setTime(d.getTime()+31536e6),c="expires="+d.toUTCString(),document.cookie=cookieName+"="+cookieValue+"; "+c};b.Storage=d},function(a,b,c){a.exports=c(7)},function(a,b,c){"use strict";var d=c(1),e=c(0),f=c(8),g=c(10),h=c(13),i=c(14),j=c(3);c(2).Device.init();var k=document.createElement("div");k.style.position="absolute",k.style.top="690px",k.style.left="10px",k.style.fontSize="17px",k.style.color="#CACACA",k.innerHTML=j.Config.version,document.body.appendChild(k);var l=function(){return(0,e.h)(d.Router,null,(0,e.h)(f.Menu,{path:j.Config.links.menu}),(0,e.h)(g.Game,{path:j.Config.links.game}),(0,e.h)(h.Highscore,{path:j.Config.links.highscore}),(0,e.h)(i.About,{path:j.Config.links.about}))};(0,e.render)((0,e.h)(l,null),document.getElementById("viewport"))},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){if(!a)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!b||"object"!=typeof b&&"function"!=typeof b?a:b}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}Object.defineProperty(b,"__esModule",{value:!0}),b.Menu=void 0;var g=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),h=c(0),i=c(1),j=c(2),k=c(3),l=c(9),m=c(4),n=function(a){function b(a){d(this,b);var c=e(this,(b.__proto__||Object.getPrototypeOf(b)).call(this,a));return c.state={menuItems:[{value:"NEW GAME",focused:!1,route:k.Config.links.game},{value:"HIGH SCORE",focused:!1,route:k.Config.links.highscore},{value:"ABOUT",focused:!1,route:k.Config.links.about}]},c}return f(b,a),g(b,[{key:"componentDidMount",value:function(){this.onkeyDown=this.onkeyDown.bind(this),window.addEventListener("keydown",this.onkeyDown,!1),this.setfocusToItem()}},{key:"componentWillUnmount",value:function(){window.removeEventListener("keydown",this.onkeyDown,!1)}},{key:"onkeyDown",value:function(a){var b=a.keyCode;switch(b){case j.Device.ENTER:this.onEnter();break;default:this.navigate(b)}}},{key:"navigate",value:function(a){switch(a){case j.Device.DOWN:this.focusNext();break;case j.Device.UP:this.focusPrev()}}},{key:"focusNext",value:function(){var a=this.getIndexOfFocused();if(a+1===this.state.menuItems.length)return!1;var b=this.unfocusAll();this.setfocusToItem({focus:b.menuItems[a+1].value})}},{key:"focusPrev",value:function(){var a=this.getIndexOfFocused();if(0===a)return!1;var b=this.unfocusAll();this.setfocusToItem({focus:b.menuItems[a-1].value})}},{key:"getIndexOfFocused",value:function(){for(var a=void 0,b=0;b<this.state.menuItems.length;b++)if(this.state.menuItems[b].focused){a=b;break}return a}},{key:"onEnter",value:function(){var a=this.state.menuItems[this.getIndexOfFocused()];(0,i.route)(a.route)}},{key:"renderMenuItems",value:function(){for(var a=[],b=0;b<this.state.menuItems.length;b++)a.push((0,h.h)(l.MenuItem,{props:this.state.menuItems[b]}));return a}},{key:"setfocusToItem",value:function(a){var b=this.unfocusAll();if(a&&a.focus)for(var c=0;c<this.state.menuItems.length;c++)this.state.menuItems[c].value===a.focus&&(b.menuItems[c].focused=!0,this.setState(b));else b.menuItems[0].focused=!0,this.setState(b)}},{key:"unfocusAll",value:function(){for(var a=Object.assign({},this.state),b=0;b<this.state.menuItems.length;b++)a.menuItems[b].focused=!1;return a}},{key:"navButtons",value:function(){return{buttons:[{id:"exit",text:"Exit"},{id:"apps",text:"Apps"}]}}},{key:"render",value:function(a){a.props;return(0,h.h)("div",{class:"scene",id:"scene-menu"},(0,h.h)("div",{id:"menu"},this.renderMenuItems()),(0,h.h)(m.Colornav,{props:this.navButtons()}))}}]),b}(h.Component);b.Menu=n},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){if(!a)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!b||"object"!=typeof b&&"function"!=typeof b?a:b}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}Object.defineProperty(b,"__esModule",{value:!0}),b.MenuItem=void 0;var g=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),h=c(0),i=function(a){function b(a){return d(this,b),e(this,(b.__proto__||Object.getPrototypeOf(b)).call(this,a))}return f(b,a),g(b,[{key:"render",value:function(a){var b=a.props,c=b.focused?"menu-item focused":"menu-item";return(0,h.h)("div",{className:c},b.value)}}]),b}(h.Component);b.MenuItem=i},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){if(!a)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!b||"object"!=typeof b&&"function"!=typeof b?a:b}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}Object.defineProperty(b,"__esModule",{value:!0}),b.Game=void 0;var g=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),h=c(0),i=c(11),j=c(2),k=(c(1),c(5)),l=c(4),m=c(12),n=(c(3),function(a){function b(){return d(this,b),e(this,(b.__proto__||Object.getPrototypeOf(b)).apply(this,arguments))}return f(b,a),g(b,[{key:"construct",value:function(){this.state={tileGrid:[],status:null}}},{key:"componentWillMount",value:function(){this.newGame(),this.setState({status:0})}},{key:"componentDidMount",value:function(){this.onkeyDown=this.onkeyDown.bind(this),window.addEventListener("keydown",this.onkeyDown)}},{key:"componentWillUnmount",value:function(){this.game=null,this.setState({status:null}),window.removeEventListener("keydown",this.onkeyDown)}},{key:"onkeyDown",value:function(a){var b=a.keyCode;this.navigate(b)}},{key:"navigate",value:function(a){if(0===this.state.status){switch(a){case j.Device.DOWN:this.game.control("down"),this.lastControl="down";break;case j.Device.UP:this.game.control("up"),this.lastControl="up";break;case j.Device.LEFT:this.game.control("left"),this.lastControl="left";break;case j.Device.RIGHT:this.game.control("right"),this.lastControl="right";break;default:return}this.hasMoved()&&(this.game.putRandomTiles(1),this.setState({tileGrid:this.game.grid})),this.game.isPlayable()||(this.game.isWon()?(console.log("WON !!"),this.setState({status:1})):(console.log("GAME OVER !!!"),this.setState({status:2})),this.setHighScore())}}},{key:"hasMoved",value:function(){for(var a=!1,b=0;b<this.state.tileGrid.length;b++)this.state.tileGrid[b]!==this.game.grid[b]&&(a=!0);return a}},{key:"renderTiles",value:function(){for(var a=[],b=0;b<this.state.tileGrid.length;b++){var c="tile "+(null===this.state.tileGrid[b]?"":" tile"+this.state.tileGrid[b])+" position-"+b%4+"-"+Math.floor(b/4);if(a.push((0,h.h)("div",{className:c})),this.lastTiles&&this.lastTiles[b]!==this.state.tileGrid[b]){var d="tile "+(null===this.lastTiles[b]?"":"animate-"+this.lastControl+" tile"+this.lastTiles[b])+" position-"+b%4+"-"+Math.floor(b/4);a.push((0,h.h)("div",{className:d}))}}return this.lastTiles=Object.assign({},this.state.tileGrid),a}},{key:"getHighScore",value:function(){var a=k.Storage.get("score");return a=a?a.split(","):[0],a[0]}},{key:"setHighScore",value:function(){function a(a,b){return b-a}var b=k.Storage.get("score");b=b?b.split(","):[];for(var c=[],d=0;d<b.length;d++)c.push(parseInt(b[d]));if(c.push(this.game.getScore()),c.sort(a),c.length>5){var e=c.length-5;c.splice(5,e)}k.Storage.set("score",c)}},{key:"newGame",value:function(){this.lastTiles=[],this.game=new i.GameCore,this.game.initGrid(),this.game.putRandomTiles(2),this.setState({tileGrid:this.game.grid,status:0})}},{key:"navButtons",value:function(){return{buttons:[{id:"exit",text:"Exit"},{id:"back",text:"Back"},{id:"new",text:"New game"},{id:"apps",text:"Apps"}],newGame:this.newGame.bind(this)}}},{key:"renderDialog",value:function(){var a="";return 1===this.state.status&&(a=(0,h.h)(m.Gameover,{props:{status:1,score:this.game.getScore()}})),2===this.state.status&&(a=(0,h.h)(m.Gameover,{props:{status:2,score:this.game.getScore()}})),a}},{key:"render",value:function(){return console.log(this.state),(0,h.h)("div",{class:"scene",id:"scene-game"},(0,h.h)("div",{id:"best-score"},this.getHighScore()),(0,h.h)("div",{id:"actual-score"},this.game.getScore()),this.renderTiles(),this.renderDialog(),(0,h.h)(l.Colornav,{props:this.navButtons()}))}}]),b}(h.Component));b.Game=n},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(b,"__esModule",{value:!0});var e=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),f=function(){function a(){d(this,a),this.score=0}return e(a,[{key:"initGrid",value:function(){this.grid=[];for(var a=0;a<16;a++)this.grid.push(null)}},{key:"getScore",value:function(){return this.score}},{key:"getAvailableSpaces",value:function(){for(var a=[],b=0;b<this.grid.length;b++)null===this.grid[b]&&a.push(b);return a}},{key:"getRandomFromArray",value:function(a){return a[Math.floor(Math.random()*a.length)]}},{key:"placeToPutTile",value:function(){var a=this.getAvailableSpaces();return this.getRandomFromArray(a)}},{key:"getRandomTile",value:function(){var a=[2,2,2,2,2,2,2,2,4,4];return a[Math.floor(Math.random()*a.length)]}},{key:"putRandomTiles",value:function(a){for(var b=0;b<a;b++)this.grid[this.placeToPutTile()]=this.getRandomTile()}},{key:"getCollumn",value:function(a){for(var b=[],c=0;c<this.grid.length;c++)a===c%4+1&&b.push(this.grid[c]);return b}},{key:"getRidOfEmptyTiles",value:function(a){for(var b=0;b<a.length;)null===a[b]?a.splice(b,1):b++;return a}},{key:"handleMove",value:function(a){var b=this.getRidOfEmptyTiles(a);for(b=this.groupTilesIfPossible(b);b.length<4;)b.unshift(null);return b}},{key:"possibleToGroup",value:function(a){for(var b=!1,c=0;c<a.length-1;c++)if(a[c]===a[c+1]){b=!0;break}return b}},{key:"groupTilesIfPossible",value:function(a){if(this.possibleToGroup(a))for(var b=a.length-1;b>=1;b--)a[b]===a[b-1]&&(a[b]=2*a[b],this.score+=a[b],a.splice(b-1,1),b--);return a}},{key:"control",value:function(a){for(var b=[],c=0;c<4;c++){
var d=this.unifyRowsAndCollumns(a,c);b.push(d)}return this.grid=this.unifiedToGrid(a,b),this.grid}},{key:"unifyRowsAndCollumns",value:function(a,b){var c=void 0;return"left"===a&&(c=this.handleMove(this.getRow(b+1).reverse()),c=c.reverse()),"right"===a&&(c=this.handleMove(this.getRow(b+1))),"up"===a&&(c=this.handleMove(this.getCollumn(b+1).reverse()),c=c.reverse()),"down"===a&&(c=this.handleMove(this.getCollumn(b+1))),c}},{key:"unifiedToGrid",value:function(a,b){var c=void 0;return"left"!==a&&"right"!==a||(c=this.rowsToGrid(b)),"up"!==a&&"down"!==a||(c=this.collumnsToGrid(b)),c}},{key:"collumnsToGrid",value:function(a){for(var b=[],c=0;c<a.length;c++)for(var d=0;d<a[c].length;d++)b.push(a[d][c]);return b}},{key:"rowsToGrid",value:function(a){for(var b=[],c=0;c<a.length;c++)b=b.concat(a[c]);return b}},{key:"getRow",value:function(a){for(var b=[],c=0;c<this.grid.length;c++)a===Math.floor(c/4)+1&&b.push(this.grid[c]);return b}},{key:"isPlayable",value:function(){if(this.getAvailableSpaces().length>0)return!0;for(var a=!1,b=1;b<=4;b++)if(this.possibleToGroup(this.getRow(b))||this.possibleToGroup(this.getCollumn(b))){a=!0;break}return a}},{key:"isWon",value:function(){for(var a=!1,b=0;b<this.grid.length;b++)if(2048===this.grid[b]){a=!0;break}return a}},{key:"printGameGridToConsole",value:function(){console.log("SCORE: "+this.getScore());for(var a=1;a<5;a++)console.log(this.getRow(a))}}]),a}();b.GameCore=f},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){if(!a)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!b||"object"!=typeof b&&"function"!=typeof b?a:b}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}Object.defineProperty(b,"__esModule",{value:!0}),b.Gameover=void 0;var g=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),h=c(0),i=(c(5),c(3),c(1),c(2),c(4),function(a){function b(a){return d(this,b),e(this,(b.__proto__||Object.getPrototypeOf(b)).call(this,a))}return f(b,a),g(b,[{key:"renderText",value:function(a){var b=[];return 1===a.status?b+="You did great ! Won game with score of"+a.score:b.push((0,h.h)("div",null,"Not enough, maybe next time! Your score is ",(0,h.h)("span",null,a.score))),b}},{key:"render",value:function(a){var b=a.props;return(0,h.h)("div",{id:"snippet-dialog"},this.renderText(b))}}]),b}(h.Component));b.Gameover=i},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){if(!a)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!b||"object"!=typeof b&&"function"!=typeof b?a:b}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}Object.defineProperty(b,"__esModule",{value:!0}),b.Highscore=void 0;var g=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),h=c(0),i=c(5),j=(c(3),c(1),c(2),c(4)),k=function(a){function b(a){return d(this,b),e(this,(b.__proto__||Object.getPrototypeOf(b)).call(this,a))}return f(b,a),g(b,[{key:"getHighScore",value:function(){var a=i.Storage.get("score");a=a?a.split(","):[];for(var b=[],c=0;c<a.length;c++)b.push((0,h.h)("tr",null,(0,h.h)("td",null,c+1,"."),(0,h.h)("td",null,a[c])));return b}},{key:"navButtons",value:function(){return{buttons:[{id:"exit",text:"Exit"},{id:"back",text:"Back"},{id:"apps",text:"Apps"}]}}},{key:"render",value:function(a){a.props;return(0,h.h)("div",{class:"scene",id:"scene-highscore"},(0,h.h)("table",{className:"table"},(0,h.h)("tr",null,(0,h.h)("td",null,"Rank"),(0,h.h)("td",null,"Score")),this.getHighScore()),(0,h.h)(j.Colornav,{props:this.navButtons()}))}}]),b}(h.Component);b.Highscore=k},function(a,b,c){"use strict";function d(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function e(a,b){if(!a)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!b||"object"!=typeof b&&"function"!=typeof b?a:b}function f(a,b){if("function"!=typeof b&&null!==b)throw new TypeError("Super expression must either be null or a function, not "+typeof b);a.prototype=Object.create(b&&b.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),b&&(Object.setPrototypeOf?Object.setPrototypeOf(a,b):a.__proto__=b)}Object.defineProperty(b,"__esModule",{value:!0}),b.About=void 0;var g=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),h=c(0),i=(c(5),c(3),c(1),c(2),c(4)),j=function(a){function b(a){return d(this,b),e(this,(b.__proto__||Object.getPrototypeOf(b)).call(this,a))}return f(b,a),g(b,[{key:"navButtons",value:function(){return{buttons:[{id:"exit",text:"Exit"},{id:"back",text:"Back"},{id:"apps",text:"Apps"}]}}},{key:"render",value:function(a){a.props;return(0,h.h)("div",{class:"scene",id:"scene-about"},(0,h.h)("div",{id:"description"},"2048 is a single-player sliding block puzzle game by Italian web developer Gabriele Cirulli. 2048 was originally written in JavaScript and CSS during a weekend, and released on March 9, 2014, as free and open-source software subject to the MIT license. Clones written in C++ and Vala are available. There is also a version for the Linux terminal.The game's objective is to slide numbered tiles on a grid to combine them to create a tile with the number 2048."),(0,h.h)(i.Colornav,{props:this.navButtons()}))}}]),b}(h.Component);b.About=j}]);