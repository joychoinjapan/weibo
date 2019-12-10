<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Weibo App</a>
        <ul class="navbar-nav justify-content-end">
            @if(\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item"><a class="nav-link" href="">ユーザーリスト</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('users.show',\Illuminate\Support\Facades\Auth::user())}}">プロフィール</a>
                        <a class="dropdown-item" href="#">プロフィールを編集</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="logout" href="#">
                        <form action="{{route('logout')}}" method="post" class="m-0">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                        <button class="btn btn-outline-danger btn-block" type="submit" name="button">ログアウト</button>
                        </form>
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">ヘルプ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">ログイン</a></li>
            @endif
        </ul>
    </div>
</nav>
