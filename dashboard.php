<?php
include("session.php");
require('config.php');
$username = $_SESSION['username'];
$query    = "SELECT * FROM `users` WHERE username='$username'";
$result = mysqli_query($con, $query) or die(mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
 <!-- bootstrap css -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- js and jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    

</head>
<body>
    <div class="form">
    <h6>Dashboard</h6>
        <p>Hey, logged in with <?php echo $_SESSION['username']; ?>!</p>
    
        <?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>

<div class="form-group">

    <table class="table table-stripped">
    <tbody>
    <tr>
    <th scope="row"> Name</th>
    <td><?php echo $row['name'] ?></td>
    </tr>
    
    <tr>
    <th scope="row"> Contact</th>
    <td><?php echo $row['phn'] ?></td>
    </tr>
    <tr>
    <th scope="row"> City</th>
    <td><?php echo $row['city'] ?></td>
    </tr>
    <tr>
    <th scope="row"> State</th>
    <td><?php echo $row['state'] ?></td>
    <tr>
    <th scope="row"> DOB</th>
    <td><?php echo $row['dob'] ?></td>
    </tr>
    </tr>
    </tbody>
    </table>


<?php
$i++;
} ?>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>