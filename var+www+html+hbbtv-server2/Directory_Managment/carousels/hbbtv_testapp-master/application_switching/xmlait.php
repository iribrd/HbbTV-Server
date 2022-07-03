<?php
header('Content-Type: application/vnd.dvb.ait+xml; charset=UTF-8');

$srvrurl = 'http://'.$_SERVER['SERVER_NAME'];
$appurl = $srvrurl.dirname($_SERVER['SCRIPT_NAME']).'/';
$params = array_key_exists('dvb', $_REQUEST) ? htmlspecialchars('?dvb='.rawurlencode($_REQUEST['dvb'])) : '';

echo '<?xml version="1.0" encoding="UTF-8"?>
<mhp:ServiceDiscovery xmlns:mhp="urn:dvb:mhp:2009" xmlns:ipi="urn:dvb:metadata:iptv:sdns:2008-1" xmlns:tva="urn:tva:metadata:2005" xmlns:mpeg7="urn:tva:mpeg7:2005" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="urn:dvb:mhp:2009 mis_xmlait.xsd">
	<mhp:ApplicationDiscovery DomainName="mit-xperts.com">
		<mhp:ApplicationList>
			<mhp:Application>
				<mhp:appName Language="deu">HASH:ONE Application Manager Test</mhp:appName>
				<mhp:applicationIdentifier>
					<mhp:orgId>100</mhp:orgId>
					<mhp:appId>100</mhp:appId>
				</mhp:applicationIdentifier>
				<mhp:applicationDescriptor>
					<mhp:type>
						<mhp:OtherApp>application/vnd.hbbtv.xhtml+xml</mhp:OtherApp>
					</mhp:type>
					<mhp:controlCode>AUTOSTART</mhp:controlCode>
					<mhp:visibility>VISIBLE_ALL</mhp:visibility>
					<mhp:serviceBound>false</mhp:serviceBound>
					<mhp:priority>5</mhp:priority>
					<mhp:version>00</mhp:version>
					<mhp:mhpVersion>
						<mhp:profile>0</mhp:profile>
						<mhp:versionMajor>1</mhp:versionMajor>
						<mhp:versionMinor>1</mhp:versionMinor>
						<mhp:versionMicro>1</mhp:versionMicro>
					</mhp:mhpVersion>
				</mhp:applicationDescriptor>
				<mhp:applicationTransport xsi:type="mhp:HTTPTransportType">
					<mhp:URLBase>'.$appurl.'</mhp:URLBase>
				</mhp:applicationTransport>
				<mhp:applicationLocation>index.html</mhp:applicationLocation>
			</mhp:Application>
			<mhp:Application>
				<mhp:appName Language="deu">HASH:ONE Application Manager Test</mhp:appName>
				<mhp:applicationIdentifier>
					<mhp:orgId>100</mhp:orgId>
					<mhp:appId>101</mhp:appId>
				</mhp:applicationIdentifier>
				<mhp:applicationDescriptor>
					<mhp:type>
						<mhp:OtherApp>application/vnd.hbbtv.xhtml+xml</mhp:OtherApp>
					</mhp:type>
					<mhp:controlCode>PRESENT</mhp:controlCode>
					<mhp:visibility>VISIBLE_ALL</mhp:visibility>
					<mhp:serviceBound>false</mhp:serviceBound>
					<mhp:priority>5</mhp:priority>
					<mhp:version>00</mhp:version>
					<mhp:mhpVersion>
						<mhp:profile>0</mhp:profile>
						<mhp:versionMajor>1</mhp:versionMajor>
						<mhp:versionMinor>1</mhp:versionMinor>
						<mhp:versionMicro>1</mhp:versionMicro>
					</mhp:mhpVersion>
				</mhp:applicationDescriptor>
				<mhp:applicationTransport xsi:type="mhp:HTTPTransportType">
					<mhp:URLBase>'.$appurl.'</mhp:URLBase>
				</mhp:applicationTransport>
				<mhp:applicationLocation>app2.html</mhp:applicationLocation>
			</mhp:Application>
		</mhp:ApplicationList>
	</mhp:ApplicationDiscovery>
</mhp:ServiceDiscovery>
';

?>
