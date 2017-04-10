
<script type="text/javascript" src="js/jquery-1.8.2.min.js" ></script>
<script type="text/javascript" >
	$(document).ready(function(){
	$('#block-trackbar').trackbar({
		onMove : function(){
			document.getElementById("start-price").value = this.leftValue;
			document.getElementById("end-price").value = this.rightValue;
		},
		width : 160,
		leftLimit : 1000,
		leftValue : <?php 
			if((int)$_GET["$start_price"] >= 1000 && (int)$_GET["$start_price"] <= 100000){
				echo (int)$_GET["$start_price"];
			} else{
				echo "1000";
			}
		 ?>,
		rightLimit : 100000,
		rightValue : <?php 
			if((int)$_GET["$end_price"] >= 1000 && (int)$_GET["$end_price"] <= 100000){
				echo (int)$_GET["$end_price"];
			} else{
				echo "50000";
			}
		 ?>,
		roundUp : 1000
	});
});

</script>

<div id="block-parameter">
	<p class="header-title" >Поиск по параметрам</p>
	<p class="title-filter">Стоимость</p>
	<form action="search_filter.php" method="GET">
		
		<div id="block-input-price" >
			<ul>
				<li><span>От</span></li>
				<li><input type="text" id="start-price" name="start_price" value="1000"></li>
				<li><span>до</span></li>
				<li><input type="text" id="end-price" name="end_price" value="30000"></li>
				<li><span>руб</span></li>
			</ul>
		</div>
		<div id="block-trackbar"></div>
		
		<p class="title-filter">Производители</p>
		<ul class="checkbox-brand">
			
			<?php 
			$result = mysql_query("SELECT * FROM category WHERE type='mobile'" , $link);

					if (mysql_num_rows($result) > 0) {
						$row = mysql_fetch_array($result);
						do {
							$checked_brand = "";
							if($_GET["brand"]){
								if(in_array($row["id"], $_GET["brand"])){
									$checked_brand = "checked";
								}
							}
							echo '<li><input '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrend'.$row["id"].'"><label for="checkbrend'.$row["id"].'">'.$row["brand"].'</label></li>';
							} 
						
						while ($row = mysql_fetch_array($result));
					}
			 ?>
		</ul>
		<div class="button-parameter text-center">
		<input  type="submit" name="submit" id="button-parameter-search" value=" ">	
		</div>

	</form>
</div>