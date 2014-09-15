@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tag')). ' ' .$tag->name }} @stop

@section('content')
<div class="container" style="display: block; background-color: white; padding: 10px;">
	<table class="table">
		<trbody>
			<tr>
    </td><h4>{{ Str::title(Lang::get('Tag')). ': ' .$tag->name }}</h4></td>
			</tr>
			<tr>
    </td><h4>{{ Lang::get('ID'). ': ' .$tag->id }}</h4></td>
</tr>
<tr>
    </td><h4>{{ Lang::get('Nome'). ': ' .$tag->name }}</h4></td>
</tr>
</trbody>
  </table>
</div>
@stop