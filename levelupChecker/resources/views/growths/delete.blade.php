<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "計画情報の削除"])
</head>
<body>
  <header>
  @include('../template/header', ['mode' => "計画情報の削除"])
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-2 col-md-8">
          <nav class="panel panel-info">
            <div class="panel-heading">記録の削除</div>
            <div class="panel-body">
              <form action="{{ route('growths.delete',['id' => $current_growth->id]) }}" method="post">
                @csrf
                <h4 class="text-center">"{{$current_growth->title}}"を削除してもよろしいですか？</h4>
                <div class="text-center">
                  <button type="submit" class="nes-btn is-error">実行</button>
                  <a href="{{ route('growths.edit', ['id' => $current_growth->id]) }}" class="nes-btn is-success">戻る</a>
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