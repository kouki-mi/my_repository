<!DOCTYPE html>
<html lang="ja">
<head>
  @include('../template/head',['title' => "level up checker"])
</head>
<body>
<header>

</header>
<main>
    <p class="intro_title">Level<br>up<br>checker</p>
    <div class = "pokemon">
        <img src = "{{$pokemon->img_url}}"  width="500" height="500">
        <a href="login" class = "nes-btn intro_btn">start</a>
    </div>
</main>
</body>
</html>