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

function article($link, $id){
    // Формируем запрос
        $query = "SELECT * FROM `Products` WHERE id = '$id'";
        $result = mysqli_query($link, $query);
        if(!$result)
            die(mysqli_error($link));
        
    // Извлекаем данные
        $n = mysqli_num_rows($result);
        $articles = array();
        
        for ($i = 0; $i < $n; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        
        return $articles;
    }
    
$link = db_connect();
$id = $_GET['id'];
$articles = article($link, $id);

 if (isset($_POST['myActionName'])) {
        function articles_new($link, $FirstName, $Name, $SuName, $email, $Tell, $Sity, $Stret, $Home, $Kv, $Indeks, $idpodukt){
        $FirstName = trim($FirstName);
        $Name = trim($Name);
        $SuName = trim($SuName);
        $email = trim($email);
        $Tell = trim($Tell);
        $Sity = trim($Sity);
        $Stret = trim($Stret);
        $Home = trim($Home);
        $Kv = trim($Kv);
        $Indeks = trim($Indeks);
        $idpodukt = trim($idpodukt);
        $zap = "INSERT INTO `Zakazs` (`id`, `proces`, `FirstName`, `Name`, `SuName`, `email`, `Tell`, `Sity`, `Stret`, `Home`, `Kv`, `Indeks`, `idpodukt`)" . "VALUES (NULL, '0', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');";
        $query1 = sprintf($zap, 
                         mysqli_real_escape_string($link, $FirstName),
                         mysqli_real_escape_string($link, $Name),
                         mysqli_real_escape_string($link, $SuName),
                         mysqli_real_escape_string($link, $email),
                         mysqli_real_escape_string($link, $Tell),
                         mysqli_real_escape_string($link, $Sity),
                         mysqli_real_escape_string($link, $Stret),
                         mysqli_real_escape_string($link, $Home),
                         mysqli_real_escape_string($link, $Kv),
                         mysqli_real_escape_string($link, $Indeks),
                         mysqli_real_escape_string($link, $idpodukt));
        $result = mysqli_query($link, $query1);
        }
        articles_new($link, $_POST['FirstName'], $_POST['Name'], $_POST['SuName'], $_POST['$email'], $_POST['Tell'], $_POST['Sity'], $_POST['Stret'], $_POST['Home'], $_POST['Kv'], $_POST['Indeks'], $id);
    }
?>
<!DOCTYPE html>
<html lang="en" class="zakaz_oform">
<head>
	<title>Ваш заказ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo1.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition zakaz_oform">
	
<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">

					<!-- Logo desktop -->
					<a href="index.html" class="logo">
						<img src="images/logo1.png" alt="IMG-LOGO">
					</a>
					<div class="name">
						Trade
					</div>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.html">Модели</a>
								<ul class="sub-menu">
									<li><a href="Rabochai_stan.php">Рабочая станция</a></li>
									<li><a href="baz_igr.php">Базовый игровой</a></li>
									<li><a href="moch_igr.php">Мощный игровой</a></li>
								</ul>
							</li>

							<li>
								<a href="about2.html">Покупателям</a>
							</li>

						
							<li>
								<a href="about.html">TRADE-IN</a>
							</li>


						</ul>
					</div>

				<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-24">


							</div>
						</div>

						
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
							
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="images/logo1.png" alt="IMG-LOGO"></a>
				<div class="name_mob">
					Trade
				</div>
			</div>
            	<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						
					</div>
				</div>

			
			</div>
			
			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.html">Модели</a>
					<ul class="sub-menu-m">
						<li><a href="Rabochai_stan.php">Рабочая станция</a></li>
						<li><a href="baz_igr.php">Базовый игровой</a></li>
						<li><a href="moch_igr.php">Мощный игровой</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="about2.html">Покупателям</a>
				</li>


				<li>
					<a href="about.html">TRADE-IN</a>
				</li>

			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>



	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="row isotope-grid">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2 ">
					    <?php if($articles): foreach($articles as $article): ?>
						<div class="zakaz_name"><span class="">Ваш заказ</span></div>
						<div class="price_zakaz"><span>Цена:<?=$article['prise'];?></span></div>
						<div class="block2-pic hov-img0 label-new" data-label="New">
							<img src="images/<?=$article['img'];?>" alt="IMG-PRODUCT">

							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>
						<div class="product_complect">
							<span class="soder_zakaz">Корпус:<?=$article['corpus'];?> </span><br>
							<span class="soder_zakaz">Процессор:<?=$article['modelcore'];?> <?=$article['performancecore'];?></span><br>
							<span class="soder_zakaz">Видиокарта:<?=$article['graphicscardmodel'];?> <?=$article['graphicscard'];?></span><br>
							<span class="soder_zakaz">Материнская плата:<?=$article['matpat'];?></span><br>
							<span class="soder_zakaz">Система охлаждения:<?=$article['systemcold'];?></span><br>
							<span class="soder_zakaz">Оперативная памать:<?=$article['memorytype'];?></span><br>
							<span class="soder_zakaz"> SSD диск:<?=$article['ssd'];?></span><br>
							<span class="soder_zakaz">HDD диск:<?=$article['hdd'];?></span><br>
							<span class="soder_zakaz">Блок питания:<?=$article['blocpitane'];?></span><br>
						
						</div>
						<?php endforeach; endif ?>
					</div>
				</div>
				<div class=" col-md-4 col-lg-3 p-b-35 info_pocupatel">
					<div class="contact"><span>Контакные данные</span></div>
					<form id="form" class="topBefore" method="POST" action="zakaz.html">
					    <input class="form_soder" name="FirstName" id="su_name" type="text" placeholder="Фамилия">
					    <input class="form_soder" name="Name" id="name" type="text" placeholder="Имя">
					    <input class="form_soder" name="SuName" id="otch" type="text" placeholder="Отчество">
					    <input class="form_soder" name="email" id="emale" type="text" placeholder="Email">
					    <input  class="form_soder" name="Tell" id="number" type="text"  placeholder="Телефон" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}">
					    <input class="form_soder" name="Sity" id="city" type="text" placeholder="Город:">
					    <input class="form_soder" name="Stret" id="streat" type="text" placeholder="Улица:">
					    <input class="form_soder" name="Home" id="house" type="text" placeholder="Дом:">
					    <input class="form_soder" name="Kv" id="kv" type="text" placeholder="Квартира:">
					    <input class="form_soder" name="Indeks" id="index" type="text" placeholder="Индекс:">
					    <div class="sam">
						<label class="sam" for="happy">Самовывоз: <input class="sam" type="checkbox" id="happy" name="happy" value="yes"></label><br>
						<span>Адрес самовывоза:Адрес:
 Москва, Комсомольский пр-кт, 38/16 - вход со стороны 3-й Фрунзенской ул., м. Фрунзенская
