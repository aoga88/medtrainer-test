<?php

$values = [1, 2, 3, 4, 5, 6, -1, 0];
$arrays = [
    [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
    [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21],
    [],
    [1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 2]
];

function isInArray($value, $array)
{
    if (count($array) == 0)
    {
        return false;
    }

    if (count($array) == 1) {
        return $array[0] == $value;
    }

    $size = intval(count($array) / 2);
    if ($array[$size] > $value) {
        return isInArray($value, getSubArray(0, $size - 1, $array));
    } elseif ($array[$size] < $value) {
        return isInArray($value, getSubArray($size + 1, count($array) - 1, $array));
    }
    
    return true;
}

function getSubArray($start, $end, $array)
{
    $newArray = [];
    for ($i = $start; $i <= $end; $i++) {
        $newArray[] = $array[$i];
    }

    return $newArray;
}

foreach ($arrays as $inputArray) {
    foreach ($values as $inputValue) {
        $response = isInArray($inputValue, $inputArray) ? 'in' : 'not in';
        $joinedArray = implode(',', $inputArray);
        echo "Value {$inputValue} is {$response} array [{$joinedArray}]\n";
    }
}