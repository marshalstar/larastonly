@extends('templates.default')

@section('title'){{ Str::title(Lang::get('alternativa')). ' ' .$alternative->name }} @stop

@section('content')

    <div class="container theme-showcase">

        <table class="table">
            <tbody>
                <tr>
                    <td><h3>{{ Str::title(Lang::get('alternativa')) }}</h3></td>
                    <td><h3><small>{{ $alternative->name }}</small></h3></td>
                </tr>

                <tr>
                    <td><h4>{{ Lang::get('ID') }}</h4></td>
                    <td><h4><small>{{ $alternative->id }}</small></h4></td>
                </tr>
                <tr>
                    <td><h4>{{ Lang::get('Nome') }}</h4></td>
                    <td><h4><small>{{ $alternative->name }}</small></h4></td>
                </tr>
                <tr>
                    <td><h4>{{ Lang::get('Type_id') }}</h4></td>
                    <td><h4><small>{{ $alternative->type_id }}</small></h4></td>
                </tr>
            </tbody>
        </table>

    </div>

@stop