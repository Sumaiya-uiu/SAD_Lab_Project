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

	<link rel="icon" href="images/title.png" type="image/png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

?>


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
      <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
    </svg><?php if($count > 0) {echo "(".$count.")";} ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  	<?php 
  	foreach ($data as $value) {
  	
  	?>
       
        <?php
        	if ($value['read_n'] == '1') {

        ?>
        <li class="alert-info"><a href="?notf=<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
        <?php

        	}else{
        ?>
         <li><?php echo $value['title'];?></li>
        <?php
        }
       }
        ?>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>