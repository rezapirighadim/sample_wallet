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
class Transaction
{
    use WithTimestamp;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Wallet
     * @ORM\ManyToOne(targetEntity="Wallet", inversedBy="transactions", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $wallet;

    /**
     * @ORM\Column(type="integer", options={"unsigned"})
     */
    protected $price;

    /**
     * @ORM\Column(type="integer", options={"unsigned"})
     */
    protected $balance;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getWallet()
    {
        return $this->wallet;
    }

    public function setWallet(Wallet $wallet)
    {
        $this->wallet = $wallet;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
        return $this;
    }

}