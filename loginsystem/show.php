<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">Show Records</h1>

<table border="1">
<tr>
  <th>S No</th>
  <th>Name</th>
  <th>Email</th>
  <th>Phone Number</th>
  <th>Password</th>
  <th>Operations</th>

  
  </tr>


<?php
session_start();
?>


<?php
include("partials/_dbconnect.php");
error_reporting(0);
$userprofile = $_SESSION['email'];
if($userprofile ==true)
{

}
else{
    header('location:login.php');
}

$query = "SELECT * FROM users";
$database = mysqli_query($conn, $query);
$num = mysqli_num_rows($database);


if($num!=0)
{
    while(($result = mysqli_fetch_assoc($database)))
    {
        echo "
        <tr>
        <td>" . $result['S No']. "</td>
        <td>" . $result['Name']. "</td>
        <td>" . $result['Email']. "</td>
        <td>" . $result['Phone Number']. "</td>
        <td>" . $result['Password']. "</td>
        ";

        ?>
<td>
    <button><a href="update.php?updateid=<?php echo $result['S No'];?>">Update</a></button>
    <button><a href="delete.php?deleteid=<?php echo $result['S No'];?>">Delete</a></button>
  </td>
        <?php
    }

}


else{
    echo "No Records Found";
}

 
?>

</table>
</body>
</html>