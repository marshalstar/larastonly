@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Checklist')) }} @stop

@section('content')
    <p id="breadCrumb">
        Você está em:
        <a href="{{URL::route('home')}}" title="Voltar a página inicial."> Página Inicial </a>
        / Checklists.
    </p>

<div class="container container-main">
    {{ HTML::ul($errors->all()) }}
    <div class="table-responsive">
        <table class="table table-hover">
            @forelse($checklists as $c)
                <tr>
                    <td><a href="{{ URL::route('checklists.answer.create', $c->id) }}">{{ $c->name }}</a></td>
                    <td><a href="{{ URL::route('checklists.answer.create', $c->id) }}">{{ Str::limit($c->description, 30) }}</a></td>
                </tr>
            @empty
                {{ Lang::get('Não exitem checklists cadastrados!') }}
            @endforelse
        </table>
        {{ $checklists->links() }}
    </div>
</div>

@stop