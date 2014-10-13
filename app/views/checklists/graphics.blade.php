@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

    <div class="container container-main">

        @foreach($checklist->questions as $question)
            <div id="graphics-{{ $question->id }}" class="container"></div>
        @endforeach
    </div>

@stop

@section('script')
    {{ HTML::script('/packages/highcharts/4.0.4/js/highcharts.js') }}
    {{ HTML::script('/packages/highcharts/4.0.4/js/modules/exporting.js') }}
    @extends('templates.partials.basicPieGraphic')
    <script>
        $.ajax({
            url: "/checklists/dataGraphics/{{ $checklist->id }}/0",
            success: function(e) {
                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                    return {
                        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                        stops: [
                            [0, color],
                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
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
        {{-- @foreach($checklist->questions as $question)
            $.ajax({
                url: "/checklists/dataGraphics/{{ $checklist->id }}/{{ $question->id  }}",
                success: function(e) {
                    basicPieGraphic.series[0].data = e;
                    basicPieGraphic.chart.renderTo = 'graphics-{{ $question->id }}';
                    basicPieGraphic.title.text = '{{ $question->statement }}';
                    new Highcharts.Chart(basicPieGraphic);
                },
                error: function(e) {
                    console.log(e);
                }
            });
        @endforeach --}}
    </script>
@stop