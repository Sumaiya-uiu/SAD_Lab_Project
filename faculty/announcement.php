<?php

include '../lib/Session.php';

include 'session.php'; 


include '../lib/Database.php';
include '../class/Format.php';

Session::checkSession();

if (isset($_GET['action']) && isset($_GET['action']) == 'logout') {
	Session::destroy();
	header("Location:index.php");
	exit();
}


include '../class/Exam.php';

include '../class/Faculty.php';
$exam = new Exam();

$faculty = new Faculty();

$facultyId =  Session::get('id');


$link = mysqli_connect("localhost", "root", "", "onlineexam");
$status = 'OK';
if (mysqli_connect_errno()) {
	$status = 'ERROR';
	$content = mysqli_connect_error();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Announcement</title>
	
	<link rel="icon" href="../images/title.png" type="image/png">

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

		<?php
			if(isset($_POST['submit'])){

				$title = $_POST['title'];
				$q1 = "insert into posts (title) values ('$title')";
				$q2 = "insert into notifications (title,read_n) values ('$title','1')";

				$link->query($q1);
				$link->query($q2);

				echo "Posted";
			}

		?>

		<form action="" method="POST" style="text-align: center;">
			<textarea name="title"></textarea><br>
			<input type="submit" name="submit" value="Post">
			
		</form>
</body>
</html>