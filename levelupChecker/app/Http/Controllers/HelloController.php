<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\PokemonController;

class HelloController extends Controller
{
    public function index(){
        return "Hello!";
    }
}
