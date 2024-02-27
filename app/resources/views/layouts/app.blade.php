<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCTzFsGxWe3BrumF-hOy27M2tXq9D_Nn7w&language=ja"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
    $(function () {
        $('div#post_button').on('click', () => {
            $('div#back').css('display','block');
        });
    });

    $(function () {
        $('button#post_form_close').on('click', () => {
            $('div#back').css('display','none');
        });
    });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
    html { height: 100% }
    body { height: 100% }
    #map { height: 94%; width: 100%; position: relative}

    #box { height: 94%; width:20%; background-color: white; position: absolute; left: 0%; top: 6%; padding:1%;}

.search-form {
    display: flex;
    justify-content: space-between;
    align-items: center;
    overflow: hidden;
    border: 1px solid #777777;
    border-radius: 3px;
    height:5%;
    width:90%;
}

.search-form input {
    width: 100%;
    height: 45px;
    padding: 5px 15px;
    border: none;
    box-sizing: border-box;
    font-size: 1em;
    outline: none;
    margin-top:3%;
}

.search-form input::placeholder{
    color: #777777;
}

.search-form button {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 45px;
    border: none;
    background-color: transparent;
    cursor: pointer;
}

.search-form button::after {
    width: 24px;
    height: 24px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z' fill='%23777777'%3E%3C/path%3E%3C/svg%3E");
    background-repeat: no-repeat;
    content: '';
}
#timeline{margin-top:5%; height:87%;overflow:auto}
#post{margin-top:5%}
.btn--orange,
div.btn--orange {
  color: #fff;
  background-color: #eb6100;
  width:100%
}
.btn--orange:hover,
div.btn--orange:hover {
  color: #fff;
  background: #f56500;
}

div.btn--radius {
   border-radius: 100vh;
}
#post_detail{display:flex;margin-bottom:3%;border:1px solid #000000; padding:3%;}
#box3{width:100%}
#post_user_detail{display:flex; justify-content: space-between;}
#user_icon{background-color:black; height:3vw; width:3vw;border-radius:150px;object-fit:cover}
#post_at{display:block}
#box2{background-color:white;width:40vw;height:20vw;border-radius:25px;padding:1%;margin:0 auto;margin-top:10%}
#post_form_close{color:black;background-color:white}
#my_icon{height:5vw;width:5vw;border-radius:150px;object-fit:cover}
#post_form_detail{display:flex;margin-top:3%}
form{margin-left:5%;width:80%}
textarea.form-control{height:45%}
button.btn btn-primary.mt-3{justify-content:;}
#back{background-color:rgba(0,0,0,0.6);position: absolute;top:0;left:0;width:100%;height:100%;display:none}
button.btnbtn-primary{margin-top:3%;margin-left:25%}

#mypage{background-color:white;width:60%;height:94%;margin:0 auto;border:solid 1px;overflow:auto}
#box11{height:30%;display:flex;padding:2.5%}
#mypage_icon{width:10vw;height:10vw;border-radius:150px;object-fit:cover}
#stetus{background-color:white;width:60%;margin:0 auto;}
table#stetus{width:100%;height:100%;justify-content: space-between;}
th{font-size:1vw;font-weight:bold;white-space: nowrap ;margin:0 auto;}
td{font-size:1vw;font-weight:bold;white-space: nowrap ;margin:0 auto;}
#box12{display:block}
a#user_edit{margin-left:10%;white-space: nowrap;font-size:1vw;color:black;}
#box13{background-color:white;width:60%;margin:0 auto;}
button{color: #fff;background-color: #eb6100;width:20%;border-radius:150px}
#like{margin-left:30%}
#follow{margin-left:5%}
#img{width:100%;height:100%}
#profile{width:60%;margin:0 auto;margin-top:5%}
#post_edit{color:white}
#button_box{margin-top:1%}

</style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"><a href="{{ route('mypage') }}"></span>
                                </a>

                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('mypage') }}" class="dropdown-item">マイページ</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>                        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
</body>
</html>
