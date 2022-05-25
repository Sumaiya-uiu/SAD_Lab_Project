<?php
$link = mysqli_connect("localhost", "root", "", "onlineexam");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light"
style="margin-bottom:5px;background-color:#ffffff;">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item active">
      <a class="nav-link fs-4" href="student_dashboard.php"> 
        <img src="images/logo.PNG" alt="" width="60" height="40">
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link fs-4 w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black" href="enrolledexam.php" style=" font-size: 2rem;color:#000000;">Enroll Exam</a>
    </li>
    <li><a class="nav-link fs-4 w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black" href="ide/ui/ide.html"style=" font-size: 2rem;color:#000000;">Compiler</a></li>
    
    <div class="dropdown">
      <button class="btn dropdown-toggle fs-4 w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style=" font-size: 2rem;color:#000000;">
        Forum
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="CreateNewPost.php">Create New post</a>
        <a class="dropdown-item" href="my_post.php">My Post</a>
        <a class="dropdown-item" href="other_post.php">Other Posts</a>
        
      </div>
    </div>

</ul>
<div class="d-flex">
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
         <li><a href="indexn.php"><?php echo $value['title'];?></a></li>
        <?php
        }
       }
        ?>
  </div>
</div>

  </a>
  <a class="nav-link w3-bar-item w3-button" style="font-size: 1.2rem;color:#000000;" href="student_profile.php">Profile(<?php echo Session::get('name') ?>)</a>
  <a class="nav-link w3-bar-item w3-button "  style="font-size: 1.2rem;color:#000000" href="?action=logout"><i class="fa fa-sign-in"></i></a>  
</div>
</div>

</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

