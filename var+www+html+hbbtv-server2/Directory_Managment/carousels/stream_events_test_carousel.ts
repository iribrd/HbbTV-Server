GH7 <�I �     � 4 �  BIOP     "       srg       global.css fil    fil    ISO   + ISOP        ISO@    
 � ����        �index.html fil    fil    GH7�ISO   + ISOP        ISO@    
 � ����       �test.event ste    ste    ISO   + ISOP        ISO@    
 � ����  �;߯;�p  �  �  �  [��������������GH7Q������   C   srg    ISO   + ISOP         ISO@    
 � ����    DU@�;�� �  � �  m   �                ���������             A��������            GH7.��������           E�'<�I �     � 4 �  BIOP     "       srg       global.css fil    fil    ISO   + ISOP        ISO@    
 � ����        �GH7�index.html fil    fil    ISO   + ISOP        ISO@    
 � ����       �test.event ste    ste    ISO   + ISOP        ISO@    
 � ����  �;߯<��G7 �     � � �  BIOP      �      fil         �    �   �@CHARSET "UTF8";

body {
	padding: 36px 128px; 
	height: 648px; 
	width: 1024px;
	background-color: #AAAAAA;
	G7}
	
a:focus {
	background-color: lightgreen;
}

BIOP     �      fil        �   �  �<?xml version="1.0" encoding="ISO-8859-1" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTMLG7 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/vnd.hbbG7tv.xml+xhtml; charset=ISO-8859-1" />
<title>Stream Event Test</title>
<!-- 
	Test application for stream events. Subscribes for the events, displays status information
	and the conG7tent of incoming event sections.	
 -->
<link rel="stylesheet" type="text/css" href="global.css" media="all"/>

<script type="text/javascript">
//<![CDATA[
    var msgField = nullG7;
    var statField = null;
    var vidObj = null;
	var appMan = null;
	var app = null;
    
	function startTest() {
		msgField  = document.getElementById("output");
		statFielG7d = document.getElementById("status");
		vidObj    = document.getElementById("vbObject");
		appMan    = document.getElementById("appMan");

		statField.innerHTML = "Initializing teG7st application ... ";
		
		try {
			if (!appMan.getOwnerApplication) {
				statField.innerHTML = "HbbTV application manager not supported."
				return;
			}
			if (!vidObj.bindTG7oCurrentChannel) {
				statField.innerHTML = "HbbTV video broadcast object not supported."
				return;
			}
			
			app = appMan.getOwnerApplication(document);
			app.show();
			G7
			vidObj.bindToCurrentChannel();
			if (vidObj.playState == 2) {
				registerStreamEventListener();						
			} else {
				vidObj.onPlayStateChange = function (state, error) {
	G7				if (state == 2) {
						registerStreamEventListener();						
					}
				};
				statField.innerHTML = "Wait for HbbTV video broadcast object to go to presenting state ... "
			G7}
			
		} catch (e) {
			statField.innerHTML = "Error in init " + e;
		}

	}
	
	function registerStreamEventListener () {
		try {
			var x = vidObj.addStreamEventListener("teG7st.event", "event1", handleStreamEvent);
			statField.innerHTML = "Set stream event listener: " + x;
		} catch (e) {
			statField.innerHTML = "Failed to listen for stream events.<brG7 />" + e;
		}
	}

	var count = 0;
	function handleStreamEvent(streamEvent) {
		var str = "";
		try {
			var status = streamEvent.status;

			str =  "Name: "   + streamEvent.nG7ame     + "<br />";
			str += "Data: "   + streamEvent.data     + "<br />";
			str += "Text: "   + streamEvent.text     + "<br />";
			str += "Status: " + streamEvent.status   + "<bG7r />";
			str += "Total events rcvd: " + (++count) + "<br />";
			
		} catch (e) {
			statField.innerHTML = "Failed to parse stream event.<br />" + e;
		}
		msgField.innerHTML = G7str;
	}
//]]>
</script>

</head>
<body onload="startTest();">
	<div>
		<h1>HbbTV Stream Event Test</h1>
		<h2>Status:</h2>
		<div id="status">Test not started yet.</div>
		<G7h2>Last Event:</h2>
		<div id="output">None</div>
	</div>
	<div style="z-index: 0; position: absolute; width=100%; height=100%; top: 0; left:0;" id="vidCont">
	</div>
	<div style=G7"visibility: hidden; width:0; height:0;">
		<object type="application/oipfApplicationManager" id="appMan"> </object>
		<object type="video/broadcast" id="vbObject"> </object>
	</divGH7>
</body>
</html>
8;r<�\ �     �  G �  BIOP      5      ste              event1         d  u� ����������������������������������������������������������������GH7 ;�� �  � �  m   �                ���������             A��������            .��������           E�'��������������������������������������������������GH7 ;�p  �  �  �  [��������������������   C   srg    ISO   + ISOP         ISO@    
 � ����    DU@���������������������������������������������������������������������GH7 ;�� �  � �  m   �                ���������             A��������            .��������           E�'��������������������������������������������������GH7 <�I �     � 4 �  BIOP     "       srg       global.css fil    fil    ISO   + ISOP        ISO@    
 � ����        �index.html fil    fil    GH7�ISO   + ISOP        ISO@    
 � ����       �test.event ste    ste    ISO   + ISOP        ISO@    
 � ����  �;߯;�p  �  �  �  [��������������G7������   C   srg    ISO   + ISOP         ISO@    
 � ����    DU@��������������������������������������������������������������������������������������������������������