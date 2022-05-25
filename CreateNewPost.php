<?php
include 'lib/Session.php';
include 'session.php'; 
include 'lib/Database.php';
include 'class/Format.php';
if (isset($_GET['action']) && isset($_GET['action']) == 'logout') {
    Session::destroy();
    header("Location:index.php");
    exit();
}
    $success= false;
if(isset($_POST["submitbt"]))
    {
        $facultyId =  Session::get('id');
        $topic  =   $_POST["topic"];
        $section =  $_POST["section"];
        $post =  $_POST["postdescription"];
        // $sql= SELECT * FROM faculty_tbl;
        
        $sql_Post_In= "INSERT INTO post ( faculty_id, topic, section, post) VALUES ('$facultyId', '$topic', '$section', '$post' )";
        $Execute = mysqli_query($connectDB, $sql_Post_In);
        if($Execute){
            $success= true;

        }
        else
        {

            echo 'fail';
        }

    }
   


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>


    <link rel="icon" href="images/title.png" type="image/png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css" class="">
</head>

<style type="text/css">
  body{
    background-color: #6f1f3a;
}
h1{
    
    font-family: fantasy;
    color: #6f1f3a;
    background: -webkit-linear-gradient(#6f1f3a, #999999);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;

}


</style>

<body>
    <!--Navigation part starts-->
<?php include 'navbarstudent.php'; ?>
    <!--Navigation part ends-->

    <!-- header -->
    <header class="bg-light text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="fa-solid fa-pen-to-square"></i>Create New Post</h1>
            </div>
        </div>
    </div>
    </header>
    <?php
    if($success)
    {
       
       ?>
       <div class="alert alert-success" role="alert">
                                 Post Successfully added!
    </div>
       <?php
       
        
    }
    else{
        echo '';
    }
?>


    <div class="container py-2 b-8">
        <div class="card ">

            <div class="card-header">
            <?php
                $StudentName =  Session::get('name');
                echo "<b>Posted By :</b> ";
                echo $StudentName;

            ?>    
            <form method="POST" action="">
                <div class="form-group ">
                    <label for="" class="mb-2"><b>Topic</b></label>
                    <input type="text" class="form-control mb-2" id="topicname" name="topic" placeholder="Topic Name" required >
                </div>
            <div class="form-group ">
                <label for="exampleFormControlSelect1">
                    <span class="fieldinfo"><b>Choose forum Section:</b></span>
                </label>
                <select class="form-control-file py-2" id="section" name="section" >
                        <option value="Technology">Technology</option>
                        <option value="Programming">Programming</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Others">Others</option>
                    </select>
            </div>
          

        
            <div class="form-group">
                <!-- <div id="editor" name="postdescription"></div> -->
                <label for="" style="font-weight: 700; font-size: 20px;">Post:</label>
                 <textarea class="form-control" id="post" name="postdescription" rows="3" required></textarea>
            </div>
            
            <div class="col-lg-7 mb-2 py-3">
                <button type="submit" name="submitbt" class="btn btn-danger btn block"><i class="fa-solid fa-check"></i>Publish</button>
            </div>
            </form>
   

            </div>
        </div>    
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- <script src="app.js"></script> -->
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('post');
    </script>
    



</body>

</html>