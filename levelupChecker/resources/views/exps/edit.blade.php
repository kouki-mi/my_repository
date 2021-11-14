<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事の編集"])
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
        <a href="{{ route('exps.index', ['id' => $growth_id]) }}" class="nes-btn is-primary pull-right">戻る</a>
          <nav class="panel panel-default">
            <div class="panel-heading">やった事を編集しよう!</div>
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
            <form action="{{ route('exps.edit',['id' => $current_exp->id, 'growth_id' => $current_exp->growth_id]) }}" method="post">
                @csrf
                <div class="title-form">
                    <label for="title">挑戦する事</label>
                    <input type="text" class="form-control" name="title" id="title" value = "{{$current_exp->title}}"/>
                </div>
                <div class="content-form">  
                    <label for="content">概要</label>
                    <textarea class="form-control" name="content" id="content">
                        {{$current_exp->content}}
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