<?php

/**
*Convert Georgian to Ghamari date
*نویسنده: ناشناس Edit: 123.scr.ir
*تبديل تاريخ  ميلادي به هجري قمري
*/
function gregorian_to_ghamari($year,$month,$day,$mod=''){
 if($year > 1582 or ($year==1581 and $month > 9 and $day > 14)){
	$int1=(int)(($month-14)/12);
	$jd=(int)((1461*($year+4800+$int1))/4)+(int)((367*($month-2-(12*($int1))))/12)-(int)((3*((int)(($year+4900+$int1)/100)))/4)+$day-32075;
 }else{
	$jd=(367*$year)-(int)((7*($year+5001+(int)(($month-9)/7)))/4)+(int)((275*$month)/9)+$day+1729777;
 }
 $l=$jd-1948440+10632;
 $n=(int)(($l-1)/10631);
 $l=$l-10631*$n+354;
 $j=(((int)((10985-$l)/5316))*((int)((50*$l)/17719)))+(((int)($l/5670))*((int)((43*$l)/15238)));
 $l=$l-((int)((30-$j)/15))*((int)((17719*$j)/50))-((int)($j/16))*((int)((15238*$j)/43))+29;
 $month=(int)((24*$l)/709);
 $day=$l-(int)((709*$month)/24);
 $year=(30*$n)+$j-30;
 return($mod=='')?array($year,$month,$day):$year.$mod.$month.$mod.$day;
}

/**
*Convert Ghamari to Georgian date
*نویسنده: ناشناس Edit: 123.scr.ir
*تبديل تاريخ  هجري قمري به ميلادي
*/
function ghamari_to_gregorian($year,$month,$day,$mod=''){
 $jd=(int)(((11*$year)+3)/30)+(354*$year)+(30*$month)-(int)(($month-1)/2)+$day+1948440-385;
 if($jd > 2299160){
	$l=$jd+68569;
	$n=(int)((4*$l)/146097);
	$l=$l-(int)((146097*$n+3)/4);
	$i=(int)((4000*($l+1))/1461001);
	$l=$l-(int)((1461*$i)/4)+31;
	$j=(int)((80*$l)/2447);
	$day=$l-(int)((2447*$j)/80);
	$l=(int)($j/11);
	$month=$j+2-(12*$l);
	$year=(100*($n-49))+$i+$l;
 }else{
	$j=$jd+1402;
	$k=(int)(($j-1)/1461);
	$l=$j-(1461*$k);
	$n=(int)(($l-1)/365)-(int)($l/1461);
	$i=$l-(365*$n)+30;
	$j=(int)((80*$i)/2447);
	$day=$i-(int)((2447*$j)/80);
	$i=(int)($j/11);
	$month=$j+2-(12*$i);
	$year=(4*$k)+$n+$i-4716;
 }
 return($mod=='')?array($year,$month,$day):$year.$mod.$month.$mod.$day;
}

?>