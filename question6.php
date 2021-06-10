<?php

const INVALID_PHONE = 'Invalid Phone';

function formatPhone($phone, $delimiter = '-')
{
    if (empty($phone)) {
        throw new Exception(INVALID_PHONE);
    }

    $cleanPhone = '';
    for ($i = 0; $i < strlen($phone); $i++) {
        if (!is_numeric($phone[$i])) continue;
        $cleanPhone .= $phone[$i];
    }

    if (strlen($cleanPhone) < 10) {
        throw new Exception(INVALID_PHONE);
    }

    $formattedNumber = '';
    for ($i = strlen($cleanPhone) - 1; $i >= 0; $i--) {
        if (strlen($formattedNumber) == 4 || strlen($formattedNumber) == 8) {
            $formattedNumber = $delimiter . $formattedNumber;
        }

        $formattedNumber = $cleanPhone[$i] . $formattedNumber;

        if (strlen($formattedNumber) == 12) break;
    }

    return $formattedNumber;
}

$testPhones = [
    '123-456-7890',
    '(123)456-7890',
    '1234567890',
    '12345678901234567890',
    '',
    '123',
    '+11234567890',
    '+521234567889'
];

foreach ($testPhones as $testPhone) {
    try {
        $formattedNumber = formatPhone($testPhone);
        echo "{$testPhone} = {$formattedNumber}\n";
    } catch (Exception $e) {
        echo "{$testPhone} = Invalid format\n";
    }
}
