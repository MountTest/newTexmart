<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-9 col-lg-4 pb-lg-0 pb-md-5">
            <h2 class="mb-5 h1 texmart-text-primary font-weight-medium" style="width: 120%;">Заявки от заказчиков </h2>
            <div class="slider">
                @foreach($announces as $announce)
                    <div class="item_slider">
                        <div class="application_for" style="border-color: rgba(205, 136, 45, 0.52);">
                            <div class="app_content">
                                <div class="app_top">
                                    {{--@dd($announce)--}}
                                    <a class="text-dark" href="{{ route('announce.show', $announce) }}">
                                        <p class="m-0" title="{{ $announce->content }}">
                                            {{ \Illuminate\Support\Str::limit($announce->content, 150) }}
                                        </p>
                                    </a>
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
                    </div>
                @endforeach
            </div>
            <div class="form-group text-center mt-5">
                <a href="{{ route('announces.list') }}" class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary fade-link">Все заявки</a>
            </div>
        </div>
        <div class="col-1 d-none d-lg-block"></div>
        <div class="col-12 col-md-9 texmart-shadow texmart-border-radius col-lg-5 px-5 mt-5 pt-5 mt-lg-0 pt-lg-0">
            <form action="#" class=" py-4">
                <h2 class="text-center texmart-text-primary mb-4">Создайте заявку</h2>
                <div class="form-group">
                    <label for="comment" class="texmart-text-grey">Составьте подробное описание продукции, <br> которую вы ищете</label>
                    <textarea name="" class="form-control border-dark" id="comment" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="name" class="texmart-text-grey">Введите ФИО</label>
                    <input name="" class="form-control border-dark" id="name"/>
                </div>
                <div class="form-group">
                    <label for="phone" class="texmart-text-grey">Номер телефона</label>
                    <input name="" class="form-control border-dark" id="phone"/>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary">Далее</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('styles')
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            // slick carousel
            $('.slider').slick({
                vertical: true,
                autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 4,
                slidesToScroll: 1,
                touchmove: false,
                swipeToSlide: false,
                touchThreshold: false,
                draggable: false,
                verticalSwiping: false,
            });

        });
    </script>
@endpush
