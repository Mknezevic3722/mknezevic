<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControler extends Controller
{
    function homepage() {
        return view('homepage');
    }

    function oNama(Request $request) {
        return view('o-nama');
    }
}
