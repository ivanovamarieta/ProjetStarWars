
<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>StarWars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/knacss.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>

<header id="header" role="banner" class="center">

    @include('partials.nav')
    <div id="logo"><img src="{{url('assets/images/logo.jpg')}}" width="250" ></div>
</header>
<div id="main" role="main" class="line pam">

<div class="container">

    @yield('content','default value')
</div>


</div>
<footer id="footer" role="contentinfo" class="line pam txtcenter">
@include('partials.nav_footer')
    </footer>
</body>
</html>