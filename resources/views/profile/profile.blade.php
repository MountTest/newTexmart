{{--@extends('profile.dashboard')--}}

{{--@section('profile_content')--}}

        @if($announces->first() instanceof \App\Production)
            <h3 class="section-heading mb-5 h1">Объявления заказчиков</h3>
            <section class="my-5">
                @foreach($announces as $announce)
                    <div class="media mt-4 px-1 text-md-left">
                        <a title="{{ $announce->title }}" href="{{ route('productions.show', $announce->slug) }}" class="media-body text-dark hoverable rounded-circle">
                            <div class="application_for">
                                <div class="app_content">
                                    <div class="app_top" style="display: flex;flex-wrap: nowrap;justify-content: space-between;">
                                        <p class="" title="{{ $announce->title }}" style="margin: 0em 0">{{ \Illuminate\Support\Str::limit($announce->title, 50) }}</p>
                                        <div class="">{{ \Carbon\Carbon::make($announce->created_at)->format('d.m.Y') }}</div>
                                    </div>
                                    <div class="app_bottom">
                                        {{--                                    <div class="app_category">--}}
                                        {{--                                        <p class="application_text" style="margin: 0em 0">Женская одежда</p>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="app_country">--}}
                                        {{--                                        <img src="{{asset('img/flag.png')}}" alt="Флаг">--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                @if($announces instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="row pl-4 ml-0 pt-3">
                        {{ $announces->appends(request()->query())->links() }}
                    </div>
                @endif
            </section>
        @endif

        @if($announces->first() instanceof \App\Announce)
                <h3 class="section-heading mb-5 h1">Объявления заказчиков</h3>
                <section class="my-5">
                    @foreach($announces as $announce)
                        <div class="media mt-4 px-1 text-md-left">
                            <a title="{{ $announce->content }}" href="{{ route('announce.show', $announce) }}" class="media-body text-dark hoverable rounded-circle">
                                <div class="application_for">
                                    <div class="app_content">
                                        <div class="app_top" style="display: flex;flex-wrap: nowrap;justify-content: space-between;">
                                            <p class="" title="{{ $announce->content }}" style="margin: 0em 0">{{ \Illuminate\Support\Str::limit($announce->content, 50) }}</p>
                                            <div class="">{{ \Carbon\Carbon::make($announce->created_at)->format('d.m.Y') }}</div>
                                        </div>
                                        <div class="app_bottom">
                                            {{--                                    <div class="app_category">--}}
                                            {{--                                        <p class="application_text" style="margin: 0em 0">Женская одежда</p>--}}
                                            {{--                                    </div>--}}
                                            {{--                                    <div class="app_country">--}}
                                            {{--                                        <img src="{{asset('img/flag.png')}}" alt="Флаг">--}}
                                            {{--                                    </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    {{--@if($announces instanceof \Illuminate\Pagination\LengthAwarePaginator)--}}
                        {{--<div class="row pl-4 ml-0 pt-3">--}}
                            {{--{{ $announces->appends(request()->query())->links() }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                </section>
        @endif
{{--@endsection--}}

