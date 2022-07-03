
<?php

if(isset($_POST['submit']))
{
    loginaction();
}
else
{
        sessioncheck();
}

function loginaction()
{
    
    $users = array();
    $users['jahad'] = 'Zaq1';  // Change the username and password to something of your choice
    
    if(array_key_exists($_POST['user'], $users))
    {
        if($_POST['password'] == $users[$_POST['user']])
        {
            
           // echo $_POST['password'].$_POST['user']

			$_SESSION['login']['user'] = sha1(md5($_POST['user']));
            $_SESSION['login']['password'] = sha1(md5($_POST['password']));
        }
        else
        {
            echo "<div id='message'>Wrong .....................Username or Password</div>";
            showform();
            exit();
        }
    }
    else
    {
        echo "<div id='message'>Wrong *********Username or Password</div>";
        showform();
        exit();
    }
}

function sessioncheck()
{
    if(!isset($_SESSION['login']['user']) || !isset($_SESSION['login']['password']))
    {
        showform();
        exit();
    }
}

function showform()
{
?>
<html lang="en">

<head>
    
  <!--  <link rel="stylesheet" type="text/css" href="style.css">   -->
	<meta charset="UTF-8">
    <title>Login HbbTV test kit</title>
    <!--<link rel="stylesheet" href="pure.css"/> -->
	<script language="javascript" src="jquary.js"></script>
    <style>
	body{
    margin: 0;
    padding: 0;
    background: url(/FileManagment/damavand.jpg);
    background-size: cover;
   // background-repeat: no-repeat;
   // background-position: center;
    font-family: sans-serif;
}
.login-box{
    width: 320px;
    height: 420px;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
.logo{
    //width: 100px;
    //height: 100px;
    border-radius: 20%;
    position: absolute;
    top: -40px;
    left:0px;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}
h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}
.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.login-box input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.login-box input[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}

.login-box a{
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}
.login-box a:hover
{
    color: #39dc79;
}




        .wrapper{
            width: 75%;
            margin: 20px auto;
            background-color: #dfffdb;
            border-radius: 10px;
            padding: 20px;
        }
		.box1{
            width: 50%;
            margin: 20px auto;
            background-color: hsla(0, 0, 0, 0);
            border-radius: 10px;
            padding: 5px;
        }
		.box{
            width: 50%;
            margin: 20px auto;
            background-color: hsla(89, 43%, 51%, 0.3);
            border-radius: 10px;
            padding: 5px;
        }
		.inputfile {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
		}
		#message {
  				color: #dc4545;
  				text-align: center;
                }
    </style>
</head>
    <body>
    <div class="login-box">
	<form  method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" autocomplete="off">
	
            <img src="/FileManagment/avatar.png" class="avatar">
            <img src="/FileManagment/logo-jahad.png" class="logo" >

        <h1  style="font-size:14px">Login To</h1>
        <h1 style="font-size:16px" >IRIB R&D HbbTV App Test Kit</h1>
         </br>
            <form>
            <p>Username</p>
            <input type="text" name="user" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            
            </form>

    </form>
        
        </div>
    
    </body>
</html>
<?php
}
?>
