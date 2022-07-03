<?php
  include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="all5.0.13.css"
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"

    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="font-awesome.min.css">

  <link rel="stylesheet" href="bootstrap4.1.1.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>HBBTV Server</title>
<script src="jquery321.min.js"></script>
<script src="my_css.css"></script>
<script src="my_js.js"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="container" >
  <ul class="navbar-nav ">
    <li class="nav-item">
     <a class="nav-link active" href= "#"; > services&Apps</a>
    </li>

    <li class="nav-item">
     <a class="nav-link" href= "/Directory_Managment/index.php"; >FileManagment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="read-dectek-log.php">Modulator</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="readlog.php">Monitoring</a>
         </li>
  </ul>
  </ul>
      <ul class="nav navbar-nav navbar-right">
     <li><a href="FileManagment/Logout.php"><span class=""></span> Logout</a></li>

    </ul>

  </div>
</nav>  

<br><br>
 
 
 <div class="container-fluid">
    <div class="row">


        <div id="wrapper" class="col-2  px-0 bg-light position-fixed h-100">
            <!-- Sidebar -->
            <div id="sidebar-wrapper ">
              <ul class="sidebar-nav">
				<li>
					<div class="logo-wrapper waves-light">
						<a href="#"><img src="logo-jahad.png"
		            class="img-fluid flex-center"></a>
					</div>
				</li>

                <li> <a href="net_setting.php">Networks</a> </li>
                <li> <a href="pid_br_setting.php">PIDs & bitrates</a> </li>
                <li> <a href="new_app_setting.php">Applications</a> </li>
                <li id="streamevent_nav "> <a  href="streamevent_setting.php">Stream Events</a> </li>
                <li> <a href="service_setting.php">Services</a> </li>
                <li id="mux_nav "> <a  href="index.php">Multiplexer</a> </li>

              </ul>
            </div> <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
        </div>


