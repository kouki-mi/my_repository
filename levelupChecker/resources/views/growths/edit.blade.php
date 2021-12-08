<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "計画情報の編集"])
</head>
<body>
  <header>
  @include('../template/header', ['mode' => "計画情報の編集"])
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-2 col-md-8">
        <a href="{{ route('growths.index')}}" class="nes-btn is-primary pull-right">戻る</a>
        <a href="{{ route('growths.delete', ['id' => $current_growth->id]) }}" class="nes-btn is-error pull-right">削除</a>
          <nav class="panel panel-info">
            <div class="panel-heading">記録の編集</div>
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
            <form action="{{ route('growths.edit',['id' => $current_growth->id])}}" method="post">
                @csrf
                <div class="title-form">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" name="title" id="title" value = "{{$current_growth->title}}"/>
                </div>
                <div class="content-form">  
                    <label for="content">概要</label>
                    <textarea class="form-control" name="content" id="content">
                        {{$current_growth->content}}
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