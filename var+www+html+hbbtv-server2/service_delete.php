<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
    if(ISSET($_POST['service_deleteData']))
    {
        $id =$_POST['service_deleteId']; 
        $sql = "DELETE FROM services WHERE id='$id'";

       	$result = mysqli_query($conn, $sql);

	        if($result){
        	    echo '<script> alert("Data Deleted."); </script>';
            header('Location: service_setting.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }
?>
