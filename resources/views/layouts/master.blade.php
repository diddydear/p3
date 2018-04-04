<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Foobooks')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='/css/friendfinder.css' type='text/css' rel='stylesheet'>


    @stack('head')
</head>
<body>

<header class="box">
    <a href='/'><img src='/images/friendfinder_logo.png' id='logo' class="text-center" alt='FriendFinder Logo'></a>
</header>

<section class="container minHeight">
    @yield('content')
</section>

<footer class="footer">
    &copy; {{ date('Y') }}
</footer>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

@stack('body')

</body>
</html>