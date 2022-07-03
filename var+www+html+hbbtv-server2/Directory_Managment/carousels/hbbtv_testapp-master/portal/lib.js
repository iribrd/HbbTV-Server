
var category  = ['all', 'teletext', 'epg', 'news', 'games', 'sports', 'kids', 'music', 'vod', 'test', 'shopping', 'portal', 'weather'];
var appcategory = [];
for (var it=0; it < category.length; ++it) {
    appcategory[category[it]] = category[it].toUpperCase();
}

var applications = [
                      {
                         name      : 'MIT-Xperts',
                         url       : 'http://itv.mit-xperts.com/hbbtvtest/index.php',
                         img       : 'res/apps/testsuite.png',
                         enabled   : true,
                         category  : appcategory['test']
                      },
                      {
                         name      : 'ARD EPG',
                         url       : 'http://itv.ard.de/ardepg/index.php',
                         img       : 'res/apps/ard-epg.png',
                         enabled   : true,
                         category  : appcategory['epg']
                      },
                      {
                         name      : 'ARD Portal', 
                         url       : 'http://web.ard.de/hbbtv-portal/index.php?link=hbbig', 
                         img       : 'res/apps/ard-portal.png',
                         enabled   : true,
                         category  : appcategory['portal']
                      },
                      {
                         name      : 'ARD Mediathek',
                         url       : 'http://hbbtv.ardmediathek.de/hbbtv-ard/mediathek/',
                         img       : 'res/apps/ard-mediathek.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Foreca', 
                         url       : 'http://nettv.foreca.com/index.php?letmein=1', 
                         img       : 'res/apps/foreca.png',
                         enabled   : true,
                         category  : appcategory['weather']
                      },
                      {
                         name      : 'Tagesschau', 
                         url       : 'http://www.tagesschau.de/itv/hbbtv/hbbtv.cehtml', 
                         img       : 'res/apps/taggeschau.png',
                         enabled   : true,
                         category  : appcategory['news']
                      },
                      {
                         name      : 'OK54-Text', 
                         url       : 'http://teletext.ok54.de/hbbtv.php', 
                         img       : 'res/apps/ok54-text.png',
                         enabled   : true,
                         category  : appcategory['teletext']
                      },
                      {
                         name      : 'WDR-Text', 
                         url       : 'http://hbbtv.wdr.de/wdrtext/', 
                         img       : 'res/apps/wdr-text.png',
                         enabled   : true,
                         category  : appcategory['teletext']
                      },
                      {
                         name      : 'ARD Press',
                         url       : 'http://itv.ard.de/presseclub/',
                         img       : 'res/apps/ard-press.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'WiR FAHREN nACH BERLin',
                         url       : 'http://itv.ard.de/wfnb/index.html',
                         img       : 'res/apps/wfnb.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'eBay',
                         url       : 'http://tenfoot.jaast.com/smart/start.php',
                         img       : 'res/apps/ebay.png',
                         enabled   : true,
                         category  : appcategory['shopping']
                      },
                      {
                         name      : 'ARD Start',
                         url       : 'http://itv.ard.de/ardstart/index.php', 
                         img       : 'res/apps/ard-start.png',
                         enabled   : false,
                         category  : appcategory['test']
                      },
                      {
                         name      : 'ZDF Mediathek',  
                         url       : 'http://hbbtv.zdf.de/zdfm3/', 
                         img       : 'res/apps/zdf-mediathek.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Kicker TV', 
                         url       : 'http://cetv.kicker.de/', 
                         img       : 'res/apps/kickertv.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'KINO.de', 
                         url       : 'http://koops.e-media.de/philips', 
                         img       : 'res/apps/kinode.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'ZDF Olympia',  
                         url       : 'http://hbbtv.zdf.de/olympia/?design=1', 
                         img       : 'res/apps/zdf-olympia.png',
                         enabled   : true,
                         category  : appcategory['sports']
                      },
                      {
                         name      : 'DAS Erste Mediathek',  
                         url       : 'http://hbbtv.daserste.de/', 
                         img       : 'res/apps/daserste-mediathek.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'ARTE+7',
                         url       : 'http://www.arte.tv/hbbtvv2/index.html?lang=fr_FR&page=PLUS7&tv=true', 
                         img       : 'res/apps/arte.png',
                         enabled   : true,
                         category  : appcategory['epg']
                      },
                      {
                         name      : 'Tunein Radio', 
                         url       : 'http://ce.radiotime.com/', 
                         img       : 'res/apps/tunein.png',
                         enabled   : true,
                         category  : appcategory['music']
                      },
                      {
                         name      : 'PONG',
                         url       : 'http://rc.mineus.cz/pong/tv/index.html',
                         img       : 'res/apps/pong.png',
                         enabled   : true,
                         category  : appcategory['games']
                      },
                      {
                         name      : 'Band Camp',
                         url       : 'http://mpat.lvps87-230-93-144.dedicated.hosteurope.de/bandcampsite/',
                         img       : 'res/apps/band-camp.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'RBB Kika',
                         url       : 'http://smarttv.rbb-online.de/hbbtv/sandmann/index.php?broadcaster=kika',
                         img       : 'res/apps/rbb-kika.png',
                         enabled   : true,
                         category  : appcategory['kids']
                      },
                      {
                         name      : 'MYSPASS', 
                         url       : 'http://http://philips.hybridtv.myspass.de/philips/', 
                         img       : 'res/apps/myspass.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Bild.de', 
                         url       : 'http://json.bild.de/tv/cehtml.cehtml', 
                         img       : 'res/apps/bild-de.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'DasVierte', 
                         url       : 'http://hbbtv01p.anixe.net/pub/dasvierte/portal/appPortal.php', 
                         img       : 'res/apps/dasvierta.png',
                         enabled   : true,
                         category  : appcategory['portal']
                      },
                      {
                         name      : 'Clip Fish', 
                         url       : 'http://hbbtv.clipfish.de/?ts=1493291360', 
                         img       : 'res/apps/clipfish.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Delta TV', 
                         url       : 'http://www.zeelandnet.nl/hbbtv-acc/index.php?', 
                         img       : 'res/apps/delta.png',
                         enabled   : true,
                         category  : appcategory['portal']
                      },
                      {
                         name      : 'Omlet', 
                         url       : 'http://tv2.omlet.ru/tv/nettv#', 
                         img       : 'res/apps/omlet.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'NDR Mediathek', 
                         url       : 'http://hbbtv.ndr.de/home/index.html', 
                         img       : 'res/apps/ndr-mediathek.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'EURO News', 
                         url       : 'http://www.euronews.com/_partners/philips/#de', 
                         img       : 'res/apps/euronews.png',
                         enabled   : true,
                         category  : appcategory['news']
                      },
                      {
                         name      : 'PC Welt', 
                         url       : 'http://tv.mytvscout.de/pcwelt/', 
                         img       : 'res/apps/pcwelt.png',
                         enabled   : true,
                         category  : appcategory['news']
                      },
                      {
                         name      : 'ORF Teletext', 
                         url       : 'http://orfhbbtv.orf.apa.net/orf/teletext/index.html?id=teletext&ref=portal', 
                         img       : 'res/apps/orf-teletext.png',
                         enabled   : true,
                         category  : appcategory['teletext']
                      },
                      {
                         name      : 'iConcerts', 
                         url       : 'http://www3.iconcerts.com/?q=en/netTV', 
                         img       : 'res/apps/iconcerts.png',
                         enabled   : true,
                         category  : appcategory['music']
                      },
                      {
                         name      : 'France24', 
                         url       : 'http://philips.playintv.com/portal/france24/application.cehtml', 
                         img       : 'res/apps/france24.png',
                         enabled   : true,
                         category  : appcategory['news']
                      },
                      {
                         name      : 'HD Text', 
                         url       : 'http://hbbtv.puls4.com/', 
                         img       : 'res/apps/hd-text.png',
                         enabled   : true,
                         category  : appcategory['teletext']
                      },
                      {
                         name      : 'ROVI Guide', 
                         url       : 'http://tilden.rovicorp.com/CE-HTML-EPG/HTTV74687/120_b/', 
                         img       : 'res/apps/rovi-guide.png',
                         enabled   : true,
                         category  : appcategory['epg']
                      },
                      {
                         name      : 'CineTrailer', 
                         url       : 'http://nettv.cinetrailer.tv/technisat/default.asp', 
                         img       : 'res/apps/cinetrailer.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Bayern2', 
                         url       : 'http://www.br.de/radio/bayern2/hbbtv_bayern2_html100~hbbtv.cehtml', 
                         img       : 'res/apps/bayern2.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Sport Digital', 
                         url       : 'http://sportdigital.services.nrmmh.tv/', 
                         img       : 'res/apps/sportdigital.png',
                         enabled   : true,
                         category  : appcategory['sports']
                      },
                      {
                         name      : 'Fox International', 
                         url       : 'http://91.93.122.36/foxtv/showcase.aspx', 
                         img       : 'res/apps/fox.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'YouTV', 
                         url       : 'https://www.youtv.de/?btv=/smarttv/', 
                         img       : 'res/apps/youtv.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Disney', 
                         url       : 'http://disneychannel.de/livestream', 
                         img       : 'res/apps/disney.png',
                         enabled   : false,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'MyTV Scout', 
                         url       : 'http://tv.mytvscout.de/mytvscout/', 
                         img       : 'res/apps/mytvscout.png',
                         enabled   : true,
                         category  : appcategory['portal']
                      },
                      {
                         name      : 'Prosieben Mediathek', 
                         url       : 'http://hbbtv.prosieben.de/extern/redorbit/hbbtv/apps/mediathek/v2/web/app.php', 
                         img       : 'res/apps/prosbiean-mediathek.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'TV Spiele Center', 
                         url       : 'http://hbbig.itsmy.tv/spielecenter/', 
                         img       : 'res/apps/tv-spielecenter.png',
                         enabled   : true,
                         category  : appcategory['games']
                      },
                      {
                         name      : 'Mazz TV', 
                         url       : 'http://tv.mytvscout.de/mazztv/', 
                         img       : 'res/apps/mazztv.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Solitaire', 
                         url       : 'http://zeelandnet.itsmy.tv/spielecenter/games/solitaire/index.php?x-backlink=http%3A%2F%2Fwww.zeelandnet.nl%2Fhbbtv%2Findex.php&x-backlink-label=Afsluiten', 
                         img       : 'res/apps/solitaire.png',
                         enabled   : true,
                         category  : appcategory['games']
                      },
                      {
                         name      : 'Poker', 
                         url       : 'http://zeelandnet.itsmy.tv/spielecenter/games/poker/index.php?x-backlink=http%3A%2F%2Fwww.zeelandnet.nl%2Fhbbtv%2Findex.php&x-backlink-label=Afsluiten', 
                         img       : 'res/apps/poker.png',
                         enabled   : true,
                         category  : appcategory['games']
                      },
                      {
                         name      : 'Sudoko', 
                         url       : 'http://zeelandnet.itsmy.tv/spielecenter/games/sudoku/index.php?x-backlink=http%3A%2F%2Fwww.zeelandnet.nl%2Fhbbtv%2Findex.php&x-backlink-label=Afsluiten', 
                         img       : 'res/apps/sudoko.png',
                         enabled   : true,
                         category  : appcategory['games']
                      },
                      {
                         name      : 'Pairs', 
                         url       : 'http://zeelandnet.itsmy.tv/spielecenter/games/pairs/index.php?x-backlink=http%3A%2F%2Fwww.zeelandnet.nl%2Fhbbtv%2Findex.php&x-backlink-label=Afsluiten', 
                         img       : 'res/apps/pairs.png',
                         enabled   : true,
                         category  : appcategory['games']
                      },
                      {
                         name      : 'Blobbys Magic Mine', 
                         url       : 'http://zeelandnet.itsmy.tv/spielecenter/games/blobbyszaubermine/index.php?x-backlink=http%3A%2F%2Fwww.zeelandnet.nl%2Fhbbtv%2Findex.php&x-backlink-label=Afsluiten', 
                         img       : 'res/apps/blobbysmagic.png',
                         enabled   : true,
                         category  : appcategory['games']
                      },
                      {
                         name      : 'npo', 
                         url       : 'http://ctv.distributie.publiekeomroep.nl/?syndicate=2', 
                         img       : 'res/apps/npo.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'Kunst TV', 
                         url       : 'http://arttv.prod-ctv.peoplesplayground.nl/', 
                         img       : 'res/apps/kunsttv.png',
                         enabled   : true,
                         category  : appcategory['vod']
                      },
                      {
                         name      : 'IRT RedNGreen Test',
                         url       : 'http://hbbtv-live.irt.de:8080/redngreen',
                         img       : 'res/apps/communication.png',
                         enabled   : true,
                         category  : appcategory['test']
                      },
                      {
                         name      : 'IRT 2ndScreen Test',
                         url       : 'http://hbbtv-live.irt.de:8080/ssfdemo/',
                         img       : 'res/apps/2ndscreen-redgreen.png',
                         enabled   : true,
                         category  : appcategory['test']
                      },
                      {
                         name      : 'IRT Lifecycle Test',
                         url       : 'http://tv-html.irt.de/hbbtv/tests/lifecycle/lifecycle.php?app=App1',
                         img       : 'res/apps/irt-logo.png',
                         enabled   : true,
                         category  : appcategory['test']
                      },
                  ];
