<?php

/**
 * Returns the password for the Aurora (ABB, FIMER) Power One inverter to enter
 * the technician service menu. The password refers to the serial number of the
 * device. The password is checked against the last six digits of the serial
 * number.
 * @see https://youtu.be/aOrd-1YLyKk
 *
 * @param string $serialNumber
 * @return string $passWord
 */
function getServicePassword(string $serialNumber = '999999')
{
    $base = str_split('919510');
    $sN = preg_replace("/[^0-9]/", '', $serialNumber);          // only digits
    $sN = str_split(str_pad(substr($sN, -6), 6, '0', STR_PAD_LEFT));
    $passWord = [];
    for ($i = 0; $i < 6; $i++) {
        if ($i % 2 !== 0) {
            if (($passWord[$i] = intval($sN[$i]) - intval($base[$i])) < 0) {
                $passWord[$i] = $passWord[$i] + 6;
            }
        } else {
            if (($passWord[$i] = intval($sN[$i]) + intval($base[$i])) > 9) {
                $passWord[$i] = $passWord[$i] - 10;
            };
        }
    }

    return implode($passWord);
}

echo getServicePassword($argv[1]);