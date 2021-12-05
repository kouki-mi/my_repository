<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事一覧"])
</head>
<body>
<header>
@include('../template/header')
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
        <div class = "pokemon">
          <img src = "{{$pokemon->img_url}}"  width="500" height="500">
          <p>{{$pokemon->name}}</p>
        </div>
        <p>{{$current_growth->content}}</p>
  
        @foreach($exps as $exp)
          <div class="box">
            <div class = "box_title">{{$exp->title}}</div>
            <label>目標: {{$exp->content}}</label>
            <a href="{{ route('exps.edit', ['id' => $exp->id]) }}" class="nes-btn is-warning pull-right">編集</a>    
          </div>
        @endforeach

    </div>
</main>
</body>
</html>