@section('header')
<nav class="my-navbar">
    <a class="my-navbar-brand" href="/growths/index">level up checker</a>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button type ="submit" class = "nes-btn is-error">ログアウト</button>
</form>
@show