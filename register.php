<?php 
//PHP FOR REGISTERING DRIVERS
  $db = mysqli_connect("localhost","root","","labProject") or die("Error Connecting");
  $name = $_POST["name"];
  $phoneno = $_POST["phoneno"];
  $pickLoc = $_POST["pickLoc"];
  $dropLoc = $_POST["dropLoc"];
  $type = $_POST["type"];


  $query = <<<EOD
select count(cid) as cf from customer where phoneno = '$phoneno';
EOD;
  $result = mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray4 = mysqli_fetch_all($result,MYSQLI_ASSOC);
if($responseArray4[0]["cf"] == 0)
 { $query = <<<EOD
INSERT INTO `customer` (`name`, `phoneno`, `pickLoc`, `dropLoc` , `type`) VALUES ('$name','$phoneno', '$pickLoc', '$dropLoc' , '$type');
EOD;
   $result= mysqli_query($db,$query) or die(mysqli_error($db));
  $query = <<<EOD
select * from customer where phoneno = '$phoneno';
EOD;

  $result= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
  $cid = $responseArray[0]["cid"];

  $query = <<<EOD
select id from driver where isA = 0 order by rating desc;
EOD;

$result= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray1 = mysqli_fetch_all($result,MYSQLI_ASSOC);
if($responseArray1[0]["id"] != NULL)
 { $id = $responseArray1[0]["id"];
 
  $query = <<<EOD
update driver set isA = 1 where id = '$id';
EOD;
mysqli_query($db,$query) or die(mysqli_error($db));
  $query = <<<EOD
update customer set hasStart = 1 where cid = '$cid';
EOD;
mysqli_query($db,$query) or die(mysqli_error($db));
$otp = rand(1000 , 9999);
  $query = <<<EOD
INSERT INTO `matchs` (`cid`, `id`, `otp`) VALUES ('$cid','$id','$otp');
EOD;
 if($responseArray4[0]["cf"] == 0)
  { $result= mysqli_query($db, $query) or die(mysqli_error());}

  $query = <<<EOD
select * from driver where id = '$id';
EOD;
$result1= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);

    $query = <<<EOD
select * from matchs where cid = '$cid';
EOD;
$result1= mysqli_query($db,$query) or die(mysqli_error($db));
  $responseArray2 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
}
elseif($responseArray1[0]["id"] == NULL)
   {   $query = <<<EOD
      delete from customer where phoneno = '$phoneno';
EOD;
  mysqli_query($db,$query) or die(mysqli_error($db));

     header("refresh:3;url=fill.html");
   }
}
elseif($responseArray4[0]["cf"] > 0)
{ header("refresh:0.1;url=bank.html");

}

  @flush();



?>


<!DOCTYPE html>
<html>
<link href="fav.ico" rel="shortcut icon">
<title>Book a cab !</title><head>
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
      <li><a href="register.html">Driver Registration</a></li>
      <li><a href="Terms and Conditions.pdf" target="_blank">Terms And Conditions</a></li>
    </ul></div>
  </div></div>
  
</nav>
    <header class="rent">
<a href="index.html"><img src="logo.png" alt="" class="logo"></a>  
</header>
<br>
<div id = "map">
  <script type="text/javascript">

function initMap() {
  // The location of Uluru
  var geocoder = new google.maps.Geocoder();
  var latitude = "";
  var longitude = "";
  var address = "<?php echo($responseArray[0]["pickLoc"]); ?>";
      geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
          latitude = results[0].geometry.location.lat();
          longitude = results[0].geometry.location.lng();}
        });
  var uluru = {lat: latitude, lng: longitude};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEYSjGkTxEFvRdJDkhoOUBbKC0YfILiRQ&callback=initMap">
    </script>
</div>
<header class="heade" align = "center">
  Driver Name : 
  <?php 
  if($responseArray1[0]["id"] != NULL) 
    echo($responseArray1[0]["name"]); 
else
   {
    echo("Not Available at the moment");
   }
  ?>
  <br>
  Ratings : <?php if($responseArray1[0]["id"] != NULL) echo($responseArray1[0]["rating"]); 
  else
   {
    echo("Not Available at the moment");
   }?><br>
  Bike Number : <?php if($responseArray1[0]["id"] != NULL) echo($responseArray1[0]["bikeno"]); 
  else
   {
    echo("Not Available at the moment");
   }?><br>
  Model : <?php if($responseArray1[0]["id"] != NULL) echo($responseArray[0]["type"]); 
  else
   {
    echo("Not Available at the moment");
   }?><br>
  OTP : <?php if($responseArray1[0]["id"] != NULL) echo($responseArray2[0]["otp"]); 
  else
   {
    echo("\n");
     echo("Book the cab again. We regret for inconvenience caused.");
   }?><br>
  <br>
</header>
</div>
<div class="bt" align = "center">
  <button class="bt2"><a href="cancel.html">Cancel the cab</a></button>
<button class="bt1"><a href = "end.html">End the trip</a></button>
</div>
<br>
<br>
<br>
<style type="text/css">

  .activ{
    font-size: 20px;
    padding-top: 20px;
    }
  .heade{
    font-size: 240%;
    color: black;
    padding: 10px;
    padding-right: 20px;
    font-weight: bold;
    margin-top: 8%;
   font-family: 'Special Elite', cursive;
  }
    a
  {
    color: white;
  }
  a:hover
  {
    color: black;
    font-weight: bold;
    text-decoration: none;
  }

    .rent
  {
    border-color: black;
    margin-top: 4%;
  }
      #map 
  {
    height: 400px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
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
      .bt
    { color: black;
    }
        .bt1
    {
      color: black;
      background-color: green;
      border-radius: 5px;
      font-size: 150%;
      margin-left: 2%;
    }
            .bt2
    {
      color: black;
      background-color: red;
      border-radius: 5px;
      font-size: 150%;
    }
</style>
    </body></html>
