<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['pid_br_updateData']))
    {   
        
		    $id = $_POST['pid_br_updateId'];
                
			$PAT_pid=$_POST['updatePAT_pid'];
			$PAT_bitrate=$_POST['updatePAT_bitrate'];
			$NIT_pid=$_POST['updateNIT_pid'];
			$NIT_bitrate=$_POST['updateNIT_bitrate'];
			$SDT_pid=$_POST['updateSDT_pid'];
			$SDT_bitrate=$_POST['updateSDT_bitrate'];
			$PMT_bitrate=$_POST['updatePMT_bitrate'];
			$AIT_bitrate=$_POST['updateAIT_bitrate'];
			$carousel_bitrate=$_POST['updatecarousel_bitrate'];
                        $streamevent_bitrate=$_POST['updatestreamevent_bitrate'];


	        $sql = "UPDATE pids_bitrates SET 	PAT_pid='$PAT_pid',
								PAT_bitrate='$PAT_bitrate',
								NIT_pid='$NIT_pid',
								NIT_bitrate='$NIT_bitrate',
								SDT_pid='$SDT_pid',
								SDT_bitrate='$SDT_bitrate',
								PMT_bitrate='$PMT_bitrate',
								AIT_bitrate='$AIT_bitrate',
								carousel_bitrate='$carousel_bitrate',
                                                                streamevent_bitrate='$streamevent_bitrate'
								 WHERE id='$id'";
 	        
        $result = mysqli_query($conn, $sql);
	echo $sql;
        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:pid_br_setting.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
	  echo $sql;
        }
    }
?>
