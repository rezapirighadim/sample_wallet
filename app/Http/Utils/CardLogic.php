<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 1/12/2021
 * Time: 10:47 PM
 */

namespace App\Http\Utils;


use App\Entities\Cache;
use App\Entities\Credit;

class CardLogic
{
    private $logic;

    public function __construct($cardType)
    {
        switch ($cardType) {
            case class_basename(Credit::class):
                $this->logic = new CreditCardLogic();
                break;
            case class_basename(Cache::class):
                $this->logic = new CacheCardLogic();
                break;
            default:
                throw new \Exception("Unknown card type: " . $cardType);
        }
    }

    public function getLogic()
    {
        return $this->logic;
    }
}