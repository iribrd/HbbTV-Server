<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
    if(ISSET($_POST['app_deleteData']))
    {
        $id =$_POST['app_deleteId']; 
        $table =$_POST['app_deletetable'];
        if ($table=='18')
	        $sql = "DELETE FROM httpApps WHERE id='$id'";
       else                  $sql = "DELETE FROM carouselsApps WHERE id='$id'";

       	$result = mysqli_query($conn, $sql);

	        if($result){
        	    echo '<script> alert("Data Deleted."); </script>';
            header('Location: app_setting.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }
?>
