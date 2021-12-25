<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事の削除"])
</head>
<body>
  <header>
  @include('../template/header', ['mode' => "ToDOの削除"])
  </header>
  <main>
    <div class="container">
      <div class = "box">
        <div class="box_title">やったことの削除</div>
          <form action="{{ route('exps.delete',['id' => $current_exp->id,'growth_id' => $current_exp->growth_id]) }}" method="post">
            @csrf
            <h4 class="text-center">"{{$current_exp->title}}"を削除してもよろしいですか？</h4>
            <div class="text-center">
              <button type="submit" class="nes-btn is-error">実行</button>
              <a href="{{ route('exps.edit', ['id' => $current_exp->id]) }}" class="nes-btn is-success">戻る</a>
            </div>
          </form>
        <div class = "box">
      </div>
  </main>
</body>
</html>