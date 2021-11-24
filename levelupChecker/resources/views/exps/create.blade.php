<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事の作成"])
</head>
<body>
  <header>
  @include('../template/header')
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-2 col-md-8">
        <a href="{{ route('exps.index', ['id' => $growth_id]) }}" class="nes-btn is-primary pull-right">戻る</a>
          <nav class="panel panel-default">
            <div class="panel-heading">やった事を追加しよう!</div>
            <div class="panel-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif  
            <form action="{{ route('exps.create',['id' => $growth_id]) }}" method="post">
                @csrf
                <div class="title-form">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="content-form">  
                    <label for="content">概要</label>
                    <textarea class="form-control" name="content" id="content">
                        
                    </textarea>
                </div>
                <div class="text-center">
                  <button type="submit" class="nes-btn is-success">保存</button>
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