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
                <li id="mux_nav "> <a  href="mux_setting.php">Multiplexer</a> </li>

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
                                <h4 class="text-left">Mux Settings</h4>
                                
                             </div>
			   <hr>
                            <div class="col-md-3 float-left">
                                <a href="#" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#addModal">
                                <i class=""></i> Add New Mux Input </a>
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
									<th>Service setting ID</th>
									<th>State</th>
									<th>Stream events</th>
									<th>action</th>

								</tr>
								</thead>
								<tbody>

								<?php

								$sql = "SELECT * FROM mux ORDER BY ID DESC";
								$result = mysqli_query($conn, $sql);
								$state_array=["off" ,"on"];
								if($result)
									{
									while($val = mysqli_fetch_assoc($result)){
								?>
								<tr>
			  
								<td><?php echo $val['id'];?></td>
								<td><?php echo $val['service_setting_ID'];?></td>
								<td><?php echo $state_array[$val['state']];?></td>
								</td>

                                                                <td>
                                                                <div class="o-switch btn-group" data-toggle="button" role="group">
                                                                        <label class="btn btn-secondary" active>
                                                                           <input type="radio" name="option" id="noevent" active >no event
                                                                        </label>

								     <?php
                                                                        for( $x=0; $x<$val['streamevent_count']; $x++){
                                                                ?>
									<label class="btn btn-secondary">
									  <input type="radio" name="option" id="event<?php echo $x?>">event<?php echo $x?>

									</label>


                                                                <?php
                                                                        }
                                                                ?>
                                                                </div>
                                                                </td>




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

	<br><br><br>
          <form action="go.php" method="POST">
                            <div class=" col-md-12 card float-left">

                                                <button type="submit" class="btn btn-danger btn-block" name="mux_go">Mux & Transmit</button>
			    </div>

	</form>

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
          <h5 class="modal-title">Add New Mux Input</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:lavender;">
          <form action="mux_insert.php" method="POST"> 

			<div class="row">
 			<div class="form-group col-md-6"">
			      <label class="control-label" for="Net_name">Service setting ID</label>
	                      <input  maxlength="6" type="num" name="service_setting_ID" id="service_setting_ID" required="required" class="form-control" value="1" />
	                </div>
	                <div class="form-group col-md-6"">
	                    <label class="control-label" for="state">state</label>
	                    
						<div class="input-group">
                                  <select class="selectpicker form-control" id="state" name="state">
										<option value="0" >off</option>
										<option value="1" selected>on</option>				
								</select>
                        </div>
	                </div>
				</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="mux_insertData">ADD</button>
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
              <strong>service_setting_ID:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewservice_setting_ID"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>state:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewstate"></div>
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
          <form action="mux_update.php" method="POST">
            <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">
              <label for="title">service_setting_ID</label>
              <input type="num" name="updateservice_setting_ID" id="updateservice_setting_ID" class="form-control" placeholder="" maxlength="6"
                required>
            </div>
            <div class="form-group">
              <label for="updatestate">state</label>
              <div class="input-group">
                                  <select class="selectpicker form-control" id="updatestate" name="updatestate">
										<option value="0" >off</option>
										<option value="1"selected>on</option>				
								</select>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
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
        <form action="mux_delete.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
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
		if (data[2]=='on') state_index=1; else state_index=0;
		document.getElementById('updatestate').selectedIndex=state_index;
        $('#updateId').val(data[0]);
        $('#updateservice_setting_ID').val(data[1]);
        

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

        $('#viewservice_setting_ID').text(data[1]);
        $('#viewstate').text(data[2]);
        $('#viewID').text(data[0]);      

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

        $('#deleteId').val(data[0]);

        });
    
    });
  </script>
</body>

</html>
