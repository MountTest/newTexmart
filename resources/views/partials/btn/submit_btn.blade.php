<button type="submit" {{ $id ?? '' }} class="btn shadow-sm {{ $btnColor ?? 'btn-primary'  }} {{ $class ?? '' }}">
    {{ __($title ?? 'Сохранить') }}
</button>
