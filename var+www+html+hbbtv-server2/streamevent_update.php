<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['streamevent_updateData']))
    {   
        
		    	$id = $_POST['streamevent_updateId'];
            		$component_tag=$_POST['updatecomponent_tag'];
			$event_id=$_POST['updateevent_id'];
			$event_name=$_POST['updateevent_name'];
			$event_data=$_POST['updateevent_data'];	
                        $event_timeout=$_POST['updateevent_timeout'];
	        		
	        $sql = "UPDATE streamEvents SET 	component_tag='$component_tag',
								event_id='$event_id',
								event_name='$event_name',
								event_data='$event_data',
                                                                event_timeout='$event_timeout'
								   WHERE id='$id'";
 	        
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:streamevent_setting.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';

        }
    }
?>
