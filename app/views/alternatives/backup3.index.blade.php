@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('novo')
<a href="{{ URL::to('alternatives/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('nova alternativa') }}</a>
@stop

@extends('templates.default')
@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <br/>
        @yield('novo', '<a href="#" class="btn btn-sm btn-primary">'. Lang::get('novo') .'</a>')
    <br/><br/>

    <div class="panel panel-default">
        <div class="table-responsive">
            <table class="table table-hover" data-table-ajax-url="/alternatives/indexAjax">
                <thead>
                    <tr>
                        <th class="text-center">{{ Lang::get('Id') }}</th>
                        <th class="text-center">{{ Lang::get('Name') }}</th>
                        <th class="text-center">{{ Lang::get('Type_id') }}</th>
                        <th class="text-center">{{ Lang::get('Ações') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatives as $alternative)
                        <tr id="line{{ $alternative['id'] }}">
                            <td class="text-center">{{ $alternative->id }}</td>
                            <td>{{ Str::limit($alternative->name, 37) }}</td>
                            <td class="text-center">{{ $alternative->type_id }}</td>
                            <td class="text-center">
                                <div class="list-inline">
                                    <a href="{{ URL::route('alternatives.show', $alternative->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                                    <a href="{{ URL::route('alternatives.edit', $alternative->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('alternatives.destroy', $alternative->id) }}"
                                       data-id="{{ $alternative->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                                </div>
                            </td>
                         </tr>
                    @endforeach
                </tbody>
                {{ $alternatives->links() }}
            </table>
        </div>
    </div>

    {{--{{ $alternatives->links() }}--}}

</div>
@stop

@section('script')
    @include('templates.partials.delete')
    {{--<script>--}}

    {{--var rowModel = [];--}}

    {{--$(function() {--}}
        {{--var ns = $("[data-table-ajax-url] > tbody:last").append('<tr><td>hahah</td></tr><tr><td>hahah</td></tr><tr><td>hahah</td></tr>');--}}
        {{--atualizar(ns.parent().attr('data-table-ajax-url'));--}}

        {{--function montarModel() {--}}
            {{--o = $("[data-table-ajax-url] > thead:last");--}}
            {{--console.log(o.children);--}}
            {{--console.log('----------------------------');--}}
            {{--console.log(o.childNodes);--}}
            {{--console.log('----------------------------');--}}
            {{--for(var key in o.childNodes) {--}}
                {{--if (o.childNodes.hasOwnProperty(key)) {--}}
                {{--console.log('........');--}}
                    {{--console.log(key);--}}
                    {{--console.log(o.childNodes[key]);--}}
                {{--}--}}
            {{--}--}}
        {{--}--}}

        {{--function atualizar(url) {--}}

            {{--$.ajax({--}}
                {{--"url": url,--}}
                {{--success: function(o) {--}}
                    {{--montarModel();--}}
                    {{--for(var key in o.rows) {--}}
                        {{--if (o.rows.hasOwnProperty(key)) {--}}
                            {{--novaLinha(o.rows[key]);--}}
                        {{--}--}}
                    {{--}--}}
                {{--}--}}
                {{--/** @TODO: mensagem de erro se não der certo */--}}
            {{--});--}}

        {{--}--}}

        {{--function novaLinha(o) {--}}
            {{--for(var key in o) {--}}
                {{--if (o.hasOwnProperty(key)) {--}}
                    {{--//console.log(key);--}}
                    {{--//console.log(o[key]);--}}
                {{--}--}}
            {{--}--}}
            {{--//console.log('----------------------------');--}}
        {{--}--}}

    {{--});--}}

    {{--</script>--}}
@stop