<!-- .................................................................................................................................................  -->


        <div class="col offset-2" id="main">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 card">
                 		<div>

                            <div class="head-title">
                                <h4 class="text-left">Service Settings</h4>
                                <hr>
                             </div>
				<div class="col-md-3">
                                <a href="#" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#addModal">
                                <i class=""></i> Add New Service </a>
                            </div>
							<div class="table-responsive-sm">
                                <table id='my_table'  class="table table-striped table-wrapper-scroll table-bordered table-condensed btn-table table-sm"   
                                  style="overflow-x:scroll; overflow-y:scroll;  height:200px; " cellspacing="0" width="100%">
                                 <thead class="bg-secondary text-white">
                                 <tr>
								 
									<th>Setting ID</th>
									<th>service id</th>
									<th>service name</th>
									<th>service provider name</th>
									<th>video pid</th>
									<th>video stream type</th>
									<th>audio pid</th>
									<th>audio stream type</th>
									<th>PMT pid</th>
									<th>AIT pid</th>
									<th>carousel pid</th>
                                                                        <th>stream event pid</th>
									<th>net setting ID</th>
									<th>pid_br setting ID</th>
									<th>app setting ID</th>
                                                                        <th>app name</th>
									<th>action</th>
									
								</tr>
								</thead>
								<tbody>

								<?php

								$sql = "SELECT * FROM services ORDER BY ID DESC";
								$result = mysqli_query($conn, $sql);

								if($result)
									{
									while($val = mysqli_fetch_assoc($result)){
								?>
								<tr>
								
									<td><?php echo $val['id'];?></td>
									<td><?php echo $val['service_id'];?></td> 
									<td><?php echo $val['service_name'];?></td>
									<td style=""><?php echo $val['service_provider_name'];?></td>
									<td><?php echo $val['video_pid'];?></td>
									<td><?php echo $val['video_stream_type'];?></td>
									<td><?php echo $val['audio_pid'];?></td>
									<td><?php echo $val['audio_stream_type'];?></td>
									<td><?php echo $val['PMT_pid'];?></td>
									<td><?php echo $val['AIT_pid'];?></td>
									<td><?php echo $val['carousel_pid'];?></td>
                                                                        <td><?php echo $val['streamevent_pid'];?></td>
									<td><?php echo $val['net_setting_ID'];?></td>  
									<td><?php echo $val['pid_br_setting_ID'];?></td>  
									<td><?php echo $val['app_setting_ID'];?></td>  
                                                                        <td><?php 
										
									     $sqlan = "SELECT * FROM Apps WHERE id=".$val['app_setting_ID'];
									     //echo $sqlan;
                                                                              $resultan = mysqli_query($conn, $sqlan);
                                                                             $app = mysqli_fetch_assoc($resultan); 
									    
									     echo $app['application_name'];
										?>
									</td>

									<td>
										<div class="btn-group btn-group-sm">
											<button type="button" class="btn btn-outline-info waves-effect  btn-sm m-0 viewBtn"> View </button>												
											<button type="button" class="btn btn-outline-warning  waves-effect btn-sm updateBtn"> Update </button>
											<button type="button" class="btn btn-outline-danger	waves-effect  btn-sm deleteBtn"> Delete </button>
										</div>
									</td>

								</tr>
								<?php
									}
									}else{
									echo "<script> alert('No Record Found');</script>";
									}
								?>
								</tbody>
							  </table>
							 </div>
						
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

 
  <!-- ADD RECORD MODAL -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add New Service</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:lavender;">
            <form action="service_insert.php" method="POST"> 
		<div class="form-group row">
			<div class="form-group col-md-4">
			<label for ="net_setting_ID" class="control-label">NET_setting_ID</label>
                         <select class="selectpicker form-control" id="net_setting_ID"  name="net_setting_ID">
                                <?php showAllData('nets','net_name')  ?>
                         </select>

                        </div>

			<div class="form-group col-md-4">
			    <label for ="pid_br_setting_ID" class="control-label">PID_br_setting_ID</label>
                               <input maxlength="6" type="number" id="pid_br_setting_ID"  name="pid_br_setting_ID" required="required" class="form-control" value="1" />
                        </div>

			<div class="form-group col-md-4">
      			<label for ="app_setting_ID" class="control-label">App_setting_ID</label>
				<select class="selectpicker form-control" id="app_setting_ID"  name="app_setting_ID">
				<?php showAllData('Apps','application_name')  ?>
				</select>
                        </div>



                        <div class="form-group col-md-4">
                            <label for="service_provider_name" class="control-label">service_provider_name</label>
                            <input maxlength="100" type="text" id="service_provider_name"  name="service_provider_name" required="required" class="form-control" value="IRIB R&D" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="service_id" class="control-label">service_id</label>
                            <input maxlength="6" type="number" id="service_id"  name="service_id" required="required" class="form-control" value="201" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="service_name" class="control-label">Service_name</label>
                            <input maxlength="100" type="text" id="service_name"  name="service_name" required="required" class="form-control" value="My_Channel" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="video_pid" class="control-label">video_pid</label>
                            <input maxlength="6" type="number" id="video_pid"  name="video_pid" required="required" class="form-control" value="2064" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="video_stream_type" class="control-label">video_stream_type</label>
                            <input maxlength="6" type="number" id="video_stream_type"  name="video_stream_type" required="required" class="form-control" value="27"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="audio_pid" class="control-label">audio_pid</label>
                            <input maxlength="6" type="number" id="audio_pid"  name="audio_pid" required="required" class="form-control" value="110"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="audio_stream_type" class="control-label">audio_stream_type</label>
                            <input maxlength="6" type="number" id="audio_stream_type"  name="audio_stream_type" required="required" class="form-control" value="26" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="PMT_pid" class="control-label">PMT_pid</label>
                            <input maxlength="6" type="number" id="PMT_pid"  name="PMT_pid" required="required" class="form-control" value="1031"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="AIT_pid" class="control-label">AIT_pid</label>
                            <input maxlength="6" type="number" id="AIT_pid"  name="AIT_pid" required="required" class="form-control" value="2993" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="carousel_pid" class="control-label"> carousel_pid </label>
                            <input maxlength="6" type="number" id="carousel_pid"  name="carousel_pid" required="required" class="form-control" value="2003" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="streamevent_pid" class="control-label"> streamevent_pid </label>
                            <input maxlength="6" type="number" id="streamevent_pid"  name="streamevent_pid" required="required" class="form-control" value="2005" />
                        </div>


					</div>	
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="service_insertData">ADD</button>
					</div>				
		    </form>
        </div>
      </div>
    </div>
</div>  
<?php
function showAllData($table_name,$row_name){
 //   $connection = mysqli_connect('localhost', 'root', '', 'beva');
        $servername="localhost";
        $username="root";
        $password="hbbtv2018";
        $dbname="HbbtvAppDB";

// Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM  $table_name";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die('Query Failed'. mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)){
        $name = $row[$row_name];
        $id = $row['id'];

        //echo $id;
        echo "<option value=$id> $name </option>";
    }
} ?>


<!-- VIEW MODAL -->
	
