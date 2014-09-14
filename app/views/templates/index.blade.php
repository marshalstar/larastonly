@extends('templates.default')
@section('content')

    <div class="container theme-showcase">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @yield('novo', '<a href="#" class="btn btn-sm btn-primary">'. Lang::get('novo') .'</a>')
        <br/><br/>

        <div>
            <table class="table table-hover">
                @yield('table-data')
            </table>
        </div>
    </div>
@stop
@section('script')
@include('templates.partials.delete')
@stop