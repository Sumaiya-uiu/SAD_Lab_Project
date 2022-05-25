<?php

include 'lib/Session.php';
include 'session.php'; 


include 'lib/Database.php';
include 'class/Format.php';

Session::checkSession();

if (isset($_GET['action']) && isset($_GET['action']) == 'logout') {
	Session::destroy();
	header("Location:index.php");
	exit();
}


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
	<title>Notification</title>
	<!-- bootstrap link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php

if(isset($_GET['notf']))
{
	$n_id = $_GET['notf'];
	$result=mysqli_query($link,"update notifications set read_n='0' where id='$n_id'");
	header("location:indexn.php");
}
	
	$data = mysqli_query($link,"select * from notifications");
	$new_data = mysqli_query($link,"select * from notifications where read_n=1");
	$count = mysqli_num_rows( $new_data );
	$countd = mysqli_num_rows( $data );

?>

	<div class="dropdown">

	    All Notifications<?php echo "(".$countd.")";?>
	    <span class="caret"></span>
	  <!-- </button> -->
		  <ul >
		  	<?php
		  	foreach ($data as $value) {
		  		# code...
		  	
		  	?>
		    <?php
		    if($value['read_n'] == '1'){
		    ?>
		    <li class="alert-danger"><a href="?notf=<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
		    <?php
		    }else{


		    ?>
		     <li class="list-group-item"><?php echo $value['title'];?></li>
		    <?php
		         }
		    	}
		  	?>
		  </ul>
	</div>

	<a href="student_dashboard.php">Previous</a>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
