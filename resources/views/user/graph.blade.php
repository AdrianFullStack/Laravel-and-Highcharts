<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <title>Laravel Highcharts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1 class="text-center">USER GRAPH</h1>
                <br>
                <div id="graph"></div>
            </div>
        </div>
        
        <script type="text/javascript" src="{{ asset('./plugins/jQuery/jquery.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('./plugins/highcharts/highcharts.js')  }}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                Highcharts.chart('graph', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Count users by profile'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.y} users</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.y} users',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'users by profile',
                        colorByPoint: true,
                        data: {!! $data !!}
                    }]
                });
            })
        </script>
    </body>
</html>
