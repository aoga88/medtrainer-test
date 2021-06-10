<?php

function formatPhone($phone, $delimiter = '-')
{
    if (empty($phone)) {
        return $phone;
    }

    $cleanPhone = '';
    for ($i = 0; $i < strlen($phone); $i++) {
        if (!is_numeric($phone[$i])) continue;
        $cleanPhone .= $phone[$i];
    }

    if (strlen($cleanPhone) < 10) {
        return $phone;
    }

    $formattedNumber = '';
    for ($i = 9; $i >= 0; $i--) {
        if ($i == 5 || $i == 2) {
            $formattedNumber = $delimiter . $formattedNumber;
        }

        $formattedNumber = $cleanPhone[$i] . $formattedNumber;
    }

    return $formattedNumber;
}

$testPhones = [
    '123-456-7890',
    '(123)456-7890',
    '1234567890',
    '12345678901234567890',
    '',
    '123'
];

foreach ($testPhones as $testPhone) {
    var_dump(formatPhone($testPhone));
}
