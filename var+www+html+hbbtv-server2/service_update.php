<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['service_updateData']))
    {   
        
		    $id = $_POST['service_updateId'];
                
			$service_id=$_POST['updateservice_id'];
			$service_name=$_POST['updateservice_name'];
			$service_provider_name=$_POST['updateservice_provider_name'];
			$video_pid=$_POST['updatevideo_pid'];
			$video_stream_type=$_POST['updatevideo_stream_type'];
			$audio_pid=$_POST['updateaudio_pid'];
			$audio_stream_type=$_POST['updateaudio_stream_type'];
			$PMT_pid=$_POST['updatePMT_pid'];
			$AIT_pid=$_POST['updateAIT_pid'];
			$carousel_pid=$_POST['updatecarousel_pid'];
                        $streamevent_pid=$_POST['updatestreamevent_pid'];
			$net_setting_ID=$_POST['updatenet_setting_ID'];
			$pid_br_setting_ID=$_POST['updatepid_br_setting_ID'];
			$app_setting_ID=$_POST['updateapp_setting_ID'];
			
	        		
	        $sql = "UPDATE services SET 	service_id='$service_id',
								service_name='$service_name',
								service_provider_name='$service_provider_name',
								video_pid='$video_pid',
								video_stream_type='$video_stream_type',
								audio_pid='$audio_pid',
								audio_stream_type='$audio_stream_type',
								PMT_pid='$PMT_pid',
								AIT_pid='$AIT_pid',
								carousel_pid='$carousel_pid',
                                                                streamevent_pid='$streamevent_pid',
								net_setting_ID='$net_setting_ID',
								pid_br_setting_ID='$pid_br_setting_ID',
								app_setting_ID='$app_setting_ID'
								   WHERE id='$id'";
 	        
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:service_setting.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
