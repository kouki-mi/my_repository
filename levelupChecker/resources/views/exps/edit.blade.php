<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "やった事の編集"])
</head>
<body>
  <header>
  @include('../template/header', ['mode' => "ToDOの編集"])
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-2 col-md-8">
        <a href="{{ route('exps.index', ['id' => $growth_id,'mode'=>$mode]) }}" class="nes-btn is-primary pull-right">戻る</a>
        <a href="{{ route('exps.delete', ['id' => $current_exp->id]) }}" class="nes-btn is-error pull-right">削除</a>
          @if($mode==="todo")
          <!-- 完了処理 -->
          <form action="{{ route('exps.finish',['id' => $current_exp->id, 'growth_id' => $growth_id]) }}" method="post" class="finish_form">
              @csrf
              <button type="submit" class="nes-btn">完了にする</button>
          </form>
          @endif
          <div class="box">
            <div class="box_title">やった事の編集</div>
            <!-- エラーメッセージ -->
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif  
              <!-- 編集処理 -->
            <form action="{{ route('exps.edit',['id' => $current_exp->id, 'growth_id' => $growth_id]) }}" method="post">
              @csrf
              <div class="title-form">
                  <label for="title">タイトル</label>
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
        </div>
      </div>
    </div>
  </main>
</body>
</html>