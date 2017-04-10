<?php 
	include('include/db_connect.php');
	include('functions/functions.php');

	$cat = clear_string($_GET["cat"]);
	$type = clear_string($_GET["type"]);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Поиск по параметрам</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="trackbar/trackbar.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js" defer></script>
	<script type="text/javascript" src="js/jcarousellite_1.0.1.js" defer></script>
	<script type="text/javascript" src="js/jquery.cookie.min.js" defer></script>
	<script type="text/javascript" src="js/shop-script.js" defer></script>
	<script type="text/javascript" src="trackbar/jquery.trackbar.js" defer></script>
</head>
<body>
	
	<div id="block-body">
		<?php 
		include("include/block-header.php");
		 ?>

		<div id="block-right">

		<?php 
		include("include/block-category.php");
		include("include/block-parameter.php");
		include("include/block-news.php");
		?>
			

		</div>
		<section id="content">
		<div id="block-content">
			

			
				<?php 

					if($_GET["brand"]){
						$check_brand = implode(',', $_GET["brand"] );
					}

					$start_price = (int)$_GET["start_price"]; 
					$end_price = (int)$_GET["end_price"]; 

					if(!empty($check_brand) || !empty($end_price)) {
						if(!empty($check_brand)) {
							$query_brand = " AND brend_id IN ($check_brand)";
						}
						if(!empty($end_price)) {
							$query_price = " AND price BETWEEN $start_price AND $end_price";
						}
					}

					$result = mysql_query("SELECT * FROM table_products WHERE visible='1' $query_brand $query_price ORDER BY id DESC" , $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);

						echo '<div id="block-sorting">
								<p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>			
								<ul id="option-list">
									<li>Вид: </li>
									<li><img id="style-grid" src="img/icon-grid.png" alt=""></li>
									<li><img id="style-list" src="img/icon-list.png" alt=""></li>
									<li>Сортировать:</li>
									<li><a id="select-sort">'.$sort_name.'</a>
										<ul id="sorting-list">
											<li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=price-asc">От дешевых к дорогим</a></li>
											<li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=price-desc">От дорогих к дешевыи</a></li>
											<li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=popular">Популярные</a></li>
											<li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=news">Новинки</a></li>
											<li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=brand">От А до Я</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul id="block-products-grid">
							';


						do {
							if ($row["image"] != "" && file_exists("./img-uploads/".$row["image"])) {
								$img_path = 'img-uploads/'.$row["image"];
								$max_width =200;
								$max_height = 200;
								list($width, $height) = getimagesize($img_path);
								$ratioh = $max_height/$height;
								$ratiow = $max_width/$width;
								$ratio = min($ratioh, $ratiow);
								$width = intval($ratio*$width);
								$height = intval($ratio*$height);
							} else {
								$img_path = "./img/no-image.png";
								$width = 110;
								$height = 200;
							}
							echo '
								<li>
									<div class="block-images-grid">
										<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
									</div>
									<p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
									<ul class="reviews-counts-grid">
										<li><img src="img/eye-icon.png"/>'.$row["count"].'</li>
										<li><img src="img/comment-icon.png"/></li>
									</ul>
									<a href="" class="add-basket-style-grid"></a>
									<p class="style-price-grid"><strong>'.$row["price"].'</strong> руб.</p>
									<div class="mini-features">'.$row["mini_features"].'</div>
								</li>
								';
						}
						while ($row = mysql_fetch_array($result));
					
				 ?>
			</ul>
			

			<ul id="block-products-list">
				<?php 
					$result = mysql_query("SELECT * FROM table_products WHERE visible='1'  $query_brand $query_price ORDER BY id DESC", $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);
						do {
							if ($row["image"] != "" && file_exists("./img-uploads/".$row["image"])) {
								$img_path = 'img-uploads/'.$row["image"];
								$max_width = 150;
								$max_height = 150;
								list($width, $height) = getimagesize($img_path);
								$ratioh = $max_height/$height;
								$ratiow = $max_width/$width;
								$ratio = min($ratioh, $ratiow);
								$width = intval($ratio*$width);
								$height = intval($ratio*$height);
							} else {
								$img_path = "./img/noimages80x70.png";
								$width = 80;
								$height = 70;
							}
							echo '
								<li>
									<div class="block-images-list">
										<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
									</div>
									
									<ul class="reviews-counts-list">
										<li><img src="img/eye-icon.png"/><p>0<p/></li>
										<li><img src="img/comment-icon.png"/><p>0<p/></li>
									</ul>

									<p class="style-title-list"><a href="">'.$row["title"].'</a></p>

									<a href="" class="add-basket-style-list"></a>
									<p class="style-price-list"><strong>'.$row["price"].'</strong> руб.</p>
									<div class="style-text-list">'.$row["mini_description"].'</div>
								</li>
								';
						}
						while ($row = mysql_fetch_array($result));
					}
				} else {
				 	echo "<h3>Категория недоступна или не создана!</h3>";
				}
				?>
			</ul>

		</div>
		</section>
		
		<?php 
		include("include/block-footer.php");
		 ?>

	</div>

</body>
</html>