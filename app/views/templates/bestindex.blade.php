@extends('templates.default')

@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <br/>
        @yield('text-create-button', '<a href="#" class="btn btn-sm btn-primary">'. Lang::get('novo') .'</a>')
    <br/><br/>

    <div class="panel panel-default">
        <div class="table-responsive">
            <table id="grid-data" class="table table-hover">
                <thead>
                    <tr>
                        @yield('table-content')
                    </tr>
                </thead>
            </table>
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
            url: '@yield('data-url-ajax')',
            formatters: {
                @yield('formatters')
                "commands": function(column, row) {
                    return '<div class="list-inline">\
                                <a href="'+ '@yield('create-url-ajax')'.replace('key', row.id) + '" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>\
                                <a href="'+ '@yield('edit-url-ajax')'.replace('key', row.id) +'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>\
                                <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="'+ '@yield('destroy-url-ajax')'.replace('key', row.id) +'"\
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