@extends('design.layouts.app')
@section('content')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
                    <div class="mb-1">

                        @include('design.pages.catalog.includes.left_sidebar', ['toggle' => true])
                    </div>

            </div>
            <div class="col-lg-9 col-md-9 col-12">
                <h2 class="texmart-text-primary h1" data-parent="title">База товаров наших производителей</h2>
                <div class="row my-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <button class="texmart-button" data-parent="type" data-value="productions">
                            Производители
                        </button>
                        <button class="texmart-button active" data-parent="type" data-value="product">
                            Товары
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center pb-2 mt-lg-0 mtmd-0 mt-3">
                        <a href="" class="link-style">Создать заявку</a>
                        <div class="mx-2 h-100 bg-dark" style="width:1.5px;"></div>
                        <a href="" class="link-style">Добавить компанию</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="productions-list">

                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pg-amber justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

    <script src="https://pagination.js.org/dist/2.1.4/pagination.min.js"></script>
    <script>
        function paginationWithDots(c, m) {
            var current = c,
                last = m,
                delta = 1,
                left = current - delta,
                right = current + delta + 1,
                range = [],
                rangeWithDots = [],
                l;
            for (let i = 1; i <= last; i++) {
                if (i == 1 || i == last || i >= left && i < right) {
                    range.push(i);
                }
            }
            for (let i of range) {
                if (l) {
                    if (i - l === 2) {
                        rangeWithDots.push(l + 1);
                    } else if (i - l !== 1) {
                        rangeWithDots.push('...');
                    }
                }
                rangeWithDots.push(i);
                l = i;
            }
            return rangeWithDots;
        }
        function registerPageButtons(data) {
            data.click(e => {
                e.preventDefault();
                let btn = $(e.currentTarget);
                let page = btn.data('page');
                if (page) {
                    params.page = page;
                    window.localStorage.setItem('productionsPage', page);
                    fetchProductions(params);
                }
            })
        }
    </script>
    <script>
        let params = [];
        let productionsPage = window.localStorage.getItem('productionsPage');
        if (productionsPage) {
            params.page = productionsPage;
        }
        $('input[name="categories[]"]').change(e => {
            let input = $(e.currentTarget);
            let isChecked = input.is(':checked') ? true : false;
            let id = input.data('id');
            isChecked ? params.push(id) : params.splice($.inArray(id, params), 1);
            var btn = getType();
            params.page = 1;
            fetchProductions(params, btn);
        });
        $('button[data-parent="type"]').click(e => {
           let btn = $(e.currentTarget);
           if(btn.hasClass('active') == false)
           {
               $('button[data-parent="type"]').removeClass('active');
               btn.addClass('active');
               params.page = 1;
               fetchProductions(params, btn.data('value'));
               if(btn.data('value') == 'product'){
                   $('h2[data-parent="title"]').text('База товаров наших производителей');
               }
               else if(btn.data('value') == 'productions'){
                   $('h2[data-parent="title"]').text('Наши производители');
               }
           }
        });
        function getType()
        {
            var btn = document.querySelectorAll('button[data-parent="type"]' + '.active');
            return btn[0].dataset.value;
        }
        function fetchProductions(params, type) {
            $.ajax({
                url: '{{ route('productions.new_filter') }}',
                data: {
                    params: params,
                    page: params.page,
                    type: type ? type : '{{ request('type') }}'
                },
                success: data => {
                    let pagination = $('ul.pagination');
                    pagination.empty();
                    if (data.count) {
                        let paginationDots = paginationWithDots(data.productions.current_page, data.productions.last_page);
                        if (data.productions.last_page > 1) {
                            if (data.productions.current_page != 1) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.productions.current_page - 1) + '" href="#">Пред</a></li>');
                            }
                        }
                        for (let item of paginationDots) {
                            if (item == '...') {
                                pagination.append('<li class="page-item disabled"><a class="page-link disabled" disabled onclick="event.preventDefault()">' + item + '</a></li>');
                            } else if (item == data.productions.current_page) {
                                pagination.append('<li class="page-item active"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            } else {
                                pagination.append('<li class="page-item"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            }
                        }
                        if (data.productions.last_page > 1) {
                            if (data.productions.current_page != data.productions.last_page) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.productions.current_page + 1) + '" href="#">След</a></li>');
                            }
                        }
                    }
                    pagination.find('.page-link').each((e, i) => {
                        registerPageButtons($(i));
                    });


                    let result = $('#productions-list').hide().html(data.html).fadeIn('fast');
                    @if(auth()->check())
                    result.find('.favorite').each((e, i) => {
                        registerFavoriteButton($(i));
                    });
                    @endif
                    result.find('.call-btn').each((e, i) => {
                        registerCallButton($(i));
                    });
                    result.find('.div-lazy').each((e, i) => {
                        registerLazyLoad($(i));
                    })



                },
                error: () => {
                }
            })
        }
        function registerLazyLoad(item) {
            item.lazy();
        }
        @if(auth()->check())
        function registerFavoriteButton(item) {
            item.click((e) => {
                e.preventDefault();
                let btn = $(e.currentTarget);
                let id = btn.data('id');
                $.ajax({
                    method: "POST",
                    url: '{{ route('production.favorite') }}',
                    data: {
                        'id': id,
                        'user_id': '{{ \Illuminate\Support\Facades\Auth::user()->id }}'
                    },
                    success: data => {
                        if (data.status === 'success') {
                            if (data.isFavorited) {
                                btn.find('.fa-heart').removeClass('far').addClass('fas');
                            } else {
                                btn.find('.fa-heart').removeClass('fas').addClass('far');
                            }
                        }
                    },
                    error: () => {
                    }
                })
            });
        }
        @endif
        function registerCallButton(item) {
        }
        fetchProductions(params);
    </script>
    <script>
        $.fn.extend({
            treed: function (o) {
                var openedClass = 'fa-plus';
                var closedClass = 'fa-minus';
                if (typeof o != 'undefined'){
                    if (typeof o.openedClass != 'undefined'){
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined'){
                        closedClass = o.closedClass;
                    }
                }
                /* initialize each of the top levels */
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this);
                    branch.prepend("");
                    branch.addClass('branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    });
                    branch.children().children().toggle();
                });
                /* fire event from the dynamically added icon */
                tree.find('.branch .indicator').each(function(){
                    $(this).on('click', function () {
                        $(this).closest('li').click();
                    });
                });
                /* fire event to open branch if the li contains an anchor instead of text */
                tree.find('.branch>a').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                /* fire event to open branch if the li contains a button instead of text */
                tree.find('.branch>button').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });
        $('#tree').treed();
    </script>
@endpush