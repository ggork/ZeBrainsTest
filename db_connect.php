<?php
header("Content-Type: text/html; charset=UTF-8");
function db(){
    global $link;
    $link = mysqli_connect("localhost", "root", "", "todolist") or die("Нет подключение к базе данных");
    return $link;
}
