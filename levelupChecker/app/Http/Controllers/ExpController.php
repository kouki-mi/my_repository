<?php
namespace App\Http\Controllers;

use App\Models\Growth;
use App\Models\Exp;
use App\Http\Requests\SendRequest;
use Illuminate\Http\Request;


//やった事に関するコントローラ
class ExpController extends Controller
{
    public function index(Request $request){
        //選択した計画データ
        $current_growth = Growth::find($request->id);

        //計画データに紐づくやった事を取得
        
        $exps = $current_growth->exps()->orderBy('updated_at','desc')->get();

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
    public function create(SendRequest $request){
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
            'id' => $current_growth -> id
        ]);
    }

    //やった事の編集ページの表示
    public function showEditForm(Request $request){
        $id = $request->id;
        $current_exp = Exp::find($id);
        return view('exps/edit',[
            'current_exp' => $current_exp,
            'growth_id' => $current_exp->growth_id
        ]);
    }

    //やった事の編集
    public function edit(SendRequest $request){
        $current_exp = Exp::find($request->id);
        $current_exp->title = $request->title;
        $current_exp->content = $request->content;
        $current_exp->save();
        return redirect()->route('exps.index',[
            'id' => $request -> growth_id
        ]);
    }

    //やった事の削除ページの表示
    public function showDeleteForm(Request $request){
        $id = $request->id;
        $current_exp = Exp::find($id);
        return view('exps/delete',[
            'current_exp' => $current_exp,
        ]);
    }

    //やった事の削除
    public function delete(Request $request){
        //やった事データの削除
        $growth_id = $request->growth_id;
        $current_exp = Exp::find($request->id);
        $current_exp->delete();

        //計画データのexp_pointを減らす
        $current_growth = Growth::find($growth_id);
        $current_growth->exp_point--;
        $current_growth->save();
        return redirect()->route('exps.index',[
            'id' => $growth_id
        ]);
    }

}
