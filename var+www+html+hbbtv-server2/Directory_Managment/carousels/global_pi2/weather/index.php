<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />


<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
<link rel="canonical" href="http://www.mihanscript.ir" />
<style>
/********* Load Fonts ************/
    @font-face {	
	font-family:"B Yekan";
    src: url('fonts/BYekan.eot?#') format('eot'),
    url('fonts/BYekan.ttf') format('truetype'),
    url('fonts/BYekan.woff') format('woff');
    }
    @font-face {	
	font-family:"B Titr";
    src: url('fonts/BTitrBold.eot?#') format('eot'),
    url('fonts/BTitrBold.ttf') format('truetype'),
    url('fonts/BTitrBold.woff') format('woff');
    }

/********* End Load Fonts ************/
* {
	direction:ltr;
}	
body {			
			/* Set up proportionate scaling */
			height: auto;
			background-color:trasparent;
}
.kole-page {
	width:100%;
	height:800px;
	position:relative;
}
#clickfuny {
	font-family:"B Titr";
	font-size:16px;
margin:auto;
color:#ecf0f1;
}
select , select option {
	font-family:"B Yekan";
font-size:12px;
font-weight:normal;
margin:auto;

}
.onvan {
	font-family:"B Titr";
	font-size:22px;
	-webkit-transition: all 0.2s; /* For Safari 3.1 to 6.0 */
transition: all 0.2s;
transition-timing-function: ease-in-out;
}
.box-of-temp:hover .onvan {
   -webkit-text-stroke: 1px black;
   color: rgba(255,255,255,1);
   text-shadow:
       1px 1px 0 #666666,
     -1px -1px 0 #666666,  
      1px -1px 0 #666666,
      -1px 1px 0 #666666,
       1px 1px 0 #666666;
}
.kole-page .footer {
	position:absolute;
	bottom:10px;
background-color: rgba(0,0,0,0.8);
width:100%;
	font-family:"B Yekan";
font-size:12px;
font-weight:normal;
color:#ecf0f1;

padding-top:20px;
padding-bottom:20px;
}
	@media screen and (max-width: 810px){
			body {
			width:810px;
}
.header {
width:80%;
height:80%;
}
		}
	@media screen and (max-width: 750px){
			body {
			width:750px;
}
.header {
width:50%;
height:50%;
}
		}
	@media screen and (max-width: 710px){
			body {
			width:710px;}
.header {
width:45%;
height:45%;
}

		}
	@media screen and (max-width: 600px){
			body {
			width:600px;}
.header {
width:30%;
height:30%;
}
		}
	@media screen and (max-width: 500px){
			body {
			width:500px;}
.header {
width:25%;
height:25%;
}
		}
	@media screen and (max-width: 400px){
			body {
			width:400px;}
.header {
	display:none;
}
		}
	@media screen and (max-width: 240px){
			body {
			width:240px;}
.header {
	display:none;
}
		}
</style>

</head>
<body>
<div class="kole-page">


<p >
<select  name="Select1" id="foo" style="display: none";>

<?php

			$cit = file_get_contents("shahrha.txt");
			$cot = explode("\n",$cit);
			foreach($cot as $city){
			$city = explode(":",$city);
			$name = "tehran";
			$namefarsi = "تهران";
			$xml = "http://rss.wunderground.com/auto/rss_full/global/stations/40754.xml";
echo "<option value='$name'>$namefarsi</option>\n";
			}
		
?>
			</select>
			
			
</p>
<div class="test"></div>
<p id="test"></p>

<script>
$('#loader').hide();
function displayVals() {
var multipleValues = $( "#foo" ).val();
var multipletext = $("#foo option:selected").text();
$.ajax({
type: "POST",
url: "weather.php",
data: { cityname : multipleValues , cityfarsiname : multipletext },
beforeSend: function(){
$('.img').show();
$('#test').hide("slow");
    }

})
.done(function( msg ) {
$('.img').hide();
$('#test').show("slow");
$("#test").html(msg);
}

)
}

$( "#foo" ).change( displayVals );
displayVals();

</script>

</body>
<div style="visibility:hidden;display:none">
<a href="http://www.mihanscript.ir">http://www.mihanscript.ir</a>
<div> 
</html>