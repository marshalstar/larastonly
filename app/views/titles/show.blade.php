@extends('templates.default')

@section('title'){{ Str::title(Lang::get('título')). ' ' .$title->name }} @stop

@section('content')

<div class="container" style="display: block; background-color: white; padding: 10px;">

    <table class="table">
        <tbody>

            <tr>
                <td><h3>{{ Str::title(Lang::get('título')) }}</h3></td>
                <td><h3>{{ $title->name}}</h3></td>
            </tr>

            <tr>
                <td><h4>{{ Lang::get('id') }}</h4></td>
                <td><h4>{{ $title->id }}</h4></td>
            </tr>

            <tr>
                <td><h4>{{ Lang::get('nome') }}</h4></td>
                <td><h4>{{ $title->name }}</h4></td>
            </tr>

            <tr>
                <td><h4>{{ Lang::get('title_id') }}</h4></td>
                <td><h4>{{ (($pai = $title->title_id)? $pai : Lang::get('sem pai')) }}</h4></td>
            </tr>

        </tbody>
    </table>
</div>

@stop