<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
   // if(ISSET($_POST['app_updateData']))
   // {   
        
		$id = $_POST['app_updateId'];


	    $application_id = $_POST['updateapplication_id'];
   	    $application_name= $_POST['updateapplication_name'];
	    $transport_protocol_id = $_POST['updatetransport_protocol_id'];

		$organisation_id= $_POST['updateorganisation_id'];
		$application_type= $_POST['updateapplication_type'];
		$application_version= $_POST['updateapplication_version'];
		$pmt_version= $_POST['updatepmt_version'];
		$application_control_code= $_POST['updateapplication_control_code'];
		$visibility= $_POST['updateapplication_visibility'];
		$service_bound_flag= $_POST['updateservice_bound_flag'];
		$application_priority= $_POST['updateapplication_priority'];
		$application_folder_path= $_POST['updateapplication_folder_path'];
		$application_index_file= $_POST['updateapplication_index_file'];
                $application_usage= $_POST['updateapp_usage'];
		$application_profile= $_POST['updateapplication_profile'];
		$application_profile_maj= $_POST['updateapplication_profile_maj'];
		$application_profile_min= $_POST['updateapplication_profile_min'];
		$application_profile_mic= $_POST['updateapplication_profile_mic'];
                $carousel_id = $_POST['updatecarousel_id'];
                $carousel_association_tag = $_POST['updatecarousel_association_tag'];
                $module_version = $_POST['updatemodule_version'];
                $DDB_size = $_POST['updateDDB_size'];
                $smart_compress_the_carousel = $_POST['updatesmart_compress_the_carousel'];
                $mount_frequency = $_POST['updatemount_frequency'];
                $component_tag = $_POST['updatecomponent_tag'];
		
	    if($transport_protocol_id=="0"){
                $sql = "UPDATE Apps SET    application_id='$application_id',
                                                                application_name='$application_name',
								transport_protocol_id= '$transport_protocol_id',
                                                                organisation_id='$organisation_id',
                                                                application_type='$application_type',
                                                                application_version='$application_version',
                                                                pmt_version='$pmt_version',
                                                                application_control_code='$application_control_code',
                                                                visibility='$visibility',
                                                                service_bound_flag='$service_bound_flag',
                                                                application_priority='$application_priority',
                                                                application_folder_path='$application_folder_path',
                                                                application_index_file='$application_index_file',
                                                                application_usage='$application_usage',
                                                                application_profile='$application_profile',
                                                                application_profile_maj='$application_profile_maj',
                                                                application_profile_min='$application_profile_min',
                                                                application_profile_mic='$application_profile_mic',
						                carousel_id = '0',
						                carousel_association_tag = '0',
						                module_version = '0',
						                DDB_size = '0',
						                smart_compress_the_carousel = '0',
								mount_frequency='0',
                                                                component_tag='0'


                                        WHERE id='$id'";}
 	        else{
                   $sql = "UPDATE Apps SET    application_id='$application_id',
	   							transport_protocol_id= '$transport_protocol_id',
                                                                application_name='$application_name',
                                                                organisation_id='$organisation_id',
                                                                application_type='$application_type',
                                                                application_version='$application_version',
                                                                pmt_version='$pmt_version',
                                                                application_control_code='$application_control_code',
                                                                visibility='$visibility',
                                                                service_bound_flag='$service_bound_flag',
                                                                application_priority='$application_priority',
                                                                application_folder_path='$application_folder_path',
                                                                application_index_file='$application_index_file',
                                                                application_usage='$application_usage',
                                                                application_profile='$application_profile',
                                                                application_profile_maj='$application_profile_maj',
                                                                application_profile_min='$application_profile_min',
                                                                application_profile_mic='$application_profile_mic',
						                carousel_id = '$carousel_id',
						                carousel_association_tag = '$carousel_association_tag',
						                module_version = '$module_version',
						                DDB_size = '$DDB_size',
						                smart_compress_the_carousel = '$smart_compress_the_carousel',
                                                                mount_frequency='$mount_frequency',
                                                                component_tag='$component_tag'

                                        WHERE id='$id'";}

print($sql);
        $result = mysqli_query($conn, $sql);
print($result);
        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:new_app_setting.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    
?>