<div class="modal fade" id="service_viewModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">View service Information</h5>
                <button class="close" data-dismiss="modal">
                   <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row">

                    <div class="col-sm-5 col-xs-6 tital " >
                        <strong>net_setting_ID:</strong>
                    </div>
                    <div class="col-sm-7 col-xs-6 ">
                            <div id="viewnet_setting_ID"></div>
                    </div>


                   <div class="col-sm-5 col-xs-6 tital " >
                        <strong>pid_br_setting_ID:</strong>
                    </div>
                    <div class="col-sm-7 col-xs-6 ">
                            <div id="viewpid_br_setting_ID"></div>
                    </div>

                   <div class="col-sm-5 col-xs-6 tital " >
                        <strong>app_setting_ID:</strong>
                    </div>
                    <div class="col-sm-7 col-xs-6 ">
                            <div id="viewapp_setting_ID"></div>
                    </div>

                   <div class="col-sm-5 col-xs-6 tital " >
                        <strong>app_name:</strong>
                    </div>
                    <div class="col-sm-7 col-xs-6 ">
                            <div id="viewapp_name"></div>
                    </div>



					<div class="col-sm-5 col-xs-6 tital " >
						<strong>service_id:</strong>
					</div>
					<div class="col-sm-7 col-xs-6 ">
						<div id="viewservice_id"></div>
		            </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                <strong>service_name:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		   <div id="viewservice_name"></div>
		            </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>service_provider_name:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewservice_provider_name"></div>
		            </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>video_pid:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewvideo_pid"></div>
		            </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>video_stream_type:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewvideo_stream_type"></div>
		            </div> 
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>audio_stream_type:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewaudio_stream_type"></div>
		            </div> 				
					<div class="col-sm-5 col-xs-6 tital " >
							<strong>PMT_pid:</strong>
					</div>
					<div class="col-sm-7 col-xs-6 ">
						<div id="viewPMT_pid"></div>
					</div>
					<div class="col-sm-5 col-xs-6 tital " >
						<strong>AIT_pid:</strong>
					</div>
					<div class="col-sm-7 col-xs-6 ">
						<div id="viewAIT_pid"></div>
					</div>
					<div class="col-sm-5 col-xs-6 tital " >
						<strong>carousel_pid:</strong>
					</div>
					<div class="col-sm-7 col-xs-6 ">
						<div id="viewcarousel_pid"></div>
					</div>
                                       <div class="col-sm-5 col-xs-6 tital " >
                                                <strong>streamevent_pid:</strong>
                                        </div>
                                        <div class="col-sm-7 col-xs-6 ">
                                                <div id="viewstreamevent_pid"></div>
                                        </div>
				
				</div>
					
            		
              </div>
              <br>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
        
		</div>
    </div>
</div>

  <!-- UPDATE MODAL -->

<div class="modal fade" id="service_updateModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header bg-warning text-white">
				<h5 class="modal-title">Edit Record</h5>
				<button class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
            </div>
            <div class="modal-body">
   	     <form action="service_update.php" method="POST">
		<div class="row">						
			<input type="hidden" name="service_updateId" id="service_updateId">
			<div class="form-group col-md-4">
      
								<label for ="updatenet_setting_ID" class="control-label">net_setting_ID</label>
                               <input maxlength="6" type="number" id="updatenet_setting_ID"  name="updatenet_setting_ID" required="required" class="form-control" value="1" />
                        </div>

			<div class="form-group col-md-4">
      
								<label for ="updatepid_br_setting_ID" class="control-label">pid_br_setting_ID</label>
                               <input maxlength="6" type="number" id="updatepid_br_setting_ID"  name="updatepid_br_setting_ID" required="required" class="form-control" value="1" />
                        </div>

