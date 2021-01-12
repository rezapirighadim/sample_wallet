<?php

namespace App\Http\Utils;


use App\Entities\Credit;
use App\Entities\Transaction;
use App\Http\Controllers\CardLogicInterface;

class CreditCardLogic implements CardLogicInterface
{
    /**
     * @param Credit $card
     * @param integer $value
     * @return int
     */
    public function setCardInitialValue($card, $value)
    {
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

        $walletOldVal = $transaction->getWallet()->getValue();
        $walletNewVal = $walletOldVal + $transaction->getPrice();
        $transaction->getWallet()->setValue($walletNewVal);
        $transaction->setBalance($walletNewVal);

        return $walletNewVal;
    }

    private function checkTransaction(Transaction $transaction)
    {
        $walletNewVal = $this->calcCardNewValue($transaction);
        return $walletNewVal >= Credit::WALLET_MIN_VAL;
    }

    private function calcCardNewValue(Transaction $transaction)
    {
        $walletOldVal = $transaction->getWallet()->getValue();
        return $walletOldVal + $transaction->getPrice();
    }

}