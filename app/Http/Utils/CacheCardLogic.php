<?php

namespace App\Http\Utils;


use App\Entities\Cache;
use App\Entities\Transaction;
use App\Http\Controllers\CardLogicInterface;

class CacheCardLogic implements CardLogicInterface
{

    /**
     * @param Cache $card
     * @param integer $value
     * @return bool|int
     */
    public function setCardInitialValue($card, $value)
    {
        if ($value < 0)
            return false;

        $card->setValue($value);
        return $value;

    }

    /**
     * @param Transaction $transaction
     * @return bool|int
     */
    public function doTransaction(Transaction $transaction)
    {
        if (!$this->checkTransaction($transaction))
            return false;

        $walletNewVal = $this->calcCardNewValue($transaction);
        $transaction->getWallet()->setValue($walletNewVal);
        $transaction->setBalance($walletNewVal);

        return $walletNewVal;
    }

    private function checkTransaction(Transaction $transaction)
    {
        $walletNewVal = $this->calcCardNewValue($transaction);
        return $walletNewVal >= Cache::WALLET_MIN_VAL;
    }

    private function calcCardNewValue(Transaction $transaction)
    {
        $walletOldVal = $transaction->getWallet()->getValue();
        return $walletOldVal + $transaction->getPrice();
    }
}