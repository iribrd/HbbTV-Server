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
                <li> <a class="active" href="#">PIDs & bitrates</a> </li>
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
                                <h4 class="text-left">PID and Bitrate Settings</h4>
                                
                             </div>
				<hr>
                             <div class="col-md-3" >
                                <a href="#" class="btn btn-info btn-sm btn-block input-block-level" data-toggle="modal" data-target="#addModal">
                                <i class=""></i> Add New Setting
                                </a>
                            </div> 
							<div class="table-responsive-sm">
                                <table id='my_table'  class="table table-striped table-wrapper-scroll table-bordered table-condensed btn-table table-sm"   
                                  style="overflow-x:scroll; overflow-y:scroll;  height:200px; " cellspacing="0" width="100%">
                                 <thead class="bg-secondary text-white">
                                 <tr>
								 
									<th>Setting ID</th>
									<th>PAT pid</th>
									<th>PAT bitrate</th>
									<th>NIT pid</th>
									<th>NIT bitrate</th>
									<th>SDT pid</th>
									<th>SDT bitrate</th>
									<th>PMT bitrate</th>
									<th>AIT bitrate</th>
									<th>carousel bitrate</th>
                                                                        <th>stream event bitrate</th>
									<th>action</th>
									
								</tr>
								</thead>
								<tbody>

								<?php

								$sql = "SELECT * FROM pids_bitrates ORDER BY ID DESC";
								$result = mysqli_query($conn, $sql);

								if($result)
									{
									while($val = mysqli_fetch_assoc($result)){
								?>
								<tr>				
									<td><?php echo $val['id'];?></td>
									<td><?php echo $val['PAT_pid'];?></td> 
									<td><?php echo $val['PAT_bitrate'];?></td>
									<td><?php echo $val['NIT_pid'];?></td>
									<td><?php echo $val['NIT_bitrate'];?></td>
									<td><?php echo $val['SDT_pid'];?></td>
									<td><?php echo $val['SDT_bitrate'];?></td>
									<td><?php echo $val['PMT_bitrate'];?></td>
									<td><?php echo $val['AIT_bitrate'];?></td>
									<td><?php echo $val['carousel_bitrate'];?></td>
                                                                        <td><?php echo $val['streamevent_bitrate'];?></td>

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
          <h5 class="modal-title">Add New pid and bitrate Settings</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:lavender;">
            <form action="pid_br_insert.php" method="POST"> 
					<div class="form-group row">

                        <div class="form-group col-md-4">
                            <label for="PAT_pid" class="control-label">PAT_pid</label>
                            <input maxlength="6" type="number" id="PAT_pid"  name="PAT_pid" required="required" class="form-control" value="0" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="PAT_bitrate" class="control-label">PAT_bitrate</label>
                            <input maxlength="6" type="number" id="PAT_bitrate"  name="PAT_bitrate" required="required" class="form-control" value="3008" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="NIT_pid" class="control-label">NIT_pid</label>
                            <input maxlength="6" type="number" id="NIT_pid"  name="NIT_pid" required="required" class="form-control" value="16" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="NIT_bitrate" class="control-label">NIT_bitrate</label>
                            <input maxlength="6" type="number" id="NIT_bitrate"  name="NIT_bitrate" required="required" class="form-control" value="1400" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="SDT_pid" class="control-label">SDT_pid</label>
                            <input maxlength="6" type="number" id="SDT_pid"  name="SDT_pid" required="required" class="form-control" value="17"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="SDT_bitrate" class="control-label">SDT_bitrate</label>
                            <input maxlength="6" type="number" id="SDT_bitrate"  name="SDT_bitrate" required="required" class="form-control" value="1500"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="PMT_bitrate" class="control-label">PMT_bitrate</label>
                            <input maxlength="6" type="number" id="PMT_bitrate"  name="PMT_bitrate" required="required" class="form-control" value="3008" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="AIT_bitrate" class="control-label">AIT_bitrate</label>
                            <input maxlength="6" type="number" id="AIT_bitrate"  name="AIT_bitrate" required="required" class="form-control" value="1400"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="carousel_bitrate" class="control-label">carousel_bitrate</label>
                            <input maxlength="8" type="number" id="carousel_bitrate"  name="carousel_bitrate" required="required" class="form-control" value="1000000" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="streamevent_bitrate" class="control-label">streamevent_bitrate</label>
                            <input maxlength="8" type="number" id="streamevent_bitrate"  name="streamevent_bitrate" required="required" class="form-control" value="2000" />
                        </div>

 
					</div>	
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="pid_br_insertData">ADD</button>
					</div>				
		    </form>
        </div>
      </div>
    </div>
</div>  

<!-- VIEW MODAL -->
	
<div class="modal fade" id="pid_br_viewModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">View pid_br Information</h5>
                <button class="close" data-dismiss="modal">
                   <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
		<div class="row">

			<div class="col-sm-5 col-xs-6 tital " >
				<strong>PAT_pid:</strong>
			</div>
			<div class="col-sm-7 col-xs-6 ">
				<div id="viewPAT_pid"></div>
	               </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                <strong>PAT_bitrate:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		   <div id="viewPAT_bitrate"></div>
		            </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>NIT_pid:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewNIT_pid"></div>
		            </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>NIT_bitrate:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewNIT_bitrate"></div>
		            </div>
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>SDT_pid:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewSDT_pid"></div>
		            </div> 
                	<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>PMT_bitrate:</strong>
                	</div>
		            <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewPMT_bitrate"></div>
		            </div> 				
			<div class="col-sm-5 col-xs-6 tital " >
					<strong>AIT_bitrate:</strong>
			</div>
			<div class="col-sm-7 col-xs-6 ">
				<div id="viewAIT_bitrate"></div>
			</div>
			<div class="col-sm-5 col-xs-6 tital " >
				<strong>carousel_bitrate:</strong>
			</div>
			<div class="col-sm-7 col-xs-6 ">
				<div id="viewcarousel_bitrate"></div>
			</div>
                        <div class="col-sm-5 col-xs-6 tital " >
                                <strong>streamevent_bitrate:</strong>
                        </div>
                        <div class="col-sm-7 col-xs-6 ">
                               <div id="viewstreamevent_bitrate"></div>
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

<div class="modal fade" id="pid_br_updateModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header bg-warning text-white">
				<h5 class="modal-title">Edit Setting Record</h5>
				<button class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
            </div>
            <div class="modal-body">
				<form action="pid_br_update.php" method="POST">
					<div class="row">
					<input type="hidden" name="pid_br_updateId" id="pid_br_updateId">

                        <div class="form-group col-md-4">
                            <label for="updatePAT_pid" class="control-label">PAT_pid</label>
                            <input maxlength="6" type="number" id="updatePAT_pid"  name="updatePAT_pid" required="required" class="form-control"  />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatePAT_bitrate" class="control-label">PAT_bitrate</label>
                            <input maxlength="6" type="number" id="updatePAT_bitrate"  name="updatePAT_bitrate" required="required" class="form-control"  />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateNIT_pid" class="control-label">NIT_pid</label>
                            <input maxlength="6" type="number" id="updateNIT_pid"  name="updateNIT_pid" required="required" class="form-control"  />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateNIT_bitrate" class="control-label">NIT_bitrate</label>
                            <input maxlength="6" type="number" id="updateNIT_bitrate"  name="updateNIT_bitrate" required="required" class="form-control"  />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateSDT_pid" class="control-label">SDT_pid</label>
                            <input maxlength="6" type="number" id="updateSDT_pid"  name="updateSDT_pid" required="required" class="form-control"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateSDT_bitrate" class="control-label">SDT_bitrate</label>
                            <input maxlength="6" type="number" id="updateSDT_bitrate"  name="updateSDT_bitrate" required="required" class="form-control" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatePMT_bitrate" class="control-label">PMT_bitrate</label>
                            <input maxlength="6" type="number" id="updatePMT_bitrate"  name="updatePMT_bitrate" required="required" class="form-control"  />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateAIT_bitrate" class="control-label">AIT_bitrate</label>
                            <input maxlength="6" type="number" id="updateAIT_bitrate"  name="updateAIT_bitrate" required="required" class="form-control" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatecarousel_bitrate" class="control-label">carousel_bitrate</label>
                            <input maxlength="8" type="number" id="updatecarousel_bitrate"  name="updatecarousel_bitrate" required="required" class="form-control"  />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatestreamevent_bitrate" class="control-label">streamevent_bitrate</label>
                            <input maxlength="8" type="number" id="updatestreamevent_bitrate"  name="updatestreamevent_bitrate" required="required" class="form-control" />
                        </div>


                    </div>
					<div class="modal-footer">
                           <button type="submit" class="btn btn-primary" name="pid_br_updateData">Save Changes</button>
					</div>
		</form>
	    </div>
        </div>
    </div>
</div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="pid_br_deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="pid_br_ModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="pid_br_delete.php" method="POST">

            <div class="modal-body">
				<input type="hidden"  name="pid_br_deleteId" id="pid_br_deleteId">
				<h4>Are you sure want to delete?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary" name="pid_br_deleteData">Yes</button>
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

        $('#pid_br_updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
            $('#pid_br_updateId').val(data[0]);
			$('#updatePAT_pid').val(data[1]);
			$('#updatePAT_bitrate').val(data[2]);
			$('#updateNIT_pid').val(data[3]);
			$('#updateNIT_bitrate').val(data[4]);
			$('#updateSDT_pid').val(data[5]);
			$('#updateSDT_bitrate').val(data[6]);
			$('#updatePMT_bitrate').val(data[7]);
			$('#updateAIT_bitrate').val(data[8]);
			$('#updatecarousel_bitrate').val(data[9]);
                        $('#updatestreamevent_bitrate').val(data[10]);
					
 
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
			$('#pid_br_viewModal').modal('show');

			

        console.log(data);
            
			$('#viewPAT_pid').text(data[1]);
			$('#viewPAT_bitrate').text(data[2]);
			$('#viewNIT_pid').text(data[3]);
			$('#viewNIT_bitrate').text(data[4]);
			$('#viewSDT_pid').text(data[5]);
			$('#viewSDT_bitrate').text(data[6]);
			$('#viewPMT_bitrate').text(data[7]);
			$('#viewAIT_bitrate').text(data[8]);
			$('#viewcarousel_bitrate').text(data[9]);
                        $('#viewstreamevent_bitrate').text(data[10]);

	
				
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

        $('#pid_br_deleteModal').modal('show');
        
        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

       console.log(data);

        $('#pid_br_deleteId').val(data[0]);

        });
    
    });
  </script>
</body>

</html>






























