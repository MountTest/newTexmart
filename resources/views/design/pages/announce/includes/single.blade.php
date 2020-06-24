@foreach($announces as $announce)
    {{--@dd($announce)--}}
<div class="application_for mb-2" style="border-color: rgba(205, 136, 45, 0.52);">
    <div class="app_content">
        <div class="d-flex">
        <div class="app_top col-lg-9 col-md-9 col-12">
            <a class="text-dark fade-link" href="{{ route('announce.show', $announce) }}">
                <p class="m-0" title="{{ $announce->content }}">
                    {{ \Illuminate\Support\Str::limit($announce->content, 150) }}
                </p>
            </a>
        </div>
            <div class="col-lg-3 col-md-3 col-12 d-flex justify-content-end pr-5 align-items-center">

                <div class="mx-2 position-relative contact"><i class="far fa-id-card fa-lg icon-announces"></i>
                    <div class="position-absolute bg-white p-3 contact-content border" style="width:350px; display: none; right:0;">
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <p class="font-size-12 mb-1"> Владелец:<span class="font-size-16 line-height-110 mb-2 ml-2">{{ $announce->name }}</span></p>
                            <p class="font-size-12 mb-0"> Номер телефона: <a href="tel:{{$announce->phone}}"><span class="font-size-16 line-height-110 mb-0 ml-2">{{ $announce->phone }}</span></a></p>
                        @else
                            <p class="font-size-14 line-height-110 mb-0">Для просмотра контактов зарегистрируйтесь</p>
                        @endif
                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="mx-2 icon-like" data-id="{{$announce->id}}"><i class="fas fa-heart fa-lg icon-announces  {{$announce->like_users->find(\Illuminate\Support\Facades\Auth::id()) ? 'like-active' : ''}}" ></i></div>
                @else
                    <div class="mx-2 position-relative contact"><i class="fas fa-heart fa-lg icon-announces"></i>
                        <div class="position-absolute bg-white p-3 contact-content border contact-content" style="width:350px; display: none; right:0;">
                                <p class="font-size-14 line-height-110 mb-0">Для добавления в избранное зарегистрируйтесь</p>
                        </div>
                    </div>
                @endif
                    {{--                <img class="mr-4" src="{{ asset('images/announce1.svg') }}" alt="">--}}
                {{--<img src="{{ asset('images/announce2.svg') }}" alt="">--}}
            </div>
        </div>
        <div class="app_bottom">
            <div>
                @if(isset($announce->category->title))
                    <div class="d-flex align-items-center"
                         style="border:0.7px solid #000000; border-radius:5px; padding:4px 25px;">
                        {{ isset($announce->category->title) ? $announce->category->title : '' }}
                    </div>
                @endif
            </div>
            @if(isset($announce->locate))
                <div class="d-flex align-items-center justify-content-start ml-4">
                    <div class="iti__flag iti__{{$announce->locate}}">
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
@endforeach
@push('scripts')

@endpush