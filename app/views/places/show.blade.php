@extends('templates.default')

@section('title'){{ Str::title(Lang::get('place')). ' ' .$place->name }} @stop

@section('content')
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('place')) }}</h3></td>
                        <td><h3>{{ $place->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $place->id }}</h4></td>

                    <tr>
                        <td><h4>{{ Lang::get('city_id') }}</h4></td>
                        <td><h4>{{ $place->city_id }}</h4></td>

                    <tr>
                        <td><h4>{{ Lang::get('type_id') }}</h4></td>
                        <td><h4>{{ $place->type_id }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@stop