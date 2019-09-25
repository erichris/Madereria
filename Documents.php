<?php
	
	if(isset($_POST["submit"])) {
		date_default_timezone_set('UTC');
		$serverName = "sql12.freemysqlhosting.net";
		$userName = "sql12305748";
		$password = "Dsty9whrwx";
		$dbName="sql12305748";

		//Make connection
		$conn = new mysqli($serverName,$userName,$password,$dbName);
		//Check connection
		if(!$conn)
		{
			die("Connection Failed.".mysqli_connect_error());
		}else{
			//echo("Connection sucessfull");
		}
		
		
		if(!isset($_POST["Username"])){
			echo "No ingresaste tu matricula</br>";
			return;
		}
		
		if(!isset($_FILES["ActaNacimiento"])){
			echo "No subiste tu acta de nacimiento</br>";
			return;
		}
		if(!isset($_FILES["INE"])){
			echo "No subiste tu INE</br>";
			return;
		}
		
		$actaname=$_FILES["ActaNacimiento"]["name"]; 
		//Get the content of the image and then add slashes to it 
		$actatmp=addslashes (file_get_contents($_FILES['ActaNacimiento']['tmp_name']));
		
		$inename=$_FILES["INE"]["name"]; 
		//Get the content of the image and then add slashes to it 
		$inetmp=addslashes (file_get_contents($_FILES['INE']['tmp_name']));
		
		$matricula = $_POST["Username"];
		
		
		$sql = "INSERT INTO employe_documants (ACTA_NACIMINTO, INE, MATRICULA)VALUES ('$actatmp', '$inetmp', '$matricula')";
		
		if(mysqli_query($conn, $sql)){
			echo "Records inserted successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
		
		
	}

?>


<html>
<head>
	<title>Documents</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<form action="/documents.php" method="post" enctype="multipart/form-data">
	</br>
	</br>
	</br>
	<div class="col-sm-3">
	</div>
	<div class="col-sm-6">
	
	<div class="form-group">
		<label for="exampleInputEmail1">Matricula</label>
		<input type="number" class="form-control" name="Username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa la matricula">
	</div>
	<div class="form-group">
		Acta de nacimiento: <input type="file" name="ActaNacimiento"></br>
		INE: <input type="file" name="INE"></br>
	</div>
	
	</br>
	</br>
	</br>
	<div class="col-sm-5">
	</div>
	<input type="submit" class="btn btn-primary" name="submit" value="submit">
 
  </div>
  
</form>
</div>
</body>
</html>

