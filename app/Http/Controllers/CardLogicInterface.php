<?php

namespace App\Http\Controllers;


use App\Entities\Transaction;

interface CardLogicInterface
{
    function setCardInitialValue($card, $value);

    function doTransaction(Transaction $transaction);
}