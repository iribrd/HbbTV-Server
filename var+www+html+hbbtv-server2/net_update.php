<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
        $NetworkName = $_POST['updateNetworkName'];
        $OriginalNetworkID = $_POST['updateOriginalNetworkID'];
        $TransportStreamID = $_POST['updateTransportStreamID'];
        $NetworkID = $_POST['updateNetworkID'];

        $sql = "UPDATE nets SET net_name='$NetworkName',
                                        original_net_id='$OriginalNetworkID', 
                                        transport_stream_id='$TransportStreamID',
                                        net_id=' $NetworkID'
                                        WHERE id='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:net_setting.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
	echo $sql;
	echo $result;
        }
    }
?>
