<?php 
	
	function clear_string($clear_string){
		$clear_string = strip_tags($clear_string);
		$clear_string = mysql_real_escape_string($clear_string);
		$clear_string = trim($clear_string);

		return $clear_string;
	}



 ?>