var contents = [];
var rowsize = 5;
var item_height = 175;
var item_width = 220;
var category_width = 210;
var max_row = 0;

var curitem = 0;
var curcategory = 0;

init = function() {
    prepareContent(appcategory['all']);
    buildCategory();
    activateApplist();
}

prepareContent = function(type) {
    contents = [];
    for (var it=0; it < applications.length; ++it) {
        if (applications[it].enabled && (type == appcategory['all'] || type == applications[it].category)) {
            contents.push(applications[it]);
        }
    }
    buildApps();
    updatePageSize(curitem, contents.length);
}

myload = function() {
    init();
}

activateApplist = function() {
    document.getElementById('category' + curcategory).className="category-select";

    document.getElementById('bg0' + curitem).className="button-focus";
    updatePageSize(curitem, contents.length);

    document.removeEventListener('keydown', categorylistKeyEventListener, true);
    document.addEventListener('keydown', applistKeyEventListener, true);
}

activateCategorylist = function() {
    document.getElementById('bg0' + curitem).className="button-nonfocus";

    document.getElementById('category' + curcategory).className="category-focus";
    updatePageSize(curitem, contents.length);

    document.removeEventListener('keydown', applistKeyEventListener, true);
    document.addEventListener('keydown', categorylistKeyEventListener, true);
}

