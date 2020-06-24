{{--@extends('profile.dashboard')--}}

{{--@section('profile_content')--}}
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h2 class="h3">Объявления</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('profile.announce.create') }}" class="btn btn-success panel-btn">Создать</a>
            </div>
        </div>
        <div class="row">
            @forelse($announces as $announce)
                <div class="col-lg-12 col-12" id="announce-{{$announce->id}}">
                    <div class="media mt-4 px-1 text-md-left">
                        <div title="{{ $announce->title }}"  class="media-body text-dark rounded-circle">
                            <div class="application_for">
                                <div class="app_content">
                                    <div class="app_top " style="display: flex;flex-wrap: nowrap;justify-content: space-between;">
                                        <a href="{{ route('announce.show', $announce) }}">
                                        <p class="line-height-110" title="{{ $announce->content }}" style="margin: 0em 0">{{ \Illuminate\Support\Str::limit($announce->content, 50) }}</p>
                                        </a>
                                            <div class="d-flex">
                                        <div class="font-size-12 d-lg-block d-none">{{ \Carbon\Carbon::make($announce->created_at)->format('d.m.Y') }}</div>
                                            <div class="ml-lg-5 ml-3">
                                                {{--<i class="fas fa-pencil-alt fa-lg edit-icon panel-icon" title="Редактировать объявление"></i>--}}
                                                <i class="fas fa-trash-alt fa-lg ml-3 delete-icon panel-icon" data-value="{{$announce->id}}" title="Удалить объявление"></i>
                                                <div class="mt-2 d-lg-none d-block">
                                                    <div class="font-size-14">{{ \Carbon\Carbon::make($announce->created_at)->format('d.m.Y') }}</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="app_bottom">--}}
{{--                                        <div class="app_category">--}}
{{--                                            <p class="application_text" style="margin: 0em 0">Женская одежда</p>--}}
{{--                                        </div>--}}
                                        {{--<div class="app_country">--}}
                                            {{--<div class="iti__flag iti__{{$announce->locate}}">--}}
                                            {{--</div>--}}
                                                                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3>Нет объявлений</h3>
            @endforelse
        </div>
    </div>

<script>
    $('.delete-icon').on('click', function (e) {
        var btn = $(e.currentTarget);
        var id = btn.data('value');

        $.ajax({
            url: '{{ route('delete_announce') }}',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
            },
            success: data => {
                $('#announce-' + id).hide(200);
            },
            error: () => {
            }
        })
    })
</script>
{{--@endsection--}}
