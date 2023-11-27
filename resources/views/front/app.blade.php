<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Cameron-Jordon Eugene">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{asset('img/icon.png')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/jquery.signature.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.signature.css') }}">

    <link href="{{ asset('css/front.css') }}" rel="stylesheet">

    <style>
        .kbw-signature {
            max-width: 400px;
            width: 100%;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>
</head>

<body>
    <header>
        <div class="grid_3">
            <div class="logo">
                <img src="{{asset('img/saintlucia.png')}}" height="60" width="auto">
            </div>
            <div class="grid_3_2">
                <div class="call">
                    <a class="grid_2" href="tel:758-458-7101">
                        <img class="header-icon" src="{{asset('img/flaticon-xzopro-phone-cal.png')}}">
                        <div class="header-title">
                            <h3>Call us today!</h3>
                            <p>+1758-458-7101</p>
                        </div>
                    </a>
                </div>
                <div class="email">
                    <a class="grid_2" href="mailto:tourismlevy@stlucia.org">
                        <img class="header-icon" src="{{asset('img/flaticon-xzopro-email.png')}}">
                        <div class="header-title">
                            <h3>Reach us via Email!</h3>
                            <p>tourismlevy@stlucia.org</p>
                        </div>
                    </a>
                </div>
                <div class="grid_2 HOO">
                    <i class="fa fa-clock-o header-icon"></i>
                    <div class="header-title">
                        <h3>Hours of Operation</h3>
                        <p>8AM - 4:30PM, Monday to Friday</p>
                    </div>
                </div>
            </div>
            <div>
                <a href="https://saintluciatourismlevy.org/contact/" class="header-contact">Contact Us</a>
            </div>
        </div>
        <div class="grid_3_3">
            <nav>
                <a href="https://saintluciatourismlevy.org/">HOME</a>
                @guest
                @if(Route::has('login'))
                <a href="{{ route('login') }}">LOGIN</a>
                @endif
                @if(Route::has('login'))
                <a href="{{ route('register') }}">REGISTER</a>
                @endif
                @else
                <a href="/">PORTAL</a>
                @endguest
                <a href="#">REPORTS</a>
                <a href="https://saintluciatourismlevy.org/faqs/">FAQs</a>
                <a href="https://saintluciatourismlevy.org/news-media/">NEWS & MEDIA</a>
            </nav>
            <div></div>
            <div class="">
                <form action="https://saintluciatourismlevy.org/" method="get" class="grid_2_2 search-form">
                    <input type="text" name="s" placeholder="Search ...">
                    <div>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </header>


    @yield('content')
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
    <script src="{{ asset('js/front.js') }}" defer></script>

</body>

</html>