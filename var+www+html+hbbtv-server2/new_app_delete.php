<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
    if(ISSET($_POST['app_deleteData']))
    {
        $id =$_POST['app_deleteId']; 
        
	    $sql = "DELETE FROM Apps WHERE id='$id'";
       
	    $result = mysqli_query($conn, $sql);

	        if($result){
        	    echo '<script> alert("Data Deleted."); </script>';
            header('Location: new_app_setting.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }
?>
