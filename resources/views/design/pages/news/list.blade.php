@extends('design.layouts.app')
@section('content')
<div class="container mt-5 pt-5">


    <div class="row">
        <div class="col-lg-7 col-12">
            <h1 class="mb-4 h1 texmart-text-primary font-weight-medium" style="width: 120%;">Новости компании Texmart -
                Швейного
                <br>рынка Кыргызстана онлайн </h1>
            @foreach($news as $new)
                <div class="pr-5 mt-5 border-bottom">
                    <h3 class="">
                        {{ $new->title }}
                    </h3>
                    <div class="d-flex font-weight-light font-size-14 mb-2" style="color: #c4c4c4;">
                        <span>от редакции Texmart</span><span
                                class="ml-3">{{ \Carbon\Carbon::parse($new->updated_at)->format('y-m-d') }}</span>
                    </div>
                    <img class="img-fluid" src="{{ asset('storage/'.$new->preview) }}" alt="">
                    <div class="mt-3" style="overflow:hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; /* number of lines to show */-webkit-box-orient: vertical;">
                        <p>{!! $new->description !!}</p>
                    </div>
                    <div class="my-4">
                        <a class="fade-link" href="/news.show/{{$new->id}}">
                            <button class="btn btn-texmart-orange text-white py-2">Читать далее</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4">

        </div>
    </div>
</div>
@endsection