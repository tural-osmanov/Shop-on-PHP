<div id="block-news" class="text-center">
	<img id="news-prev" src="../img/img-prev.png" alt="">
	<div id="newsticker">
		<ul>

		<?php 
			$result = mysql_query("SELECT * FROM news ORDER BY id DESC", $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);
						do {
							echo '<li>
									<span>'.$row["date"].'</span>
									<a href="#">'.$row["title"].'</a>
									<p>'.$row["text"].'</p>
								</li>';
						}
						while ($row = mysql_fetch_array($result));
					}
		 ?>
			>
		</ul>
	</div>
	<img id="news-next" src="../img/img-next.png" alt="">
</div>