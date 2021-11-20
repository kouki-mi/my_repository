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
        <div class = "exp_monster">
          <img src = "/img/{{$current_growth->img}}"  width="240" height="200">
        </div>
        <p>{{$current_growth->content}}</p>
  
        @foreach($exps as $exp)
            <div class ="panel panel-default"> 
              <div class ="panel-heading">
                {{$exp->title}}
              </div>
              <a href="{{ route('exps.edit', ['id' => $exp->id]) }}" class="nes-btn is-warning pull-right">
                  編集
              </a>             
              <div class= "panel-body">
                {{$exp->content}}
              </div>
            </div>
        @endforeach

    </div>
</main>
</body>
</html>