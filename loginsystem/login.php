<?php
session_start();
$login = false;
$showError = false;
if(isset($_POST['login']))
  {
    include 'partials/_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash = md5($password); 
    
        //$sql = "Select * from users where username='$username' AND password='$password'";
        $sql = "SELECT * FROM users WHERE `Email`='$email ' AND `Password` = '$hash'";
        $result = mysqli_query($conn, $sql) or die('Query failed,');
        $num = mysqli_num_rows($result);
        if(!empty($num)){
          header("location: welcome.php");
          //die('logged in');
           $_SESSION['email'] = $row['Email'];
           

             //header('location:show.php');
              $login = true;
              $_SESSION['loggedin']= true;
              $_SESSION['email']= $email;
            
            
          }else{
            //die('log in failed');

            $showError = "Invalid Credentials";
          }

         
}
        
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    
  </head>
  <body>
    <?php require 'partials/_nav.php'?>

    <?php
    if($login)
    {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are logged in.
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

    <div class="container">
        <h3 class="text-center">
            Sign In</h3>
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <form action="" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">UserName</label>
    <input type="email" placeholder = "Enter Your UserName" class="form-control" id="name" name= "email" required aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" placeholder = "Enter Your Password" class="form-control" id="password" name="password" required>
  </div>
  <button onclick = "validate()" type="submit" class="btn btn-primary" name="login">Login</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  </body>
</html>