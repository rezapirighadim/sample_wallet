<?php

namespace App\Http\Controllers;


use App\Entities\Transaction;
use App\Entities\Wallet;
use App\Http\Utils\CardLogic;
use App\TransactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
        $this->repository = new TransactionRepository($entityManager);
    }

    public function index($walletId)
    {
        $wallet = $this->em->find(Wallet::class, $walletId);
        $items = $this->repository->findWalletTransactions($wallet);
        return view('transaction.index', compact('wallet', 'items'));
    }

    public function create($walletId)
    {
        $wallet = $this->em->find(Wallet::class, $walletId);
        $transaction = new Transaction();
        return view('transaction.add', compact('wallet', 'transaction'));
    }

    public function store(Request $request, $walletId)
    {
        $wallet = $this->em->find(Wallet::class, $walletId);
        $cardLogic = (new CardLogic(class_basename($wallet)))->getLogic();
        $transaction = new Transaction();
        $transaction->setPrice($request->get('price'));
        $transaction->setWallet($wallet);
        $walletBalance = $cardLogic->doTransaction($transaction);
        if ($walletBalance === false)
            return $this->redirectBackWithError("Invalid Transaction Price");

        $this->persistEntity($transaction);

        return redirect()->route('wallet_transactions', $walletId);
    }

}