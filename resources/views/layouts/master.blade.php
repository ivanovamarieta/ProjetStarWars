
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

<header id="header" role="banner" class="grid-2">
    <div id="logo"><img src="{{url('assets/images/logo.jpg')}}" width="230" ></div>
   @include('partials.nav')
</header>
<div id="main" role="main" class="line pam">

<div class="container">

    @yield('content','default value')
</div>


</div>
<footer id="footer" role="contentinfo" class=" line pas txtcenter">
    <ul class="center inbl" >
        <li><a href='{{url('/')}}'>Accueil</a></li>
        <li><a href='{{url('mentions/')}}'>Mentions</a></li>
        <li><a href='{{url('contact/')}}'>Contact</a></li>
    </ul>
</footer>
</body>
</html>