<?php
/**
 * PHP 5.5 style
 */
echo "===== PHP 5.5 =====\n\n";
$inputPassword = 'thisisapassword';
$hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
echo "Encripted password '{$inputPassword}' is {$hashedPassword} \n";

function validatePassword($inputToValidate, $hashedPassword)
{
    $isValid = password_verify($inputToValidate, $hashedPassword) ? 'valid' : 'invalid';
    echo "Password '{$inputToValidate}' is {$isValid} \n";
}

validatePassword('imbatman', $hashedPassword);
validatePassword('thisisapassword', $hashedPassword);


/**
 * PHP 5.4 style
 */
echo "\n\n===== PHP 5.4 =====\n\n";
$salt = substr(str_replace('+', '.', base64_encode(pack('N4', mt_rand(), mt_rand(), mt_rand(), mt_rand()))), 0, 22);
$inputPassword = 'thisisapassword';
$hashedPassword = crypt($inputPassword, $salt);
echo "Encripted password '{$inputPassword}' is {$hashedPassword} \n";

function validateCryptPassword($inputToValidate, $salt, $hashedPassword)
{
    $isValid = crypt($inputToValidate, $salt) == $hashedPassword ? 'valid' : 'invalid';
    echo "Password '{$inputToValidate}' is {$isValid} \n";
}

validateCryptPassword('imbatman', $salt, $hashedPassword);
validateCryptPassword('thisisapassword', $salt, $hashedPassword);