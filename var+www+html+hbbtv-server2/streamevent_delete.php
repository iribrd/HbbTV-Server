<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
    if(ISSET($_POST['streamevent_deleteData']))
    {
        $id = $_POST['streamevent_deleteId']; 

        $sql = "DELETE FROM streamEvents WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
	echo $sql;
        if($result){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: streamevent_setting.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }
?>
