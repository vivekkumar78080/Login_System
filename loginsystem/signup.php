<?php
$showAlert = false;
$showError = false;
$exists = false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'partials/_dbconnect.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $password = $_POST["password"];
    
    $existSql = "SELECT * FROM `users` WHERE name = '$email' ";
    $result = mysqli_query($conn, $existSql);
    if(mysqli_num_rows($result) > 0)
    {
      $exists = true;
      $showError = "Email Already Exists";
    }
    else{
      $exists = false;
    }

    if($password)
    {
      $hash = md5($password);
        $sql = "INSERT INTO `users` (`Name`, `Email`, `Phone Number`, `Password`) VALUES ('$name', '$email', '$phonenumber', '$hash')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
          $showAlert = true;
        }
      }
        else
        {
          $showError = "Passwords do not match";
        }
    }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>


    <?php require 'partials/_nav.php'?>

    <?php
    if($showAlert)
    {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is created now you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    if($showError)
    {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

   <script>
    function myfun(){
      
    }
    </script>

<script type = "text/javascript">
      function validate(){
        var email = document.getElementById("username").value;
        var regx = /^([a-z 0-9\.-]+)@([a-z0-9-]+).([a-z]{2,8})(.[a-z]{2,8})?$/;

        if(regx.test(email)){
           document.getElementById("username").innerHTML="Valid";
        }
        else{
          document.getElementById("username").innerHTML= "Inavalid";
        }
      }
      </script>

<script type = "text/javascript">
      function validate(){
        var number = document.getElementById("phonenumber").value;
        var regx = /[7-9]\d{9}/;

        if(regx.test(phonenumber)){
           document.getElementById("phonenumber").innerHTML="Valid";
        }
        else{
          document.getElementById("phonenumber").innerHTML= "Inavalid";
        }
      }
      </script>

    <div class="container">
        <h1 class="text-center">
            Signup</h1>
            <p class="text-center">Want to sign up or create an account fill out this form</p>
        <form action="/loginsystem/signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Name</label>
    <input type="text" placeholder = "Enter Your Name" maxlength = 20 class="form-control" id="username" name= "name" required aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="username" class="form-label">Email</label>
    <input type="email" placeholder = "Enter Your Email" maxlength = 50 class="form-control" id="username" name= "email" required aria-describedby="emailHelp">
  </div>
  
  <div class="mb-3">
    <label for="username" class="form-label">Phone Number</label>
    <input type="text" placeholder = "Eneter Your Phone Number" maxlength = 11 class="form-control" id="username" name= "phonenumber" required aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" placeholder = "Enter Your Password" maxlength = 10 class="form-control" id="password" name="password" required>
  </div>

  <button onclick = "validate()" type="submit" class="btn btn-primary">Signup</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  </body>
</html>