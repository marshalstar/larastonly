@extends('templates.default')

@section('title'){{ Str::title(Lang::get('checklist')). ' ' .$checklist->name }} @stop

@section('content')
	<div class = "container theme-showcase">
		<table class = "table">
			<tbody>
         <tr>
                    <td><h3>{{ Str::title(Lang::get('Checklist')) }}</h3></td>
                    <td><h3><small>{{ $checklist->name }}</small></h3></td>
                </tr>

        		<tr>
                    <td><h4>{{ Str::title(Lang::get('ID')) }}</h4></td>
                    <td><h4><small>{{ $checklist->id }}</small></h4></td>
                </tr>
        <tr>
                    <td><h4>{{ Str::title(Lang::get('Nome')) }}</h4></td>
                    <td><h4><small>{{ $checklist->name }}</small></h4></td>
                </tr>
                     <tr>
                    <td><h4>{{ Str::title(Lang::get('Usuário que criou o checklist: ')) }}</h4></td>
                    <td><h4><small>{{ $checklist->user_id }}</small></h4></td>
                </tr>
                     <tr>
                    <td><h4>{{ Str::title(Lang::get('Id do título: ')) }}</h4></td>
                    <td><h4><small>{{ $checklist->title_id }}</small></h4></td>
                </tr>
                     <tr>
                    <td><h4>{{ Str::title(Lang::get('Criado em:')) }}</h4></td>
                    <td><h4><small>{{ $checklist->created_at->format('d/m/Y')}}</small></h4></td>
                </tr>
                 <tr>
                    <td><h4>{{ Str::title(Lang::get('Atualizado a: ')) }}</h4></td>
                    <td><h4><small>{{ $checklist->updated_at->diffForHumans()}}</small></h4></td>
                </tr>
</tbody>
    </table>
</div>
@stop