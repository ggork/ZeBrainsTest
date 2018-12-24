<?php
require_once "db_connect.php";
header("Content-Type: text/html; charset=UTF-8");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "DELETE FROM todo WHERE id = '$id'";
    $delete = mysqli_query($link, $query);
    if($delete){
        echo ("Удалено");
    }

}
?>
<html lang = "en">
<head>
  <meta charset="UTF-8">
</head>
<body>
<button type="submit"><a href="index.php">Посмотреть все задачи</a></button>
</body>
</html>
