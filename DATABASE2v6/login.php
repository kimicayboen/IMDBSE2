<?php
session_start();
require_once "db_connection.php";

function verifyLogin($conn, $email, $user_password) {
    if ($email == "admin@gmail.com" && $user_password == "1234") {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $user_password;
        $_SESSION['sid'] = session_id();
        header('location:admin.php');
        exit(); 
    }

    $stmt = $conn->prepare("SELECT * FROM members WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($user_password, $row['password'])) {
            $_SESSION['email'] = $row['email']; 
            $_SESSION['sid'] = session_id();
            header('location:index.php'); 
            exit(); 
        } else {
            echo "<script>alert('Password incorrect.');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}

if (isset($_POST['login'])) {
    $conn = connectToDatabase();
    $email = $_POST['email']; 
    $user_password = $_POST['password']; 
    verifyLogin($conn, $email, $user_password); 
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_password = $_POST['password']; 
    $encpassword = password_hash($user_password, PASSWORD_DEFAULT); 

    $conn = connectToDatabase();
    $stmt = $conn->prepare("INSERT INTO members (name, email, password) VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $encpassword);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Registration failed. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Oswald', sans-serif;
            margin: 0;
            overflow: hidden;
            background: url('https://source.unsplash.com/1600x900/?gym,fitness') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 350px;
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        h2 {
            text-align: center;
            color: #fff;
        }

        label, input, button {
            display: block;
            width: 100%;
        }

        label {
            margin-bottom: 5px;
            color: #fff;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease, box-shadow 0.3s ease, color 0.3s ease;
        }

        @keyframes light-trace {
        0% {
            box-shadow: inset 0 0 0 0 rgba(255, 255, 255, 0.7), 0 0 0 0 rgba(255, 255, 255, 0.7);
        }
        25% {
            box-shadow: inset 2px 1px 0 0 rgba(255, 255, 255, 0.7), 0 -2px 0 0 rgba(255, 255, 255, 0.7);
        }
        50% {
            box-shadow: inset 0 2px 1px 0 rgba(255, 255, 255, 0.7), 2px 0 0 0 rgba(255, 255, 255, 0.7);
        }
        75% {
            box-shadow: inset -2px -1px 0 0 rgba(255, 255, 255, 0.7), 0 2px 0 0 rgba(255, 255, 255, 0.7);
        }
        100% {
            box-shadow: inset 0 0 0 0 rgba(255, 255, 255, 0.7), 0 0 0 0 rgba(255, 255, 255, 0.7);
        }
    }

    input:hover, .btn:hover {
        position: relative; 
        animation: light-trace 2.5s linear infinite;
        border-radius: 2px;
        outline: none;
    }

        .btn {
            background-color: #ff5722;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease, box-shadow 0.3s ease, color 0.3s ease;
        }

        .btn:hover {
            box-shadow: 0 6px 12px rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            backdrop-filter: blur(25px);
            background: rgba(0, 0, 0, 0.85);
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
        }

        .modal-content input {
            background: white;
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-close {
            color: #ff5722;
            font-size: 20px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .icon {
            font-size: 80px;
            color: #ff5722;
            text-align: center;
            display: block;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <i class="fas fa-dumbbell icon"></i>
        <h2>Login</h2>
        <form method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" name="login" class="btn">Login</button>
        </form>
        <div class="register-link">
            <button id="registerButton">Don't have an account? Register</button>
        </div>
    </div>

    <div class="modal" id="registerModal">
        <div class="modal-content">
            <span class="modal-close" id="closeModal">&times;</span>
            <i class="fas fa-running icon"></i>
            <h2>Register</h2>
            <form method="POST">
                <label for="name">Name</label>
                <input type="text" name="name" required>
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" name="password" required>
                <button type="submit" name="register" class="btn">Register</button>
            </form>
            <div class="login-link">
                <button id="LoginButton">Already have an account? Login</button>
            </div>
        </div>
    </div>

    <script>
        const registerButton = document.getElementById('registerButton');
        const registerModal = document.getElementById('registerModal');
        const closeModal = document.getElementById('closeModal');
        const loginButton = document.getElementById('LoginButton');

        registerButton.addEventListener('click', () => {
            registerModal.style.display = 'flex';
        });

        closeModal.addEventListener('click', () => {
            registerModal.style.display = 'none';
        });

        loginButton.addEventListener('click', () => {
            registerModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === registerModal) {
                registerModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>