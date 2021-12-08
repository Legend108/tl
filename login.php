<?php
 include 'partials/connect.php';
 if($_SERVER['REQUEST_METHOD'] =='POST') {
 $alert = false;
 $username = $_POST["username"];
 $password = $_POST["password"];
 $exists = false;
         $squery = "SELECT * FROM users WHERE username='$username' AND password='$password'";

         $res = mysqli_query($connected, $squery);

         $nums = mysqli_num_rows($res);

         if($nums == 1) {
             $alert = true;

             session_start();

             $_SESSION['logged'] = true;
             $_SESSION['username'] = $username;
            //  header('location: welcome.php');
         }
      }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
  <?php require "./partials/navbar.php" ?>
 <?php
 if($_SERVER['REQUEST_METHOD'] =='POST') {
 if($alert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span>You have logged in</span> 
  </div>';
 } else {
     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     <span>Invalid credentials</span>
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
      <h1>Log in here</h1>

      <form action="/mydashboard/login.php" method="POST">
  <div class="mt-5">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mt-5"> 
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
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
