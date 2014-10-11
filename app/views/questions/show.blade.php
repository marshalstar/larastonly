@extends('templates.default')

@section('title'){{ Str::title(Lang::get('questão')). ' ' .$question->statement }} @stop

@section('content')
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('Enunciado')) }}</h3></td>
                        <td><h3>{{ $question->statement}}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $question->id }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Enunciad') }}</h4></td>
                        <td><h4>{{ $question->statement }}</h4></td>
                    </tr>
    
                     <tr>
                        <td><h4>{{ Lang::get('Title_id') }}</h4></td>
                        <td><h4>{{ $question->title_id }}</h4></td>
                    </tr>
                    <tr>
                        <td><<h4>{{ Lang::get('Peso')}}</h4></td>
                        <td><h4>{{ $question->weight}}</h4></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@stop