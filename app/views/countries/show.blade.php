@extends('templates.default')

@section('title'){{ Str::title(Lang::get('country')). ' ' .$country->name }} @stop

@section('content')
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('country')) }}</h3></td>
                        <td><h3>{{ $country->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $country->id }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@stop