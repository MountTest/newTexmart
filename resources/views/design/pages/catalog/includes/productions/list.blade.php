<div class="row justify-content-lg-start justify-content-center mb-lg-0 mb-5">
{{--        @if(count($productions) == 0)--}}
            {{--<h3 class="h4 texmart-text-primary">--}}
                    {{----}}
            {{--</h3>--}}
        {{--@endif--}}
        {{--@dd($productions)--}}
    @foreach($productions as $production)

        <div class="col-10 col-sm-6 col-md-6 col-lg-6 mb-3 pt-1 px-0 px-md-2">
            @include('design.pages.catalog.includes.productions.single', ['bootstrap3' => isset($bootstrap3) ? true : false])
        </div>

    @endforeach

</div>

