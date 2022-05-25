<?php

include '../lib/Database.php';
include '../class/Format.php';

include '../class/Faculty.php';

$faculty = new Faculty();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$uni_name = $_POST['uni_name'];
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$image=$_FILES['fimage'];
		$image_name=$image['name'];
		$image_temp_path=$image['tmp_name'];
		if ($image_name!=NULL) {
			$to="faculty_image/$image_name";
			
		}else{
			$to=NULL;

		}
		move_uploaded_file($image_temp_path,$to);

	$message = $faculty->facultyRegistration($name, $uni_name, $password, $email,$to);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Faculty Registration</title>

	<link rel="icon" href="../images/title.png" type="image/png">

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>

<style type="text/css">
	    body{
        background-color: #6f1f3a; /* For browsers that do not support gradients */
        background-image: linear-gradient(to bottom left, #6f1f3a, #ffffff);
        /*overflow: hidden;*/
    }

</style>


<body>
	<div class="containter ">
		<div class="row mt-3 mb-3 ">
			<div class="card col-5 offset-lg-4 hero-card p-4">
				<h2 class="text-dark display-4 d-flex justify-content-center fs-1">Faculty Registration</h2>
				<hr>

				<?php
				if (isset($message)) {
					echo $message;
					unset($message);
				}
				?>

				<form action="" method="POST" enctype="multipart/form-data" class="form-group">
					<label for="name">Your Name</label>:
					<input class="form-control" type="text" id="name" name="name" placeholder="Your Name">
					<br>
					<label for="uni_name">Institute Name</label>:
					<input class="form-control" type="text" id="uni_name" name="uni_name" placeholder="Institute Name">
					<br>
					<label for="email">Email</label>:
					<input class="form-control" type="Email" id="email" name="email" placeholder="Email">
					<br>
					<label for="password">Password</label>:
					<input class="form-control" type="Password" id="password" name="password" placeholder="Password">
					<br>
					<label for="fimage">Image</label>:
					<input class="form-control" type="file" id="fimage" name="fimage">
					<br>
					<input class="btn btn-danger col-2" type="submit" value="Submit">
					<br><br>
					<p><a href="faculty_login.php" class="btn-outline-danger">Want to go back login page?</a></p>

				</form>

			</div>
		</div>
	</div>

</body>

</html>