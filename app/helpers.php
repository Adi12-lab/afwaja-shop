<?php

function rupiah($amount)
{
    if ($amount === null) {
        return null;
    }
    return "Rp ".number_format($amount, 0, ',', '.');
}

