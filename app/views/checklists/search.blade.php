@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Pesquisa')) }} @stop

@section('content')
    <p id="breadCrumb">
        Você está em:
        <a href="{{URL::route('home')}}" title="Voltar a página inicial."> Página Inicial </a>
        / Pesquisar.
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
                {{ String::capitalize(Lang::get("Sua pesquisa - ")) }}
                {{ Str::limit($search, 30) }}
                {{ Lang::get(" - não combina com nenhum documento.<br/>Sugestões:<br/>") }}
                <ul>
                    <li>{{ Lang::get("Certifique-se de todas as palavras estão escritas corretamente.") }}</li>
                    <li>{{ Lang::get("Tente palavras-chave diferentes.") }}</li>
                    <li>{{ Lang::get("Tente palavras-chave mais gerais.") }}</li>
                </ul>
            @endforelse
        </table>
        {{ $checklists->links() }}
    </div>
</div>

@stop