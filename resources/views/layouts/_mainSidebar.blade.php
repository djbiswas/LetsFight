<aside id="main-sidebar" class="min-vh-100 h-100 bg-dark shadow-sm">
    <ul id="accordion1" class="nav nav-pills nav-fill flex-column">
        <li>
            <a class="navbar-brand" href="{{ url('/') }}">

                <img class="img-fluid" src="{{ asset('images/logo.jpg')}}" alt="{{config('app.name','Soft X Technology ltd')}}" />
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#item-1" data-parent="#accordion1">Fight Category</a>
            <div id="item-1" class="collapse">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fightCategory.list') }}">Category list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 1-2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 1-3</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion1">Item 2</a>
            <div id="item-2" class="collapse">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 2-1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 2-2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 2-3</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion1">Item 3</a>
            <div id="item-3" class="collapse">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 3-1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 3-2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub 3-3</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

</aside>
