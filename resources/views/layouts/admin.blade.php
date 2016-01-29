
<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">

    <title>StarWars@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/knacss.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" media="all">
</head>
<body>

<header id="header" role="banner" class="line pam">
    <nav id="navigation" role="navigation" class="txtcenter">
      <ul class="navigation">
          <li><a href="{{url('/')}}">{{trans('app.backHome')}}</a></li>
          <li><a href="{{url('product')}}">{{trans('app.Dashboard')}}</a></li>
          <li><a href="{{url('history')}}">{{trans('app.History')}}</a></li>
          <li><a href="{{url('logout')}}">{{trans('app.Logout')}}</a></li>
          </ul>
    </nav>
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