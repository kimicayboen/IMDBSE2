<?php
session_start();
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "gym";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}


function verifyAdminLogin($conn, $email, $user_password) {
    if ($email == "admin@gmail.com" && $user_password == "1234") {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 'admin';
        $_SESSION['sid'] = session_id();
        header('location:admin.php');
        exit(); 
    } else {
        return false; 
    }
}

// Separate function for user verification
function verifyUserLogin($conn, $email, $user_password) {
    $stmt = $conn->prepare("SELECT * FROM members WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($user_password, $row['password'])) {
            $_SESSION['email'] = $row['email']; 
            $_SESSION['role'] = 'user'; 
            $_SESSION['sid'] = session_id();
            header('location:index.php');
            exit();
        } 
    } else {
        echo "<script type='text/javascript'>alert('Invalid email or password');</script>";
    }
}



if (isset($_POST['login'])) {
    $conn = connectToDatabase(); 
    $email = $_POST['email']; 
    $user_password = $_POST['password'];
    if (verifyAdminLogin($conn, $email, $user_password)) {
    }
    elseif (verifyUserLogin($conn, $email, $user_password)) {
    }
    else {
        echo "<script type='text/javascript'>alert('Invalid email or password');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                background-color: #212121;
                color: #ffffff;
                font-family: 'Oswald', sans-serif;
                margin: 0;
                height: 100vh;
                bottom: 0;
            }

            h1 {
                text-align: center;
                color: #ff0000;
                padding-top: 4.5%;
                padding-bottom: 4.5%;
                font-size: 2.5em;
            }

            h2 {
                text-align: center;
                color: #ff0000;
                margin-top: 2.5%;
                font-size: 2.5em;
            }

            form{
                width: 300px;
                margin: 0 auto;
                padding: 20px;
                border: 1px hidden black;
                border-radius: 10%;
            }

            label{
                display: block;
                margin-top: 5px;
                margin-bottom: 5px;
                color: #ccc;
            }

            input {
                width: 92%;
                padding: 10px;
                border: 1px solid #333;
                border-radius: 3px;
                background-color: #2e2e2e;
                color: #fff;
                font-size: 16px;
            }

            .button-container {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            button {
                padding: 10px 20px;
                border: 1px solid #ff0000;
                border-radius: 3px;
                background-color: #ff0000;
                color: #fff;
                font-size: 16px;
                cursor: pointer;
                transition: all 0.2s ease-in-out;
            }

            button:hover {
                background-color: #d00000;
            }

            a {
                padding: 10px 20px;
                border: 1px solid #ccc;
                border-radius: 3px;
                background-color: #333;
                color: #fff;
                font-size: 16px;
                text-decoration: none;
                transition: all 0.2s ease-in-out;
            }

            a:hover {
                background-color: #444;
            }

            .container {
                display: flex;
                height: 99.95%;
            }

            .leftside, .rightside {
                max-height: 100%;
                overflow: auto;
            }
            
            .leftside {
                flex: 1;
                background-image: url('images/login.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .rightside {
                flex: 2;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                background-image: url('images/background.jpg');
                background-size: cover;
                background-repeat: no-repeat;
            }

            .title {
                background-color: #1a1a1a;
                width: 100%;
            }

            .space {
                height: 15%;
            }

            .form {
                padding-top: 15px;
                padding-bottom: 15px;
                background-color: #212121;
                width: 35%;
                border: 1px hidden black;
                border-radius: 10px;
            }

        </style>
        <title>Login Form</title>
    </head>

    <body>
        <div class="container">
            <div class="leftside">   
            </div>

            <div class="rightside">
                <div class="title">
                    <h1> WELCOME TO FIGHTCLUB GYM </h1>
                </div>

                <div class="space">   
                </div>

                <div class="form">
                    <h2> Login </h2>
                    
                    <form action="login.php" method="post">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>

                        <div class="button-container">
                            <button type = 'submit' name = 'login'>Login</button>
                            <a href="register.php">Create an account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
