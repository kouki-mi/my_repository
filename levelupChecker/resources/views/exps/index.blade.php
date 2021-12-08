<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事一覧"])
</head>
<body>
<header>
@include('../template/header',['mode' => "ToDO"])
</header>
<main>
    <div class="container">
      <a href="{{ route('exps.create', ['id' => $current_growth->id]) }}" class = "nes-btn is-success">  
        記録を追加する
      </a>

      <a href="/growths/index" class="nes-btn is-primary">
        戻る
      </a>

      <h3 class="text-center">{{$current_growth->title}} Lv.{{$current_growth->exp_point}}</h3>
      <p>{{$current_growth->content}}</p>
      <div class = "pokemon">
        <img src = "{{$pokemon->img_url}}"  width="500" height="500">
        <p>{{$pokemon->name}}</p>
      </div>
      @if($mode === "todo")
      <label class="todo_label">"これからやる事"を表示中</label>
      <a href="{{ route('exps.index', ['id'=>$current_growth->id,'mode' => 'finish']) }}" class="nes-btn is-primary pull-right">切り替え</a>
      @else
      <label class="finish_label">"完了した事"を表示中</label>
      <a href="{{ route('exps.index', ['id'=>$current_growth->id,'mode' => 'todo']) }}" class="nes-btn is-primary pull-right">切り替え</a>
      @endif
  
        @foreach($exps as $exp)
          <div class="box">
            <div class = "box_title">{{$exp->title}}</div>
            <label>目標: {{$exp->content}}</label>
            <a href="{{ route('exps.edit', ['id' => $exp->id,'mode'=>$mode]) }}" class="nes-btn is-warning pull-right">編集</a>    
          </div>
        @endforeach

    </div>
</main>
</body>
</html>