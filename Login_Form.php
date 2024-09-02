<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $mail = $_POST['Email'];
        $pass = $_POST['Password'];
        $con_pass = $_POST['ConfirmPassword'];

        if(!empty($mail) && !empty($pass))
        {
            $query = "SELECT * FROM form WHERE Email = '$mail'";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['Password'] == $pass)
                    {
                        header("location: index.php");
                        exit();
                        
                    }
                }
            }

            echo "<script type='text/javascript'> alert('Wrong E-mail or Password!')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Wrong E-mail or Password!')</script>";
            header("location: Login_Form.php");
        }
    }
?>

<!--SUDDIVISIONE PHP E HTML-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="Login_Form.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="Transition">
        <h1 class="Transition-text">
            <span class="Transition-Animation">Log</span><span class="Transition-Animation">in</span>
        </h1>
    </div>

    <header>
        <div class="wrapper">
            <form method="POST" >
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="E-mail" name="Email" required>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="Password" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>
    
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div>
    
                <input type="submit" class="btn" placeholder="Login">
    
                <div class="register-link">
                    <p>Don't have an account? <a href="Register_Form.php">Register</a></p>
                </div>
            </form>
        </div>
    </header>

    <script src="Login_Form-animation.js"></script>
</body>

</html>