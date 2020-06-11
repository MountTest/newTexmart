<footer class="border-top">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-6 mb-5 mb-md-5 mt-lg-0">
                {{--<img src="{{ asset('design/map.png') }}" class="img-fluid" alt="">--}}
                    <div id="map" style="width: 100%; height: 350px;"></div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12 col-md-6 mt-5 mt-md-0 text-center text-md-left">
                        <h4 class="font-weight-bold">О компании</h4>
                        <ul class="nav flex-column mt-4">
                            <li class="nav-item mb-1">
                                <a href="#" class="text-muted">О Texmart</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="text-muted">Новости</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="text-muted">Полезные статьи</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="text-muted">Отзывы</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 mt-5 mt-md-0 text-center text-md-left">
                        <h4 class="font-weight-bold">Сервисы</h4>
                        <ul class="nav flex-column mt-4">
                            <li class="nav-item mb-1">
                                <a href="#" class="text-muted">Наши услуги</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="text-muted">Создать тендер</a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="text-muted">Добавить компанию</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-12">
                        <h4 class="font-weight-bold">Социальные</h4>
                        <ul class="nav">
                            <li class="nav-item mr-3 new-box row no-gutters justify-content-center align-items-center">
                                <a href="#" class="text-warning"><i class="fab fa-whatsapp fa-lg"></i></a>
                            </li>
                            <li class="nav-item mr-3 new-box row no-gutters justify-content-center align-items-center">
                                <a href="#" class="text-warning"><i class="fab fa-telegram-plane fa-lg"></i></a>
                            </li>
                            <li class="nav-item mr-3 new-box row no-gutters justify-content-center align-items-center">
                                <a href="#" class="text-warning"><i class="fab fa-instagram fa-lg"></i></a>
                            </li>
                            <li class="nav-item mr-3 new-box row no-gutters justify-content-center align-items-center">
                                <a href="#" class="text-warning"><i class="fab fa-facebook-f fa-lg"></i></a>
                            </li>
                            <li class="nav-item mr-3 new-box row no-gutters justify-content-center align-items-center">
                                <a href="#" class="text-warning"><i class="fab fa-vk fa-lg"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="text-muted">Узнавате о выгодных предложениях <br> и новостях первыми</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <form action="#" method="get" class="position-relative">
                            <input type="email" placeholder="Email" class="form-control pr-5">
                            <i class="fas fa-envelope text-white position-absolute shadow texmart-bg-primary rounded"
                               style="right: 0;top: 50%;transform: translateY(-50%);border: 1px solid #3e3e3e20;padding: 11px;"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 mt-5 text-center">
                <a href="#" class="text-muted small">Made with <span class="text-danger">&hearts;</span> by Mount</a>
            </div>
        </div>
    </div>
</footer>
@push('scripts')
    <script type="text/javascript">
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);
        function init(){
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                // Координаты центра карты.
                // Порядок по умолчанию: «широта, долгота».
                // Чтобы не определять координаты центра карты вручную,
                // воспользуйтесь инструментом Определение координат.
                center: [42.87749541985151, 74.61565368365156],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 15,
                // controls: [inputSearch]
            });

            myMap.geoObjects.add(new ymaps.Placemark([42.87749541985151, 74.61565368365156], {
                balloonContent: 'г.Бишкек, ул.Шопокова 121/1, тц "Red Center"'
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6'
            }))
        }
    </script>
@endpush
