<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgot.css">
    <title>Forgot</title>

</head>

<body>
    <div class="login-box">
        <img src="passkey.png" alt="Loding...">
        <h1>Forgot <span> Password?</span></h1>
        <p class="pro">No worries, we'll reset your password</p>

        <form action="forgot.php" method="post">
            <label>Username</label>

            <input type="text" placeholder="" name="user" required />
            <?php

            if (isset($_POST['submit'])) {

               

               
                $user = $_POST["user"];
                session_start();
                $_SESSION['username']=$user;


                $conn = mysqli_connect("localhost", "root", "8827", "php");

                if (!$conn) {
                    die("Sorry we failed to connect: " . mysqli_connect_error());
                } else {
                    $query = "select * from singup where Username='$user' ";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                        header("location:repwd.php");
                    } else {
                        $msg = ' <div class="error" style="color: rgb(219, 68, 68);"> Invalid Username</div>
           <style>
             .login-box{
                 height: 350px;
             }
           </style>';
                        echo $msg;
                    }
                }
            }

            ?>

            <input type="submit" value="Reset password" name="submit" />
            <p><a href="login.php"><span>&#8592;</span> Back to login</a> </p>
        </form>
    </div>

</body>

</html>