<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 1/8/2021
 * Time: 10:31 PM
 */

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

}