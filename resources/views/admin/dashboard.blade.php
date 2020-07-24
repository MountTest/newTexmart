@extends('admin.layouts.app')
@section('content')
    <div class="h-100">
        <admin-panel-component :user="{{Auth::user()->role_id}}"></admin-panel-component>
    </div>
@endsection