<?php
   include '../lib/Database.php';
    $success= false;
    
        global $connectDB;
       $id=$_GET['id'];
       $sql= "DELETE FROM post WHERE id='$id'";
       $Execute = mysqli_query($connectDB, $sql);
            if($Execute){
                $success= true;
                header("location:my_post.php");
            }
            else
            {
                echo 'fail';
            }



?>

