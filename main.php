
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Portfolio Website</title>
</head>
<body>
 <?php
 include("nav.php");
 ?>
    <section class="home">
        <div class="home-img">
            <img src="images\profile 2.jpg" alt="">
        </div>
        <div class="home-content">
            <h1>Hi, It's <span> <?php
            echo $fname;
            ?></span></h1>
            <h3 class="typing-text">I'm a <span></span></h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus labore dolores esse. Odit similique doloribus tenetur doloremque, sunt commodi in ipsa repudiandae debitis deleniti blanditiis quibusdam quaerat neque asperiores ea.</p>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <a href="#" class="btn">Hire me</a>
        </div>
    </section>
</body>
</html>