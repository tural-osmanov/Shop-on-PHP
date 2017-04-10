<div id="block-category">
	<p class="header-title" >Категории товаров</p>

	<ul>
		<li><a id="index1"><img id="mobile-img" src="../img/mobile-icon.gif" alt="">Мобильные телефоны</a> 
			<ul class="category-section">
				<li><a href="view_cat.php?type=mobile"><b>Все модели</b> </a></li>
				<?php 
					$result = mysql_query("SELECT * FROM category WHERE type='mobile'", $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);
						do {
							echo '
								<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
							 ';
						}
						while ($row = mysql_fetch_array($result));
					}
				 ?>
			</ul>
		</li>
	</ul>
	<ul>
		<li><a id="index2"><img id="book-img" src="../img/book-icon.gif" alt="">Ноутбуки</a> 
			<ul class="category-section">
				<li><a href= "view_cat.php?type=notebook"><b>Все модели</b></a></li>
				<?php 
					$result = mysql_query("SELECT * FROM category WHERE type='notebook'", $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);
						do {
							echo '
								<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
							 ';
						}
						while ($row = mysql_fetch_array($result));
					}
				 ?>
				
			</ul>
		</li>
	</ul>
	<ul>
		<li><a id="index3" ><img id="table-img" src="../img/table-icon.gif" alt="">Планшеты</a> 
			<ul class="category-section">
				<li><a href="view_cat.php?type=notepad"><b>Все модели</b></a></li>
				<?php 
					$result = mysql_query("SELECT * FROM category WHERE type='notepad'", $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);
						do {
							echo '
								<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
							 ';
						}
						while ($row = mysql_fetch_array($result));
					}
				 ?>
			</ul>
		</li>
	</ul>
</div>