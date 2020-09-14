<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Advert;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function addAdvert()
    {
        return view('post');
    }

    public function showAdvertList() {

        $adverts = Advert::orderBy('id')->paginate(4);

        return view('show', compact('adverts'));
    }
}
