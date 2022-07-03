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

                <li> <a href="net_setting.php">networks</a> </li>
                <li> <a href="pid_br_setting.php">PIDs & bitrates</a> </li>
                <li> <a href="service_setting.php">Services</a> </li>
                <li> <a href="app_setting.php">Applications</a> </li>
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
                                <h4 class="text-left">Applications Settings</h4>
                                <hr>
                             </div>
							<div class="col-md-3">
                                <a href="#" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#addModal">
                                <i class=""></i> Add New App
                                </a>
                            </div>
			     <div class="table-responsive-sm">
                              <table id='my_table'  class="table table-striped table-wrapper-scroll table-bordered table-condensed btn-table table-sm"   
                                  style="overflow-x:scroll; overflow-y:scroll;  height:200px; caption-side:top; " cellspacing="0" width="100%">
				<caption> HTTP Apps </caption> 
                                 <thead class="bg-secondary text-white">
                                 <tr>
								 
									<th>Setting ID</th>
									<th>id</th>
									<th>name</th>
									<th style="display:none">organisation_id</th>
									<th style="display:none">type</th>
									<th>version</th>
									<th>pmt version</th>
									<th style="display:none">control_code</th>
									<th style="display:none">visibility</th>
									<th style="display:none">service_bound_flag</th>
									<th>priority</th>
									<th>url</th>
									<th>index file</th>
									<th style="display:none">profile</th>
									<th style="display:none">profile_maj</th>
									<th style="display:none">profile_min</th>
									<th style="display:none">profile_mic</th>
									
									<th>action</th>
									<!-- <th>Update</th>
									<th>Delete</th>  -->
								</tr>
								</thead>
								<tbody>

								<?php

								$sql = "SELECT * FROM httpApps ORDER BY ID DESC";
								$result = mysqli_query($conn, $sql);

								if($result)
									{
									while($val = mysqli_fetch_assoc($result)){
								?>
								<tr>
								
									<td><?php echo $val['id'];?></td>
									<td><?php echo $val['application_id'];?></td> 
									<td><?php echo $val['application_name'];?></td>
									<td style="display:none"><?php echo $val['organisation_id'];?></td>
									<td style="display:none"><?php echo $val['application_type'];?></td>
									<td><?php echo $val['application_version'];?></td>
									<td><?php echo $val['pmt_version'];?></td>
									<td style="display:none"><?php echo $val['application_control_code'];?></td>
									<td style="display:none"><?php echo $val['visibility'];?></td>
									<td style="display:none"><?php echo $val['service_bound_flag'];?></td>
									<td><?php echo $val['application_priority'];?></td>
									<td><?php echo $val['application_folder_path'];?></td>
									<td><?php echo $val['application_index_file'];?></td>
									<td style="display:none"><?php echo $val['application_profile'];?>
									<td style="display:none"><?php echo $val['application_profile_maj'];?></td>
									<td style="display:none"><?php echo $val['application_profile_min'];?></td>
									<td style="display:none"><?php echo $val['application_profile_mic'];?></td>
									
									
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
<!-- carousel apps.......................................................................................................................... -->
			<div class="table-responsive-sm">
                              <table id='my_table2'  class="table table-striped table-wrapper-scroll table-bordered table-condensed table-sm"   
                                  style="overflow-x:scroll; overflow-y:scroll;  height:200px;" cellspacing="0" width="100%">
                                <caption> Carousel Apps </caption>

                                 <thead class="bg-secondary text-white">
                                 <tr>
								 
									<th>Setting ID</th>
									<th>id</th>
									<th>name</th>
									<th style="display:none">organisation_id</th>
									<th style="display:none">type</th>
									<th>version</th>
									<th>pmt version</th>
									<th style="display:none">control_code</th>
									<th style="display:none">visibility</th>
									<th style="display:none">service_bound_flag</th>
									<th>priority</th>
									<th>folder path</th>
									<th>index file</th>
									<th style="display:none">profile</th>
									<th style="display:none">profile_maj</th>
									<th style="display:none">profile_min</th>
									<th style="display:none">profile_mic</th>

									<th >carousel id</th>								
									<th style="display:none">association tag</th>
									<th style="display:none">module version</th>
									<th style="display:none">DDB size</th>
									<th style="display:none">smart compress</th>
									
						
									
									
									<th>action</th>
									<!-- <th>Update</th>
									<th>Delete</th>  -->
								</tr>
								</thead>
								<tbody>

								<?php

								$sql = "SELECT * FROM carouselsApps ORDER BY ID DESC";
								$result = mysqli_query($conn, $sql);

								if($result)
									{
									while($val = mysqli_fetch_assoc($result)){
								?>
								<tr>
								
									<td><?php echo $val['id'];?></td>
									<td><?php echo $val['application_id'];?></td> 
									<td><?php echo $val['application_name'];?></td>
									<td style="display:none"><?php echo $val['organisation_id'];?></td>
									<td style="display:none"><?php echo $val['application_type'];?></td>
									<td><?php echo $val['application_version'];?></td>
									<td><?php echo $val['pmt_version'];?></td>
									<td style="display:none"><?php echo $val['application_control_code'];?></td>
									<td style="display:none"><?php echo $val['visibility'];?></td>
									<td style="display:none"><?php echo $val['service_bound_flag'];?></td>
									<td><?php echo $val['application_priority'];?></td>
									<td><?php echo $val['application_folder_path'];?></td>
									<td><?php echo $val['application_index_file'];?></td>
									<td style="display:none"><?php echo $val['application_profile'];?>
									<td style="display:none"><?php echo $val['application_profile_maj'];?></td>
									<td style="display:none"><?php echo $val['application_profile_min'];?></td>
									<td style="display:none"><?php echo $val['application_profile_mic'];?></td>
									<td><?php echo $val['carousel_id'];?></td>
									<td style="display:none"><?php echo $val['carousel_association_tag'];?></td>
									<td style="display:none"><?php echo $val['module_version'];?></td>
									<td style="display:none"><?php echo $val['DDB_size'];?></td>
									<td style="display:none"><?php echo $val['smart_compress_the_carousel'];?></td>

									  
									
									
									<td>
										<div class="btn-group btn-group-sm">
											<button type="button" class="btn btn-outline-info  btn-sm viewBtn">  View </button>												
											<button type="button" class="btn btn-outline-warning  btn-sm updateBtn"> Update </button>
											<button type="button" class="btn btn-outline-danger	 btn-sm deleteBtn"> Delete </button>
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



<!--.........................................................................................................................................-->							
							
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
          <h5 class="modal-title">Add New Application</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:lavender;">
            <form action="app_insert.php" method="POST"> 
		    <div class="form-group row">
                    <div class="form-group col-md-4">
                            <label class="control-label font-weight-bold" for="Transport_protocol_ID"> transport_protocol_id </label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                  <select class="selectpicker form-control" name="Transport_protocol_ID"  id="Transport_protocol_ID">
                                    <option value='1' onclick="show1()" >0x0001 Object Carousel   </option>
                                     <option value='3' onclick="show2()"selected> 0x0003 Transport via HTTP </option>

                                  </select>
                                </div>
                            </div>
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_name">application_name</label>
                            <input maxlength="20" type="text" id="App_name"  name="App_name" required="required" class="form-control" value="my app" />
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_ID">application_id</label>
                            <input maxlength="6" type="number" id="App_ID"  name="App_ID" required="required" class="form-control" value="15"/>
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label"for="Org_ID">organisation_id</label>
                             <a href="#" title="Organization_id: unique value identifying the organization of application. These values are registered with DVB" data-toggle="popover" data-placement="bottom" data-content="unique value identifying the organization of application. These values are registered with DVB" > ? </a>
                            <input maxlength="6" type="number" id="Org_ID"  name="Org_ID" required="required" class="form-control" value="7" />  
					</div>
                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_type">application_type</label>
                            <input maxlength="6" type="number"  id="App_type" name="App_type" required="required" class="form-control" value="16" />
                    </div>

                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_version">application_version</label>
                            <input maxlength="6" type="number"  id="App_version" name="App_version" required="required" class="form-control" value="1" />
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label"for="PMT_version">pmt_version</label>
                            <input maxlength="6" type="number" id="PMT_version"  name="PMT_version" required="required" class="form-control" value="1" />
                    </div>

                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_ctl"> application_control_code </label>
							<a href="#" title="App control code" data-toggle="popover" data-placement="bottom" 
                                     data-content=" 
                                            # PRESENT, the decoder will add this application to the user choice of application
											# AUTOSTART, the application will start immedtiatly to load and to execute
											# Disabled,it will signal to the application to stop executing.
											# KILL, it will stop execute the application" >?</a> 
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                  <select class="selectpicker form-control" id="App_ctl" name="App_ctl">
										<option value="0" selected>AUTOSTART</option>
										<option value="1">PRESENT</option>				
										<option value="2">DISABLED</option>
										<option value="3">KILL</option>
                                  </select>
                                </div>
                            </div>
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_visibility"> visibility </label>
                            <a href="#" title="App control code" data-toggle="popover" data-placement="bottom" data-content="00 NOT_VISIBLE_ALL This application shall not be visible either to applications via an application
								listing API (if such an API is supported by the terminal) or to users via the
								navigator with the exception of any error reporting or logging facility, etc.
								01 NOT_VISIBLE_USERS This application shall not be visible to users but shall be visible to applications
								via an application listing API (if such an API is supported by the terminal).
								10 reserved_future_use
								11 VISIBLE_ALL This application can be visible to users and shall be visible to applications via an
								application listing API (if such an API is supported by the terminal)."
                            >?</a>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                                  <select class="selectpicker form-control" id="App_visibility" name="App_visibility" >
                                        <option value="0" selected>00 NOT_VISIBLE_AL</option>
                                        <option value="1"> 01 NOT_VISIBLE_USERS</option>
                                        <option value="2"> 11 VISIBLE_ALL</option>
                                  </select>
                                </div>
                            </div>
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label"for="S_bound_flag"> service_bound_flag </label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <select class="selectpicker form-control" id="S_bound_flag" name="S_bound_flag">
                                        <option value="1" selected> 1:#the application is only associated with the current service</option>
                                        <option value="0"> 0:#the application is not  associated with the current service</option>
                                    </select>
                                </div>
                            </div>
                    </div>

                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_profile"> application_profile </label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <select class="selectpicker form-control" id="App_profile" name="App_profile">
                                        <option value="0" selected>#0x0000 basic profile</option>
                                        <option value="1">#0x0001 download feature</option>
                                        <option value="2">#0x0002 PVR feature</option>
                                        <option value="3">#0x0004 RTSP feature</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                        <div  class="form-group col-md-4 row">
                            <label class="control-label" for="App_profile_maj"> profile maj min mic</label>
                            <div class="inputGroupContainer">
                                <div class="input-group">

                            <input maxlength="6" type="number"  name="App_profile_maj" required="required" class="form-control col-sm-3" value="1" />
                            <input maxlength="6" type="number"  name="App_profile_min" required="required" class="form-control col-sm-3" value="1" />
                            <input maxlength="6" type="number"  name="App_profile_mic" required="required" class="form-control col-sm-3" value="1" />
			</div>
			</div>
			
                        </div>

                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_priority">application_priority  </label>
                            <input maxlength="6" type="number" id="App_priority" name="App_priority" required="required" class="form-control" value="2" />
                    </div>



                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_path">application_folder_path </label>
                            <input maxlength="100" type="text" id="App_path" name="App_path" id="App_path" required="required" class="form-control" value="77.36.157.4/h1/whitelabel/redbutton/" />
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label" for="App_index">application_index_file </label>
                            <input maxlength="100" type="text"  id="App_index" name="App_index"  id="App_index" required="required" class="form-control" value="index.php"/>
                    </div>
					<script>
						$('#Transport_protocol_ID').on('change',function(){
						if (this.value ==="1"){
								document.getElementById('carousel_div1').style.display = 'block';
                                                                document.getElementById('carousel_div2').style.display = 'block';
                                                                document.getElementById('carousel_div3').style.display = 'block';
                                                                document.getElementById('carousel_div4').style.display = 'block';
                                                                document.getElementById('carousel_div5').style.display = 'block';

                                document.getElementById('App_path').value = 'global_pi';
                                document.getElementById('App_index').value = 'index.htm';
								}
						else{
							document.getElementById('carousel_div1').style.display = 'none';
                                                        document.getElementById('carousel_div2').style.display = 'none';
                                                        document.getElementById('carousel_div3').style.display = 'none';
                                                        document.getElementById('carousel_div4').style.display = 'none';
                                                        document.getElementById('carousel_div5').style.display = 'none';

							}
							});
					</script>

					<script>
						$(document).ready(function(){
						$('[data-toggle="popover"]').popover();   
							});
					</script>
<!--			<div class="col-md-12 row"  id="carousel_div" style= display:none > -->
                        <div class="form-group col-md-4" id="carousel_div1" style= display:none>
                            <label class="control-label" for="Carousel_ID">Carousel_id </label>
                            <input maxlength="6" type="number"  name="Carousel_ID" id="Carousel_ID" required="required" class="form-control" value="500" />
                        </div>
                        <div class="form-group col-md-4"  id="carousel_div2" style= display:none>
                            <label class="control-label" for="dsmcc_association_tag">Carousel_association_tag </label>
                            <input maxlength="6" type="number"  name="dsmcc_association_tag"  id="dsmcc_association_tag" required="required" class="form-control" value="11" />
                        </div>
                        <div class="form-group col-md-4"  id="carousel_div3" style= display:none>
                            <label class="control-label" for="Module_version">module_version </label>
                            <input maxlength="6" type="number"  id ="Module_version" name="Module_version" required="required" class="form-control" value="12" />
                        </div>
                        <div class="form-group col-md-4"  id="carousel_div4" style= display:none>
                            <label class="control-label" for="DDB_size">DDB_size </label>
                            <input maxlength="6" type="number"  name="DDB_size" id="DDB_size" required="required" class="form-control" value="4066" />
                        </div>
                        <div class="form-group col-md-4" id="carousel_div5" style= display:none>
                            <label class="control-label">smart-compress-the-carousel </label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <select class="selectpicker form-control" id="Smart_compress" name="Smart_compress">
                                        <option value='0' >0:don't compress   </option>
                                        <option value='1'>1:compress all </option>
                                        <option value='2' selected>2:smart compress </option>
                                    </select>
                                </div>
                            </div>
                        </div>

<!--                    </div>		-->
                </div>	
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="app_insertData">ADD</button>
					</div>				
		    </form>
        </div>
    </div>
 </div>
</div>  

<!-- VIEW MODAL -->
	
<div class="modal fade" id="app_viewModal">
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
					<strong>application_id:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
				    <div id="viewapplication_id"></div>
		                </div>
                		<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>application_name:</strong>
                		</div>
		                <div class="col-sm-7 col-xs-6 ">
                		   <div id="viewapplication_name"></div>
		                </div>
                		<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>organisation_id:</strong>
                		</div>
		                <div class="col-sm-7 col-xs-6 ">
                		    <div id="vieworganisation_id"></div>
		                </div>
                		<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>application_type:</strong>
                		</div>
		                <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewapplication_type"></div>
		                </div>
                		<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>application_version:</strong>
                		 </div>
		                <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewapplication_version"></div>
		                </div> 
                		<div class="col-sm-5 col-xs-6 tital " >
		                    <strong>pmt_version:</strong>
                		 </div>
		                <div class="col-sm-7 col-xs-6 ">
                		    <div id="viewpmt_version"></div>
		                </div> 				
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_control_code:</strong>
				</div>
                		<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_control_code"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_visibility:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_visibility"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>service_bound_flag:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
				    <div id="viewservice_bound_flag"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_priority:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_priority"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_folder_path:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_folder_path"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_index_file:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_index_file"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_profile:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_profile"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_profile_maj:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_profile_maj"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_profile_min:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_profile_min"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>application_profile_mic:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewapplication_profile_mic"></div>
				</div>
			</div>
			
<!---carousel...............................................-->				
		<div   class="row"  id="view_carousel_part"   style='display:none'>
				<div class="col-sm-5 col-xs-6 tital ">
					<strong>carousel_id:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 " >
					<div id="viewcarousel_id"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>association_tag:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 " >
					<div id="viewcarousel_association_tag"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>module version:</strong>
				</div>
				<div class="col-sm-7 col-xs-6" >
					<div id="viewmodule_version"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>DDB_size:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 ">
					<div id="viewDDB_size"></div>
				</div>
				<div class="col-sm-5 col-xs-6 tital " >
					<strong>smart compress:</strong>
				</div>
				<div class="col-sm-7 col-xs-6 " >
					<div id="viewsmart_compress_the_carousel"></div>
				</div>
			</div>
		
<!---carousel...............................................-->				
				
				
            			
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

<div class="modal fade" id="app_updateModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header bg-warning text-white">
				<h5 class="modal-title">Edit Record</h5>
				<button class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
            </div>
            <div class="modal-body">
		 <form action="app_update.php" method="POST">
		  <div class="row">
			<input type="hidden" name="app_updateId" id="app_updateId">
			<input  type="hidden" name="app_updatetable" id="app_updatetable">
				
                    <div class="form-group  col-md-4">
			<label class="control-label" for="updateapplication_name">application_name</label>
			<input maxlength="20" type="text" id="updateapplication_name"  name="updateapplication_name" required="required" class="form-control"  />
                    </div>
                    <div class="form-group  col-md-4">
                        <label class="control-label" for="updateapplication_id">application_id</label>
                        <input maxlength="6" type="number" id="updateapplication_id"  name="updateapplication_id" required="required" class="form-control" />
                    </div>
                    <div class="form-group col-md-4">
                            <label class="control-label"for="updateorganisation_id">organisation_id</label>
                             <a href="#" title="Organization_id: unique value identifying the organization of application. These values are registered with DVB" data-toggle="popover" data-placement="bottom" data-content="unique value identifying the organization of application. These values are registered with DVB" > ? </a>
                            <input maxlength="6" type="number" id="updateorganisation_id"  name="updateorganisation_id" required="required" class="form-control"  />  
   		    </div>
                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_type">application_type</label>
                            <input maxlength="6" type="number"  id="updateapplication_type" name="updateapplication_type" required="required" class="form-control"  />
                    </div>

                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_version">application_version</label>
                            <input maxlength="6" type="number"  id="updateapplication_version" name="updateapplication_version" required="required" class="form-control"  />
                    </div>
                    <div class="form-group  col-md-4">
                            <label class="control-label"for="updatepmt_version">pmt_version</label>
                            <input maxlength="6" type="number" id="updatepmt_version"  name="updatepmt_version" required="required" class="form-control"  />
                    </div>

                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_control_code"> application_control_code </label>
							<a href="#" title="App control code" data-toggle="popover" data-placement="bottom" 
                                     data-content=" 
                                            # PRESENT, the decoder will add this application to the user choice of application
											# AUTOSTART, the application will start immedtiatly to load and to execute
											# Disabled,it will signal to the application to stop executing.
											# KILL, it will stop execute the application" >?</a> 
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                  <select class="selectpicker form-control" id="updateapplication_control_code" name="updateapplication_control_code">
										<option value="0" selected>AUTOSTART</option>
										<option value="1">PRESENT</option>				
										<option value="2">DISABLED</option>
										<option value="3">KILL</option>
                                  </select>
                                </div>
                            </div>
                    </div>

                    <div class="form-group  col-md-4">
                            <label class="control-label"for="updateservice_bound_flag"> service_bound_flag </label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <select class="selectpicker form-control" id="updateservice_bound_flag" name="updateservice_bound_flag">
                                        <option value="0"> 0:#the application is not  associated with the current service</option>
                                        <option value="1" selected> 1:#the application is only associated with the current service</option>

                                    </select>
                                </div>
                            </div>
                    </div>



                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_profile"> application_profile </label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <select class="selectpicker form-control" id="updateapplication_profile" name="updateapplication_profile" required>
                                        <option value="0">#0x0000 basic profile</option>
                                        <option value="1">#0x0001 download feature</option>
                                        <option value="2">#0x0002 PVR feature</option>
                                        <option value="3">#0x0004 RTSP feature</option>
                                    </select>
                                </div>
                            </div>
		</div>

		  <div   class="form-group  col-md-4">
                           <label class="control-label" for="updateapplication_profile_maj"> profile maj min mic</label>
                            <div class="inputGroupContainer row">

                            <input maxlength="6" type="number"  id="updateapplication_profile_maj" name="updateapplication_profile_maj" required="required" class="form-control col-sm-3"  />
                            <input maxlength="6" type="number"  id="updateapplication_profile_min" name="updateapplication_profile_min" required="required" class="form-control col-sm-3"  />
                            <input maxlength="6" type="number"  id="updateapplication_profile_mic"  name="updateapplication_profile_mic"  required="required" class="form-control col-sm-3"  />
			  </div>
		</div>
                    
                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_visibility"> application visibility </label>
                            <a href="#" title="App control code" data-toggle="popover" data-placement="bottom" data-content="00 NOT_VISIBLE_ALL This application shall not be visible either to applications via an application
								listing API (if such an API is supported by the terminal) or to users via the
								navigator with the exception of any error reporting or logging facility, etc.
								01 NOT_VISIBLE_USERS This application shall not be visible to users but shall be visible to applications
								via an application listing API (if such an API is supported by the terminal).
								10 reserved_future_use
								11 VISIBLE_ALL This application can be visible to users and shall be visible to applications via an
								application listing API (if such an API is supported by the terminal)."
                            >?</a>
                            <div class="inputGroupContainer">
                               <div class="input-group">
                                  <select class="selectpicker form-control" id="updateapplication_visibility" name="updateapplication_visibility" required>
                                        <option value="0" selected>00 NOT_VISIBLE_AL</option>
                                        <option value="1"> 01 NOT_VISIBLE_USERS</option>
                                        <option value="2"> 11 VISIBLE_ALL</option>
                                  </select>
                                </div>
                            </div>
                    </div>
                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_priority">application_priority  </label>
                            <input maxlength="6" type="number" id="updateapplication_priority" name="updateapplication_priority" required="required" class="form-control"  />
                    </div>
                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_folder_path">application_folder_path </label>
                            <input maxlength="100" type="text" id="updateapplication_folder_path" name="updateapplication_folder_path"  required="required" class="form-control"  />
                    </div>
                    <div class="form-group  col-md-4">
                            <label class="control-label" for="updateapplication_index_file">application_index_file </label>
                            <input maxlength="100" type="text"  id="updateapplication_index_file" name="updateapplication_index_file"   required="required" class="form-control" />
                    </div>
                   

                        <div class="form-group col-md-4" id="ucarousel_div1" name= "ucarousel_div1" style='display:none'>
                            <label class="control-label" for="updatecarousel_id">Carousel_id </label>
                            <input maxlength="6" type="number"  name="updatecarousel_id" id="updatecarousel_id"  class="form-control"  />
                        </div>
                        <div class="form-group col-md-4"  id="ucarousel_div2" name ="ucarousel_div2" style= 'display:none'>
                            <label class="control-label" for="updatecarousel_association_tag">Carousel_association_tag </label>
                            <input maxlength="6" type="number"  name="updatecarousel_association_tag"  id="updatecarousel_association_tag"  class="form-control"  />
                        </div>
                        <div class="form-group col-md-4"  id="ucarousel_div3" name="ucarousel_div3" style= 'display:none'>
                            <label class="control-label" for="updatemodule_version">module_version </label>
                            <input maxlength="6" type="number"  id ="updatemodule_version" name="updatemodule_version"  class="form-control"  />
                        </div>
                        <div class="form-group col-md-4"  id="ucarousel_div4" name="ucarousel_div4"style= 'display:none'>
                            <label class="control-label" for="updateDDB_size">DDB_size </label>
                            <input maxlength="6" type="number"  name="updateDDB_size" id="updateDDB_size"  class="form-control" />
                        </div>
                        <div class="form-group col-md-4" id="ucarousel_div5" name="ucarousel_div5" style= 'display:none'>
                            <label class="control-label" for="updatesmart_compress_the_carousel" >smart-compress-the-carousel </label>
                            <div class="inputGroupContainer">
                                <div class="input-group">
                                    <select class="selectpicker form-control" id='updatesmart_compress_the_carousel'  name="updatesmart_compress_the_carousel"  class="form-control" />
                                        <option value='0' >0:don't compress   </option>
                                        <option value='1'>1:compress all </option>
                                        <option value='2' selected>2:smart compress </option>
                                    </select>
                                </div>
                            </div>
                        </div>				
			</div>
		       <div class="modal-footer">
                           <button type="submit" class="btn btn-primary" name="app_updateData">Save Changes</button>
			</div>
		</form>
	    </div>
        </div>
    </div>
</div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="app_deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="app_ModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="app_delete.php" method="POST">

            <div class="modal-body">
				<input type="hidden"  name="app_deleteId" id="app_deleteId">
                                <input type="hidden"  name="app_deletetable" id="app_deletetable">

				<h4>Are you sure want to delete?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary" name="app_deleteData">Yes</button>
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

        $('#app_updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);


 		$('#app_updatetable').val(data.length);
                $('#app_updateId').val(data[0]);
	        $('#updateapplication_id').val(data[1]);
		$('#updateapplication_name').val(data[2]);
		$('#updateorganisation_id').val(data[3]);
		$('#updateapplication_type').val(data[4]);
		$('#updateapplication_version').val(data[5]);
		$('#updatepmt_version').val(data[6]);
		document.getElementById('updateapplication_control_code').selectedIndex=data[7];
		document.getElementById('updateapplication_visibility').selectedIndex=data[8];
		$('#updateservice_bound_flag').val(data[9]);
		$('#updateapplication_priority').val(data[10]);
		$('#updateapplication_folder_path').val(data[11]);
		$('#updateapplication_index_file').val(data[12]);
		document.getElementById('updateapplication_profile').selectedIndex=data[13];
		$('#updateapplication_profile_maj').val(data[14]);
		$('#updateapplication_profile_min').val(data[15]);
		$('#updateapplication_profile_mic').val(data[16]);


	         if (data.length >20) {
		$('#updatecarousel_id').val(data[17]);
		$('#updatecarousel_association_tag').val(data[18]);
		$('#updatemodule_version').val(data[19]);		
		$('#updateDDB_size').val(data[20]);	
		$('#updatesmart_compress_the_carousel').val(data[21]);
                document.getElementById("ucarousel_div1").style.display ="block";
                document.getElementById('ucarousel_div2').style.display = 'block';
                document.getElementById('ucarousel_div3').style.display = 'block';
                document.getElementById('ucarousel_div4').style.display = 'block';
                document.getElementById('ucarousel_div5').style.display = 'block';}
                document.getElementById('updatecarousel_id').required=true;
                document.getElementById('updatecarousel_association_tag').required=true;
                document.getElementById('updatemodule_version').required=true;
                document.getElementById('updateDDB_size').required=true;;
                document.getElementById('updatesmart_compress_the_carousel').required=true;

 
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
	$('#app_viewModal').modal('show');

			

        console.log(data);
            
			$('#viewapplication_id').text(data[1]);
			$('#viewapplication_name').text(data[2]);
			$('#vieworganisation_id').text(data[3]);
			$('#viewapplication_type').text(data[4]);
			$('#viewapplication_version').text(data[5]);
			$('#viewpmt_version').text(data[6]);
			$('#viewapplication_control_code').text(data[7]);
			$('#viewapplication_visibility').text(data[8]);
			$('#viewservice_bound_flag').text(data[9]);
			$('#viewapplication_priority').text(data[10]);
			$('#viewapplication_folder_path').text(data[11]);
			$('#viewapplication_index_file').text(data[12]);
			$('#viewapplication_profile').text(data[13]);
			$('#viewapplication_profile_maj').text(data[14]);
			$('#viewapplication_profile_min').text(data[15]);
			$('#viewapplication_profile_mic').text(data[16]);
			if(data.length < 20){
                        document.getElementById('view_carousel_part').style.display = 'none';

                         }
   		        else{
                        document.getElementById('view_carousel_part').style.display = 'flex';
			$('#viewcarousel_id').text(data[17]);
			$('#viewcarousel_association_tag').text(data[18]);
			$('#viewmodule_version').text(data[19]);		
			$('#viewDDB_size').text(data[20]);	
			$('#viewsmart_compress_the_carousel').text(data[21]);
			}
				
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

        $('#app_deleteModal').modal('show');
        
        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

       console.log(data);

        $('#app_deleteId').val(data[0]);
        $('#app_deletetable').val(data.length);

        });
    
    });
  </script>
</body>

</html>






























