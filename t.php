<?php 
//PHP FOR REGISTERING DRIVERS
	$db = mysqli_connect("localhost","root","","labProject") or die("Error Connecting");

	$name = $_POST["name"];
	$phoneno = $_POST["phoneno"];
	$bikeno = $_POST["bikeno"];
	$license = $_POST["license"];

	$query = <<<EOD
INSERT INTO `driver` (`name`, `phoneno`, `bikeno`, `license`) VALUES ('$name','$phoneno', '$bikeno', '$license');
EOD;

	mysqli_query($db,$query) or die(mysqli_error());

	$query = <<<EOD
select id from driver where phoneno='$phoneno' and name = '$name';
EOD;

  $result= mysqli_query($db,$query) or die(mysqli_error());
  $responseArray = mysqli_fetch_all($result,MYSQLI_ASSOC);

  @flush();

?>


<!DOCTYPE html>
<html>
<link href="fav.ico" rel="shortcut icon">
<title>Register as a Driver!</title><head>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bad+Script|Patrick+Hand" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></head>

<body>
  
  <body id="background">
  	    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black; border-color: black;">
  <div class="container-fluid">
                <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <div>
    <ul class="nav navbar-nav" style="float: right;">
      <li><a href="index.html" >Home</a></li>
      <li><a href="members.html" >Members</a></li>
      <li><a href="form.html">Ride Details</a></li>
      <li><a href="register.html" style="color: white;">Driver Registration</a></li>
      <li><a href="Terms and Conditions.pdf" target="_blank">Terms And Conditions</a></li>
    </ul></div>
  </div></div>
  
</nav>
    <header class="rent">
<a href="index.html"><img src="logo.png" alt="" class="logo"></a>  
</header>
<header class="heade" align="center">
  Your registration number is : <?php echo($responseArray[0]["id"]);  ?><br><br>
  You are a part of our driver team now. Avail the benefits of the services we provide to our employees.<br>
</header>
</div>
<style type="text/css">

  .activ{
    font-size: 20px;
    padding-top: 20px;
    }
  .heade{
    font-size: 300%;
    color: black;
    padding: 10px;
    padding-right: 20px;
    font-weight: bold;
    margin-top: 8%;
   font-family: 'Special Elite', cursive;
  }

    .rent
  {
    border-color: black;
    margin-top: 4%;
  }
    .logo
  {
    width: 15%;
    height: 15%;
  }
  #background
  {
  	background-color: #F2EECB;
  }
</style>
    </body></html>
