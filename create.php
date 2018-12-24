<?php
require_once 'db_connect.php';
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription']; 
    $checkcomplete = $_POST['checkcomplete'];
    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }
    if(empty($title)){
        $error  = true;
        $titleErrorMsg = "Введите название";
    }
    if(empty($description)){
        $error = true;
        $descriptionErrorMsg = "Введите описание";
    }
    db();
    global $link;
    $query = "INSERT INTO todo(todoTitle, todoDescription, date, checkcomplete) VALUES ('$title', '$description', now(), '$checkcomplete')";
    $insertTodo = mysqli_query($link, $query);
    if($insertTodo){
        echo "Вы добавили новую задачу";
    }else{
        echo mysqli_error($link);
    }

}
?>

<html lang = "en">
<head>
  <meta charset="UTF-8">
  <title>Создать задачу</title>
</head>
<body>
<h1>Создать задачу</h1>
<button type="submit"><a href="index.php">Посмотреть все задачи</a></button>
<form method="post" action="create.php">
    <p>Название: </p>
    <input name="todoTitle" type="text">
    <p>Описание: </p>
    <input name="todoDescription" type="text">
    <input type="checkbox" name="checkcomplete" value="1" />Выполнено<br />
    <br>
    <input type="submit" name="submit" value="Создать">
</form>
</body>
</html>

