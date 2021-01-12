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
class Credit extends Wallet
{
    const WALLET_MIN_VAL = -1000;

    /**
     * @ORM\Column(type="integer", options={"unsigned"})
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
        return $this::WALLET_MIN_VAL - $this->value;
    }

}