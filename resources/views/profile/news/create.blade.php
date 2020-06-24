@extends('profile.dashboard')

@section('profile_content')


    <section class="p-lg-5 p-2">
        <div class="container">
            <form action="{{isset($new) ? route('news.update'): route('news.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="new" value="{{ isset($new) ? $new->id : '' }}">
            <div class="form-group">
                <label for="title">Заголовок новости</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Заголовок новости" value="{{isset($new) ? $new->title : ''}}" required>
                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
            </div>
            <div class="form-group">
                <label for="richtextDescription">Описание новости <span class="text-danger">*</span></label>
                <textarea class="form-control description @error('description') is-invalid @enderror"
                          name="description" id="richtextDescription" required>
                                {!! isset($new) ? $new->description : '' !!}
                        </textarea>
            </div>
                @if(isset($new))
                <div class="mb-5" style="width:200px; height:200px;">
                    <img src="{{asset('storage/'.$new->preview)}}" alt="">
                </div>
                @endif
            <div class="form-group">
                <label>
                    Выберите первью новости <span class="text-danger">*</span>
                </label>
                <input type="file" name="preview" id="image-input2"
                       class="form-control @error('preview') is-invalid @enderror" value="{{ old('preview') }}" {{ isset($new) ? '' : 'required'}}>
            </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success panel-btn">Сохранить</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('scripts')

@endpush