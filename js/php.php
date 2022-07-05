$sdd_db_host=''; // ваш хост
$sdd_db_name=''; // ваша бд
$sdd_db_user=''; // пользователь бд
$sdd_db_pass=''; // пароль к бд
$conn = mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); // коннект с сервером бд
if(!$conn)
{
    throw new Exception('Не удалось подключиться к базе данных! Проверьте параметры подключения');
}
if(!mysql_select_db($sdd_db_name, $conn)) // выбор бд
{
    throw new Exception("Не удалось выбрать базу данных {$ssd_db_name}!");
}
$result = mysql_query('SELECT * FROM `table_name`', $conn); // запрос на выборку
if(!$result)
{
    throw new Exception(sprintf('Не удалось выполнить запрос к БД, код ошибки %d, текст ошибки: %s', mysql_errno($conn), mysql_error($conn)));
}

while($row = mysql_fetch_array($result))
{
    echo '<p>Запись id='.$row['id'].'. Текст: '.$row['text'].'</p>';// выводим данные
}