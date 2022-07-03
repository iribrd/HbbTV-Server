<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
<link rel="canonical" href="http://www.mihanscript.ir" />
<style>
* {
	direction:ltr;
	text-align:right;
}
body {
background-color:#2c3e50;
font-family:"B Yekan";
font-size:12px;
font-weight:normal;
}
select , select option {
	font-family:"B Yekan";
font-size:12px;
font-weight:normal;

}
.onvan {
	font-family:"B Titr";
	font-size:16px;
	-webkit-transition: all 0.2s; /* For Safari 3.1 to 6.0 */
transition: all 0.2s;
transition-timing-function: ease-in-out;
}
.box-of-temp:hover .onvan {
	color:#333333;
}
</style>

</head>
<body>

<?php
			$cit = file_get_contents("shahrha.txt");
			$cot = explode("\n",$cit);
			foreach($cot as $city){
			$city = explode(":",$city);
			$name = $city[0];
			$namefarsi = $city[1];
			$xml = $city[2];
echo "<option value='$name'>$namefarsi</option>\n";
			}
?>

<div class="test"></div>
<p id="test"></p>
<div  style="text-align:center"><img class="img" src="loading.gif" /></div>
<script>
$('#loader').hide();
function displayVals() {
//var multipleValues = $( "#foo" ).val();
//var multipletext = $("#foo option:selected").text();
$.ajax({
type: "POST",
url: "weather.php",
//data: { cityname : multipleValues , cityfarsiname : multipletext },
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

//$( "#foo" ).change( displayVals );
displayVals();

</script>

</body>
<div style="visibility:hidden;display:none">
<a href="http://www.mihanscript.ir">http://www.mihanscript.ir</a>
<div> 
</html>