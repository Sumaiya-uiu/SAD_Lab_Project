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


include '../class/Faculty.php';

$faculty = new Faculty();

$facultyId =  Session::get('id');

$result = $faculty->getFacultyById($facultyId);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="icon" href="../images/title.png" type="image/png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background-color: #6f1f3a">
    <!--Navigation part starts-->
<?php include 'navbar.php'; ?>
    <!--Navigation part ends-->


    <!-- Exam list part Starts -->


    <div class="container">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title">Faculty Profile Info.</h3>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table id="exam_data_table" class="table table-secondary table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Institute Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                foreach ($result as $value) {
                            ?>
                                    <tr>

                                        <td><img src="<?php echo $value['img'] ?>" width="200" height="200"></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['uni_name']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-danger" href="faculty_update.php?facultyId=<?php echo Session::get('id'); ?>">Edit</a>
                                        </td>
                                    </tr>
                            <?php
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