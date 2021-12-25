<!DOCTYPE html>
<html lang="ja">
<head>
@include('../template/head',['title' => "計画情報の作成"])
</head>
<body>
  <header>
  @include('../template/header', ['mode' => "計画一覧"])
  </header>
  <main>
    <div class="container">
      <a href="/growths/index" class="nes-btn is-primary pull-right">戻る</a>
      @if($action === "edit")
        <a href="{{ route('growths.delete', ['id' => $current_growth->id]) }}" class="nes-btn is-error pull-right">削除</a>
      @endif
      <div class="box">
        <div class="box_title">@yield('form_title')</div>
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $message)
                  <li>{{ $message }}</li>
                @endforeach
              </ul>
            </div>
          @endif
            @yield('form_action')
            @csrf
            <div class="title-form">
                <label for="title">タイトル</label>
                @if($action === "edit")
                <input type="text" class="form-control" name="title" id="title" value = "{{$current_growth->title}}"/>
                @else
                <input type="text" class="form-control" name="title" id="title" />
                @endif
            </div>
            <div class="content-form">  
                <label for="content">概要</label>
                <textarea class="form-control" name="content" id="content">
                  @if($action === "edit")
                  {{$current_growth->content}}
                  @endif
                </textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="nes-btn is-success">保存</button>
              
            </div>
            
          </form>
        </div>
      </div>
  </main>
</body>
</html>