<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FightClub gym</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%2210 0 100 100%22><text y=%22.90em%22 font-size=%2290%22>🏋️</text></svg>">

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
<section class="contact" id="contact">
    <div class="container">
        <div class="content">
            <div class="box form wow slideInLeft">
                <form method="post" action="contact.php">
					<input type="text" name="name" placeholder="Enter Name">
					<input type="text" name="email" placeholder="Enter Email">
					<input type="text" name="mobile" placeholder="Enter Mobile">
					<textarea name="message" placeholder="Enter Message"></textarea>
					<button type="submit" name="send">Send Message</button>
				</form>

            </div>
            <div class="box text wow slideInRight">
                <h2>Get Connected with Gym</h2>
                <p class="title-p">Stay connected with our gym and stay on track with your fitness goals. You can also message here to reset your password or forgot the email you used.</p>
                <div class="info">
                    <ul>
                        <li><span class="fa fa-map-marker"></span> General Luna st., Baguio City - 2600</li>
                        <li><span class="fa fa-phone"></span> 0909235143641</li>
                        <li><span class="fa fa-envelope"></span>fightclubgym@gmail.com</li>
                    </ul>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/"><span class="fa fa-facebook"></span></a>
                    <a href="https://www.instagram.com/"><span class="fa fa-instagram"></span></a>
                </div>

                <div class="copy">
                    &copy; FightClub Gym. All Rights Reserved.
                    <br>

                </div>
            </div>
        </div>
        <p style="text-align: center;"></p>
    </div>
</section>   
</body>
</html>

