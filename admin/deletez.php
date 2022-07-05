<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'lizerg');
define('MYSQL_PASSWORD', 'starcraft11');
define('MYSQL_DB', 'trade');

function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) 
        or die("Error - mysqli_error 1: ".mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        printf("Error - mysqli_error 2: ".mysqli_error($link));}
    return $link;
}

$link = db_connect();
function product_delete($link, $id){
    $query = sprintf("DELETE FROM Zakazs WHERE id=$id");
    $result = mysqli_query($link, $query);
    header('Location: zakaz.php');
}
if (array_key_exists('delete',$_POST)){
    $id = $_GET['id'];
    product_delete($link, $id);
}
?>
<h1>Удаление</h1>
<h2>Вы уверенны что хотите безвозвратно удалить этот продукт?</h2>
<a href="customers.php" class="btn btn-primary"><i class="glyphicon glyphicon-edit">Отмена</i></a>
<form method="post"><input class="form_soder" id="submit" name="delete" type="submit" value="Удалить!"></form>