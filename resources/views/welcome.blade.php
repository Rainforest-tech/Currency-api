<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="{{asset('js/app.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="antialiased">
{{--@foreach($currencies as $currency)--}}
{{--    <div><h2>{{$currency->char_code}} - {{$currency->rate}}</h2></div>--}}
{{--@endforeach--}}
       <div id="app">
            <Currencies></Currencies>
       </div>
</body>
</html>
