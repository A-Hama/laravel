<!-- header & grobal navi -->
<nav class="navbar navbar-default" style="background-color: #FFFFFF;">
  <div class="container-fluid">
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample2">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="/">
  <img alt="Laravel学習帳" src="/img/logo.png" style="height: 20px;">
  </a>
  </div>
 
  <div class="collapse navbar-collapse" id="navbarEexample2">
  <ul class="nav navbar-nav">
  <li class=""><a href="/">生徒一覧</a></li>
  <li class="nav-item dropdown">
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </li>
        <li class="nav-item">
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">新規会員登録</a>
            @endif
        </li>
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" href="/user/{{Auth::user()->id}}">マイページ</a>
            </div>
        </li>
    @endguest
  </ul>
  </div>
  </div>
</nav>
