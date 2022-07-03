<!DOCTYPE HTML>
<html><head><meta charset="utf-8">
<title>اوقات شرعی</title>
<link rel="stylesheet"href="style.css">
</head>
<body>
<?php
include_once('inc/owghat_function.php');
include_once('inc/jdf.php');
include_once('inc/j.php');
include_once('inc/ghamari.php');

$m=tr_num(jdate("m"),'en');
$y=tr_num(jdate("d"),'en');
if($m < 6){$my= '1';}else{$my= '0';}

$ogt=owghat($m , $y , 48.5 , 36.67 , 0 , $my , 1);
?>
<center>
<div class="post">
نسخه یک
<br>
<span id="mydate">
<?php echo jdate("l j F Y ");?>
</span><br>
<?php echo date("l j F Y ");?>:
<?php 
$y=date("Y");
$m=date("M");
$d=date("D");
echo gregorian_to_ghamari($y,$m,$d,'/');?>
<br><br>
<span id="dey">
اوقات شرعی به افق 
زنجان
</span>


<br>
<br>
<div class="owghat">
<span>اذان صبح :
<?php echo $ogt['s'] ?>
</span>
<span>طلوع آفتاب :
<?php echo $ogt['t'] ?>
</span>
<span>اذان ظهر :
<?php echo $ogt['z'] ?>
</span>
<span>غروب آفتاب :
<?php echo $ogt['g'] ?>
</span>
<span>اذان مغرب :
<?php echo $ogt['m'] ?>
</span>
<span>نیمه شب شرعی :
<?php echo $ogt['n'] ?>
</span>
</div>

<?php 
$z=date("l");
switch($z){
case "Saturday":
echo '<img src="'.$row_setting['url'];echo 'img/dey1.png"width="200px">';
break;
case "Sunday":
echo '<img src="'.$row_setting['url'];echo 'img/dey2.png"width="200px">';
break;
case "Monday":
echo '<img src="'.$row_setting['url'];echo 'img/dey3.png"width="200px">';
break;
case "Tuesday":
echo '<img src="'.$row_setting['url'];echo 'img/dey4.png"width="200px">';
break;
case "Wednesday":
echo '<img src="'.$row_setting['url'];echo 'img/dey5.png"width="200px">';
break;
case "Thursday":
echo '<img src="'.$row_setting['url'];echo 'img/dey6.png"width="200px">';
break;
case "Friday":
echo '<img src="'.$row_setting['url'];echo 'img/dey7.png"width="200px">';
break;
}?>

</body>
</html>