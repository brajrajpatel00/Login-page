<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login | By Code Info</title>
  <link rel="stylesheet" href="login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="login-box">

    <h1>Login</h1>
    <?php

    if (isset($_POST['submit'])) {
      $user = $_POST["uname"];
      $pwd = @$_POST["pwd"];
      $errors = array();

      $conn = mysqli_connect("localhost", "root", "8827", "php");

      if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
      } else {
        $query = "select * from singup where Username='$user' and Password='$pwd'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
          header("location:https://www.codewithharry.com/");
        } else {
          $msg = '<p class="error">Invalid Username or Password</p>
          <style>
           .login-box {
             height: 400px;
           }
          </style>';
          echo $msg;
        }
      }
    }

    ?>
     
          
    <form action="login.php" method="post">
      <label>Username</label>
      <input type="text" placeholder="" name="uname" required />
      <label>Password</label>
      <input type="password" placeholder="" name="pwd" required />
      <div class="forgot">
        <a href="forgot.php">Forgot Password?</a>
      </div>

      <input type="submit" value="Submit" name="submit" />
    </form>
  </div>
  <p class="para-2">
    Not have an account? <a href="singup.php">Sign Up Here</a>
  </p>
</body>

</html>