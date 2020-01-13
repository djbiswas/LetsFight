{{--<aside id="main-sidebar" class="min-vh-100 h-100 bg-dark shadow-sm">--}}
<aside id="main-sidebar" class="min-vh-100 bg-dark shadow-sm">
    <ul id="accordion1" class="nav nav-pills nav-fill flex-column">
        <li>
            <a class="navbar-brand" href="{{ url('/') }}">

                <img class="img-fluid" src="{{ asset('images/logo.jpg')}}" alt="{{config('app.name','Soft X Technology ltd')}}" />
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#item-1" data-parent="#accordion1">Fight Category<i class="fa fa-caret-down"></i></a>
            <div id="item-1" class="collapse">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fightCategory.list') }}">Category list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fightCategory.create')}}">New Category</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Sub 1-3</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </li>
        <hr class="menu-hr">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion1">Weapons  <i class="fa fa-caret-down"></i></a>
            <div id="item-2" class="collapse">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('weapons.index')}}">Weapons List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('weapons.create')}}">New Weapon</a>
                    </li>
                </ul>
            </div>
        </li>
        <hr class="menu-hr">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion1">Players <i class="fa fa-caret-down"></i></a>
            <div id="item-3" class="collapse">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('players.index')}}">Player List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('players.create')}}">New Player</a>
                    </li>
                </ul>
            </div>
        </li>
        <hr class="menu-hr">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#fight" data-parent="#fight">Fights <i class="fa fa-caret-down"></i></a>
            <div id="fight" class="collapse">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fights.index')}}">Fight List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fights.create')}}">Set Fight</a>
                    </li>
                </ul>
            </div>
        </li>

        <hr class="menu-hr">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <i class="fa fa-sign-out-alt" aria-hidden="true"></i>

            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

</aside>


