<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FightClub gym</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%2210 0 100 100%22><text y=%22.90em%22 font-size=%2290%22>🏋️</text></svg>">
  <script defer>
        window.onload = function() {
            const images = document.querySelectorAll(".gallery .box img");
            images.forEach((img) => {
                img.style.width = "700px";
                img.style.height = "700px";
                img.style.objectFit = "cover";
            });
        };
    </script>

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
 <section class="gallery" id="gallery">
    <h2>Workout Gallery</h2>
    <div class="content">
        <div class="box wow slideInLeft">
            <img src="images/gallery1.jpg" alt="gallery" /><p >Body Building<p>
			<div class="button-container">
			  <button name = 'login'>Add Class</button>
			</div>
        </div>
        <div class="box wow slideInRight">
            <img src="images/gallery2.jpg" alt="gallery" /><p>Power Lifting<p>
			<div class="button-container">
			  <button name = 'login'>Add Class</button>
			</div>
        </div>
        <div class="box wow slideInLeft">
            <img src="images/cfit.jpg" alt="gallery" /><p>Cross Fit<p>
			<div class="button-container">
			  <button name = 'login'>Add Class</button>
			</div>
        </div>
        <div class="box wow slideInRight">
            <img src="images/sdefense.jfif" alt="gallery" /><p>Self-defense<p>
			<div class="button-container">
			  <button name = 'login'>Add Class</button>
			</div>
        </div>
		
    </div>
</section>

    
</body>
</html>