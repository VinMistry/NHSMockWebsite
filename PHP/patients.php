<!-- File:     patients.php
      Job:     PHP script to handle the information submitted to it by the webpage named patients.html
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NHS- Data Capture</title>
<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
	<link href="..\css/font-awesome.min.css" rel="stylesheet">
	<link href="..\css/bootstrap.min.css" rel="stylesheet">
	<link href="..\css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
	<link href="..\css/flexslider.css" rel="stylesheet">
	<link href="..\css/templatemo-style.css" rel="stylesheet">


 <style>
.error {color: #FF0000;}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #1999C6;
    color: white;
}
</style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div class="tm-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
					<a href="#" class="tm-site-name"><em>NHS</em></a>	
				</div>
				<div class="col-lg-6 col-md-8 col-sm-9">
					<div class="mobile-menu-icon">
						<i class="fa fa-bars"></i>
					</div>
					<nav class="tm-nav">
						<ul>
							<li><a href="..\index.html">Home</a></li>
							<li><a href="..\about.html">Gallery</a></li>
							<li><a href="..\tours.html">Statistics</a></li>
							<li><a href="..\contact.html" class="active">Data Capture</a></li>
						</ul>
					</nav>		
				</div>				
			</div>
		</div>	  	
	</div>
	
			<section class="section-padding-bottom">
		<div class="container">
			<div class="row">
				<div class="tm-section-header section-margin-top">
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-4 col-md-6 col-sm-6"><h2  id="survey" class="tm-section-title">Your Results</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
				</div>				
			</div>
			<div class="row">
			<br />
			<br />
			<br />

    <?php
	

      $firstname = $_POST["firstname"];  // Extract info from form field named firstname and assign it to PHP variable
      $lastname = $_POST["lastname"];  
	    $sex = $_POST["sex"];
	     $address = $_POST["address"];
	   $email = $_POST["email"];
	     $dateofbirth = $_POST["dateofbirth"];
      $NHSnumber = $_POST["NHSnumber"];
	  $dateofappointment = $_POST["dateofappointment"];
	  $weight = $_POST["weight"];
	  $height = $_POST["height"];
	    $bloodpressureS = $_POST["bloodpressureS"];
	     $bloodpressureD = $_POST["bloodpressureD"];
	    $smoker = $_POST["smoker"];


	 
    

		 $bmi = $weight/($height * $height); 
		 number_format('$bmi', 1);

	print "<table> <tr> <th> BMI </th> <th> Blood Pressure </th></tr>";
       print " <tr> <td>$bmi </td> <td> $bloodpressureS / $bloodpressureD </td></tr>";


        
        if($bloodpressureS >= 140 && $bloodpressureD >= 90)
        {
        	print "<br />Blood Pressure is HIGH please see your GP.";
        }

        else if($bloodpressureD > 80 && $bloodpressureS >= 120  )
        {
        	print " <br /> Blood Pressure is HIGH please see your GP. (PRE-HIGH Blood Pressure)";
        } 

        else if($bloodpressureD >= 60 && $bloodpressureS >= 90)
        {
        	print " <br />Blood Pressure is NORMAL. ";
        }
          else if($bloodpressureD < 60 && $bloodpressureS < 90)
        {
        	print " <br /> Blood Pressure is LOW please see your GP. ";
        }




         if($bmi < 25 && $bmi >= 18.5)
        {
        	print "<br />BMI is normal (healthy weight)";
        }

        else if($bmi < 18.5)
        {
        	print " <br /> BMI is low (under weight), please see your GP.";
        } 

        else if($bmi > 25)
        {
        	print " <br /> BMI is high (over weight), please see your GP. ";
        }







	  
	   $dbserver = "localhost";   // or use 127.0.0.1
     $dbusername = "vm2amt"; 
     $dbuserpassword = "1509170"; 
     $dbname = "vm2amt_db"; 
     $mysqli_obj = new mysqli($dbserver,$dbusername,$dbuserpassword,$dbname) or die("Cannot connect to database."); 
	 
	 $sqlstatement = "INSERT INTO patients VALUES ('$firstname', '$lastname', '$sex','$address','$email', '$dateofbirth', '$NHSnumber','$dateofappointment', '$weight', '$height','$bloodpressureS', $bloodpressureD,'$smoker','$bmi')";
	 
     $result = $mysqli_obj->query($sqlstatement) or die("Couldn't issue SQL INSERT query"); 
	 
	/* while ($row = $result->fetch_array(MYSQLI_ASSOC) )
	{
	$fn = $row["firstname"]; 
	$ln = $row["lastname"];	
	$se = $row["sex"];
	$dob = $row["dateofbirth"];
	$nn = $row["NHSnumber"]; 
	$doa = $row["sex"];
	$we= $row["weight"];
	$he = $row["height"]; 
	$bm = $row["BMI"];
	echo "<br />$fn $ln $se $dob $nn $doa $we $he $bm\n"; 
	}
	
	$result->close(); 
*/
	$mysqli_obj->close(); 
	
	
    ?>

  </body>

</html>