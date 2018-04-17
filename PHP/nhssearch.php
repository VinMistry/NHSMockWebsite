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

<!--PHP -->

    <?php
	 // Extract info from form field named firstname and assign it to PHP variable
      $lastname = $_POST["lastname"];  
      $dateofbirth = $_POST["dateofbirth"];

	 
	 
 $dbserver = "localhost";   // or use 127.0.0.1
     $dbusername = "vm2amt"; 
     $dbuserpassword = "1509170"; 
     $dbname = "vm2amt_db"; 
     $mysqli_obj = new mysqli($dbserver,$dbusername,$dbuserpassword,$dbname) or die("Cannot connect to database."); 

	 
	 $sqlstatement = "SELECT * FROM  patients WHERE (  surname = '$lastname' AND dateofbirth = '$dateofbirth')";
	     $result = $mysqli_obj->query($sqlstatement) or die("Couldn't issue SQL SELECT query"); 
	 
	 while ($row = $result->fetch_array(MYSQLI_ASSOC) )
	{
	$fn = $row["firstname"]; 
	$ln = $row["surname"];	
	$se = $row["sex"];
	$ad = $row["address"];
	$em =$row["email"];
	$dob = $row["dateofbirth"];
	$nn = $row["NHSnumber"]; 
	$doa = $row["dateofappointment"];
	$we= $row["weight"];
	$he = $row["height"]; 
	$bpS = $row["bloodpressureS"];
	$bpD = $row["bloodpressureD"];
	$sm = $row["smoker"];
	$bm = $row["BMI"];
	
	 print "<table> <tr> <th> firstname </th> <th> surname </th>  <th> sex </th> <th> address </th> <th> email </th> <th> Date of Birth </th> <th> NHSnumber </th> <th> Date of Appointment </th> <th>weight </th><th> height </th> <th> Systolic Blood Pressure </th> <th> Diastolic Blood Pressure </th> <th> BMI </th></tr>";
       print " <tr> <td> $fn </td> <td> $ln </td> <td> $se</td> <td> $ad </td> <td> $em </td> <td> $dob </td> <td> $nn </td><td> $doa </td> <td> $we </td> <td> $he </td> <td> $bpS</td><td> $bpD </td><td> $bm </td> </tr>"; 
	}
	


	$result->close();
	
	   
	 
 
	$mysqli_obj->close(); 
	
	
    ?>

  </body>

</html>