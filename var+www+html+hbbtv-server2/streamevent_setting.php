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
  <script  src='a076d05399.js'></script>
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
 
 <style>
.nav-link a{
text-decoration:none;
font-size:25px;
color:#818181;
display:block;
}
.nav-link a:hover{
 	color:#064579;
}


</style>
 <div class="container-fluid">
    <div class="row">


        <div id="wrapper" class="col-2  px-0 bg-light position-fixed h-100">
            <!-- Sidebar -->
            <div id="sidebar-wrapper ">
              <ul class="sidebar-nav ">
				<li>
					<div class="logo-wrapper waves-light">
						<a href="#"><img src="logo-jahad.png"
		            class="img-fluid flex-center"></a>
					</div>
				</li>

                <li id="net_nav" > <a  href="net_setting.php" >Networks</a> </li>
                <li id="pid_br_nav" > <a  href="pid_br_setting.php">PIDs & bitrates</a> </li>
                <li id="app_nav "> <a  href="new_app_setting.php">Applications</a> </li>
                <li id="streamevent_nav "> <a  href="streamevent_setting.php">Stream Events</a> </li>			
                <li id="service_nav" > <a  href="service_setting.php">Services</a> </li>
                <li id="mux_nav "> <a  href="index.php">Multiplexer</a> </li>

              </ul>
            </div> <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
        </div>


		<!-- .................................................................................................................................................  -->


        <div class="col offset-2" id="main"">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 card">
                        <div>
                             <div class="head-title">
                                <h4 class="text-left">Stream Event Settings</h4>
                                
                             </div>
			   <hr>
                            <div class="col-md-3 float-left">
                                <a href="#" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#addModal">
                                <i class=""></i> Add New Event </a>
                            </div>
<!--                            <div class="col-md-3 float-left add-new-button">
                                <a href="pdf.php" target="_blank" class="btn btn-success btn-block">
                                <i class="fas fa-print"></i> Print
                               </a>
                            </div> -->
                            <table class="table table-sm  table-light">
                                 <thead class="bg-secondary text-white">
                                 <tr>
									<th>Setting ID</th>
									<th>Component Tag</th>
									<th>Event ID</th>
									<th>Event Name</th>
									<th>Event Data</th>
                                                                        <th>Event Timeout</th>
									<th>action</th>
									<!-- <th>Update</th>
									<th>Delete</th>  -->
								</tr>
								</thead>
								<tbody>

								<?php

								$sql = "SELECT * FROM streamEvents ORDER BY ID DESC";
								$result = mysqli_query($conn, $sql);

								if($result)
									{
									while($val = mysqli_fetch_assoc($result)){
								?>
								<tr>
			  
								<td><?php echo $val['id'];?></td>
								<td><?php echo $val['component_tag'];?></td>
								<td><?php echo $val['event_id'];?></td>
								<td><?php echo $val['event_name'];?></td>
								<td><?php echo $val['event_data'];?></td>
                                                                <td><?php echo $val['event_timeout'];?></td>

								<td>
								<div class="btn-group btn-group-sm" >
									<button type="button" class="btn btn-outline-info  btn-sm viewBtn"> <i class=""></i> View </button>
														
									<button type="button" class="btn btn-outline-warning  btn-sm updateBtn"> <i class=""></i> Update </button>
															
									<button type="button" class="btn btn-outline-danger	 btn-sm deleteBtn"> <i class=""></i> Delete </button>
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

  <!-- MODALS -->

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add New Event</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:lavender;">
          <form action="streamevent_insert.php" method="POST"> 

			<div class="row">
 			<div class="form-group col-md-6"">
			      <label class="control-label" for="component_tag">component_tag</label>
	                      <input maxlength="100" type="text" name="component_tag" id="component_tag" required="required" class="form-control" value="" />
	                </div>
	                <div class="form-group col-md-6"">
	                    <label class="control-label" for="event_id">event_id</label>
	                    <input maxlength="6" type="number" name="event_id" id="event_id" required="required" class="form-control" value="1" />
	                </div>
	                <div class="form-group col-md-6"">
	                    <label class="control-label" for="event_name" >event_name</label>
	                    <input maxlength="20" type="text"  name="event_name" id="event_name" required="required" class="form-control" value="event1" />
	                </div>
	                <div class="form-group col-md-6"">
	                    <label class="control-label" for="event_data">event_data</label>
	                    <input maxlength="50" type="text" name="event_data" id="event_data"  required="required" class="form-control" value="event private data" />
	                </div>
                        <div class="form-group col-md-6"">
                            <label class="control-label" for="event_timeout">event_timeout</label>
                            <input maxlength="6" type="number" name="event_timeout" id="event_timeout"  required="required" class="form-control" value="10" />
                        </div>
			</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="streamevent_insertData">ADD</button>
					</div>

		</form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">View Record Information</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Setting num:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewId"></div>
            </div>          
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>component_tag:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewcomponet_tag"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>event_id:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewevent_id"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>event_name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewevent_name"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>event_data:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewevent_data"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>event_timeout:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewevent_timeout"></div>
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
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit Record</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="streamevent_update.php" method="POST">
            <input type="hidden" name="streamevent_updateId" id="streamevent_updateId">

			<div class="form-group">
              <label for="title">component_tag</label>
              <input type="number" name="updatecomponent_tag" id="updatecomponent_tag" class="form-control" placeholder="" maxlength="10"
                required>
            </div>

            <div class="form-group">
              <label for="title">event_id</label>
              <input type="number" name="updateevent_id" id="updateevent_id" class="form-control" placeholder="" maxlength="10" required>
            </div>
            <div class="form-group">
              <label for="title">event_name</label>
              <input type="text" name="updateevent_name" id="updateevent_name" class="form-control" placeholder="" maxlength="50"
                required>
            </div>
            
            <div class="form-group">
              <label for="title">event_data</label>
              <input type="text" name="updateevent_data" id="updateevent_data" class="form-control" placeholder="" maxlength="50" required>
            </div>

            <div class="form-group">
              <label for="title">event_timeout</label>
              <input type="number" name="updateevent_timeout" id="updateevent_timeout" class="form-control" placeholder="" maxlength="6" required>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="streamevent_updateData">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="streamevent_delete.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="streamevent_deleteId" id="streamevent_deleteId">

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="streamevent_deleteData">Yes</button>
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

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#streamevent_updateId').val(data[0]);
        $('#updatecomponent_tag').val(data[1]);
        $('#updateevent_id').val(data[2]);
        $('#updateevent_name').val(data[3]);
        $('#updateevent_data').val(data[4]);
        $('#updateevent_timeout').val(data[5]);

        });
        
    });
  </script>

  <script>
    $(document).ready(function () {
      $('.viewBtn').on('click', function(){

        $('#viewModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#viewcomponet_tag').text(data[1]);
        $('#viewevent_id').text(data[2]);
        $('#viewevent_name').text(data[3]);
        $('#viewevent_data').text(data[4]);
        $('#viewId').text(data[0]);      
        $('#viewevent_timeout').text(data[5]);

        });
    
    });
  </script>

  <script>
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){

        $('#deleteModal').modal('show');
        
        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#streamevent_deleteId').val(data[0]);

        });
    
    });
  </script>
</body>

</html>
