@extends('design.layouts.app')
@section('content')

<div class="container mt-5 py-5">
    <div class="row">
        <div class="col-lg-8 col-12">
                <div class="pr-5 mt-5">
                    <h1 class="h3">
                        {{ $new->title }}
                    </h1>
                    <div class="d-flex font-weight-light font-size-14 mb-2" style="color: #c4c4c4;">
                        <span>от редакции Texmart</span><span
                                class="ml-3">{{ \Carbon\Carbon::parse($new->updated_at)->format('y-m-d') }}</span>
                    </div>
                    <img class="img-fluid" src="{{ asset('storage/'.$new->preview) }}" alt="">
                    <div class="py-4 row  justify-content-start">
                        <div class="col-auto d-lg-flex align-items-center d-block">
                            <p class="mb-lg-0 mb-3 mr-2">Поделиться:</p>
                            {{--                            <button class="social-icons ml-lg-2 ml-0 social-share-btn" data-url="{{ request()->url() }}" data-social="whatsapp"><i class="fab fa-whatsapp fa-lg"></i></button>--}}
                            {{--<button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="telegram"><i class="fab fa-telegram-plane fa-lg"></i></button>--}}
                            <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="facebook"><i class="fab fa-facebook-square fa-lg"></i></button>
                            {{--<button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="instagram"><i class="fab fa-instagram fa-lg"></i></button>--}}
                            <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="vk"><i class="fab fa-vk fa-lg"></i></button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>{!! $new->description !!}</p>
                    </div>
                    {{--<div class="my-4">--}}
                        {{--<button class="btn btn-texmart-orange text-white py-2">Читать далее</button>--}}
                    {{--</div>--}}
                </div>
        </div>
        <div class="col-4">

        </div>
    </div>
</div>
@endsection