<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FightClub Gym</title>
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

    <section class="about" id="about">
        <div class="container">
            <div class="content">
                <!-- First Box -->
                <div class="box wow bounceInUp animated">
                    <div class="inner">
                        <div class="img">
                            <img src="images/logo.png" alt="about" />
                        </div>
                        <div class="text">
                            <h4>Free Consultation</h4>
                            <p>We offer free consultations at our gym, providing you with personalized fitness
                                assessments and expert guidance to kickstart your fitness journey. Take advantage of
                                this opportunity to discuss your goals and create a customized plan with our experienced
                                trainers.</p>
                        </div>
                    </div>
                </div>
                <!-- Second Box -->
                <div class="box wow bounceInUp animated" data-wow-delay="0.2s">
                    <div class="inner">
                        <div class="img">
                            <img src="images/about3.jpg" alt="about" />
                        </div>
                        <div class="text">
                            <h4>Best Training</h4>
                            <p>Achieve your fitness goals with the best training at our gym. Our expert trainers provide
                                personalized workouts and guidance to help you maximize results and reach your peak
                                performance.</p>
                        </div>
                    </div>
                </div>
                <!-- Third Box -->
                <div class="box wow bounceInUp animated" data-wow-delay="0.4s">
                    <div class="inner">
                        <div class="img">
                            <img src="images/gym3.jpg" alt="about" />
                        </div>
                        <div class="text">
                            <h4>Build Perfect Body</h4>
                            <p>Achieve your goal of building the perfect body at our gym with expert trainers and
                                state-of-the-art equipment. Our comprehensive fitness programs will help you sculpt and
                                strengthen your physique for the results you desire.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

<script>
   
    new WOW().init();
</script>

</html>
