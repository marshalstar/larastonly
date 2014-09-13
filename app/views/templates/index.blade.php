@extends('templates.default')
@section('content')

    <div class="container theme-showcase">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <a href="@yield('create', '#')" class="btn btn-sm btn-primary">@yield('label-create', Lang::get('novo'))</a>
        <br/><br/>

        <div>
            <table class="table table-hover">
                @yield('table-data')
            </table>
        </div>
    </div>
@include('templates.partials.delete')
@stop