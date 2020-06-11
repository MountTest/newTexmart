<div class="row justify-content-center row-cols-{{ $rowCols }}">
    @for($i = 0; $i < $count; $i++)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-10 article mb-3">
            @include('design.posts.card')
        </div>
    @endfor
</div>
