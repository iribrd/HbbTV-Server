<?php 
//$cmd="python2 /home/Hbb-server/darabi/server_backend/read_parms2.py > /dev/null 2>>log.out &"; 

$output=shell_exec("rm /var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/log.out");
$cmd="python2 /home/Hbb-server/darabi/server_backend/read_parms2.py > /dev/null 1>>/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/log.out"; 
$output=shell_exec($cmd); 
//$outputt=shell_exec("python /home/Hbb-server/darabi/server_backend/nonstop-process.py  > /dev/null");
header('Location: index.php'); 
?>
