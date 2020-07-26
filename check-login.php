<?php
//header('Cache-Control: no cache'); //no cache
session_cache_limiter(60);
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<title>::. RANGER - Panel Principal  .::</title>
    <link rel="icon" type="image/png" href="./img/r.png" />
		<meta charset="utf-8">
		<link rel="prev" href="index.html" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>

		<div>
			<?php
				include 'conn.php';
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$email = $_POST['email'];
				$password = $_POST['password'];

				// Query sent to database
				$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
				// Variable $row hold the result of the query
				$row = mysqli_fetch_assoc($result);
				// Variable $hash hold the password hash on database
				$hash = $row['Password'];
				/*
				password_Verify() function verify if the password entered by the user
				match the password hash on the database. If everything is OK the session
				is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
				*/
				if (password_verify($_POST['password'], $hash)) {

					$_SESSION['loggedin'] = true;
					$_SESSION['name'] = $row['Name'];
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (1* 60) ;

					include_once "principal.php";

					} else {
					//	echo "<script> alert('Correo o contraseña incorrecto!')</script>";
						//include("login.html");
						echo "<div class='alert alert-danger mt-4' role='alert'>Correo o contraseña incorrecto!
						<p><a href='index'><strong>Intente nuevamente!</strong></a></p></div>";
					}
					?>
			</div>

	</body>
</html>
