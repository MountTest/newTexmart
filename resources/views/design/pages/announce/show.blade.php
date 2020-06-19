@extends('design.layouts.app')
@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-12 col-lg-4 order-md-0 order-1">
                <div class="block-top-block" style="box-shadow: 0px 4px 18px rgba(0, 0, 0, 0.12);">
                    @if(auth()->check())
                        <div class="buttons_customer font-weight-bold h4 py">
                            <a class="texmart-text-primary" href="tel:{{ $announce->phone }}"> + {{ $announce->phone }}</a>
                        </div>
                    @else
                        <div class="buttons_customer"></div>
                            <a href="{{ route('login') }}">
                                <button class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary fade-link">
                                    <span class="btn-text">Показать контакты</span>
                                </button>
                            </a>
                    @endif
                        <div class="pt-3 pb-4 border-bottom">
                            <i class="fas fa-eye fa-sm"></i><span class="ml-2">{{$announce->views}} человека просмотрели заказ</span>
                        </div>
                    {{--<div class="share_customer">--}}
                        {{--<span class="span_share">Поделиться:</span>--}}
                        {{--<div class="social_buttons" style="padding: 4px">--}}
                            {{--<a href="javascript:void(0)" title="vk" class="social-share-btn" data-url="{{ request()->url() }}" data-social="vk" data-text="{{ $production->title ?? 'awdawd' }}" style="width: 30px;height: 30px;">--}}
                                {{--<i class="fab fa-vk mr-3 fa-lg nav-scale"></i>--}}
                            {{--</a>--}}
                            {{--                            <a href="javascript:void(0)" title="instagram" class="social-share-btn" data-url="{{ request()->url() }}" data-social="instagram" data-text="{{ $production->title }}" style="width: 30px;height: 30px;">--}}
                            {{--                                <i class="fab fa-instagram mr-3 fa-lg nav-scale"></i>--}}
                            {{--                            </a>--}}
                            {{--<a href="javascript:void(0)" title="facebook" class="social-share-btn" data-url="{{ request()->url() }}" data-social="facebook" data-text="{{ $production->title ?? 'awdawd' }}" style="width: 30px;height: 30px;">--}}
                                {{--<i class="fab fa-facebook mr-3 fa-lg nav-scale"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                        <div class="d-flex mt-5">
                            @if(isset($announce->category->title))
                                <div class="d-flex align-items-center"
                                     style="border:0.7px solid #000000; border-radius:10px; padding:7px 25px;">
                                    {{ isset($announce->category->title) ? $announce->category->title : '' }}
                                </div>
                            @endif
                        </div>
                </div>
                {{--                <div class="block-middle-block">--}}
                {{--                    <ul class="customer_ul">--}}
                {{--                        <li class="customer_ul_li" style="display: flex;flex-wrap: nowrap;">--}}
                {{--                            <div style="margin-right: 30px;">--}}
                {{--                                <img src="{{ asset('icons/eye_for_customer.png') }}" alt="" class="img_customer">--}}
                {{--                            </div>--}}
                {{--                            <div>--}}
                {{--                                <span class="col_eye">250</span>--}}
                {{--                                <p class="customer_text">пользователя просматривали заказ</p>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                        <li style="display: flex;flex-wrap: nowrap;">--}}
                {{--                            <div style="margin-right: 30px;">--}}
                {{--                                <img src="{{ asset('icons/user_for_customer.png') }}" alt="" class="img_customer">--}}
                {{--                            </div>--}}
                {{--                            <div>--}}
                {{--                                <span class="col_request">3986</span>--}}
                {{--                                <p class="customer_text">уведомлены о заказе</p>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </div>
            <div class="col-12 col-lg-8 order-md-1 order-0">
                <div class="p-lg-5 p-md-3 p-3 position-relative rounded bg-white mb-5" style="box-shadow: 0px 4px 18px rgba(0, 0, 0, 0.12);">
                    {{--<div class="date-customer">{{ \Carbon\Carbon::make($announce->created_at)->format('d.m.Y') }}</div>--}}
                    <div class="border-bottom pb-4">
                        <h1 class="customer-title font-size-20">
                            {{ $announce->content }}
                        </h1>
                    </div>
                    <div class="p-lg-4 p-1 row justify-content-md-end justify-content-start">
                        <div class="col-auto d-lg-flex align-items-center d-block">
                            <p class="mb-lg-0 mb-3 mr-2">Поделиться:</p>
                            <button class="social-icons ml-lg-2 ml-0 social-share-btn" data-url="{{ request()->url() }}" data-social="whatsapp"><i class="fab fa-whatsapp fa-lg"></i></button>
                            <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="telegram"><i class="fab fa-telegram-plane fa-lg"></i></button>
                            <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="facebook"><i class="fab fa-facebook-square fa-lg"></i></button>
                            <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="instagram"><i class="fab fa-instagram fa-lg"></i></button>
                            <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="vk"><i class="fab fa-vk fa-lg"></i></button>
                        </div>
                    </div>
                    {{--                    <div class="footer_block">--}}
                    {{--                        <div class="item-detail_tags">--}}
                    {{--                            <div class="tags">--}}
                    {{--                                <a href="#" class="tag-lg">Женская одежда</a>--}}
                    {{--                                <a href="#" class="tag-lg">Ткани и фурнитура</a>--}}
                    {{--                                <a href="#" class="tag-lg">Женская обувь</a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.social-share-btn').click(e => {
            let btn = $(e.currentTarget);
            let social = btn.data('social');
            let url = btn.data('url');
            let text = btn.data('text');

            if (social == 'facebook') {
                url = 'https://facebook.com/sharer/sharer.php?u=' + url;
                window.open(url, "popupWindow", "width=600,height=600,scrollbars=yes");
            }
            if (social == 'vk') {
                url = 'https://vk.com/share.php?url=' + url;
                window.open(url, "popupWindow", "width=600,height=600,scrollbars=yes");
            }
            // if (social == 'instagram') {
            //     window.open($(this).attr("href", 'https://vk.com/share.php?url=' + url), "popupWindow", "width=600,height=600,scrollbars=yes");
            // }
        })
    </script>
@endpush