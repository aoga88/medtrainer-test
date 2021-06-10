<?php

$words = [
    'I love superman',
    'Superman is awesome',
    'superman',
    'SUPERMAN',
    'this is not super',
    'batman',
    'S U P E R M A n',
];

function isSuperman(string $str)
{
    if (strpos(strtolower($str), 'superman') === false) {
        throw new Exception();
    }
}

foreach ($words as $word) {
    try {
        isSuperman($word);
    } catch (Exception $e) {
        echo "Word {$word} raised exception \n";
    }
}