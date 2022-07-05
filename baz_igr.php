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

function articles_all_n($link){
    // Формируем запрос
        $query = "SELECT * FROM `Products` WHERE cat ='baz'";
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
$articles = articles_all_n($link);
?>
<!DOCTYPE html>
<html lang="en" class="bg_col">
<head>
	<title>Bazov igr</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition" class="color">
	<!-- Header -->
	<!-- Header -->
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


	<!-- Slider -->

		<section class="section-slide">
		
		<div class="wrap-slick1 rs1-slick1">
			
			<div class="slick1">
			
				<div class="item-slick1" style="background-image: url(images/promo_tov.png); ">
					<div class="head_slidbar active_menu">
						<span class="rab_stan" ><a class="rab_stan" href="Rabochai_stan.php">Рабочая станция</a></span>
						<a href="baz_igr.php" style="color:white;"><span class="baz_igr">Базовый игровой</span></a>
						<span class="moch_igr"><a href="moch_igr.php">Мощный игровой</a></span>
					</div>
					<div class="osnv_slidbar">
						<span class="zagolovok">Базовый  <br>игровой</span>
						<br>
						<span class="dop_text">Отличное начало пути в мире PC гейминга</span>
				</div>
			</div>
		</div>
	</section>

	

	<!-- Product -->

			<!-- Product -->
	<section class="bg10 p-t-23 p-b-130">
		<div class="container">

			<div class="row isotope-grid">
					<?php if($articles): 
                  foreach($articles as $article): ?>
                  <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                  <div class="block2 block_product">
						<div class="product_name"><span class=""><?=$article['name'];?></span></div>
						<div class="cena"><span><?=$article['prise'];?> ₽</span></div>
						<div class="block2-pic hov-img0 label-new" data-label="New">
							<img src="images/<?=$article['img'];?>" alt="IMG-PRODUCT">

						
						</div>
						<div class="opisan">
							<span class="soder bold"><?=$article['performancecore'];?></span><br>
							<span class="soder"><?=$article['modelcore'];?></span><br>
							<span class="soder"><?=$article['totalcores'];?></span><br>
							<span class="soder bold"><?=$article['graphicscard'];?></span><br>
							<span class="soder"><?=$article['graphicscardmodel'];?></span><br>
							<span class="soder bold"><?=$article['randomaccessmemory'];?></span><br>
							<span class="soder"><?=$article['memorytype'];?></span><br>
							<span class="soder bold"><?=$article['ssd'];?> ssd</span><br>
							<span class="soder">Скорость W/R: <?=$article['spidssd'];?>  МБ/с</span><br>
							<span class="soder bold"><?=$article['hdd'];?> HDD</span><br>
							<span class="soder">Скорость W/R
								<?=$article['spidhdd'];?> МБ/с</span><br>
							<span class="soder bold">Гарантия</span><br>
							<span class="soder"><?=$article['garant'];?></span><br>
							<button class="cupit"><a href="http://s228614.h1n.ru/shoping-cart.php?id=<?=$article['id'];?>">Купить</a></button>
						</div>
					</div>
				</div>
            <?php endforeach; endif ?>
		</div>
	</section>
<section class="sec-product bg10 p-t-100 p-b-50">	
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1" style="color:white;">
					Почему мы ?
				</h3>
			</div>
	</section>
	<section class="section-slide section-slide_down">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/slide_down1.png);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 slider_down">
							<img src="images/slider_icon1.svg" class="slider_icon1">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								
								<span class="ltext-202 cl2 respon2">
										Лучшие цены на надежную технику 
								</span>
							</div>
							
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/slide_down2.png);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 slider_down">
						    <img src="images/slider_icon2.svg" class="slider_icon2">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 cl2 respon2">
									Железная гарантия после покупки
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
									
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								
							</div>
						</div>
					</div>
				</div>
					<div class="item-slick1" style="background-image: url(images/slide_down3.png);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 slider_down">
						    <img src="images/slider_icon4.svg" class="slider_icon2">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 cl2 respon2">
									Ценим своих клиентов и нашу репутацию
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
									
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								
							</div>
						</div>
					</div>
				</div>
			
			

			
			</div>
		</div>
	</section>

	

	<!-- Footer -->
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

	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
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