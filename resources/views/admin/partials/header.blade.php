<nav class="navbar navbar-expand-lg navbar-dark px-0 fixed-top menuse shadow-none py-0 solid-nav shadow-none" style="opacity:1!important; background-color: #F3C162">
    <div class="container px-md-0 px-2">
        <a class="navbar-brand fade-link" href="/">
            <img class="img-fluid" src="{{ asset('img/logo3.png') }}" alt="">
        </a>
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse"--}}
                {{--data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
                {{--aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            <div class="ml-auto">
                <div class="user-bar d-flex align-items-center">
                    <div class="notification mr-4 d-none">
                        <i class="far fa-bell font-size-24" style="color: #939393;"></i>
                    </div>
                    <div class="rounded-circle" style="height:52px; width:52px; background-image: url({{ asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar) }}); background-size: cover; background-position: center;"></div>
                    <p class="mb-0 ml-3 d-lg-block text-white">{{ auth()->user()->name }}</p>
                </div>
            </div>
        {{--</div>--}}
    </div>
</nav>

