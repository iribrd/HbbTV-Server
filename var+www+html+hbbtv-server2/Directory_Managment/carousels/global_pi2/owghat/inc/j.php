<?php
/*	F	*/

function g_to_j($data,$line,$mo='',$vaz){
$b=explode($line,$data);
 $gy=$b['0'];
 $gm=$b['1'];
 $gd=$b['2'];
	list($gy,$gm,$gd)=explode('_',tr_num($gy.'_'.$gm.'_'.$gd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
 $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
 if($gy > 1600){
  $jy=979;
  $gy-=1600;
 }else{
  $jy=0;
  $gy-=621;
 }
 $gy2=($gm > 2)?($gy+1):$gy;
 $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
 $jy+=33*((int)($days/12053));
 $days%=12053;
 $jy+=4*((int)($days/1461));
 $days%=1461;
 $jy+=(int)(($days-1)/365);
 if($days > 365)$days=($days-1)%365;
 if($days < 186){
  $jm=1+(int)($days/31);
  $jd=1+($days%31);
 }else{
  $jm=7+(int)(($days-186)/30);
  $jd=1+(($days-186)%30);
 }
$mod=tr_num($mo,'fa');
$mah=array('فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند');
if($vaz == 'H'){
$mj=$mah[$jm-1];}elseif($vaz =='A'){$mj=tr_num($jm,'fa');}
 return($mod==='')?array($jy,$jm,$jd):tr_num($jd,'fa',' ') .$mod .$mj .$mod .tr_num($jy,'fa',' ')  ;
}
 
?>