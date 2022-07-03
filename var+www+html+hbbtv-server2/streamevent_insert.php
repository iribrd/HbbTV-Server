<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Insert data into the database
    if(ISSET($_POST['streamevent_insertData']))
    {
        $sql = "INSERT INTO streamEvents (component_tag,event_id,event_name,event_data,event_timeout)
        VALUES ('".$_POST["component_tag"]."','".$_POST["event_id"]."' ,'".$_POST["event_name"]."','".$_POST["event_data"]."', '".$_POST["event_timeout"]."')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: streamevent_setting.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
        }
    }
?>
