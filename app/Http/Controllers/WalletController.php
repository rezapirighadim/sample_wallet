<?php

namespace App\Http\Controllers;


use App\Entities\Wallet;
use App\Http\Requests\WalletRequest;
use App\Http\Requests\WalletRequestFactory;
use App\Http\Utils\CardLogic;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
    }

    public function index()
    {
        $items = $this->em->getRepository(Wallet::class)->findAll();
        return view('wallet.index', compact('items'));
    }

    public function create()
    {
        $newWallet = new Wallet();
        return view('wallet.add', ['entity' => $newWallet]);
    }

    public function store(WalletRequest $request)
    {
        $wallet = (new WalletRequestFactory())->create($request->get('type'));
        $cardLogic = (new CardLogic(class_basename($wallet)))->getLogic();
        $initialValue = $cardLogic->setCardInitialValue($wallet, $request->get('val'));
        if ($initialValue === false)
            return $this->redirectBackWithError("Invalid Initial Value!");

        $wallet->importRequest($request->all());
        $this->persistEntity($wallet);

        return redirect()->route('wallets');
    }

    public function edit($id)
    {
        $entity = $this->findEntity(Wallet::class, $id);
        return view('wallet.edit', compact('entity'));
    }

    public function update(Request $request, $id)
    {
        $entity = $this->findEntity(Wallet::class, $id);
        $entity->importRequest($request->all());
        $this->persistEntity($entity);
        return redirect()->route('wallets');
    }

    public function destroy($id)
    {
        $entity = $this->findEntity(Wallet::class, $id);
        $this->em->remove($entity);
        $this->em->flush();

        return redirect()->route('wallets');
    }

}