@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tipo')). ' ' .$type->name }} @stop

@section('content')

    <div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
            <tbody>

                <tr>
                    <td><h3>{{ Str::title(Lang::get('tipo')) }}</h3></td>
                    <td><h3>{{ $type->name }}</h3></td>
                </tr>

                <tr>
                    <td><h4>{{ Lang::get('id') }}</h4></td>
                    <td><h4>{{ $type->id }}</h4></td>
                </tr>


            </tbody>
        </table>

    </div>

@stop