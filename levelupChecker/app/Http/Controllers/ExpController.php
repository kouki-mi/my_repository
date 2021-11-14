<?php
namespace App\Http\Controllers;

use App\Models\Growth;
use App\Models\Exp;
use Illuminate\Http\Request;

//やった事に関するコントローラ
class ExpController extends Controller
{
    public function index(Request $request){
        //選択した計画データ
        $current_growth = Growth::find($request->id);

        //計画データに紐づくやった事を取得
        
        $exps = $current_growth->exps()->get();

        return view('exps/index',[
            //'growths' => $growths,
            'current_growth' => $current_growth,
            'exps' => $exps
        ]);
    }
    
    //やった事の作成ページの表示
    public function showCreateForm(Request $request){
        $id = $request->id;
        return view('exps/create',[
            'growth_id' => $id
        ]);
    }

    //やった事の作成
    public function create(Request $request){
        //選択されている計画データを取得
        $current_growth = Growth::find($request->id);
        //データをデータベースに書き込む
        $exp = new Exp();
        $exp->title = $request->title;
        $exp->content = $request->content;
        $exp->u_id = 1;
        $current_growth->exp_point++; 
        $current_growth->save();
        $current_growth->exps()->save($exp);

        return redirect()->route('exps.index',[
            'id' => $exp -> id
        ]);
    }

}
