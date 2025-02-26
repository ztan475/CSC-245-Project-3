<!-- Programmer: Junjie Zhao -->

<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // 禁用缓存
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for your participation</title>
    <script>
        window.history.forward();
    </script>
    <style>
        
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container{
            display: flex;
            flex-direction: column; 
            align-items: center;
            padding: 20px;
            width: 80%;
            height: 80%;
            background: #fff;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .sub-container {
            display: flex;
            flex-direction: row; 
            align-items: center;
            background: #fff;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        h4 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        h5 {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .image{
            width: 36%;
        }

    </style>
</head>
<body>
    <div class="container">
        <img src="success.svg" class="image">
        <h1>Thank you for your rating!</h1>
        <a href="rating.php">
            <h2>Rate Again</h2>
        </a>
        <a href="index.php">
            <h2>Back to Homepage</h2>
        </a>
    </div>            
</body>
</html>