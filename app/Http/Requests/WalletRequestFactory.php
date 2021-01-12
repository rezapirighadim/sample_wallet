<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 1/11/2021
 * Time: 8:08 PM
 */

namespace App\Http\Requests;


use App\Entities\Wallet;

class WalletRequestFactory
{
    public function create($type)
    {
        $className = "App\\Entities\\" . $type;
        if (!is_subclass_of($className, Wallet::class))
            throw new \Exception("Invalid Wallet type");

        return new $className();
    }
}