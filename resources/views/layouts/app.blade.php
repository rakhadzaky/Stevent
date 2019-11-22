<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Stevent</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my-css.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/fae8817a1c.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm Stev-Navbar">
            <div class="container">
                <a class="navbar-brand text-light Stev-Title" href="{{ route('home') }}">
                    Stevent
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>
                        <div class="Stev-form-image w-50">
                            <form action="{{route('home.search')}}" method="POST" class="row">
                                @csrf
                                <input type="text" name="search" id="search" onInput="showSearch()" class="form-control Stev-form-control" placholder="Search">
                                <div class="Stev-search-dropdown-box hidden" id="searchBox">
                                    <!-- <div class="row">
                                        <div class="col-sm-3">
                                            <img src="{{ asset('img/event') }}/timthumb.png" alt="" class="w-100">
                                        </div>
                                        <div class="col-sm-6">
                                            <b>Judul</b><br>
                                            <span>Teknologi</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="text-weight-light float-right">FREE</span>
                                        </div>
                                    </div> -->
                                </div>
                            </form>
                            <span class="fa fa-search"></span>
                        </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="{{route('myTicket')}}" class="nav-link text-light mx-3"><span class="fa fa-ticket" aria-hidden="true"></span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-light mx-3"><span class="fa fa-bell" aria-hidden="true"></span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('organizers.index')}}">
                                        Organizers
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main>
            @yield('content')
        </main>
    </div>
    <script>
        if(localStorage.getItem("token")) {
            let decoded = jwt_decode(localStorage.getItem("token"));
            window.Echo.private(`App.User.`+decoded.sub)
                .notification((notification) => {
                console.log(notification);
            });
        }
        function showSearch(){
            if ($('#search').val().length> 1) {
                // do search for this.value here
                $('#searchBox').removeClass('hidden')
                var value = $('#search').val()
                var content = $('#searchBox')
                var list = ""
                var address = "{{ asset('img/event') }}"
                $.getJSON("{{url('')}}/searchJS/"+value, function(result){
                    $.each(result, function(i, field){
                        for (let index = 0; index < field.length; index++) {
                            if(field[index].harga == 0){
                            list += "<div class='row'>"+
                                            "<div class='col-sm-3'>"+
                                                "<img src='"+address+"/"+field[index].sampul+"' alt='Poster' class='w-100 img'>"+
                                            "</div>"+
                                            "<div class='col-sm-6'>"+
                                                "<b>"+field[index].judul+"</b><br>"+
                                                "<span>Teknologi</span>"+
                                            "</div>"+
                                            "<div class='col-sm-3'>"+
                                            "<span class='text-weight-light float-right'>FREE</span>"+
                                            "</div>"+
                                        "</div>"
                            }else{
                            list += "<div class='row'>"+
                                            "<div class='col-sm-3'>"+
                                                "<img src='"+address+"/"+field[index].sampul+"' alt='Poster' class='w-100 img'>"+
                                            "</div>"+
                                            "<div class='col-sm-6'>"+
                                                "<b>"+field[index].judul+"</b><br>"+
                                                "<span>Teknologi</span>"+
                                            "</div>"+
                                            "<div class='col-sm-3'>"+
                                            "<span class='text-weight-light float-right'>"+field[index].harga+"</span>"+
                                            "</div>"+
                                        "</div>"
                            }
                        }
                        content.html(list)
                    });
                });

            }else{
                $('#searchBox').addClass('hidden')
            }
        }
    </script>
</body>
</html>
