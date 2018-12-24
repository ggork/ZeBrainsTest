<?php
require_once("db_connect.php");
?>
<html lang = "en">
<head>
  <meta charset="UTF-8">
  <title>Приложение-задачник</title>
</head>
<body>
<h2>
    Мои задачи
</h2>
<p><a href="create.php">Добавить задачу</a></p>
<?php
db();
global $link;
$query  = "SELECT id, todoTitle, todoDescription, date, checkcomplete FROM todo";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $title = $row['todoTitle'];
        $date = $row['date'];

        ?>

    <ul>
        <li><a href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a></li> <?php echo "[[$date]]";?>
        <button type="button"><a href="delete.php?id=<?php echo $id?>">Удалить задачу</a></button>
    </ul>
<?php
    }
}

?>


</body>
</html>
