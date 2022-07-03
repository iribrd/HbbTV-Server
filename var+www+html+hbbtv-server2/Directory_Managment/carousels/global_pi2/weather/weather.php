<?php

?>
<style>
* {
	direction:rtl
}
body {
background-color:trasnparent;
}
.box-of-temp {
background-color: rgba(255,255,255,0.7);
	border:2px #7f8c8d solid;
	border-radius:5px;
	width:400px;
	height:auto;
	margin:auto;
	padding:0px 5px 5px 5px;
	font-family:"B Yekan";
	font-size:12px;
	font-weight:normal;
	position:relative;
color:#2c3e50;
-webkit-transition: all 0.2s; /* For Safari 3.1 to 6.0 */
transition: all 0.2s;
transition-timing-function: ease-in-out;

}
.box-of-temp .img {
	position:absolute;
	left:10px;
	top:25%;
}
.box-of-temp:hover {
background-color: rgba(255,255,255,0.7);
color:#2c3e50;
border:2px #3498db solid;
}
.box-of-temp:hover .img{
animation:animated_div 2s 1;
-moz-animation:animated_div 2s 1;
-webkit-animation:animated_div 2s 1;
-o-animation:animated_div 2s 1;
}
.bad {
background-image:url("img/bad.png");
background-repeat:no-repeat;
background-position:right center;
height:25px;
padding-right:35px;
padding-top:10px;
margin:0px;
}
.feshar {
background-image:url("img/feshar.png");
background-repeat:no-repeat;
background-position:right center;
height:25px;
padding-right:35px;
padding-top:10px;
margin:0px;
}
.rotoobat{
background-image:url("img/rotoobat.png");
background-repeat:no-repeat;
background-position:right center;
height:25px;
padding-right:35px;
padding-top:10px;
margin:0px;
}
.dama{
background-image:url("img/dama.png");
background-repeat:no-repeat;
background-position:right center;
height:25px;
padding-right:35px;
padding-top:10px;
margin:0px;
}
@keyframes animated_div
{
0%		{transform: rotate(0deg);}
25%		{transform: rotate(20deg);}
50%		{transform: rotate(0deg);}
55%		{transform: rotate(-20deg);}
70%		{transform: rotate(0deg);}
100%	{transform: rotate(360deg);}
}

@-webkit-keyframes animated_div
{
0%		{transform: rotate(0deg);}
25%		{transform: rotate(20deg);}
50%		{transform: rotate(0deg);}
55%		{transform: rotate(-20deg);}
70%		{transform: rotate(0deg);}
100%	{transform: rotate(360deg);}
}

@-moz-keyframes animated_div
{
0%		{transform: rotate(0deg);}
25%		{transform: rotate(20deg);}
50%		{transform: rotate(0deg);}
55%		{transform: rotate(-20deg);}
70%		{transform: rotate(0deg);}
100%	{transform: rotate(360deg);}
}

@-o-keyframes animated_div
{
0%		{transform: rotate(0deg);}
25%		{transform: rotate(20deg);}
50%		{transform: rotate(0deg);}
55%		{transform: rotate(-20deg);}
70%		{transform: rotate(0deg);}
100%	{transform: rotate(360deg);}
}
</style>

