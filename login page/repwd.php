<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="repwd.css">
    <title>set password</title>

</head>

<body>
    <div class="login-box">
        <img src="passkey.png" alt="Loding...">
        <h1>Set new <span> Password</span></h1>
        <p class="pro">Your new password must be different to previously used password</p>
        <form action="repwd.php" method="post">
            <label>Password</label>

            <input type="password" placeholder="" name="pwd" required />
            <label>Confirm Password</label>

            <input type="password" placeholder="" name="cpwd" required />

            <?php

            if (isset($_POST['submit'])) {
                $pwd = @$_POST["pwd"];
                $cpwd = @$_POST["cpwd"];

                $conn = mysqli_connect("localhost", "root", "8827", "php");

                if (!$conn) {
                    die("Sorry we failed to connect: " . mysqli_connect_error());
                } elseif ($pwd != $cpwd) {
                    // $query="select * from singup where Username='$user' and Password='$pwd'";
                    // $result=mysqli_query($conn,$query);
                    // $count=mysqli_num_rows($result);

                    // if($count>0){
                    //    header("location:pwdsuccess.html");
                    // }
                    // else {
                    //     echo "login unsuccessful";
                    //     }

                    $msg = ' <div style="color:rgb(219, 68, 68) ;">Password must be match</div>
                        <style>
                         form input{
                             border: 1px solid rgb(219, 68, 68);
                         }
                        </style>';
                    echo $msg;
                } else {

                    session_start();
                    $user=$_SESSION['username'];


                    $query = "UPDATE `singup` SET `Password`='$pwd' WHERE Username='$user' ";
                    $result = mysqli_query($conn, $query);
                    
                    if($result)
                    {   session_start();
                        session_unset();
                        session_destroy();
                        header("location:pwdsuccess.html");
                    }
                    else{
                        die("Sorry we failed to connect: " . mysqli_connect_error());    
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