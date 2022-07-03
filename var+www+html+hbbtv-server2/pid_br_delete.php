<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
    if(ISSET($_POST['pid_br_deleteData']))
    {
        $id =$_POST['pid_br_deleteId']; 
        $sql = "DELETE FROM pids_bitrates WHERE id='$id'";

       	$result = mysqli_query($conn, $sql);

	    if($result){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: pid_br_setting.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }
?>
