<!DOCTYPE html>
<html lang="ja">
<head>
  @include('../template/head',['title' => "計画情報"])
</head>
<body>
<header>
@include('../template/header')
</header>
<main>
    <div class="container">
      <div class = "text-center">
        <a href="create" class="nes-btn is-success">
            目標を追加する
        </a>
      </div>
  
        @foreach($growths as $growth)
            <div class ="panel panel-info">
              <div class ="panel-heading">{{$growth->title}}  Lv.{{$growth->exp_point}}</div>
              <a href="{{ route('growths.edit', ['id' => $growth->id]) }}" class="nes-btn is-warning pull-right">
                  編集
              </a>
              <div class= "panel-body">
                <p>目標: {{$growth->content}}</p>
                <a href = "{{ route('exps.index', ['id' => $growth->id]) }}" class = "nes-btn">詳細</a>
                <div class = "growth_monster">
                  <img src = "/img/{{$growth->img}}"  width="120" height="100">
                </div>
              </div>
            </div>
        @endforeach

    </div>
</main>
</body>
</html>