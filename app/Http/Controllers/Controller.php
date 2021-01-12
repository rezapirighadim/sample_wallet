<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    protected function findEntity($type, $id)
    {
        $entity = $this->em->find($type, $id);
        if ($entity == null)
            return abort(404, "Oops! something went wrong!");

        return $entity;
    }

    protected function redirectBackWithError($message)
    {
        session()->flash('message', $message);
        session()->flash('alert-class', 'alert-danger');

        return redirect()->back();
    }

    protected function persistEntity($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

}
