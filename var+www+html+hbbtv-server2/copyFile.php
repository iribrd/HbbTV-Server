<?php
  //$result=copy ('/home/Hbb-server/darabi/server_backend/ste_205_1.ts' ,'Directory_Managment/carousels/tempste_205_.ts');
  // $cmd="cp "+$_POST ['streameventstefile']+" "+$_POST['tempstets'];
   $result=shell_exec($_POST['temp_cmd1']);

//   $result=copy($_POST ['streameventstefile'],$_POST['tempstets']);
  // echo $result?'false':'true';
  //  echo $cmd;
   sleep($_POST['time_out']);
   $result=shell_exec($_POST['temp_cmd2']);

   //$result=copy('/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/null.ts' ,$_POST ['tempstets']);
  // header('Location: index.php');
  //document.getElementById("div_"+id).innerHTML="";

   echo $result?'false':'true';

?>
