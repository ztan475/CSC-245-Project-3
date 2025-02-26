<!-- Programmer: Junjie Zhao -->

<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Φval</title>
    <script>
        window.history.forward();
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #f8f8f8;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header img {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            height: 60px;
        }
        h1 {
            font-size: 320px;
            margin-top: 0px;
            margin-bottom: 0px;
        }
        h2 {
            font-size: 50px;
        }
        h3 {
            font-size: 30px;
        }
        h4 {
            font-size: 20px;
        }
        .container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            height: 100vh;
        }
        .project-intro {
            display: flex;
            flex-direction: column; 
            align-items: center;
        }
        .team-section {
            display: flex;
            flex-direction: column; 
            align-items: center;
        }
        .team-members {
            display: flex;
            flex-direction: row; 
            margin-bottom: 20px;
        }
        .team-member {
            display: flex;
            align-items: center;
            flex-direction: column; 
            margin-bottom: 20px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .team-member img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
        .social-links{
            display: flex;
            align-items: center;
            flex-direction: row; 
            padding-left: 5px;
            padding-right: 5px;
        }
        .social-links img{
            border-radius: 0%;
            padding-left: 5px;
            padding-right: 5px;
            width: 40px;
            height: 40px;
        }
        .button-container {
            padding-top: 20px;
        }
        .button-container a {
            font-size: 50px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<header>
    <img src="ur-logo.svg">
</header>

<div class="container">
    <section class="project-intro">
        <h1>Φval</h1>
        <h3>A image evaluation system based on neuron network models</h3>
        <div class="button-container">
            <a href="rating.php">Start Rating Photos</a>
        </div>
    </section>
    
    <section class="team-section">
        <h2>Team Members</h2>
        <div class="team-members">
            <div class="team-member">
                <img src="Junjie Zhao.jpg">
                <h3>Junjie Zhao</h3>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/junjie-zhao-53808228b/">
                        <img src="linkedin.svg">
                    </a>
                    <a href="https://github.com/my-name-is-william">
                        <img src="github.svg">
                    </a>
                </div>
            </div>

            <div class="team-member">
                <img src="Zachary Tan.jpg">
                <h3>Zachary Tan</h3>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/zacharystan/">
                        <img src="linkedin.svg">
                    </a>
                    <a href="https://github.com/ztan475">
                        <img src="github.svg">
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

</body>
</html>