<?php

namespace App\Http\Controllers;

use App\Models\Growth;
use App\Http\Requests\SendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PokemonController;

//計画データのコントローラ
class GrowthController extends Controller
{   
    public function index(){
    //現在のユーザーの取得
    $user_id = Auth::id();

    //ユーザーと紐づいた計画データを取得する
    //$growths = Growth::all();
    $growths = Growth::where('u_id', $user_id)->orderBy('updated_at','desc')->get();
    return view('growths/index',['growths'=>$growths]);
    }

    //計画データ作成ページの表示
    public function showCreateForm(){
        return view('growths/create');
    }

    //計画データの作成
    public function create(SendRequest $request){
        //計画データのモデル
        $growth = new Growth();

        //現在のユーザーの取得
        $user_id = Auth::id();

        //データをデータベースに書き込む
        $growth->title = $request->title;
        $growth->content = $request->content;

        //ポケモン情報の設定
        $i = rand(0,5);
        $poke_id = 1+($i*3);
        //APIで取得
        $poke_data = PokemonController::getPokeData($poke_id);
        if($poke_data!==0){
            PokemonController::savePokeData($poke_data);
        }
        $growth->p_id = $poke_id;

        $growth->u_id = $user_id;
        $growth->exp_point = 1;
        $growth->save();
        
        return redirect()->route('growths.index');
    }

    //計画データ編集ページの表示
    public function showEditForm(Request $request){
        $id = $request->id;
        $current_growth = Growth::find($id);
        return view('growths/edit',[
            'current_growth' => $current_growth,
        ]);
    }

    //計画データの編集
    public function edit(SendRequest $request){
        $current_growth = Growth::find($request->id);
        $current_growth->title = $request->title;
        $current_growth->content = $request->content;
        $current_growth->save();
        return redirect()->route('growths.index');
    }

    //計画データ削除ページの表示
    public function showDeleteForm(Request $request){
        $id = $request->id;
        $current_growth = Growth::find($id);
        return view('growths/delete',[
            'current_growth' => $current_growth,
        ]);
    }

    //計画データの削除
    public function delete(Request $request){
        $current_growth = Growth::find($request->id);
        $current_growth->delete();
        return redirect()->route('growths.index');
    }
}
