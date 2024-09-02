<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $mail = $_POST['Email'];
        $pass = $_POST['Password'];

        if(!empty($mail) && !empty($pass))
        {
            $query = "INSERT INTO form (Email, Password) values ('$mail', '$pass')";

            mysqli_query($con, $query);

            echo "<script type='text/javascript'> alert('Successfully Register')</script>";

            header("location: index.php");
            exit();
        }
        else
        {
            echo "<script type='text/javascript'> alert('Please Enter some Valid Information!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="Login_Form.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form method="post">
            <h1>Registration</h1>
            <div class="input-box">
                <input type="email" placeholder="E-mail" name="Email" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="Password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm Password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>

            <input type="submit" class="btn" value="Registration">

            <div class="register-link">
                <p>Do you have an account? <a href="Login_Form.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>