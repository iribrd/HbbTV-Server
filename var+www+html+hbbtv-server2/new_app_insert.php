<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Insert data into the database
    if(ISSET($_POST['app_insertData']))
    {
    if ($_POST["transport_protocol_id"]=='0'){
    $sql = "INSERT INTO Apps (application_id,transport_protocol_id,application_name,organisation_id,application_type,application_version,pmt_version,application_control_code,
        visibility,service_bound_flag,application_priority,application_folder_path,application_index_file,application_profile,application_profile_maj,
        application_profile_min,application_profile_mic,carousel_id,carousel_association_tag,module_version,DDB_size,smart_compress_the_carousel,mount_frequency
	,application_usage,component_tag)
    VALUES ('".$_POST["App_ID"]."','".$_POST["transport_protocol_id"]."','".$_POST["App_name"]."','".$_POST["Org_ID"]."','".$_POST["App_type"]."',
	'".$_POST["App_version"]."','".$_POST["PMT_version"]."','".$_POST["App_ctl"]."','".$_POST["App_visibility"]."','".$_POST["S_bound_flag"]."',
	'".$_POST["App_priority"]."','".$_POST["App_path"]."','".$_POST["App_index"]."','".$_POST["App_profile"]."','".$_POST["App_profile_maj"]."',
	'".$_POST["App_profile_min"]."','".$_POST["App_profile_mic"]."','0','0','0','0','0','0','".$_POST["app_usage"]."','0')";




	}else{
    $sql = "INSERT INTO Apps (application_id,transport_protocol_id,application_name,organisation_id,application_type,application_version,pmt_version,application_control_code,
	visibility,service_bound_flag,application_priority,application_folder_path,application_index_file,application_profile,application_profile_maj,
	application_profile_min,application_profile_mic,carousel_id,carousel_association_tag,module_version,DDB_size,smart_compress_the_carousel,mount_frequency
	,application_usage,component_tag)
    VALUES ('".$_POST["App_ID"]."','".$_POST["transport_protocol_id"]."','".$_POST["App_name"]."','".$_POST["Org_ID"]."','".$_POST["App_type"]."','".$_POST["App_version"]."','".$_POST["PMT_version"]."',
	'".$_POST["App_ctl"]."','".$_POST["App_visibility"]."','".$_POST["S_bound_flag"]."','".$_POST["App_priority"]."','".$_POST["App_path"]."',
	'".$_POST["App_index"]."','".$_POST["App_profile"]."','".$_POST["App_profile_maj"]."','".$_POST["App_profile_min"]."','".$_POST["App_profile_mic"]."',
	'".$_POST["Carousel_ID"]."','".$_POST["dsmcc_association_tag"]."','".$_POST["Module_version"]."','".$_POST["DDB_size"]."','".$_POST["Smart_compress"]."'
	,'".$_POST["mount_frequency"]."','".$_POST["app_usage"]."','".$_POST["component_tag"]."')";
	}  
    $result = mysqli_query($conn, $sql);
    if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: new_app_setting.php');
        }else{
       echo $sql;
            echo '<script> alert("Data Not saved."); </script>';
	echo $result;
        }
    }
?>
