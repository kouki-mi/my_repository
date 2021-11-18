<!DOCTYPE html>
<html lang="ja">
<head>
  @include('../template/head',['title' => "計画情報"])
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">level up checker</a>
  </nav>
</header>
<main>
    <div class="container">
      <div class = "text-center">
        <a href="create" class="nes-btn is-success">
            記録を追加する
        </a>
      </div>
  
        @foreach($growths as $growth)
            <div class ="panel panel-default">
              <div class ="panel-heading">{{$growth->title}}  Lv.{{$growth->exp_point}}</div>
              <a href="{{ route('growths.edit', ['id' => $growth->id]) }}" class="nes-btn is-warning pull-right">
                  編集
              </a>
              <div class= "panel-body">
                <p>概要: {{$growth->content}}</p>
                <div class="list-group">
                    <a href = "{{ route('exps.index', ['id' => $growth->id]) }}">やった事一覧</a>
                </div>
              </div>
            </div>
        @endforeach

    </div>
</main>
</body>
</html>