<?php

namespace App\Http\Controllers;
//使うモデル
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    
    public function index($id){
        //レコードの値を全て取得
        $records = Record::all();

        return view('records/index',['records'=>$records,'current_record_id' =>$id]);
    }
}
