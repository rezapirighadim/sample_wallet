<?php

namespace App;


use App\Entities\Transaction;
use App\Entities\Wallet;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class TransactionRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(Transaction::class));
    }

    public function findWalletTransactions(Wallet $wallet)
    {
        $qb = $this->createQueryBuilder('t');
        return $qb->select('t')->where('t.wallet = :wallet')
            ->setParameter('wallet', $wallet)->getQuery()->getResult();
    }

}