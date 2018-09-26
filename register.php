<?php 
//PHP FOR REGISTERING DRIVERS
	$db = mysqli_connect("localhost","root","","labProject") or die("Error Connecting");

	$name = !empty($_POST["name"]);
	$phoneno = !empty($_POST["phoneno"]);
	$bikeno = !empty($_POST["bikeno"]);
	$license = !empty($_POST["license"]);

	$query = <<<EOD
INSERT INTO `driver` (`name`, `phoneno`, `bikeno`, `license`) VALUES ('$name','$phoneno', '$bikeno', '$license');
EOD;

	mysqli_query($db,$query) or die(mysqli_error());

  $result= mysqli_query($db,$query) or die(mysqli_error());

  @flush();
  
?>

<!DOCTYPE html>
<html>
<link href="fav.ico" rel="shortcut icon">
<title>Book Your Bike Now!</title><head>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bad+Script|Patrick+Hand" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></head>

<body>
  
  <body id="background">
    <header class="rent">
<a href="index.html"><img src="logo.png" alt="" class="logo"></a>  
</header>
<header class="heade" align="center">
  You are a part of our driver team now. Avail the benefits of the services we provide to our employees.<br>
</header>
</div>
<style type="text/css">

  .activ{
    font-size: 20px;
    padding-top: 20px;
    }
  .heade{
    font-size: 350%;
    color: black;
    padding: 10px;
    padding-right: 20px;
    font-weight: bold;
    margin-top: 15%;
   font-family: 'Kaushan Script', cursive;

  }

    .rent
  {
    border-color: black;
  }
    .logo
  {
    width: 15%;
    height: 15%;
  }
</style>
    </body></html>