<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
        //pokeAPIでポケモン情報の取得
        public function getPokeData($poke_id){
            //データベースにあるか確認
            $poke_data = Pokemon::where('p_id',$poke_id);
            if(empty($poke_data)){
                return 0;
            }
    
            $url = 'https://pokeapi.co/api/v2/pokemon/'.$poke_id;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $r = curl_exec($curl);
            $data = json_decode($r, true);
            return $data;
        }

        //ポケモンの情報をデータベースに格納
        public function savePokeData($poke_data){
            //ポケモンの情報をデータベースに保存する
            $pokemon = new Pokemon();
            $pokemon->poke_id = $poke_data['id'];
            $pokemon->name = $poke_data['name'];
            $pokemon->img_url = $poke_data['sprites']['other']['home']['front_default'];
            $pokemon->save();
    }


}
