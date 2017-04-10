<?php 
	include('include/db_connect.php');

	$sorting = $_GET["sort"];

	switch($sorting){
		case 'price-asc';
		$sorting = 'price ASC';
		$sort_name = 'От дешевых к дорогим';
		break;

		case 'price-desc';
		$sorting = 'price DESC';
		$sort_name = 'От дорогих к дешевым';
		break;

		case 'popular';
		$sorting = 'count DESC';
		$sort_name = 'Популярное';
		break;

		case 'news';
		$sorting = 'data_time DESC';
		$sort_name = 'Новинки';
		break;

		case 'brand';
		$sorting = 'brand';
		$sort_name = 'От А до Я';
		break;

		default:
		$sorting = 'id DESC';
		$sort_name = 'Нет сортировки';
		break;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Интернет магазин</title>
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
			<div id="block-sorting">
				<p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>			
				<ul id="option-list">
					<li>Вид: </li>
					<li><img id="style-grid" src="img/icon-grid.png" alt=""></li>
					<li><img id="style-list" src="img/icon-list.png" alt=""></li>
					<li>Сортировать:</li>
					<li><a id="select-sort"><?php echo $sort_name; ?></a>
						<ul id="sorting-list">
							<li><a href="index.php?sort=price-asc">От дешевых к дорогим</a></li>
							<li><a href="index.php?sort=price-desc">От дорогих к дешевыи</a></li>
							<li><a href="index.php?sort=popular">Популярные</a></li>
							<li><a href="index.php?sort=news">Новинки</a></li>
							<li><a href="index.php?sort=brand">От А до Я</a></li>
						</ul>
					</li>
				</ul>
			</div>

			<ul id="block-products-grid">
				<?php 

					$num = 6; //КОЛИЧЕСТВО ТОВАРОВ НА СТРАНИЦЕ
					$page = (int)$_GET['page']; // КАКАЯ СТРАНИЦА (ВЫВОДИТСЯ В АДРЕСНОЙ СТРОКЕ)

					$count = mysql_query("SELECT COUNT(*) FROM table_products WHERE visible='1'", $link);
					$temp = mysql_fetch_array($count);

					if($temp[0] > 0){              
						$tempcount = $temp[0];		//ОБЩЕЕ КОЛИЧЕСТВО ТОВАРОВ

						$total = (($tempcount - 1) / $num) + 1; //СКОЛЬКО СДЕЛАТЬ СТРАНИЦ
						$total = intval($total);

						$page = intval($page);

						if(empty($page) || $page < 0) $page = 1;
						if($page > $total) $page = $total;

						$start = $page * $num - $num; //КАКОЙ ТОВАР ПО СЧЕТУ ПОКАЗЫВАТЬ НА СТРАНИЦЕ

						$qury_start_num = " LIMIT $start, $num";
					}

					$result = mysql_query("SELECT * FROM table_products WHERE visible='1' ORDER BY $sorting $qury_start_num" , $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);
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
					}
				 ?>
			</ul>
			

			<ul id="block-products-list">
				<?php 
					$result = mysql_query("SELECT * FROM table_products WHERE visible='1' ORDER BY $sorting $qury_start_num", $link);

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

					echo "</ul>";

					if($page != 1){$pstr_prev = '<li><a class="pstr-prev" href="index.php?page='.($page - 1).'">&lt;</a></li>';}
					if($page != $total) $pstr_next = '<li><a class="pstr-next" href="index.php?page='.($page + 1).'">&gt;</a></li>';

					if($page - 5 > 0) $page5left = '<li><a href="index.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
					if($page - 4 > 0) $page4left = '<li><a href="index.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
					if($page - 3 > 0) $page3left = '<li><a href="index.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
					if($page - 2 > 0) $page2left = '<li><a href="index.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
					if($page - 1 > 0) $page1left = '<li><a href="index.php?page='.($page - 1).'">'.($page - 1).'</a></li>';
					

					if($page + 5 <= $total) $page5right = '<li><a href="index.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
					if($page + 4 <= $total) $page4right = '<li><a href="index.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
					if($page + 3 <= $total) $page3right = '<li><a href="index.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
					if($page + 2 <= $total) $page2right = '<li><a href="index.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
					if($page + 1 <= $total) $page1right = '<li><a href="index.php?page='.($page + 1).'">'.($page + 1).'</a></li>';
				

					if($page + 5 < $total) { 
						$strtotal = '<li><p class="nav-point">...</p></li><li><a href="index.php?page='.$total.'">'.$total.'</a></li>';
					} else{
						$strtotal = "";
					}

					if($total > 1){
						echo '
							<div class="pstrnav">
							<ul>
						 ';
						 echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='index.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
						 echo '
							</ul>
							</div>
						  ';
					}
				 ?>

			

		</div>
		</section>
		
		<?php 
		include("include/block-footer.php");
		 ?>

	</div>

</body>
</html>