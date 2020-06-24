
<div class="container mt-5">

        <h1 class="h3 mb-4">
            Все новости Texmart.kg
        </h1>

    <div class="row justify-content-end">
        <a href="{{ route('news.create') }}" class="btn btn-success panel-btn">
            Создать новость
        </a>
    </div>
    @if(count($news))
    <div class="row pb-5">
        @foreach($news as $new)
            <div class="col-lg-4 col-12 mt-lg-0 mt-3" id="news-{{$new->id}}">
                <div class="shadow h-100">
                <div class="position-relative" style="background-image: url({{ asset('storage/'.$new->preview) }}); background-size: cover; background-position: center; height:250px;">
                    <div class="position-absolute p-2 bg-white" style="top:5%; right:5%; z-index: 100">
                        <a href="/news.edit/{{$new->id}}">
                            <i class="fas fa-pencil-alt fa-lg edit-icon panel-icon" title="Редактировать новость"></i>
                        </a>
                        <i class="fas fa-trash-alt fa-lg ml-3 delete-icon panel-icon" data-value="{{$new->id}}" title="Удалить новость"></i>
                    </div>
                </div>
                <div class="p-3 mt-2">
                    <h3 class="h5">
                        {{ $new->title }}
                    </h3>
                </div>
                {{--<div class="px-3">--}}
                    {{--<p class="font-size-14" style="color: rgba(0,0,0,0.35); max-height: 120px;">--}}
                        {{--{!! $new->description !!}--}}
                    {{--</p>--}}
                {{--</div>--}}
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="">
        <h2 class="h4">
           Новостей нет
        </h2>
    </div>
    @endif
</div>

<script>
    $('.delete-icon').on('click', function (e) {
        var btn = $(e.currentTarget);
        var id = btn.data('value');

        $.ajax({
            url: '{{ route('news.delete') }}',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
            },
            success: data => {
                $('#news-' + id).hide(200);
            },
            error: () => {
            }
        })
    })
</script>