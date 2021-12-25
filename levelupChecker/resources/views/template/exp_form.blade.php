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
        <a href="{{ route('exps.index', ['id' => $growth_id,'mode'=>$mode]) }}" class="nes-btn is-primary pull-right">戻る</a>
        @if($action === "edit")
        <a href="{{ route('exps.delete', ['id' => $current_exp->id]) }}" class="nes-btn is-error pull-right">削除</a>
        @endif
        @if($mode === "todo")
        <!-- 完了処理 -->
        <form action="{{ route('exps.finish',['id' => $current_exp->id, 'growth_id' => $growth_id]) }}" method="post" class="finish_form">
            @csrf
            <button type="submit" class="nes-btn">完了にする</button>
        </form>
        @endif
        <div class="box">
          <div class="box_title">@yield('form_title')</div>
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
            <!-- それぞれの処理 <form>の部分-->
          @yield('form_action')
            @csrf
            <div class="title-form">
                <label for="title">タイトル</label>
                @if($action === "edit")
                <input type="text" class="form-control" name="title" id="title" value = "{{$current_exp->title}}"/>
                @else
                <input type="text" class="form-control" name="title" id="title" />
                @endif
            </div>
            <div class="content-form">  
                <label for="content">概要</label>
                <textarea class="form-control" name="content" id="content">
                  @if($action === "edit")
                  {{$current_exp->content}}
                  @endif
                </textarea>
            </div>
            <div class="text-center">
            <button type="submit" class="nes-btn is-success">保存</button>
            </div>
          </form>
      </div>
  </main>
</body>
</html>