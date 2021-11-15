<?php

namespace App\Http\Controllers;

use App\Models\Growth;
use App\Http\Requests\SendRequest;
use Illuminate\Http\Request;


//計画データのコントローラ
class GrowthController extends Controller
{
    public function index(){
    //計画データを取得する
    //$growths = Growth::all();
    $growths = Growth::orderBy('updated_at','desc')->get();
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

        //データをデータベースに書き込む
        $growth->title = $request->title;
        $growth->content = $request->content;
        $growth->u_id = 1;
        $growth->exp_point = 1;
        $growth->save();
        
        return redirect()->route('growths.index',[
            'id' => $growth -> id
        ]);
    }

}