<div class="box-of-temp">
<?php
if(isset ($_POST['cityname'])){
$city = '';
$city = $_POST['cityname'];
if ($city=="Not"){
echo " شهر وارد نشده است ؛ لطفا یکی از شهر ها را انتخاب کنید";
}

else {
if(isset ($_POST['cityfarsiname'])){
$cityfarsiname = '';
$cityfarsiname = $_POST['cityfarsiname'];
echo "<p class='onvan'>وضعیت آب و هوای شهر " .$cityfarsiname . " :</p>";
}

switch($city){
				case "abadan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40831.xml";
				break;

				case "abadeh";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40818.xml";
				break;

				case "abumusa";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40890.xml";
				break;

				case "ahar";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40704.xml";
				break;

				case "ahvaz";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40811.xml";
				break;

				case "aligoodarz";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40783.xml";
				break;

				case "anzali";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40718.xml";
				break;

				case "arak";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40769.xml";
				break;

				case "ardebil";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40708.xml";
				break;

				case "babulsar";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40736.xml";
				break;

				case "baft";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40853.xml";
				break;

				case "bam";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40854.xml";
				break;

				case "bandarlengeh";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40883.xml";
				break;

				case "bandarabbas";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40875.xml";
				break;

				case "birjand";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40809.xml";
				break;

				case "bojnourd";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40723.xml";
				break;

				case "bushehr";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40857.xml";
				break;

				case "chabahar";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40898.xml";
				break;

				case "esfahan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40800.xml";
				break;

				case "fasa";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40859.xml";
				break;

				case "ferdous";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40792.xml";
				break;

				case "gachsaran";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40835.xml";
				break;

				case "gharakhil";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40737.xml";
				break;

				case "ghazvin";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40731.xml";
				break;

				case "ghuchan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40740.xml";
				break;

				case "gorgan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40738.xml";
				break;

				case "hamedan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40768.xml";
				break;

				case "ilam";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40780.xml";
				break;

				case "iranshahr";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40879.xml";
				break;

				case "jask";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40893.xml";
				break;

				case "kashan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40785.xml";
				break;

				case "kashmar";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40763.xml";
				break;

				case "kerman";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40841.xml";
				break;

				case "kermanshah";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40766.xml";
				break;

				case "kharg";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40845.xml";
				break;

				case "khorramabad";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40782.xml";
				break;

				case "khoy";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40703.xml";
				break;

				case "kish";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40882.xml";
				break;

				case "maragheh";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40713.xml";
				break;

				case "mashhad";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40745.xml";
				break;

				case "masjed-soleyman";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40812.xml";
				break;

				case "mohabad";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40726.xml";
				break;

				case "noshahr";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40734.xml";
				break;

				case "oroumieh";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40712.xml";
				break;

				case "ramsar";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40732.xml";
				break;

				case "rasht";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40719.xml";
				break;

				case "sabzevar";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40743.xml";
				break;

				case "dezful";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40794.xml";
				break;

				case "saghez";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40727.xml";
				break;

				case "sanandaj";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40747.xml";
				break;

				case "sarakhs";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40741.xml";
				break;

				case "semnan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40757.xml";
				break;

				case "shahrekord";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40798.xml";
				break;

				case "shahrud";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40739.xml";
				break;

				case "shiraz";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40848.xml";
				break;

				case "siri";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40889.xml";
				break;

				case "sirjan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40851.xml";
				break;

				case "tabas";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40791.xml";
				break;

				case "tabriz";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40706.xml";
				break;

				case "tehran";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40754.xml";
				break;

				case "torbatheidarieh";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40762.xml";
				break;

				case "yasooj";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40836.xml";
				break;

				case "yazd";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40821.xml";
				break;

				case "zabol";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40829.xml";
				break;

				case "zahedan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40856.xml";
				break;

				case "zanjan";
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40729.xml";
				break;
				
				default :
				$citypage = "http://rss.wunderground.com/auto/rss_full/global/stations/40831.xml";
				break;
			}
if(!empty($citypage)){

		$src = file_get_contents($citypage);
			preg_match_all('@<description[^>]*?>.*?</description>@siu',  $src , $matches );
			
			$mt = $matches[0][1] ;
			
			if(!empty($mt)){
			$mt=str_replace("<description><![CDATA[","",$mt);
			$mt=str_replace("]]>
	</description>","",$mt);
	
	$mt = explode("<img",$mt); // />

	
	$mt = $mt[0];
	
	$mt = str_replace("Temperature","دمای کنونی",$mt);
	$mt = str_replace("Humidity","رطوبت هوا",$mt);
	$mt = str_replace("Pressure","فشار",$mt);
	$mt = str_replace("Conditions","شرایط",$mt);
	$mt = str_replace("Wind Speed","سرعت باد",$mt);
	
	$mt = explode("|",$mt);
$rest = $mt[0];
$rest = str_replace("&deg;C"," درجه ی سانتی گراد",$rest);
$rest = str_replace("&deg;F"," فارنهاید",$rest);
$rest = explode("/",$rest); ?>
<p class="dama"><span>دمای کنونی :</span>
<?php
echo $rest[1]; ?> </p><p class="rotoobat"> <?php
echo $mt[1];?> </p><p class="feshar"> <?php
$rest2 = $mt[2];
$rest2 = explode("/",$rest2); 
echo $rest2[0];?> </p><p class="bad"> <?php
echo $mt[5];?> </p> <?php
}
			$con = $mt[3];
			$con = explode(":",$con);
			$con = $con[1];
			$con = str_replace(" ","",$con);
			switch($con){
				case "Clear";
				$img = "img/clear.png";
				break;
				
				case "PartlyCloudy";
				$img = "img/pcloudy.png";
				break;

				case "MostlyCloudy";
				$img = "img/cloudy.png";
				break;
				
				case "Haze";
				$img = "img/fog.png";
				break;
				
				case "ScatteredClouds";
				$img = "img/cloudy.png";
				break;
				
				case "Mist";
				$img = "img/fog.png";
				break;
				
				case "Fog";
				$img = "img/fog.png";
				break;
				
				case "Overcast";
				$img = "img/cloudy.png";
				break;
				
				case "LightSnow";
				$img = "img/flurries.png";
				break;
				
				case "LightSnowShowers";
				$img = "img/rainsnow.png";
				break;
				
				case "LightSnowMist";
				$img = "img/fog.png";
				break;
				
				case "HeavySnow";
				$img = "img/snowshow.png";
				break;
				
				case "HeavySnowMist";
				$img = "img/snowshow.png";
				break;
				
				case "LightSnowMist";
				$img = "img/flurries.png";
				break;
				
				case "SnowMist";
				$img = "img/snowshow.png";
				break;
				
				case "LightSnow";
				$img = "img/flurries.png";
				break;
				
				case "FreezingFog";
				$img = "img/fog.png";
				break;
				
				case "LightRainSnow";
				$img = "img/rainsnow.png";
				break;
				
				case "Rain";
				$img = "img/lshowers.png";
				break;
				
				case "Sand";
				$img = "img/fog.png";
				break;
				
				case "ShallowFog";
				$img = "img/fog.png";
				break;
				
				case "PatchesFogMist";
				$img = "img/fog.png";
				break;
				
				case "IceCrystals";
				$img = "img/flurries.png";
				break;
				
				case "HeavyRainShowers";
				$img = "img/lshowers.png";
				break;
				
				case "BlowingSand";
				$img = "img/blowingsand.png";
				break;
				
				case "FunnelCloud";
				$img = "img/cloudy.png";
				break;

				default :
				$img = "img/unknown.png";
				break;
			
			}
		

?>


<?php
}
else {
echo "اطلاعات در دسترس نمی باشد";
}
}

}
?>

</div>