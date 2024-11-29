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
                padding-top: 3.5%;
                padding-bottom: 3.5%;
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
                flex: 3;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                background-image: url('images/background.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                animation: moveBackground 10s steps(4) infinite;
            }

            @keyframes moveBackground {
                0% {
                    background-position: 0 0; /* Start at top-left */
                }
                25% {
                    background-position: 100% 0; /* Move to the right */
                }
                50% {
                    background-position: 100% 100%; /* Move to the bottom-right */
                }
                75% {
                    background-position: 0 100%; /* Move to the bottom-left */
                }
                100% {
                    background-position: 0 0; /* Return to top-left */
                }
            }

            .title {
                background-color: #1a1a1a;
                width: 100%;
                height: 22.5%;
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
        <title>Registration Form</title>
    </head>
    <body>

        <div class="container">
            <div class="leftside">   
            </div>
            
            <div class="rightside">
                <div class="title">
                    <h2> WELCOME TO FIGHTCLUB GYM </h2>
                </div>

                <div class="space"></div>

                <div class="form">
                    <h3> Register </h3>

                    <form action="register.php" method="post">
                        <label for="lastname">Name:</label>
                        <input type="text" id="lastname" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>

                        <div class="button-container">
                            <button type="submit" name="reg">Register</button>
                            <a href="login.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

<?php
if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_password = $_POST['password']; 
    $encpassword = password_hash($user_password, PASSWORD_DEFAULT); // Encrypt the password

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gym";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO members (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $encpassword);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Registration successful!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error: Could not register.');</script>";
    }

    $stmt->close();
    $conn->close();
}

?>
