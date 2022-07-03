<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Insert data into the database
    if(ISSET($_POST['service_insertData']))
    {

    $sql = "INSERT INTO services (net_setting_ID,pid_br_setting_ID,app_setting_ID,service_id,service_name,service_provider_name,video_pid,video_stream_type,audio_pid,audio_stream_type,PMT_pid,AIT_pid,carousel_pid,streamevent_pid) VALUES ('".$_POST["net_setting_ID"]."','".$_POST["pid_br_setting_ID"]."','".$_POST["app_setting_ID"]."','".$_POST["service_id"]."','".$_POST["service_name"]."','".$_POST["service_provider_name"]."','".$_POST["video_pid"]."','".$_POST["video_stream_type"]."','".$_POST["audio_pid"]."','".$_POST["audio_stream_type"]."','".$_POST["PMT_pid"]."','".$_POST["AIT_pid"]."','".$_POST["carousel_pid"]."','".$_POST["streamevent_pid"]."')";

    $result = mysqli_query($conn, $sql);
    if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: service_setting.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
echo $sql;
        }
    }
?>
