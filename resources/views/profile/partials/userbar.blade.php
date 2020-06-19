<div class="border row">
        <div class="col-3 d-lg-block d-none">

        </div>
        <div class="col-lg-9 col-12 border-left py-3">
            <div class="row px-lg-5 px-3">
                <div class="col-6 d-lg-flex d-none align-items-center">
                    <form action="#" method="get" class="position-relative w-75">
                        <input type="text" placeholder="Я ищу..." class="form-control pr-5 rounded-10" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        <i class="fas fa-search text-white position-absolute shadow texmart-bg-primary rounded-10"
                           style="right: 0;top: 50%;transform: translateY(-50%);border: 1px solid #3e3e3e20;padding: 11px;"></i>
                    </form>
                </div>
                <div class="col-lg-6 col-12 d-flex justify-content-md-end justify-content-between px-lg-5 px-0">
                    <div class="user-bar d-flex align-items-center">
                        <div class="notification mr-4">
                            <i class="far fa-bell font-size-24" style="color: #939393;"></i>
                        </div>
                        <div class="rounded-circle" style="height:52px; width:52px; background-image: url({{ asset('img/52.jpg') }}); background-size: cover; background-position: center;"></div>
                        <p class="mb-0 ml-3 d-lg-block d-none">{{ auth()->user()->name }}</p>
                    </div>
                </div>
            </div>
        </div>
</div>