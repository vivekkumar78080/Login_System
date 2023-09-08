<?php 
include 'partials/_dbconnect.php';

if(isset($_GET['deleteid']))
{

    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `users` WHERE `S No`= $id";
    $result_del = mysqli_query($conn,$sql);
    if($result_del)
    {
        //echo "Deleted Successfully";
        header('location:show.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>