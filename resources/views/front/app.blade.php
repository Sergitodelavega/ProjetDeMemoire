<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield("title")</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('front.partials.style')
    @yield('style')
  
</head>
<body>
@include('front.partials.header')
@yield('content')
@include('front.partials.footer')

@include('front.partials.script')
@yield('script')
</body>
</html>