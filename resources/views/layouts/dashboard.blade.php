<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/print.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/preview.css')}}">

    <link rel="icon" href="{{asset('img/logo.jpg')}}">

    <style>
        body.pushable > .pusher {
            background-color: #fafafa;
            background-image: url({{asset("img/default_wallpaper.jpg")}});
            background-attachment: fixed;
        }
        body * {
            font-family: 'Raleway', sans-serif;
        }
    </style>

    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{asset('js/semantic.min.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('js/calendar.min.js')}}"></script>
    <script src="{{asset('js/notify.min.js')}}"></script>
    {{--<script src="{{asset('js/imagepreview.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.preview').anarchytip();
        });
    </script>--}}
</head>
<body class="pushable">
<div class="ui inverted vertical sidebar menu left" style="" id="section-not-to-print">
    <a href="" class="disabled item">
        <img src="{{asset('img/pics/'.Auth::user()->avatar)}}" alt="Avatar" class="ui centered preview image">
    </a>
    <h3 style="color: #cccccc;text-align:center;">{{(Auth::check()) ? Auth::user()->name : ''}}</h3>
    <a class="item" href="{{url('/home')}}">
        <i class="home icon"></i>
        Home
    </a>
    <div class="item">
        <div class="header">Downloads</div>
        <div class="menu">
            <a href="#" class="item" onclick="openModal()">
                <i class="download icon"></i>
                PDF
            </a>
            <a href="#" class="item" onclick="openModal()">
                <i class="download icon"></i>
                Word
            </a>
        </div>
    </div>

    <a class="item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        <i class="sign out icon"></i>{{ __('Sign Out') }}
    </a>
</div>
<div class="pusher" onclick="act_stop()">
    <div class="ui top attached stackable menu" id="section-not-to-print">
        <a class="item" onclick="act()">
            <i class="sidebar icon"></i>
        </a>
        <div class=" item" style="font-size: 120%">
            <img src="{{asset('img/logo.jpg')}}" alt="avatar" class="ui mini circular preview image">&nbsp;&nbsp;&nbsp;{{config('app.name')}}
        </div>
        @if(Auth::check())
            <a class=" item" href="{{url('/home')}}"><i class="home icon"></i>Home</a>
            <div class="right menu">
                <a href="#" class="item" onclick="openModal()">
                    <i class="filter icon"></i>Filter CV
                </a>
                <a href="#" class="item">
                    <img src="{{asset('img/pics/'.Auth::user()->avatar)}}" alt="avatar" class="ui mini circular preview image">&nbsp; My Account <i class="caret down icon"></i>
                </a>
                <a class="item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="sign out icon"></i>{{ __('Sign Out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @else
            <div class="right menu">
                <a href="{{route('index')}}" class="item"><i class="sign in icon"></i>Login</a>
            </div>
        @endif
    </div>
    @yield('content')
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=6fvdkvwegj79neunsa8hssvo6jxz408sww4yqmp7osv04er9"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script type="text/javascript">
    function openModal() {
        $('.ui.modal')
            .modal('show')
        ;
    }

    /*beautiful dropdown UI*/
    $('.ui.select.dropdown')
        .dropdown()
    ;
    $('.ui.search.select.dropdown')
        .dropdown({
            allowAdditions: true
        })
    ;
    /*show hide sidebar*/
    function act() {
        $('.ui.sidebar')
            .sidebar('setting', 'transition', 'overlay')
            .sidebar('toggle')
        ;
    }
    function act_stop() {
        $('.ui.sidebar')
            .sidebar('hide')
        ;
    }
    $('#example1')
        .calendar({
            ampm:false,
            formatter: {
                date: function (date, settings) {
                    if (!date) return '';
                    var day = date.getDate() + '';
                    if (day.length < 2) {
                        day = '0' + day;
                    }
                    var month = (date.getMonth() + 1) + '';
                    if (month.length < 2) {
                        month = '0' + month;
                    }
                    var year = date.getFullYear();
                    return year + '-' + month + '-' + day;
                }
            }
        });
    function _print() {
        window.print();
    }
</script>
</body>
</html>