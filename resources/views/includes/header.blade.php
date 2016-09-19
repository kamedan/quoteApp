<header>
    <nav>
        <ul>
            <a href="{{route('admin.login')}}">Admin</a>
            @if(Auth::check())
            <a href="{{route('admin.logout')}}">logout</a>
            @endif
            <!--<li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>-->
        </ul>
    </nav>
</header>