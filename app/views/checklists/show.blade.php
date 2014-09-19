@extends('templates.default')

@section('title'){{ Str::title(Lang::get('checklist')). ' ' .$checklist->name }} @stop

@section('content')
    <div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('Checklist')) }}</h3></td>
                        <td><h3>{{ $checklist->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $checklist->id }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Nome') }}</h4></td>
                        <td><h4>{{ $checklist->name }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Title_id') }}</h4></td>
                        <td><h4>{{ $checklist->title_id }}</h4></td>
                    </tr>

                    <tr>
                        <<td><h4>{{Lang::get('User_id')}}</h4></td>
                        <<td><h4>{{$checklist->user_id}}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@stop