<!--			<div class="form-group col-md-4">
      
								<label for ="updateapp_setting_ID" class="control-label">app_setting_ID</label>
                               <input maxlength="6" type="number" id="updateapp_setting_ID"  name="updateapp_setting_ID" required="required" class="form-control" value="1" />
                        </div> -->


                        <div class="form-group col-md-4">
                        <label for ="updateapp_setting_ID" class="control-label">App_setting_ID</label>
                                <select class="selectpicker form-control" id="updateapp_setting_ID"  name="updateapp_setting_ID">
                                <?php showAllData('Apps','application_name')  ?>
                                </select>
                        </div>




                        <div class="form-group col-md-4">
                            <label for="updateservice_provider_name" class="control-label">service_provider_name</label>
                            <input maxlength="100" type="text" id="updateservice_provider_name"  name="updateservice_provider_name" required="required" class="form-control" value="IRIB R&D" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateservice_id" class="control-label">service_id</label>
                            <input maxlength="6" type="number" id="updateservice_id"  name="updateservice_id" required="required" class="form-control" value="201" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateservice_name" class="control-label">Service_name</label>
                            <input maxlength="100" type="text" id="updateservice_name"  name="updateservice_name" required="required" class="form-control" value="My_Channel" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatevideo_pid" class="control-label">video_pid</label>
                            <input maxlength="6" type="number" id="updatevideo_pid"  name="updatevideo_pid" required="required" class="form-control" value="2064" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatevideo_stream_type" class="control-label">video_stream_type</label>
                            <input maxlength="6" type="number" id="updatevideo_stream_type"  name="updatevideo_stream_type" required="required" class="form-control" value="27"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateaudio_pid" class="control-label">audio_pid</label>
                            <input maxlength="6" type="number" id="updateaudio_pid"  name="updateaudio_pid" required="required" class="form-control" value="110"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateaudio_stream_type" class="control-label">audio_stream_type</label>
                            <input maxlength="6" type="number" id="updateaudio_stream_type"  name="updateaudio_stream_type" required="required" class="form-control" value="26" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatePMT_pid" class="control-label">PMT_pid</label>
                            <input maxlength="6" type="number" id="updatePMT_pid"  name="updatePMT_pid" required="required" class="form-control" value="1031"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateAIT_pid" class="control-label">AIT_pid</label>
                            <input maxlength="6" type="number" id="updateAIT_pid"  name="updateAIT_pid" required="required" class="form-control" value="2993" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatecarousel_pid" class="control-label"> carousel_pid </label>
                            <input maxlength="6" type="number" id="updatecarousel_pid"  name="updatecarousel_pid" required="required" class="form-control" value="2003" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatestreamevent_pid" class="control-label"> streamevent_pid </label>
                            <input maxlength="6" type="number" id="updatestreamevent_pid"  name="updatestreamevent_pid" required="required" class="form-control" /> 
                        </div>

					</div>
					<div class="modal-footer">
                           <button type="submit" class="btn btn-primary" name="service_updateData">Save Changes</button>
					</div>
		</form>
	    </div>
        </div>
    </div>
</div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="service_deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="service_ModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="service_delete.php" method="POST">

            <div class="modal-body">
				<input type="hidden"  name="service_deleteId" id="service_deleteId">
				<h4>Are you sure want to delete?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary" name="service_deleteData">Yes</button>
			</div>
        </form>
      </div>
    </div>
  </div>

  <script src="jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="popper1.14.3.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="bootstrap4.1.1.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="ckeditor.js"></script>

  <script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#service_updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
            $('#service_updateId').val(data[0]);
    	    $('#updateservice_id').val(data[1]);
			$('#updateservice_name').val(data[2]);
			$('#updateservice_provider_name').val(data[3]);
			$('#updatevideo_pid').val(data[4]);
			$('#updatevideo_stream_type').val(data[5]);
			$('#updateaudio_pid').val(data[6]);
			$('#updateaudio_stream_type').val(data[7]);
			$('#updatePMT_pid').val(data[8]);
			$('#updateAIT_pid').val(data[9]);
			$('#updatecarousel_pid').val(data[10]);
                        $('#updatestreamevent_pid').val(data[11]);
			$('#updatenet_setting_ID').val(data[12]);
			$('#updatepid_br_setting_ID').val(data[13]);		
			$('#updateapp_setting_ID').val(data[14]);
			
 
        });
        
    });
  </script>

  <script>
    $(document).ready(function () {
      $('.viewBtn').on('click', function(){


        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
			$('#service_viewModal').modal('show');

			

        console.log(data);
            
			$('#viewservice_id').text(data[1]);
			$('#viewservice_name').text(data[2]);
			$('#viewservice_provider_name').text(data[3]);
			$('#viewvideo_pid').text(data[4]);
			$('#viewvideo_stream_type').text(data[5]);
			$('#viewaudio_pid').text(data[6]);
			$('#viewaudio_stream_type').text(data[7]);
			$('#viewPMT_pid').text(data[8]);
			$('#viewAIT_pid').text(data[9]);
			$('#viewcarousel_pid').text(data[10]);
                        $('#viewstreamevent_pid').text(data[11]);
			$('#viewnet_setting_ID').text(data[12]);
			$('#viewpid_br_setting_ID').text(data[13]);
			$('#viewapp_setting_ID').text(data[14]);
                        $('#viewapp_name').text(data[15]);

			
				
           // $('#viewID').text(data[0]);      

        });
    
    });
  </script>

<script>
/*    $(document).ready(function () {
	$('#my_table').DataTable({
		"scrollX":true,
		"scrollY":200,
	});
	$('.dataTables_length').addClass('bs-select');
	});*/
</script>

  <script>
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){

        $('#service_deleteModal').modal('show');
        
        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

       console.log(data);

        $('#service_deleteId').val(data[0]);

        });
    
    });
  </script>
</body>

</html>






























