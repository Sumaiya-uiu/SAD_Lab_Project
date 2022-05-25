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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants List</title>

    <link rel="icon" href="../images/title.png" type="image/png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style type="text/css">
      body{
        background-color: #6f1f3a;
    }

    
</style>

<body>
    <!--Navigation part starts-->
<?php include 'navbar.php'; ?>
    <!--Navigation part ends-->


    <!-- Exam list part Starts -->


    <div class="container">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title">Student List</h3>
                    </div>
                </div>
            </div>


            <div class="card-body">

                <?php
                if (isset($result)) {
                    echo $result;
                    unset($result);
                }
                ?>

                <div class="table-responsive">
                    <table id="exam_data_table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Student Name</th>
                                <th>Student Email</th>
                                <th>Student Uni ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                          $query = "SELECT * from std_tbl";

                          if ($result = mysqli_query($link, $query)) {
                              /* fetch associative array */
                              while ($row = mysqli_fetch_assoc($result)) {
                                  $i=1;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['uni_roll_no']; ?></td>
                                        <td><?php echo $row['uni_name']; ?></td>
                                        <td><button><a>Message</a></button></td>
                                       
                     
                                        
                                    </tr>
                            <?php
                            $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

    <!-- Exam list part Ends -->


</body>

</html>