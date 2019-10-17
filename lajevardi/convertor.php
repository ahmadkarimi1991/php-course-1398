<?php 
	
	function converter($num)
	{
		$str = "";
		while($num > 0){
			$str .= $num % 2;
			$num = floor($num / 2);

		}
		return (int)strrev($str);
	}
	
 ?>