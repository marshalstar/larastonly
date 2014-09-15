@extends('templates.default')
@section('content')

<!--<style>-->
<!--    @import url("http://netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/css/bootstrap.min.css");-->
<!--    .container-shadow {-->
<!--        margin-top: 50px;-->
<!--        box-shadow: 0 0 30px black;-->
<!--        padding:0 15px 0 15px;-->
<!--    }-->
<!--</style>-->

<!--<div class="container container-shadow" style="display: block; background-color: white; ">-->
<div class="container" style="display: block; background-color: white;">
    <div class="col-lg-12">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <br/>
        @yield('novo', '<a href="#" class="btn btn-sm btn-primary">'. Lang::get('novo') .'</a>')
    <br/><br/>

    <div class="table-responsive">
        <table class="table table-hover borderless" style="table-layout: fixed; word-break: break-all;">
            @yield('table-data')
        </table>
    </div>
</div></div>

@stop
@section('script')
@include('templates.partials.delete')
@stop