buildCategory = function() {
    var elem1, elem2, elem3;
    var x=0, y=0;
    for (var it=0; it < category.length; ++it) {
        elem1 = document.createElement('div');
        elem1.setAttribute('id', 'category'+it);
        elem1.setAttribute('class', 'category-nonfocus');
        elem1.setAttribute('style', 'left: '+x+'px; top: '+y+'px;');
        //elem1.setAttribute('onclick', 'launch("'+contents[it].url+'")');
        elem1.innerHTML = appcategory[category[it]];
        document.getElementById('category-group').appendChild(elem1);
        x += category_width;
    }
}

buildApps = function() {
    var elem1, elem2, elem3;
    var x=0, y=0;

    curitem = 0;
    max_row = 0;
    document.getElementById('area').innerHTML = "";

    elem1 = document.createElement('li');
    elem1.setAttribute('id', 'row'+max_row);
    document.getElementById('area').appendChild(elem1);

    for (var it=0; it < contents.length; ++it) {
        elem1 = document.createElement('div');
        elem1.setAttribute('id', 'bg0'+it);
        elem1.setAttribute('class', 'button-nonfocus');
        elem1.setAttribute('style', 'left: '+x+'px; top: '+y+'px;');
        //elem1.setAttribute('onclick', 'launch("'+contents[it].url+'")');
        //elem1.innerHTML = contents[it].name;
        document.getElementById('row'+max_row).appendChild(elem1);

        elem2 = document.createElement('div');
        elem2.setAttribute('class', 'button');
        elem2.setAttribute('id', 'b0'+it);
        elem2.setAttribute('style', 'background-image: url('+ contents[it].img+');');
        //elem2.innerHTML = contents[it].name;
        elem1.appendChild(elem2);

        elem3 = document.createElement('div');
        elem3.setAttribute('class', 'button-caption');
        elem3.setAttribute('id', 't0'+it);
        elem3.innerHTML = contents[it].name;
        elem1.appendChild(elem3);

        if (0 == ((it+1)%rowsize)) {
           x = 0;
           y += item_height;

           if ((it+1) < contents.length) {
              ++max_row;
              elem1 = document.createElement('li');
              elem1.setAttribute('id', 'row'+max_row);
              document.getElementById('area').appendChild(elem1);
           }
        } else {
           x += item_width;
        }
    }
}

