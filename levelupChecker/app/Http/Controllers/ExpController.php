<?php
namespace App\Http\Controllers;

use App\Models\Growth;
use App\Models\Exp;
use App\Models\Pokemon;
use App\Http\Requests\SendRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PokemonController;


//やった事に関するコントローラ
class ExpController extends Controller
{
    public function index(Request $request){
        //選択した計画データ
        $current_growth = Growth::find($request->id);

        if($request->mode == "todo"){
            //計画データに紐づくやった事を取得
            $exps = $current_growth->exps()->where('finish_flg',0)->orderBy('updated_at','desc')->get();
        }else{
            $exps = $current_growth->exps()->where('finish_flg',1)->orderBy('updated_at','desc')->get();
        }

        //ポケモンのデータを取得
        $p_id = $current_growth->p_id;
        $pokemon = Pokemon::where('poke_id',$p_id)->first();

        return view('exps/index',[
            //'growths' => $growths,
            'current_growth' => $current_growth,
            'exps' => $exps,
            'pokemon' => $pokemon,
            'mode' => $request->mode
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
        //やった事をデータベースに書き込む
        $exp = new Exp();
        $exp->title = $request->title;
        $exp->content = $request->content;
        $exp->finish_flg = 0;
        $current_growth->exps()->save($exp);

        return redirect()->route('exps.index',[
            'id' => $current_growth -> id,
            'mode' => 'todo'
        ]);
    }

    //やった事の編集ページの表示
    public function showEditForm(Request $request){
        $id = $request->id;
        $mode = $request->mode;
        $current_exp = Exp::find($id);
        return view('exps/edit',[
            'current_exp' => $current_exp,
            'growth_id' => $current_exp->growth_id,
            'mode' => $mode
        ]);
    }

    //やった事の編集
    public function edit(SendRequest $request){
        $current_exp = Exp::find($request->id);
        $current_exp->title = $request->title;
        $current_exp->content = $request->content;
        $current_exp->save();
        return redirect()->route('exps.index',[
            'id' => $request -> growth_id,
            'mode' => 'todo'
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
        $finish_flg = $current_exp->finish_flg;

        //計画データのexp_pointを減らす
        if($finish_flg==1){
            $current_growth = Growth::find($growth_id);
            $current_growth->exp_point--;
            $current_growth->save();
        }
        return redirect()->route('exps.index',[
            'id' => $growth_id,
            'mode' => 'todo'
        ]);
    }

    //完了処理
    public function finish(Request $request){
        $growth_id = $request->growth_id;
        $current_exp = Exp::find($request->id);
        $current_exp->finish_flg = 1;
        $current_growth = Growth::find($growth_id);
        $current_growth->exp_point++;
        //計画データを更新する
        $exp_point = $current_growth->exp_point;
        //ポケモンIDの設定
        $poke_id = $current_growth->p_id;
        //画像が変化する場合
        if(($exp_point==3 && ($poke_id%3)==1)||($exp_point==8 && ($poke_id%3)==2)){
            $poke_id++;
            //PokeAPIを叩いてデータ取得
            $poke_data = PokemonController::getPokeData($poke_id);
            if($poke_data !== 0) PokemonController::savePokeData($poke_data);
        }
        $current_growth->p_id = $poke_id; 
        $current_growth->save();
        $current_exp->save();
        return redirect()->route('exps.index',[
            'id' => $growth_id,
            'mode' => 'todo'
        ]);
    }
}
