@extends('templates.default')

@section('title'){{ Str::title(Lang::get('state')). ' ' .$state->name }} @stop

@section('content')
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('state')) }}</h3></td>
                        <td><h3>{{ $state->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Country_id') }}</h4></td>
                        <td><h4>{{ $state->country_id }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $state->id }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@stop