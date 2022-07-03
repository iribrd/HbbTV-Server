<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Insert data into the database
    if(ISSET($_POST['mux_insertData']))
    {
          $sqll="SELECT *  FROM  services WHERE id='".$_POST["service_setting_ID"]."'";
           $resultt=mysqli_query($conn,$sqll);
	   $service= mysqli_fetch_assoc($resultt);
           if($service)
  	    {
		 $name=$service['service_name'];
		 $sqllll="SELECT *  FROM  mux WHERE service_setting_ID='".$_POST["service_setting_ID"]."'";
	         $resultttt=mysqli_query($conn,$sqllll);
		if( mysqli_fetch_assoc($resultttt))
			{
  	                    echo '<script> alert("!!!Service repeated"); </script>';
                	}
			else{

        			 $sqlll="SELECT *  FROM  Apps WHERE id='".$service["app_setting_ID"]."'";
			         $resulttt=mysqli_query($conn,$sqlll);
			         $app = mysqli_fetch_assoc($resulttt);
			        $sql = "INSERT INTO mux (service_setting_ID,state,streamevent_count,streamevent_prefix,streamevent_componenttag,service_name)
			        VALUES ('".$_POST["service_setting_ID"]."','".$_POST["state"]."','0','','".$app["component_tag"]."', '".$name ."')";
			        $result = mysqli_query($conn, $sql);
			        if($result){
	        		    echo '<script> alert("Data saved."); </script>';
			            header('Location: index.php');
	        		}else{

			            echo '<script> alert("Data Not saved."); </script>';

	        			}
				}}
	     else{
	          echo '<script> alert("service is not present."); </script>';
		}
    }
?>
