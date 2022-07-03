<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Insert data into the database
    if(ISSET($_POST['net_insertData']))
    {
        $sql = "INSERT INTO nets (original_net_id,transport_stream_id,net_id,net_name)
        VALUES ('".$_POST["parms2"]["Orig_Net_ID"]."','".$_POST["parms2"]["Transport_stream_ID"]."','".$_POST["parms2"]["Net_ID"]."','".$_POST["parms2"]["Net_name"]."')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: net_setting.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
        }
    }
?>
