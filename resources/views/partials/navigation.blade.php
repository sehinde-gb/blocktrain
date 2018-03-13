<header role="banner">
    <nav role="navigation" class="logo-left">
        @if (Auth::guest())

            <div class="menu">
                <ul>
                    <li><a href="/home">Dashboard</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                </ul>
            </div><!-- /.right-menu -->
        @else



            <div class="menu">
                <ul>
                    <li><a href="/home">Dashboard</a></li>
                    <li><a href="{{ url('/logout') }}"

                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div><!-- /.right-menu -->


        @endif

    </nav>
</header>

