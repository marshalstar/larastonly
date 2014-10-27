@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Resultados da Busca')) }} @stop

@section('content')
<h1>Resultados da Busca</h1>
@if(!$checklists->results)
	<p> Nenhum resultado encontrado. Tente novamente. </p>
@else
	<ul>
	@foreach($checklists->results as $checklist)
		<li>
			Teste.
		</li>
	@endforeach
	</ul>
@endif
@stop