@extends('templates.default')
@section('content')


<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <br/>
        @yield('novo', '<a href="#" class="btn btn-sm btn-primary">'. Lang::get('novo') .'</a>')
    <br/><br/>

    <div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-hover">
            @yield('table-data')
        </table>
    </div>
    </div>
</div>

@stop
@section('script')
@include('templates.partials.delete')
@stop