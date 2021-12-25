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
      <a href="{{ route('exps.create', ['id' => $current_growth->id,'action' => 'create']) }}" class = "nes-btn is-success">  
        記録を追加する
      </a>

      <a href="/growths/index" class="nes-btn is-primary">
        戻る
      </a>

      <h2 class="text-center">{{$current_growth->title}} Lv.{{$current_growth->exp_point}}</h2>
      <h3>概要 : {{$current_growth->content}}</h3>
      <div class = "pokemon">
        <img src = "{{$pokemon->img_url}}"  width="500" height="500">
      </div>
      @if($mode === "todo")
        <div class = todo_nav>
          <label class="todo_label">"これからやる事"を表示中</label>
          <a href="{{ route('exps.index', ['id'=>$current_growth->id,'mode' => 'finish']) }}" class="nes-btn is-primary pull-right">切り替え</a>
        </div>
      @else
        <div class = "finish_nav">
          <label class="finish_label">"完了した事"を表示中</label>
          <a href="{{ route('exps.index', ['id'=>$current_growth->id,'mode' => 'todo']) }}" class="nes-btn is-primary pull-right">切り替え</a>
        </div>
      @endif
  
        @foreach($exps as $exp)
          <div class="box">
            <div class = "box_title">{{$exp->title}}</div>
            <label>目標: {{$exp->content}}</label>
            <a href="{{ route('exps.edit', ['id' => $exp->id,'mode'=>$mode,'action' => 'edit']) }}" class="nes-btn is-warning pull-right">編集</a>    
          </div>
        @endforeach

    </div>
</main>
</body>
</html>