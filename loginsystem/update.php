<?php 
include 'partials/_dbconnect.php';

if(isset($_GET['updateid']))
{

    $id = $_GET['updateid'];
    $sql = "SELECT * FROM `users` WHERE `S No`= $id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result))
    {

      while($row = mysqli_fetch_assoc($result))
      {
        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <h1 class="text-center">
            Update</h1>
            <p class="text-center">Update the existing record</p>

        

        <form action="" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Name</label>
    <input type="text" value = "<?php echo $row['Name'] ?>" placeholder = "Enter Your Name" maxlength = 50 class="form-control" id="name" name= "name" required aria-describedby="emailHelp">
  </div>
        
  <div class="mb-3">
    <label for="username" class="form-label">Email</label>
    <input type="email" value = "<?php echo $row['Email'] ?>" placeholder = "Enter Your Email" maxlength = 20 class="form-control" id="username" name= "email" required aria-describedby="emailHelp">
  </div>
  
  <div class="mb-3">
    <label for="username" class="form-label">Phone Number</label>
    <input type="number" value = "<?php echo $row['Phone Number'] ?>" placeholder = "Enter Your Phone Number" maxlength = 11 class="form-control" id="phonenumber" name= "phonenumber" required aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" value = "<?php echo $row['Password'] ?>" placeholder = "Enter Your Password" maxlength = 10 class="form-control" id="password" name="password" required>
  </div>

  <button type="submit" name = "update" class="btn btn-primary">Update</button>
</form>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
      }
    }
   
 if(isset($_POST['update']))
 {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $password = $_POST['password'];
  $sql = "UPDATE `users` SET `Name` = '$name', `Email` = '$email', `Phone Number` = '$phonenumber', `Password` = '$password' WHERE `S No`= $id";
  $result = mysqli_query($conn, $sql);
  if($result){
    header('location:show.php');
    echo "<script>alert('Data Updated Successfully')</script>";
  }
 }   
}
?>