isFirstRow = function () {
   if (Math.floor(curitem/rowsize) == 0) {
      return true;
   }
   return false;
}

isFirstItem = function () {
   if (curitem == 0) {
      return true;
   }
   return false;
}

isLastRow = function () {
   if (Math.floor(curitem/rowsize) == max_row) {
      return true;
   }
   return false;
}

isLastItem = function () {
   if (curitem == contents.length - 1) {
      return true;
   }
   return false;
}

disallowKeyEvents = function(event) {
   event.preventDefault();
   event.stopPropagation();
}

updatePageSize = function(cur, size) {
    var str = '';
    cur += 1;
    if (cur <= 9 && size >=10) {
       str += '0';
    }
    str += cur + " / " + size;
    document.getElementById('appsize').innerHTML = str;
}

applistKeyEventListener = function(event) {
    var lastfocus = '0'+curitem;
    var listOfDropDownItems = document.getElementById('area');
    if (event.keyCode == 27) {
        document.location.reload();
        return;
    } else if (event.keyCode == 8) {
        history.back();
    } else if (event.keyCode == 13) {
        launch(contents[curitem].url);
        return;
    } else if (event.keyCode == 39) {
        if (isLastItem()) {
           disallowKeyEvents(event);
           return;
        }
        ++curitem;
    } else if (event.keyCode == 37) {
        if (isFirstItem()) {
           disallowKeyEvents(event);
           return;
        }
        --curitem;
    } else if (event.keyCode == 38) {
        if (isFirstRow()) {
           disallowKeyEvents(event);
           activateCategorylist();
           return;
        }
        curitem -= rowsize;
    } else if (event.keyCode == 40) {
        if (isLastRow()) {
           disallowKeyEvents(event);
           return;
        }
        curitem += rowsize;
        if (contents.length <= curitem) {
           curitem = contents.length-1;
        }
    } else {
        return;
    }
    listOfDropDownItems.scrollTop = Math.floor(curitem/rowsize)*item_height;
    disallowKeyEvents(event);
    document.getElementById('bg'+lastfocus).className="button-nonfocus";
    document.getElementById('bg0'+curitem).className="button-focus";
    updatePageSize(curitem, contents.length);
}

