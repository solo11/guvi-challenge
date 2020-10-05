<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
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
<?php
$exist = false;
    require('config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
      
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        
    
        $name    = stripslashes($_REQUEST['name']);

        $password = stripslashes($_REQUEST['password']);
     
      
        $dob = strtotime($_REQUEST["dob"]);
        $dob = date('Y-m-d H:i:s', $dob); 
        $city = stripslashes($_REQUEST['city']);
        $state = $_REQUEST['state'];
        $phn = stripslashes($_REQUEST['phnumber']);

        $query1    = "SELECT * FROM `users` WHERE username='$username'";
        $result1 = mysqli_query($con, $query1) or die(mysql_error());
        $rows1 = mysqli_num_rows($result1);
        if ($rows1 > 0) {
           $exist = true;
           echo "<div class='form'>
                  <h3>Email already exists</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>login</a> again.</p>
                  </div>";
        } else 
      { 
        $query    = "INSERT into `users` ( name, password, username,phn, dob, city, state )
                     VALUES ('$name', '$password', '$username', '$phn','$dob', '$city','$state' )";
        $result   = mysqli_query($con, $query);
        
        if ($result) {
          
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
                  
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here for <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
      }
      
    } else {
?>
    <form class="form register" action="" method="post">

    <div class="form-row">
    <div class="form-group col-md-10">
      <label for="Name">Name</label>
      <input type="text" class="form-control" name="name" id="Name" required>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="username" id="inputEmail4" placeholder="Email" required>
      <?php if($exist) {
       echo "<span> Email already exists </span>" ;
      }  ?>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" pattern=".{8,}" required>
      <small id="emailHelp" class="form-text text-muted">Must contain atleat 8 characters</small>
    </div>
  </div>
  <div class="form-group col-md-5">
  <label for="example-tel-input" class=" col-form-label">Contact</label>
  <input class="form-control" type="tel" name="phnumber" placeholder="Mobile Number" id="example-tel-input" pattern="[789][0-9]{9}" required>
  <small id="emailHelp" class="form-text text-muted">Enter 10 digit Mobile Number</small>
    </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" name="city" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" name="state" class="form-control" required>
        <option selected>Choose...</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
      </select>
    </div>
    
  </div>
  <div class="form-col form-group">
  <label for="dob">DOB</label>
    <input name="dob" type="date" required>
  </div>
  <div>
  
  <div id="sbtn"><button type="submit" class="btn btn-primary">Sign Up</button>
  </div></form></div>
  
<?php
    }
?>
</body>
</html>