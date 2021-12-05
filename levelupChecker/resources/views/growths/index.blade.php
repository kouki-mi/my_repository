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
      <h1>計画一覧</h1>
      <div class = "text-center">
        <a href="create" class="nes-btn is-success">
            計画を追加する
        </a>
      </div>
  
        @foreach($growths as $growth)
          <div class="box">
            <div class = "box_title">{{$growth->title}}  Lv.{{$growth->exp_point}}</div>
            <label>目標: {{$growth->content}}</label>
            <a href = "{{ route('exps.index', ['id' => $growth->id]) }}" class = "nes-btn">詳細</a>
            <a href="{{ route('growths.edit', ['id' => $growth->id]) }}" class="nes-btn is-warning pull-right">編集</a>
          </div>
        @endforeach

    </div>
</main>
</body>
</html>