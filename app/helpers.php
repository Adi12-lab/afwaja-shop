<?php

function rupiah($amount)
{
    if ($amount === null) {
        return null;
    }
    return "Rp ".number_format($amount, 0, ',', '.');
}


function generateRandomHexColor() {
    $hexColor = '#';

    // Generate six random digits/letters in the range 0-9 and A-F
    for ($i = 0; $i < 6; $i++) {
        $hexColor .= dechex(mt_rand(0, 15));
    }

    return $hexColor;
}