<?php
require_once "db_connect.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    db();
    global $link;
    $query = "SELECT todoTitle, todoDescription, date, checkcomplete FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if($row){
            $title = $row['todoTitle'];
            $description = $row['todoDescription'];
            $date = $row['date'];

            echo "
            <h2>$title</h2>
            <h3>Описание:</h3>
            <p>$description</p>
            <small>$date</small>
            <br>
            <button type='submit'><a href='index.php'>Посмотреть все задачи</a></button>
            </br>
            ";
        }
    }else{
        echo 'Нет задач';
    }
}