@extends('templates.default')

@section('title'){{ Str::title(Lang::get('alternativa')). ' ' .$alternative->name }} @stop

@section('content')

    <div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('alternativa')) }}</h3></td>
                        <td><h3>{{ $alternative->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $alternative->id }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Nome') }}</h4></td>
                        <td><h4>{{ $alternative->name }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Type_id') }}</h4></td>
                        <td><h4>{{ $alternative->type_id }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

@stop