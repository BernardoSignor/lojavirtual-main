<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypesController extends Controller
{
    //
    public function create()
    {
        return view('types.create');
    }
}
