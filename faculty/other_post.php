<?php

include '../lib/Session.php';

include 'session.php'; 



include '../lib/Database.php';
include '../class/Format.php';
if (isset($_GET['action']) && isset($_GET['action']) == 'logout') {
    Session::destroy();
    header("Location:index.php");
    exit();
}


Session::checkSession();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other Post</title>

    <link rel="icon" href="../images/title.png" type="image/png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<style type="text/css">
    body{
        background-color: #6f1f3a;
    }
    h1{

        font-family: fantasy;
        color: #fff;
        background: -webkit-linear-gradient(#fff, #999);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-left: 50%;

    }


</style>


<body>
  <!--Navigation part starts-->
  <?php include 'navbar.php'; ?>
  <!--Navigation part ends-->

  <div style="height:10px; background:#27aae1;"></div>
  <!-- header -->
  <div class="container">
    <div class="row mt-4">


        <div class="col-sm-8">
            <h1>Contents of Forum </h1>
        </div>
        <div class="col-sm-4" style="min-height:40px;" background=green></div>

        <?php 
        global $connectDB;
        $sql = "SELECT * FROM post";
        $result = mysqli_query($connectDB, $sql);
        while($DataRows = mysqli_fetch_assoc ($result )){
            $array[]=$DataRows;


        }
        
        if(!empty($array))
            foreach($array as $i){        
                ?>
                <!-- <br>  -->

                <div class="card mb-3">

                    <div class="card-body">
                        <h4 class="card-title"><?php echo $i["topic"]; ?></h4>
                        <small class="text-muted ">Written by Faculty ID:<?php echo $i["faculty_id"]; ?> On <?php echo $i["datetime"]; ?></small>
                        <!-- <span style="float:right;" class="badge badge-light text-dark">Comments 20</span> -->
                        <hr>
                        <p class="card-text text-truncate">
                            <?php  echo $i["post"]; ?> </p>
                            <a href="Full_Post.php?id=<?php echo $i["id"] ?>"style="float:right;">
                                <span class="btn btn-info">Read More >> </span></a>
                            </div>

                        </div>


                    <?php } ?>


                </div>  





            </div>




            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script>
                (function()){
                    var v= document.createElement("script");v.
                }

            </script>


        </body>
        </html>