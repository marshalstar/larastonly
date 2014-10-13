@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

    <div class="container container-main">

        @foreach($checklist->questions as $question)
            <div id="graphics-{{ $question->id }}" class="container"></div>
            <div id="table-{{ $question->id }}" class="table"></div>
        @endforeach
    </div>

@stop

@section('script')
    {{ HTML::script('/packages/highcharts/4.0.4/js/highcharts.js') }}
    {{ HTML::script('/packages/highcharts/4.0.4/js/modules/exporting.js') }}
    @extends('templates.partials.basicPieGraphic')
    <script>
        $.ajax({
            url: "/checklists/dataGraphics/{{ $checklist->id }}",
            success: function(e) {
                for(i in e) {
                    var data = e[i]['data'];
                    for(d in data) {
                        if (data[d][0] !== undefined) {
                            $('#table-'+i).append('<tr><td>' + data[d][0] + '</td><td>' + data[d][1] + '</td></tr>');
                        }
                    }
                }
            }
        });
        $.ajax({
            url: "/checklists/dataGraphics/{{ $checklist->id }}",
            success: function(e) {
                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                    return {
                        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                        stops: [
                            [0, color],
                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')]
                        ]
                    };
                });

                for(i in e) {
                    basicPieGraphic.series[0].data = e[i]['data'];
                    basicPieGraphic.chart.renderTo = 'graphics-' + i;
                    basicPieGraphic.title.text = e[i]['name'];
                    new Highcharts.Chart(basicPieGraphic);
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
    </script>
@stop