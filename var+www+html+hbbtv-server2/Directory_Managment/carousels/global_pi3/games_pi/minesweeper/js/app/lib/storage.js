Storage = (function(){
    var Storage = {};
    
    $.extend(true, Storage, {
    set: function (name, value) {
        var date = new Date(), expires = "";
        date.setTime(date.getTime() + (200 * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toUTCString();
        document.cookie = [name, '=', encodeURIComponent(JSON.stringify(value)), expires].join('');
        return true;
    },
        /**
         * @inheritdoc Storage#get
         */
    get: function (name) {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        
        if (cookieValue === null) {
            return false;
        }
        
        return JSON.parse(cookieValue);
    },
        /**
         * @inheritdoc Storage#clear
         */
    clear: function () {
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(";");
            
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                var eqPos = cookie.indexOf("=");
                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
            }
            
            return true;
        }
        else return false;
    }
    });
    
    return Storage;
})()