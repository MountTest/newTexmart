{{--<div class="container ">--}}
    <nav class="navbar navbar-expand-lg navbar-dark px-0 fixed-top menuse shadow-none pt-3">
        <div class="container px-md-0 px-2">
        <a class="navbar-brand fade-link" href="/">
            <img class="img-fluid" src="{{ asset('img/logo3.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto flex-row justify-content-around mb-3 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Покупателю
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ isset(Auth::user()->id) ? route('profile.announce.create') : route('login') }}">Создать тендер</a>
                        <a class="dropdown-item" href="{{ route('new-design/catalog',['type' => 'productions']) }}">Поставщики</a>
                        <a class="dropdown-item" href="{{ route('new-design/catalog',['type' => 'product']) }}">Товары</a>
                        <a class="dropdown-item" href="{{ route('new-design/catalog',['type' => 'service']) }}">Услуги</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Поставщику
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('announces.list') }}">Заказы</a>
                        <a class="dropdown-item" href="#">Добавить компанию</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn border border-white rounded py-2 px-5 shadow-none" style="text-transform: none;" href="{{ isset(Auth::user()->id) ? route('profile.announce.create') : route('login') }}">Создать тендер</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn border border-white rounded py-2 px-5 shadow-none" style="text-transform: none;" href="#">Добавить компанию</a>
                </li>
                <li class="nav-item">
                    @auth
                        <a class="nav-link btn border texmart-border-primary texmart-bg-primary rounded py-2 px-3 fade-link" style="text-transform: none; box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);"
                           href="{{  route('newprofile') }}">Личный кабинет</a>
                    @else
                        <a class="nav-link btn border texmart-border-primary texmart-bg-primary rounded py-2 px-3 fade-link" style="text-transform: none; box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);"
                           href="{{  route('login') }}">Войти</a>
                    @endauth


                </li>
                <li class="nav-item mx-2 align-items-center d-lg-flex d-md-none d-none menu-sidenav">
                    <span class="navbar-toggler-icon h5 mb-0"></span>
                </li>
                {{--                        <li class="nav-item d-flex align-items-center">--}}
                {{--                            <a class="nav-link" href="#"><i class="fas fa-bars fa-lg"></i></a>--}}
                {{--                        </li>--}}
            </ul>
        </div>
        </div>
    </nav>
{{--</div>--}}
