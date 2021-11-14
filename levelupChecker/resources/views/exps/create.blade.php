<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事の作成"])
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
            <div class="panel-heading">やった事を追加しよう!</div>
            <div class="panel-body">
              <form action="{{ route('exps.create',['id' => $growth_id]) }}" method="post">
                @csrf
                <div class="title-form">
                    <label for="title">挑戦する事</label>
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
      <a href="/growths/index" class="nes-btn is-primary">
            ホームに戻る
      </a>
    </div>
  </main>
</body>
</html>