categorylistKeyEventListener = function(event) {
    var lastfocus = curcategory;
    var listOfDropDownItems = document.getElementById('category-group');
    if (event.keyCode == 13) {
        disallowKeyEvents(event);
        activateApplist();
        return;
    } else if (event.keyCode == 39) {
        if (curcategory ==  category.length - 1) {
           disallowKeyEvents(event);
           return;
        }
        ++curcategory;
    } else if (event.keyCode == 37) {
        if (curcategory == 0) {
           disallowKeyEvents(event);
           return;
        }
        --curcategory;
    } else if (event.keyCode == 40) {
        activateApplist();
        disallowKeyEvents(event);
        return;
    } else {
        return;
    }
    //document.getElementById('area').setAttribute('style', 'background-image: url(res/category/'+ category[curcategory]+'.png);');
    prepareContent(appcategory[category[curcategory]]);
    listOfDropDownItems.scrollLeft = curcategory*category_width;
    disallowKeyEvents(event);
    document.getElementById('category'+lastfocus).className="category-nonfocus";
    document.getElementById('category'+curcategory).className="category-focus";
    //document.getElementById('appsize').innerHTML = (curitem+1) + " / " + contents.length;
}

launch = function(url) {
   if (url != '') {
      document.location.assign(url);
   }
}
