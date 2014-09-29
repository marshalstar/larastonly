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
            <table id="grid-data" class="table table-hover">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" class="text-center">{{ Lang::get('Id') }}</th>
                        <th data-column-id="name" class="text-center">{{ Lang::get('Name') }}</th>
                        <th data-column-id="type_id" class="text-center">{{ Lang::get('Type_id') }}</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
                    </tr>
                </thead>
            </table>
            <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="0"
                data-id="0" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
        </div>
    </div>

</div>
@stop

@section('script')
    @include('templates.modal.destroy.effect')
    <script>

    $(function() {
        console.log('bootgrid');
        var grid = $("#grid-data").bootgrid({
            ajax: true,
            url: "/alternatives/indexAjax",
            formatters: {
                "commands": function(column, row) {
                    return '<div class="list-inline">\
                                <a href="'+ '{{ URL::route("alternatives.show", "key") }}'.replace('key', row.id) + '" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>\
                                <a href="'+ '{{ URL::route("alternatives.edit", "key") }}'.replace('key', row.id) +'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>\
                                <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="'+ '{{ URL::route('alternatives.destroy', 'key') }}'.replace('key', row.id) +'"\
                                    data-id="'+ row.id +'" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>\
                            </div>';
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function() {
            @include('templates.modal.destroy.script')
        });
        console.log($("#grid-data").reload);
    });

    </script>
@stop