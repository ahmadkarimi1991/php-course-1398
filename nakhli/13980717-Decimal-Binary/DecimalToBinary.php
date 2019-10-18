<?php

function decimalToBinary($number)
{
    $binaryArray = [];
    $binaryNumber = '';

    $i = 0;
    while ($number > 0)
    {
        $binaryArray[$i] = $number % 2;
        $number = (int)($number / 2);
        $i++;
    }

    // $binaryNumber = join("", $binaryArray);
    // $binaryNumber = strrev($binaryNumber);
    for ($j=$i-1; $j >=0  ; $j--) {
        $binaryNumber .= $binaryArray[$j];
    }

    return $binaryNumber;
}

var_dump(decimalToBinary(36));

?>