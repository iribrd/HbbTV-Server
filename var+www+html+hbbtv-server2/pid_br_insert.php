<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Insert data into the database
    if(ISSET($_POST['pid_br_insertData']))
    {

    $sql = "INSERT INTO pids_bitrates (PAT_pid,PAT_bitrate,NIT_pid,NIT_bitrate,SDT_pid,SDT_bitrate,PMT_bitrate,AIT_bitrate,carousel_bitrate,streamevent_bitrate) VALUES ('".$_POST["PAT_pid"]."','".$_POST["PAT_bitrate"]."','".$_POST["NIT_pid"]."','".$_POST["NIT_bitrate"]."','".$_POST["SDT_pid"]."','".$_POST["SDT_bitrate"]."','".$_POST["PMT_bitrate"]."','".$_POST["AIT_bitrate"]."','".$_POST["carousel_bitrate"]."','".$_POST["streamevent_bitrate"]."')";

    $result = mysqli_query($conn, $sql);
    if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: pid_br_setting.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
            echo $sql;

        }
    }
?>