</span>
					</div>
			  		<input class="form_soder" id="submit" name="myActionName" type="submit" value="Продолжить!">
  
				</form>
				</div>
	<!-- Shoping Cart -->

	
		

	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="footer_text_h cl0 p-b-30">
						Категории
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="Rabochai_stan.php" class="footer_text cl7 hov-cl1 trans-04">
								Рабочая станция
							</a>
						</li>

						<li class="p-b-10">
							<a href="baz_igr.php" class="footer_text cl7 hov-cl1 trans-04">
								Базовый игровой
							</a>
						</li>

						<li class="p-b-10">
							<a href="moch_igr.php" class="footer_text cl7 hov-cl1 trans-04">
								Мощный игровой
							</a>
						</li>

					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
				    <img src="images/logo1.png">
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="footer_text_h cl0 p-b-30">
						Мы в сети интернет
					</h4>

					<p class="footer_text cl7 size-201">
						Мы на авито avito.ru/trade 
					</p>
					<p class="footer_text cl7 size-201">
						Наша почта Trade@yandex.ru
					</p>

				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="footer_text_h cl0 p-b-30">
						Наши контакты:
					</h4>

					<ul>
						<li class="p-b-10 ">
							<span  class=" footer_text cl7 hov-cl1 trans-04">
								Телефон для связи: +7(495) 789-78-76
							</span>
						</li>

						<li class="p-b-10">
							<span  class="footer_text cl7 hov-cl1 trans-04">
								Адрес: Москва, Комсомольский пр-кт, 38/16 - вход со стороны 3-й Фрунзенской ул., м. Фрунзенская

							</span>
						</li>

						<li class="p-b-10">
							<span class="footer_text cl7 hov-cl1 trans-04">
								Работаем для вас с 10 до 23, без выходных
							</span>
						</li>


					</ul>
				</div>
			</div>

		


			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>