
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:5px;background-color: ##ffffff;">
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item active">
      <!-- <a href="#" class="w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black">1</a> -->
      <a class="nav-link fs-4" href="dashboard.php">
        <!-- <img src="../images/logo.jpeg"> -->
        <img src="../images/logo.PNG" alt="" width="60" height="40">
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link fs-4 w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black" href="enroll_exam_list.php" style=" font-size: 2rem;color:#000000;">Enroll Request List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link fs-4 w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black" href="enroll_student_results.php"style=" font-size: 2rem;color:#000000;">Results</a>
    </li>
    <li class="nav-item">
      <a class="nav-link fs-4 w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black" href="student_list.php"style=" font-size: 2rem;color:#000000;">Participants</a>
    </li>

     <li class="nav-item">
      <a class="nav-link fs-4 w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-black" href="announcement.php"style=" font-size: 2rem;color:#000000;">Announcement</a>
    </li>

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
  <a class="nav-link w3-bar-item w3-button" style="font-size: 1.2rem;color:#000000;" href="faculty_profile.php">Profile(<?php echo Session::get('name') ?>)</a>
  <a class="nav-link w3-bar-item w3-button "  style="font-size: 1.2rem;color:#000000" href="?action=logout"><i class="fa fa-sign-in"></i></a>  
</div>
</div>

</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
