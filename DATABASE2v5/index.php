<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FightClub</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%2210 0 100 100%22><text y=%22.90em%22 font-size=%2290%22>🏋️</text></svg>">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/gym3.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .home {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }


        .start-today {
        background-color: rgba(0, 0, 0, 0.6); 
        padding: 50px 0;
    }

    .start-today .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .start-today .content {
        display: flex;
        align-items: center;
    }

    .start-today .text {
        color: white;
        margin-right: 20px;
    }

    .start-today .img img {
        opacity: 0.8; 
    }

   
    .btn {
        background-color: red;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: darkred;
    }
    
    </style>
</head>

<body>

<header>
    <div class="container">
        <div class="logo">
            <a href="">FightClub <span>Gym</span></a>
        </div>
        <a href="javascript:void(0)" class="ham-burger">
            <span></span>
            <span></span>
        </a>
        <div class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                |<li><a href="about.php">About</a></li>
                |<li><a href="schedule.php">Schedule</a></li>
                |<li><a href="price.php">Price</a></li>
                |<li><a href="contact.php">Contact</a></li>
                |<li><a href="login.php">Logout</a></li>
            </ul>
        </div>
    </div>
</header>

<section class="home wow flash" id="home">
    <div class="container">
        <h1> <span>WELCOME TO FIGHTCLUB GYM</span> <hr></h1><br><br><br>
        <h1 class="wow slideInLeft" data-wow-delay="1s"><span>GET Back TO</span> <span> Work!</span></h1>
        <h1 class="wow slideInRight" data-wow-delay="1s"> <span>No Excuses</span> <span>My friend.</span></h1>
        
    </div>
</section>

<section class="start-today">
    <div class="container">
        <div class="content">
            <div class="box text wow slideInLeft">
                <h2>Start Your Training Today</h2>
                <p> Embark on your fitness journey today at our gym! Our state-of-the-art facilities, experienced
                    trainers, and diverse workout programs await you. Start achieving your health and fitness goals
                    now and discover the benefits of an active lifestyle.
                </p>
                <a href="price.php" class="btn">Start Now</a>
            </div>
            <div class="box img wow slideInRight">
                <img src="images/gym2.jpg" alt="start today" />
            </div>
        </div>
    </div>
</section>

</body>
</html>
