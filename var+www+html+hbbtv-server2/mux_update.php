<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
        $service_setting_ID = $_POST['updateservice_setting_ID'];
        $state = $_POST['updatestate'];
        
        $sql = "UPDATE mux SET  
                                        state='$state'
                                        WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
		echo($sql);
        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
