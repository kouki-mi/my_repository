<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{
    public function index(){
        $poke_id = rand(1,18);
        //APIで取得
        $poke_data = PokemonController::getPokeData($poke_id);
        if($poke_data!==0){
            //新しいデータの場合
            PokemonController::savePokeData($poke_data);
        }
        $poke_data = Pokemon::where('poke_id',$poke_id)->first();
        return view('index',['pokemon'=>$poke_data]);
    }
}
