<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事一覧"])
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">level up checker</a>
  </nav>
</header>
<main>
    <div class="container">

          <a href="{{ route('exps.create', ['id' => $current_growth->id]) }}" class = "nes-btn is-success">  
            記録を追加する
          </a>

          <a href="/growths/index" class="nes-btn is-primary">
            戻る
          </a>

        <h2>{{$current_growth->title}}</h2>
        <h3>Lv.{{$current_growth->exp_point}}</h3>
        <p>{{$current_growth->content}}</p>
  
        @foreach($exps as $exp)
            <div class ="panel panel-default">
              <div class ="panel-heading">{{$exp->title}}</div>
              <div class= "panel-body">
                {{$exp->content}}
              </div>
            </div>
        @endforeach

    </div>
</main>
</body>
</html>