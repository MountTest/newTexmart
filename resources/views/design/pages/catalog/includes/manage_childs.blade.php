<ul class="nav flex-column pl-4 py-3">
{{--<div class="py-3 px-3">--}}
    @if(isset($input) && isset($input[0]) && $input[0] === true)
        @foreach($childs as $child)
            <li>
                @if(count($child->childs))
                    <i class="fas fa-plus"></i>
                    <a href="#{{ $child->title }}" class="text-dark" title="Категории">{{ $child->title }}</a>
                @else
                    @if(isset($production))
                        @php($found = false)
                        @foreach($production->categories as $cat)
                            @if($cat->id == $child->id)
                                @php($found = true)
                                @break
                            @endif
                        @endforeach
                        <label class="w-100 check my-1">
                            <input type="{{ $input[1] }}" name="categories[]" value="{{ $child->id }}" class="" data-id="{{ $child->id }}" data-title="{{ $child->title }}" {{ $found ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            <span class="ml-1">{{ $child->title }}</span>
                        </label>
                        {{--<label class="m-0 p-0">--}}
                        {{--<input type="{{ $input[1] }}" name="categories[]" value="{{ $child->id }}" class="" data-id="{{ $child->id }}" data-title="{{ $child->title }}" {{ $found ? 'checked' : '' }}>--}}
                        {{--{{ $child->title }}--}}
                        {{--</label>--}}
                    @else
                        <label class="w-100 check my-1">
                            <input type="{{ $input[1] }}" name="categories[]" value="{{ $child->id }}" class="" data-id="{{ $child->id }}" data-title="{{ $child->title }}">
                            <span class="checkmark"></span>
                            <span class="ml-1">{{ $child->title }}</span>
                        </label>
                        {{--<label class="m-0 p-0">--}}
                        {{--<input type="{{ $input[1] }}" name="categories[]" value="{{ $child->id }}" class="" data-id="{{ $child->id }}" data-title="{{ $child->title }}">--}}
                        {{--{{ $child->title }}--}}
                        {{--</label>--}}
                    @endif
                @endif

                @if(count($child->childs))
                    @include('design.pages.catalog.includes.manage_childs',['childs' => $child->childs->sortBy('order'), 'input' => [true, $input[1]]])
                @endif
            </li>
        @endforeach
    @else
        @foreach($childs as $child)
            <li>
                @if(count($child->childs))
                    <i class="fas fa-plus"></i>
                @endif
                <a href="#{{ $child->title }}" class="text-dark" title="категории">{{ $child->title }}</a>
                @if(count($child->childs))
                    @include('design.pages.catalog.includes.manage_childs',['childs' => $child->childs->sortBy('order')])
                @endif
            </li>
        @endforeach
    @endif
{{--</div>--}}
