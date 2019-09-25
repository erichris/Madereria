<?php
	
	if(isset($_POST["submit"])) {
		date_default_timezone_set('UTC');
		$serverName = "mysql5022.site4now.net";
		$userName = "a4df34_par2";
		$password = "yw3eBDK4ZNfnG5gy";
		$dbName="db_a4df34_par2";

		//Make connection
		$conn = new mysqli($serverName,$userName,$password,$dbName);
		//Check connection
		if(!$conn)
		{
			die("Connection Failed.".mysqli_connect_error());
		}else{
			//echo("Connection sucessfull");
		}
		$now = date("Y-m-d H:i:s");
		$username = $_POST["Username"];
		if(isset($_POST["Entrada"])){
			echo "Hora de Entrada Registrada";
			$sql = "INSERT INTO reporte_atendencias (USERNAME, HORA_ENTRADA)VALUES ('";
			$sql .= (string)$username;
			$sql .=	"','";  
			$sql .= (string)$now . "')";
			if(mysqli_query($conn, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}else if(isset($_POST["Salida"])){
			echo "Hora de Salida Registrada";
			$sql = "INSERT INTO reporte_atendencias (USERNAME, HORA_SALIDA)VALUES ('";
			$sql .= (string)$username;
			$sql .=	"','";  
			$sql .= (string)$now . "')";
			if(mysqli_query($conn, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
		
		
	}

?>


<html>
<head>
	<title>Reporte de Asistencia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<form action="/AttendanceReport.php" method="post">
	</br>
	</br>
	</br>
	<div class="col-sm-3">
	</div>
	<div class="col-sm-6">
	
	<div class="form-group">
		<label for="exampleInputEmail1">Usuario</label>
		<input type="text" class="form-control" name="Username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el usuario">
	</div>
	<div class="form-group">
		<div class="col-sm-6">
			Marcar Entrada: <input type="checkbox" name="Entrada" value="Yes" />
		</div>
		<div class="col-sm-6">
			Marcar Salida: <input type="checkbox" name="Salida" value="Yes" />
		</div>
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

