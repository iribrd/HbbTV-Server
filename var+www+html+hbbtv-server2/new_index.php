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
<!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->

<!--    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css"> -->

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
.pushable{
background: hsl(340deg 100% 32%);
border-radius:12px;
border:none;
padding:0;
cursor:pointer;
outline-offset:1px;
}
.front{
display:block;
padding:5px 24px;
border-radius:12px;
font-size:1.05rem;
background:hsl(345deg 100% 47%);
color:white;
transform:translateY(-4px);
will-change: transform;
transition: transform 600ms cubic-bezier(.3,.7,.4,1);
}
.pushable:hover .front {
transform:translateY(-6px);
transition: transform 250ms cubic-bezier(.3,.7,.4,1);
}
.pushable:active .front{
transform:translateY(-2px);
transition:transform 34ms;
}
.pushable:focus:not(:focus-visible){
 outline:none;
}
</style>
 <div class="container-fluid">
    <div class="row">


        <div id="wrapper" class="col-sm-2  px-0 bg-light position-fixed h-100">
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


        <div class="offset-sm-2" id="main"">

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
                                                                        <th>Service name</th>
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
//                                                                $state_array=['<i class="fa fa-ban"> off </i>' ,'<i class="fa fa-check-circle"> on </i>'];

								if($result)
									{
									while($val = mysqli_fetch_assoc($result)){
								?>
								<tr>
			  
								<td><?php echo $val['id'];?></td>
								<td><?php echo $val['service_setting_ID'];?></td>
                                                                <td><?php echo $val['service_name'];?></td>
								<td><?php echo $state_array[$val['state']];?></td>
								</td>

                                                                <td>
                                                                <div  >

								     <?php
									$comp_tag=$val['streamevent_componenttag'];
									$sqll="SELECT *  FROM  streamEvents WHERE component_tag=$comp_tag";
									$resultt=mysqli_query($conn,$sqll);
									$x=0;
                                                                        while($events = mysqli_fetch_assoc($resultt)){
									$x=$x+1;

                                                        	                //for( $x=0; $x<$val['streamevent_count']; $x++){
                                                			if($x>1){
							                ?>
						
                                                                        <div class="form-check-inline" >
	   								   <label class="form-check-lable">
                                                                               <input type="radio" class="form-check-input" name=<?php echo $val['streamevent_prefix'] ?> id="<?php echo $val['streamevent_prefix'];echo $x; ?>" value=<?php echo  number_format($events['event_timeout'])?> > <?php echo $events['event_name']?>
									   </label>
								        </div>
								        <?php
								         }else{
									?>
                                                     		        <div class="form-check-inline" >
                                                                            <label class="form-check-lable">
                                                                                <input type="radio" class="form-check-input" name=<?php echo $val['streamevent_prefix'] ?> id="<?php echo $val['streamevent_prefix'];echo $x; ?>"  value=<?php echo  number_format($events['event_timeout'])?> checked /> <?php echo $events['event_name']?>
                                                                            </label>
                                                                         </div>
                                                                        <?php
								           }
                                                                           }
									if($x>0){
                                                                          ?>

                                                                <!-- <div class="form-check-inline" >

								  <label class="form-check-lable" active>
                                                                           <input type="radio"  class="form-check-input" name=<?php echo $val['streamevent_prefix'] ?>  id="<?php echo $val['streamevent_prefix'];?>0" value="0" checked />no event
                                                                        </label>
								</div> -->

                                                                <div class="form-check-inline" >
									<button  type="button"  class="form-check-input btn-sm btn-primary" name="send_<?php echo $val['streamevent_prefix'] ?>" id="<?php echo $val['streamevent_prefix']?>" 
									<?php if($val['state']==1)
										{echo 'onclick="javascript:copyeventste(this.id)"';}
									      else
                                                                                {echo 'disabled=disabled style="background-color:#007bff5c"';}
									 ?> >send event </button>
									</div>


								<div id="div_<?php echo $val['streamevent_prefix'] ?>"> 
								</div>								
								<?php
									}
								?>
                                                                </div>
								<script>
                                                                //     const fs=require('fs');

								 function copyeventste(id){
									var streameventstefile="";
                                                                           temp=document.getElementById(id).innerHTML;
	                                                                   ele=document.getElementsByName( id );

									for(i=0;i<ele.length;i++){
										if(ele[i].checked)
										{
										streameventstefile="/home/Hbb-server/darabi/server_backend/temp/"+ele[i].id+".ts";
										time_out=parseInt(ele[i].value);
										}

									}
								     if(streameventstefile){
                                                                        document.getElementById(id).innerHTML="sending..";
                                                                       document.getElementById(id).style.backgroundColor='#007bff5c';

                                          				temp_cmd1="cp "+streameventstefile+" /home/Hbb-server/darabi/server_backend/temp/temp"+id+".ts";
				                                        temp_cmd2="cp "+"/home/Hbb-server/darabi/server_backend/null.ts"+" /home/Hbb-server/darabi/server_backend/temp/temp"+id+".ts";
                                                                        document.getElementById("div_"+id).innerHTML="<span style='color: red;'>sending event for....... "+time_out+"second </span>" ;

//                                                                          setTimeout(enable, time_out*100);

									 //$cmd="sudo copy "+ document.getElementById("test").innerHTML +" "+ $tempstets;
									 //$output=shell_exec($cmd);

									 //copy("document.write(streameventstefile);", $tempstets)
									
                                                                        //document.getElementById("test").innerHTML=time_out;
									   $.ajax({
									        url  : 'copyFile.php',
									        data : {
								            	temp_cmd1,
										time_out,
										temp_cmd2,
										        },
									        type : 'POST',
										  success:function(data){

											//alert(data);
											}


										    });

                                                                        //document.getElementById("div_"+id).innerHTML="";
									
								    setTimeout(function enable() {

                                                                           document.getElementById(id).innerHTML="send event";
                                                                           document.getElementById("div_"+id).innerHTML="";
                                                                           document.getElementById(id).style.backgroundColor='#007bff';

									    }, (time_out)*1000)
									}}
								</script>
                                                                </td>




								<td>
								<div class="btn-group btn-group-sm" >
									<button type="button" class="btn btn-outline-info  btn-sm viewBtn"> <i class=""></i> View </button>
														
									<button type="button" class="btn btn-outline-warning  btn-sm updateBtn"> <i class=""></i> Update </button>
								
								
									<button type="button" class="btn btn-outline-danger btn-sm deleteBtn"> <i class=""></i> Delete </button>
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

	<br>
                                                <?php
                                                $f=fopen("/home/Hbb-server/darabi/server_backend/lastcmd_transmition.txt",'r');
                                                echo "<dd>";
                                                $temp_array=explode(" ",fgets($f));
						$temp_txt='   ';
						$rf=0;
						$udp=0;
                                                if ($temp_array[2]=='1'){
                                                    $temp_txt="    (..RF..)";
						    $rf=1;}
                                                if ($temp_array[3]=='1')
                                                 { 
						    $temp_txt=$temp_txt."   (..UDP on ".$temp_array[4].":".$temp_array[5]."..)";
						    $udp=1;
						    $ip=$temp_array[4];
						    $port=$temp_array[5];
						}
                                                if ($temp_array[3]=='0' && $temp_array[2]=='0'  ){
                                                                  $temp_txt="No output ";}
                                                fclose($f);
                                               ?>

	<div class="alert alert-warning alert-dismissible fade show" > 
		<button type="button" class="close" data-dismiss="alert"> &times;</button>
		Press <strong>Mux </strong> key to apply any changes in MUX inptuts include services , application, stream events and bitrates
		</div>

 	         <form action="go2.php" method="POST" >

                            <div class=" col-md-9 card float-right" id='staus'>
                                <button type="submit" class="pushable btn-sm" id="mux_go" name="mux_go" ><span class="front">Mux</span></button>

						<dl>
                                                <dt> multiplexing of:</dt>
						<?php 
						$f=fopen("/home/Hbb-server/darabi/server_backend/myfile.txt",'r');
						echo "<dd>";
						while(!feof($f)){
						 echo '-'.fgets($f)." ";
						}
						echo "</dd>";
						fclose($f);
						?>
						</dl>
                            </div>
	    </form>
              <form action="" method="POST"> 

                     <div class=" card col-md-3  float-left" >
                      <div class="card-header"><strong>Output Config:</strong></div>
                     <div class="form-check-inline" >
                         <label class="form-check-lable">
                               <input type="radio" class="form-check-input" name="rfsend" id="rfsend" value="rf" <?php if($rf) echo 'checked' ?> > <strong>RF</strong>
                         </label>
                     </div>
                    <div class="form-check-inline" >
                         <label class="form-check-lable">
                               <input type="radio" class="form-check-input" name="udpsend" id="udpsend"  value="udp" <?php if($udp) echo 'checked' ?> ><strong>UDP</strong>
                         </label>
		   </div>
                    <div class="bg-light" >
                           <label   class="card bg-light" for="ipadd"><dt>IP Address:</dt>
                           <input  type='text'  id='ipadd'  value=<?php if($ip) echo $ip; else echo '224.0.1.2';?> ></lable>
                           <label  class="card bg-light"  for="portz"><dt>Port:</dt>
                           <input   type='text'  id='portz'  value=<?php if($port) echo $port; else echo '7001';?>  ></lable>
		     </div>
                   </div>
                     <div class=" col-md-9 card float-right">
                        <button  class="pushable btn-sm" type="button" id="transmit" name="transmit"  >
				<span id='transmit_span' class="front"><?php if ($rf || $udp) echo 'Stop Sending'; else echo 'Start Sending'; ?></span></button>

                     
			<div class=" col-md-9  float-right" id="test">

                                     <dl>
                                       <dt> Output is sending on:</dt>
                                                <?php
						echo $temp_txt;
		                               ?>
                                       </dl>

			</div>
			</div>
			<script>
  			document.getElementById("transmit").onclick=function(){
                                         var ip=document.getElementById('ipadd').value;
                                         var port=document.getElementById('portz').value;
                                         var rf=0;
                                         var udp=0;
                                         var temp_txt="<dl> <dt> Output is sending on:</dt>";

                                  if(document.getElementById('transmit_span').innerHTML=="Start Sending"){
					if(document.getElementById('rfsend').checked)
							{
							rf=1;
							temp_txt=temp_txt+"(..RF..)";
							}
                                        if(document.getElementById('udpsend').checked)
							{
                                                       temp_txt=temp_txt+"(..UDP on:"+ip+":"+port+"..)";
	                                               udp=1;
							}
					
                                         if (rf || udp )
		   			   document.getElementById('transmit_span').innerHTML="Stop Sending";
					else
					   temp_txt= temp_txt+"Output Not Set!!!!!!!!";
					
					 var trans_cmd="python2  /home/Hbb-server/darabi/server_backend/transmit_script.py "+" "+rf+" "+udp+" "+ip+" "+port;

					}

                                  else {
                                         document.getElementById('transmit_span').innerHTML="Stop Sending";

                                        var trans_cmd="python2  /home/Hbb-server/darabi/server_backend/transmit_script.py "+" "+0+" "+0+" "+0+" "+0;
                                        temp_txt=temp_txt+"No Output";
					document.getElementById('rfsend').checked=false;
                                        document.getElementById('udpsend').checked=false;

					}

	
					$.ajax({
					url:"transmit.php",
					data:{
					trans_cmd,
					},
                                        type : 'POST',
				        success:function(data){
						//alert('New configs applied on outputs')
					}
					})
                                       document.getElementById('test').innerHTML=temp_txt+"</dl>";
//                                       document.getElementById('test').innerHTML=trans_cmd+"</dl>";



				
				
				}
			</script>


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
                            <label class="control-label" for="service_setting_ID">service_setting_ID</label>

                                 <div class="input-group">
	                                  <select class="selectpicker form-control" id="service_setting_ID" name="service_setting_ID"> 
	        		                <?php showAllData()?>
                                           </select>
        	                </div>
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


<?php
function showAllData(){
 //   $connection = mysqli_connect('localhost', 'root', '', 'beva');
	$servername="localhost";
	$username="root";
	$password="hbbtv2018";
	$dbname="HbbtvAppDB";

// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM services ORDER BY ID DESC";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die('Query Failed'. mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['service_name'];
        $id = $row['id'];

        //echo $id;
        echo "<option value=$id> $name </option>";
    } 
} ?>

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
              <strong>service_name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewservice_name"></div>
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
              <label for="title">service:</label>
              <div  name="updateservice_setting_ID" id="updateservice_setting_ID"></div>
            </div>
            <div class="form-group">
              <label for="updatestate">state</label>
              <div class="input-group">
                                  <select class="selectpicker form-control" id="updatestate" name="updatestate">
										<option value="0" >off</option>
										<option value="1">on</option>				
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
	var  state_index;
        console.log(data);
	if (data[3]=='on') {
		state_index=1;} 
	if( data[3]=='off') {
		state_index=0;}
	document.getElementById('updatestate').selectedIndex=state_index;
        console.log(state_index);
	//$('#updatestate').select(state_index);
        $('#updateId').val(data[0]);
        $('#updateservice_setting_ID').text(data[1] +'  '+ data[2]);

        

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
        $('#viewservice_name').text(data[2]);
        $('#viewstate').text(data[3]);
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
    }
</html>
}
