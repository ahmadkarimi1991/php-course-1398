<?php 

function reverse_convertor($num)
	{
		$length = strlen(strval($num)) -1 ;
		$str_num = strval($num);
		$value = 0;
		$index = $length;
		for ($i=0; $i <= $length; $i++)
		{ 
			$num_value = (int)$str_num[$index];
			$value += (2 **($length - $index)) * $num_value;
			$index --;
		}
		return $value;
	}

 ?>