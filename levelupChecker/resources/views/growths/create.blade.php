<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "計画情報の作成"])
</head>
<body>
  <header>
  @include('../template/header')
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-2 col-md-8">
        <a href="/growths/index" class="nes-btn is-primary pull-right">戻る</a>
          <nav class="panel panel-info">
            <div class="panel-heading">挑戦する事を追加する</div>
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
              <form action="{{ route('growths.create') }}" method="post">
                @csrf
                <div class="title-form">
                    <label for="title">挑戦する事</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="content-form">  
                    <label for="content">目標</label>
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