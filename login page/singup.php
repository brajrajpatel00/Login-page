<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up | By Code Info</title>
    <link rel="stylesheet" href="singup.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="signup-box">
        <h1>Sign Up</h1>

        <form action="singup.php" method="post">
            <label>Name</label>
            <input type="text" placeholder="" name="name" required />
            <label>Mobile Number</label>
            <input type="number" placeholder="" name="mbn" required />
            <label>Email</label>
            <input type="email" placeholder="" name="email" required />
            <label>Username</label>
            <input type="text" placeholder="" name="username" required />
            <label>Password</label>
            <input class="pass" type="password" placeholder="" name="pwd" required />
            <label>Confirm Password</label>
            <input class="pass" type="password" placeholder="" name="pwd2" required />


            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST["name"];
                $mobile = $_POST["mbn"];
                $email = $_POST["email"];
                $uname = $_POST["username"];
                $pwd = @$_POST["pwd"];
                $cpwd = @$_POST["pwd2"];


                $servername = "localhost";
                $username = "root";
                $password = "8827";
                $database = "php";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Sorry we failed to connect: " . mysqli_connect_error());
                } elseif ($pwd == $cpwd) {

                    // $sql = "INSERT INTO `login` ( `Email`, `Password`) VALUES  ('$email', '$pass')";
                    $sql = "INSERT INTO `singup` (`Name`, `Mobile Number`, `Email`, `Username`, `Password`) VALUES ('$name', '$mobile', '$email', '$uname', '$pwd')";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {

                        header("location:submitted.html");
                    } else {
                        echo "<h1>Technical Error!!!!</h1>";
                    }
                } else {
                    $msg = ' <div style="color:rgb(220, 45, 45) ;">Password must be match</div>
        <style>
          .signup-box {
          height: 660px;
          
          }
          .pass{
            border: 1px solid rgb(220, 45, 45) ;
          }
        </style>';
                    echo $msg;
                }
            }
            ?>
            <input type="submit" value="Submit" name="submit" />
        </form>
        <p class="termcond">
            By clicking the Sign Up button,you agree to our <br />
            <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
        </p>
    </div>
    <p class="para-2">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</body>

</html>