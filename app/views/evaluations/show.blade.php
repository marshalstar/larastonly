@extends('templates.default')

@section('title'){{ Str::title(Lang::get('avaliação')). ' ' .$evaluation->name }} @stop

@section('content')
<div class = "container theme-showcase">
	<table class = "table">
		<tbody>
			<tr>
    <td><h4>{{ Str::title(Lang::get('Avaliação')). ': ' .$evaluation->name }}</h4></td>
</tr>
	<tr>
    <td><h4>{{ Lang::get('ID '). ': ' .$evaluation->id }}</h4></td>
</tr>
<tr>
    <td><h4>{{ Lang::get('Comentário'). ': ' .$evaluation->commentary }}</h4></td>
</tr>
<tr>
    <td><h4>{{ Lang::get('Usuário ID:'). ': ' .$evaluation->user_id }}</h4></td>
 </tr>
 <tr>
    <td><h4>{{ Lang::get('Checklist Relacionado:'). ': ' .$evaluation->checklist_id }}</h4></td>
</tr>
<tr>
    <td><h4>{{ Lang::get('Criado em:'). ': ' .$evaluation->created_at->format('d/m/Y') }}</h4></td>
    </tr>
    <tr>
    <td><h4>{{ Lang::get('Atualizado a: '). ': ' .$evaluation->updated_at->diffForHumans() }}</h4></td>
    </tr>
    </tbody>
</table>
</div>
@stop