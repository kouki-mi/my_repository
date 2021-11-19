<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事の削除"])
</head>
<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="/">ToDo App</a>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-2 col-md-8">
          <nav class="panel panel-default">
            <div class="panel-heading">やったことの削除</div>
            <div class="panel-body">
              <form action="{{ route('exps.delete',['id' => $current_exp->id,'growth_id' => $current_exp->growth_id]) }}" method="post">
                @csrf
                <h4 class="text-center">"{{$current_exp->title}}"を削除してもよろしいですか？</h4>
                <div class="text-center">
                  <button type="submit" class="nes-btn is-error">実行</button>
                  <a href="{{ route('exps.edit', ['id' => $current_exp->id]) }}" class="nes-btn is-success">戻る</a>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
</html>