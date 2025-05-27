@extends('layouts.admin')

@section('title', 'Admin početna')

@section('content')
    <h1>Urednički panel</h1>

    <div id="chart_div" style="width: 100%; height: 500px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dan', 'Rezervacije'],
          ['Ponedeljak', 8],
          ['Utorak', 12],
          ['Sreda', 5],
          ['Četvrtak', 15],
          ['Petak', 9]
        ]);

        var options = {
          title: 'Broj rezervacija po danima',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
@endsection
