@extends('templates.default')

@section('title'){{ Str::title(Lang::get('questão')). ' ' .$question->statement }} @stop

@section('content')
<div class="container" style="display: block; background-color: white; padding: 10px;">
	<table class = "table">
		<trbody>
			<tr>
    </td><h3>{{ Str::title(Lang::get('Questão')). ': ' .$question->statement }}</h3><td>
			</tr>

			<tr>
    <td><h4>{{ Lang::get('ID'). ': ' .$question->id }}</h4></td>
</tr>
<tr>
    <td><h4>{{ Lang::get('Enunciado'). ': ' .$question->statement }}</h4></td>
    </tr>
    <tr>
    <td><h4>{{ Lang::get('Title_id'). ': ' .$question->title_id }}</h4></td>
    </tr>
    <tr>
    <td><h4>{{ Lang::get('É sobre avaliado?'). ': ' .$question->is_about_assessable? Lang::get('Sim') : Lang::get('Não') }}</h4></td>
    </tr>
    <tr>
    <td><h4>{{ Lang::get('Peso'). ': ' .$question->weight }}</h4></td>
	</tr>
	</trbody>
</table>
</div>
@stop