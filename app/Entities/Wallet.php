<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 */
class Wallet
{
    use WithTimestamp;

    const TYPE_CREDIT = 'credit';
    const TYPE_CACHE = 'cache';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="wallet", cascade={"all"}, orphanRemoval=true)
     */
    protected $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getTransactions()
    {
        return $this->transactions;
    }

    public function importRequest($request = [])
    {
        $this->setName($request['name']);
    }

    public function getWalletMinVal()
    {
        return 0;
    }

}