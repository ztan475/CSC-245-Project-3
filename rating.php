<!-- Programmer: Junjie Zhao -->

<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

$db = new SQLite3("photo.db");
$result = $db->query("SELECT * FROM photos");
$ID;
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    if($row["Count"] == 0){
        $ID = $row["ID"];
        break;
    }
}
$path = "photo/" . $ID . ".jpeg";
$db->close();

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating The Photo</title>

    <script>
        window.history.forward();
    </script>

    <style>
        
        body {
            display: flex;
            flex-direction: column; 
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        h2 {
            color: #333;
            font-size: 2vw;
        }

        h4 {
            font-size: 1vw;
            margin-top: 0.35vw;
            margin-bottom: 0.35vw;
        }

        h5 {
            margin-top: 0px;
            margin-bottom: 0px;
            font-size: 1vw;
        }

        .container {
            width: 96%;
            display: flex;
            align-items: center;
            padding-left: 2%;
            padding-right: 2%;
            padding-top: 2%;
            padding-bottom: 2%;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .title-image-container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 33.33%;
            height: 33.33vw;
        }

        .mcq-container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 33.33%;
            height: 33.33vw;
            border-radius: 15px;
            margin-left: 2%;
            margin-right: 2%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .frq-container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 33.33%;
            height: 33.33vw;
            border-radius: 15px;
        }

        .title{
            display: flex;
            flex-direction: column; 
            align-items: center;
            background: #fff;
            width: 100%;
            padding: 2%;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .image {
            border-radius: 15px;
            max-height: 20vw;
            max-width: 100%;
            margin: auto;
        }

        .radio-groups {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 100%;
        }

        .radio-group {
            display: flex;
            flex-direction: row; 
            align-items: center;
        }

        input[type="radio"] {
            display: none;
        }

        .custom-radio {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 1vw;
            color: #333;
        }

        .custom-radio::before {
            content: attr(data-label);
            width: 1.2vw;
            height: 1.2vw;
            margin-left: 0.4vw;
            margin-right: 0.4vw;
            margin-top: 0vw;
            margin-bottom: 0vw;
            padding: 0px;
            border-radius: 15px;
            border: 0.1vw solid black;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
        }

        input[type="radio"]:checked + .custom-radio::before {
            content: attr(data-label);
            background: black;
            border-color: black;
            color: white;
        }

        .long-frq {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 100%;
            font-size: 1vw;
            overflow: auto; 
            padding-top: 2vw;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .long-frq-text{
            width: 80%;
            font-size: 1vw;
            overflow: auto; 
            margin-bottom: 2vw;
        }

        .short-frq {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 100%;
            font-size: 1vw;
            overflow: auto; 
            padding-top: 2vw;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        .short-frq-text{
            width: 80%;
            font-size: 1vw;
            overflow: auto; 
            margin-bottom: 2vw;
        }

        .submit-btn {
            background-color: #3498db;
            color: white;
            width: 100%;
            padding: 1vw 2vw;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 1vw;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

    </style>
</head>
<body>
    <form id="form" action="submit_rating.php" method="post" class="container">

        <div class="title-image-container">
            <div class="title">
                <h2>Rate This Photo</h2>
                <h5>
                    <span style="color: red;">*</span>
                    <span style="color: black;">means required</span>
                </h5>
            </div>

            <img src="<?php echo $path; ?>" class="image">
        </div>

        <div class="mcq-container">
            <div class="radio-groups">
                <h4>
                    <span style="color: black;">How is your first impression about this photo?</span>
                    <span style="color: red;">*</span>
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating1" id="rating1" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Does this photo have an appropriate hue?</span>
                    <span style="color: red;">*</span>
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating2" id="rating2" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Does this photo have an appropriate color saturation?</span>
                    <span style="color: red;">*</span>
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating3" id="rating3" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Does this photo have a good color matching?</span>
                    <span style="color: red;">*</span> 
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating4" id="rating4" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Does this photo have a composition?</span>
                    <span style="color: red;">*</span> 
                </h4>
                <div class="radio-group">
                    <label>
                            <input type="radio" name="rating5" id="rating5" value="0" required>
                            <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating5" id="rating5" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Is the composition of this photo appropriate?</span>
                    <span style="color: red;">*</span>
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating6" id="rating6" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>   
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Can you find the subject(s) in this photo?</span>
                    <span style="color: red;">*</span>
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating7" id="rating7" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Does this photo have an appropriate brightness?</span>
                    <span style="color: red;">*</span>
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating8" id="rating8" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                    <span style="color: black;">Does this photo have a good purity?</span>
                    <span style="color: red;">*</span>
                </h4>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="1" required>
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating9" id="rating9" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>

            <div class="radio-groups">
                <h4>
                <span style="color: black;">Is this photo sharp?</span>
                <span style="color: red;">*</span>
                </h4>
                
                <div class="radio-group">
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="0" required>
                        <span class="custom-radio" data-label="0"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="1">
                        <span class="custom-radio" data-label="1"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="2">
                        <span class="custom-radio" data-label="2"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="3">
                        <span class="custom-radio" data-label="3"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="4">
                        <span class="custom-radio" data-label="4"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="5">
                        <span class="custom-radio" data-label="5"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="6">
                        <span class="custom-radio" data-label="6"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="7">
                        <span class="custom-radio" data-label="7"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="8">
                        <span class="custom-radio" data-label="8"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="9">
                        <span class="custom-radio" data-label="9"></span>
                    </label>
                    <label>
                        <input type="radio" name="rating10" id="rating10" value="10">
                        <span class="custom-radio" data-label="10"></span>
                    </label>
                </div>
            </div>
        </div>
            
        <div class="frq-container">
            <div class="long-frq">
                <label>
                    <h4>
                        <span style="color: black;">The contents of this photo:</span>
                        <span style="color: red;">*</span>
                    </h4>
                </label>
                <textarea id="comments" name="description" class="long-frq-text"></textarea>
                <label>
                    <h4>
                        <span style="color: black;">Your suggestons for this photo:</span>
                        <span style="color: red;">*</span>
                    </h4>
                </label>
                <textarea id="comments" name="suggestion" class="long-frq-text"></textarea>
            </div>

            <div class="short-frq">
                <label>
                    <h4>
                        <span style="color: black;">Your name or nick name:</span>
                        <span style="color: red;">*</span>
                    </h4>
                </label>
                <input type="text" name="name" class="short-frq-text" value="<?php echo $_SESSION['name'] ?>" required></textarea>
                <label>
                    <h4>
                        <span style="color: black;">Your e-mail adress:</span>
                    </h4>
                </label>
                <input type="email" name="email" class="short-frq-text"></textarea>
            </div>
            <button type="submit" class="submit-btn">Submit Rating</button>
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        </div>
    </form>
</body>
</html>