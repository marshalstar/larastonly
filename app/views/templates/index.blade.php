@extends('templates.default')
@section('content')

<div class="container">
    <div class="content-header"><div class="header-inner"></div></div>{{-- header do corpo --}}
    <div class="stream-item js-new-items-bar-container">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <br/>
            @yield('novo', '<a href="#" class="btn btn-sm btn-primary">'. Lang::get('novo') .'</a>')
        <br/><br/>

        <table class="table table-hover">
            @yield('table-data')
        </table>

    </div>
    <div class="stream-end-inner"></div>{{-- footer do corpo --}}
</div>

@stop
@section('script')
@include('templates.partials.delete')
@stop