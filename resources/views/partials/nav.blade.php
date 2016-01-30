<nav id="navigation" role="navigation"  class="fr mtl mtl">
    <ul class="pam">
            <li><a href='{{url('/')}}'>Accueil</a></li>
        @forelse($categories as $category)
            <li><a href='{{url('cat', $category->id)}}'> {{$category->title}}</a></li>
        @empty
            <li>{{trans('app.noCategory')}}</li>
        @endforelse
           <li><a href='{{url('contact/')}}'>Contact</a></li>

        @if(Auth::check())
            <li><a href='{{url('/logout')}}'>Logout</a></li>
            @else
            <li><a href='{{url('/login')}}'>Login</a></li>
        @endif


        <li><a href='{{url('cart')}}'><i class="fa fa-shopping-cart"> {{trans('app.Cart')}} </i>
            </a></li>

        @if($user=Auth::user())
            <li>  {{$user->name}},vous êtes connecté </li>
            @else
            <li></li>
            @endif
    </ul>
</nav>

