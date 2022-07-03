<!DOCTYPE html>
<html>
 <head>
  <title>HbbTV Test Kit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
  
<style>

.myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

.myBtn:hover {
  background-color: #555;
}
</style>
 </head>
 <body style="background:#eee">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container" >
  <!-- Links -->
  <ul class="navbar-nav ">
    <li class="nav-item">
      <a class="nav-link " href="index.php"> Services&Apps </a>
    </li>
	  <li class="nav-item">
      <a class="nav-link" href="Directory_Managment/index.php">FileManagment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="read-dectek-log.php">Modulator</a>
    </li>
     <li class="nav-item">
      <a class="nav-link active " href="#">Monitoring</a>
	 </li>
  </ul>

   </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="FileManagment/Logout.php"><span class=""></span> Logout</a></li>
    </ul>
   
  </div>
</nav>
<div class="container-fluid" style="background:#fff; width:85%" >
<button class="myBtn" style="display:block" onClick="downFunction()" id="downBtn">Scroll to Bottom</button>

  <div><p><?php  echo nl2br( file_get_contents('/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/log.out')); ?></p></div>
 <button class="myBtn" onclick="topFunction()" id="topBtn" title="Go to top">scroll to Top</button>
</div>
<script>
//Get the button
var topbutton = document.getElementById("topBtn");
var downbutton = document.getElementById("downBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    topbutton.style.display = "block";
    downbutton.style.display = "none";

  } else {
    topbutton.style.display = "none";
    downbutton.style.display = "block";

  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function downFunction() {
    document.documentElement.scrollTop =  document.documentElement.scrollHeight;

}

</script>
  </body>
</html>
