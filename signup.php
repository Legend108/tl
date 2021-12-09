<?php
 include 'partials/connect.php';
 session_start();
 $errorValue = '';
 $errorDetails = '';
 if($_SERVER['REQUEST_METHOD'] =='POST') {
 $alert = false;
 $username = $_POST["username"];
 $password = $_POST["password"];
 $confirmed_password = $_POST["cpassword"];
 $email = $_POST["email"];
 $exists = false;
 $confirmUnusedUsername = "SELECT * FROM `users` WHERE username='$username'";
 $quered = mysqli_query($connected, $confirmUnusedUsername);
 $numFoundConfirm = mysqli_num_rows($quered);

 if($numFoundConfirm > 0) {
  //  $exists = true;
   $errorDetails = "Username has been taken";
 } else {
  //  $exists = false;
 if($username and $password and $confirmed_password) {
     if(($password == $confirmed_password)) {
         $squery = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp());";

         $res = mysqli_query($connected, $squery);

         if($res) {
             $alert = true;
             $_SESSION['emailVerified'] = false;
        }
     } else {
       $errorDetails = "Password's do not match";
    }
 }
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up</title>
  </head>
  <body>
  <?php require "./partials/navbar.php"; ?>
 <?php
 if($_SERVER['REQUEST_METHOD'] =='POST') {
 if($alert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span>Your account has been succesfully <strong>created!</strong> You can now <a href="/mydashboard/login.php" class="link">login</a> with the details!</span> 
  </div>';
 } else {
     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     <span>' . $errorDetails . '</span>
   </div>';
 }
}
  ?>
  
  <script>
    var alertList = document.querySelectorAll('.alert');
    alertList.forEach(function (alert) {
      new bootstrap.Alert(alert)
    })
  </script>
  

  <div class="container text-center mt-5">
      <h1>Sign up here</h1>

      <form action="/mydashboard/signup.php" method="POST">
  <div class="mt-5">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
  </div>
  <div class="mt-5"> 
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mt-5">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
  </div>
  <!-- <div class="mt-5">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div> -->
  <button type="submit" class="btn btn-outline-success mt-5">Sign Up</button>
</form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
