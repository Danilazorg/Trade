<?php
session_start();
require_once 'config/config.php';

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

require_once BASE_PATH . '/includes/auth_validate.php';

// Costumers class
require_once BASE_PATH . '/lib/Costumers/Costumers.php';
$costumers = new Costumers();

// Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

// Per page limit for pagination.
$pagelimit = 15;

// Get current page.
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
	$page = 1;
}

// If filter types are not selected we show latest added data first
if (!$filter_col) {
	$filter_col = 'id';
}
if (!$order_by) {
	$order_by = 'Desc';
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'f_name', 'l_name', 'gender', 'phone', 'created_at', 'updated_at');

//Start building query according to input parameters.
// If search string
if ($search_string) {
	$db->where('f_name', '%' . $search_string . '%', 'like');
	$db->orwhere('l_name', '%' . $search_string . '%', 'like');
}

//If order by option selected
if ($order_by) {
	$db->orderBy($filter_col, $order_by);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query.
$rows = $db->arraybuilder()->paginate('customers', $page, $select);
$total_pages = $db->totalPages;

$link = db_connect();

$query = "SELECT * FROM `Products`";
$result = mysqli_query($link, $query);

$n = mysqli_num_rows($result);
$articles = array();

for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $articles[] = $row;
}

include BASE_PATH . '/includes/header.php';
?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Товары</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="product.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Добавить новый</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php';?>

    <!-- Table -->
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="5%">Название</th>
                <th width="10%">Процессор</th>
                <th width="10%">Видеокарта</th>
                <th width="10%">Память</th>
                <th width="5%">Цена</th>
                <th width="5%">КОрпус</th>
                <th width="5%">Материнская палата</th>
                <th width="5%">Блок питания</th>
                <th width="5%">SSD</th>
                <th width="5%">HDD</th>
                <th width="5%">Гарантия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?=$article['name'];?></td>
                <td><?=$article['modelcore'];?> <?=$article['performancecore'];?> <?=$article['totalcores'];?></td>
				<td><?=$article['graphicscard'];?> <?=$article['graphicscardmodel'];?></td>
				<td><?=$article['memorytype'];?></td>
				<td><?=$article['prise'];?></td>
				<td><?=$article['corpus'];?></td>
				<td><?=$article['matpat'];?></td>
				<td><?=$article['blocpitane'];?></td>
				<td><?=$article['ssd'];?> <?=$article['spidssd'];?></td>
				<td><?=$article['hdd'];?> <?=$article['spidhdd'];?></td>
				<td><?=$article['garant'];?></td>
                <td>
                    <a href="product.php?id=<?=$article['id'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="delete.php?id=<?=$article['id'];?>" class="btn btn-danger delete_btn" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
    <?php echo paginationLinks($page, $total_pages, 'customers.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php';?>