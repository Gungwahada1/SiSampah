@extends('page/layout/app')

@section('title','DASHBOARD ADMIN')

@section('content')
<div class="container-fluid mt-3">
    <?php  
    $totalPetugas=DB::table('users')->join('biodata','biodata.id_user','users.id')
    ->where('users.level','Petugas')->count();
    $totalNasabah=DB::table('users')->join('biodata','biodata.id_user','users.id')
    ->where('users.level','Nasabah')->count();
    $totalPenyetoran=DB::table('penyetoran')->join('users','users.id','=','penyetoran.id_user')->count();
    ?>
    <div class="card-content">
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>{{Auth::user()->name}}!</strong> Selamat Datang, anda login sebagai {{auth::user()->level}}.</div>
        </div>
        <div class="row">
         <div class="col-md-4">
            <div class="card card-widget">
                <div class="card-body gradient-4">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-file-o"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">Data Petugas</h2>
                            <h5 class="card-widget__subtitle">{{$totalPetugas}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-widget">
                <div class="card-body gradient-3">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-file-o"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">Data Nasabah</h2>
                            <h5 class="card-widget__subtitle">{{$totalNasabah}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-widget">
                <div class="card-body gradient-2">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-file-o"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">Total Penyetoran</h2>
                            <h5 class="card-widget__subtitle">{{$totalPenyetoran}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-widget">
                <div class="card-body gradient-1">
                    <div class="media">
                        <span class="card-widget__icon"><i class="fa fa-file-o"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">Laporan Penyetoran</h2>
                            <h5 class="card-widget__subtitle"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <div class="page-content">
        <div class="container mb-2" style="background: white">
            <div class="row">
                <div class="col-lg-8">
                    <canvas id="singelBarChart"></canvas>
                </div>
                <div class="col-lg-4">
                    <canvas id="singelBarCharts"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
           $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = document.getElementById("singelBarChart");
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: cData.label,
            datasets: [
            {
                label: "Grafik Penyetoran per Tanggal - Bulan {{date('F')}}",
                data: cData.data,
                borderColor: "rgba(115, 255, 216, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(115, 255, 216, 0.5)"
            }
            ]
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

  });
       });
   </script>
   <script>
    $(document).ready(function() {
     $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_datas; ?>`);
      var ctx = document.getElementById("singelBarCharts");
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: cData.label,
            datasets: [
            {
                label: "JUMLAH JENIS DI SETORKAN",
                data: cData.data,
                borderColor: "rgba(115, 255, 216, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(115, 255, 216, 0.5)"
            }
            ]
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

  });
 });
</script>
<!--  -->

</div>
@endsection