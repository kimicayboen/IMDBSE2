<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FightClub Gym</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%2210 0 100 100%22><text y=%22.90em%22 font-size=%2290%22>🏋️</text></svg>">
    <script>
        function showPlanDetails(planName, price, description) {
            const container = document.createElement('div');
            container.id = 'popover';
            container.style.position = 'fixed';
            container.style.top = '22.5%';
            container.style.left = '83%';
            container.style.transform = 'translate(-50%, -50%)';
            container.style.padding = '20px';
            container.style.backgroundColor = '#fff';
            container.style.border = '5px solid red';
            container.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            container.style.zIndex = '1000';

            container.innerHTML = `
                <h3>${planName}</h3>
                <p>Price: ${price}</p>
                <p>${description}</p>
                <div style="text-align: right;">
                    <button onclick="confirmJoin('${planName}')">Confirm</button>
                    <button onclick="closePopover()">Cancel</button>
                </div>
            `;

            document.body.appendChild(container);
        }

        function closePopover() {
            const container = document.getElementById('popover');
            if (container) {
                document.body.removeChild(container);
            }
        }

        function confirmJoin(planName) {
            alert(`You have successfully joined the ${planName}!`);
            closePopover();
            window.location.href = 'price.php';
        }
    </script>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="index.php">FightClub <span>Gym</span></a>
        </div>
        <a href="javascript:void(0)" class="ham-burger">
            <span></span>
            <span></span>
        </a>
        <div class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="price.php">Price</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
    </div>
</header>
<section class="price-package" id="price">
    <div class="container">
        <h2>Choose Your Plans</h2>
        <p class="title-p">At our gym, you have the flexibility to choose the membership package that best aligns with your fitness journey. Explore our membership packages today and take the first step toward achieving your fitness goals.</p>
        <div class="content">
            <div class="box wow bounceInUp">
                <div class="inner">
                    <div class="price-tag">₱4,999 <small>monthly</small></div>
                    <div class="img"><img src="images/spartan.jpg" alt="price" /></div>
                    <div class="text">
                        <h3>Spartan Program</h3>
                        <p>A 12-week intense program to build extreme athletic strength and endurance</p>
                        <button class="btn" onclick="showPlanDetails('Spartan Program', '₱4,999', 'A 12-week intense program to build extreme athletic strength and endurance')">Join Now</button>
                    </div>
                </div>
            </div>
            <div class="box wow bounceInUp" data-wow-delay="0.2s">
                <div class="inner">
                    <div class="price-tag">₱3,999 <small>monthly</small></div>
                    <div class="img"><img src="images/price3.jpg" alt="price" /></div>
                    <div class="text">
                        <h3>Weight Loss Plan</h3>
                        <p>A personalized plan focused on losing fat within 8 weeks</p>
                        <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                    </div>
                </div>
            </div>
            <div class="box wow bounceInUp" data-wow-delay="0.4s">
                <div class="inner">
                    <div class="price-tag">₱4,499 <small>monthly</small></div>
                    <div class="img"><img src="images/price1.jpg" alt="price" /></div>
                    <div class="text">
                        <h3>Muscle Gain Plan</h3>
                        <p>A high-protein diet and weightlifting-focused plan</p>
                        <button class="btn" onclick="showPlanDetails('Muscle Gain Plan', '₱4,499', 'A high-protein diet and weightlifting-focused plan')">Join Now</button>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <div class="content">
            <div class="box wow bounceInUp">
                <div class="inner">
                    <div class="price-tag">
                        ₱3,499  <small> monthly</small>
                    </div>
                    <div class="img">
						<img src="images/yoga master.jpg" alt="price" />
                    </div>
                    <div class="text">
                        <div class="inner">
                            <h3>Yoga Mastery</h3>
                            <p>Unlimited yoga classes for one month</p>
                            <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box wow bounceInUp" data-wow-delay="0.2s">
                <div class="inner">
                    <div class="price-tag">
                        ₱2,999 <small> monthly</small>
                    </div>
                    <div class="img">
                        <img src="images/HIIT Bootcamp.jpg" alt="price" />
                    </div>
                    <div class="text">
                        <h3>HIIT Bootcamp</h3>
                        <p>	4-week high-intensity interval training sessions</p>
                        <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                    </div>
                </div>
            </div>
            <div class="box wow bounceInUp" data-wow-delay="0.4s">
                <div class="inner">
                    <div class="price-tag">
                        ₱4,399 <small> monthly</small>
                    </div>
                    <div class="img">
						<img src="images/Marathon Training Plan.jpg" alt="price" />
                    </div>
                    <div class="text">
                        <h3>Marathon Training Plan</h3>
                        <p>	10-week preparation for long-distance running</p>
                        <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                    </div>
                </div>
            </div>
        </div> 
        <div class="content">
            <div class="box wow bounceInUp">
                <div class="inner">
                    <div class="price-tag">
                        ₱3,999<small> monthly</small>
                    </div>
                    <div class="img">
						<img src="images/Strength & Conditioning.jpg" alt="price" />
                    </div>
                    <div class="text">
                        <h3>Strength & Conditioning </h3>
                        <p>A plan to improve overall body strength</p>
                        <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                    </div>
                </div>
            </div>
            <div class="box wow bounceInUp" data-wow-delay="0.2s">
                <div class="inner">
                    <div class="price-tag">
                        ₱5,999 <small>every subscription</small>
                    </div>
                    <div class="img">
                        <img src="images/Personal Training Plan.jpg" alt="price" />
                    </div>
                    <div class="text">
                        <h3>Personal Training Plan</h3>
                        <p>10 one-on-one personal training sessions</p>
                        <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                    </div>
                </div>
            </div>
            <div class="box wow bounceInUp" data-wow-delay="0.4s">
                <div class="inner">
                    <div class="price-tag">
                        ₱2,499<small> monthly</small>
                    </div>
                    <div class="img">
						<img src="images/Beginner Gym Guide.jpg" alt="price" />
                    </div>
                    <div class="text">
                        <h3>Beginner Gym Guide</h3>
                        <p>4-week plan for new gym-goers to build confidence and familiarize</p>
                      
                        <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="box wow bounceInUp">
                <div class="inner">
                    <div class="price-tag">
                        ₱2,599<small> monthly</small>
                    </div>
                    <div class="img">
						<img src="images/Flexibility Focus.jpg" alt="price" />
                    </div>
                    <div class="text">
                        <h3>Flexibility Focus</h3>
                        <p>	A 6-week plan to improve flexibility and mobility</p>
                        <button class="btn" onclick="showPlanDetails('Weight Loss Plan', '₱3,999', 'A personalized plan focused on losing fat within 8 weeks')">Join Now</button>
                    </div>   
                </div>  
            </div> 
    </div>
    </div>
</section>
</body>
</html>
