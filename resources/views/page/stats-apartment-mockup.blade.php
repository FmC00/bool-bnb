@extends('layouts.dashboard-layout')
@section('title', "Le mie Statistiche")
@section('right-options')
  {{-- right-options --}}
@stop
@section('content')
<div class="w-100 d-flex flex-column align-items-center flex-md-row">
  <div class="w-50">
    {{-- // chartJS generazione grafico delle views --}}
    <canvas id="myChart" width="50%" height="50%"></canvas>
  </div>
  <div class="w-50">
    {{-- // chartJS generazione grafico delle views --}}
    <canvas id="myChart2" width="50%" height="50%"></canvas>
  </div>
</div>

<script>
// generazione e dati del grafico delle views
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          @foreach ($apartments as $apartment)
            '{{ $apartment->name }}',
          @endforeach
        ],
        datasets: [{
            label: 'visualizzazioni ricevute per appartamento',
            data: [
              @foreach ($apartments as $apartment)
                {{ $apartment->visit_count }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
// generazione e dati del grafico dei messaggi
var ctx = document.getElementById('myChart2').getContext('2d');
var mesForMonth = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var index;
@foreach ($messages as $message)
  index = parseInt('{{ $message->created_at }}'.substring(5, 7)) - 1;
  mesForMonth[index]++;
@endforeach

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago','Set','Ott', 'Nov','Dic'],
        datasets: [{
            label: 'Messaggi ricevuti nel tempo',
            data: mesForMonth,
            backgroundColor: [
                // 'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)',
                // 'rgba(255, 99, 132, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                // 'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>


@stop
