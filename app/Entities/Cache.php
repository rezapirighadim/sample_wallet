<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 1/8/2021
 * Time: 10:01 PM
 */

namespace App\Entities;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Cache extends Wallet
{
    const WALLET_MIN_VAL = 0;

    /**
     * @ORM\Column(type="integer")
     */
    protected $value = 0;


    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getWalletMinVal()
    {
        return -($this->value);
    }
}