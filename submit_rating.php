<!-- Programmer: Junjie Zhao -->

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = date('m/d/Y h:i:s a', time());
    $rating1 = intval($_POST['rating1']);
    $rating2 = intval($_POST['rating2']);
    $rating3 = intval($_POST['rating3']);
    $rating4 = intval($_POST['rating4']);
    $rating5 = intval($_POST['rating5']);
    $rating6 = intval($_POST['rating6']);
    $rating7 = intval($_POST['rating7']);
    $rating8 = intval($_POST['rating8']);
    $rating9 = intval($_POST['rating9']);
    $rating10 = intval($_POST['rating10']);
    $description = $_POST['description'];
    $suggestion = $_POST['suggestion'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $_SESSION['name'] = $_POST['name'];
    $ID = $_POST['ID'];
    $Count = 1;

    $file = fopen("result.txt", "a");
    fwrite($file, $date .",". $ID .",". $rating1 .",". $rating2 .",". $rating3 .",". $rating4 .",". $rating5 .",". $rating6 .",". $rating7 .",". $rating8 .",". $rating9 .",". $rating10 .",". $description .",". $suggestion .",". $name .",". $email. "\n");
    fclose($file);

    $db = new SQLite3('photo.db');
    $update_db = $db->prepare("UPDATE photos SET Count = :count WHERE ID = :id");
    $update_db->bindValue(':count', $Count, SQLITE3_INTEGER);
    $update_db->bindValue(':id', $ID, SQLITE3_TEXT);
    $update_db->execute();
    
    $db->close();
    
    header("Location: success.php");
    exit();
}else{
    header("Location: index.php");
    exit();
}
?>


