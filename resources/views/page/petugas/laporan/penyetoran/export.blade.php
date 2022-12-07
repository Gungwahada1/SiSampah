<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PENYETORAN</title>

    <link rel="stylesheet" href="{{asset('template/print/table.css')}}">
</head>
<body>
   @if($_GET['keyword']=="Excel")
   <?php  
   header("Content-type: application/vnd-ms-excel");
   header('Content-Disposition: attachment; filename=Laporan Penyetoran.xls'); 
   ?>
   @endif
   <div class="card-body">
    <center>
        <h2>Laporan Penyetoran</h2>
        <h4>Tanggal {{$_GET['awal']}} - {{$_GET['akhir']}}</h4>
    </center>

    @if($_GET['keyword']=="PDF")
    <table class="table table-bordered table-striped">
        @else
        <table style="width: 100%;" border="1">
            @endif
            <thead>
                <tr>
                 <th>No. </th>
                 <th>Nama Nasabah</th>
                 <th>Jenis Sampah</th>
                 <th>Keterangan</th>
                 <th>Harga/kg</th>
                 <th>Bobot</th>
                 <th>Tanggal Penyetoran</th>
                 <th>Waktu Penyetoran</th>
                 <th>Total</th>
             </tr>
         </thead>
         <tbody>
            <?php $no=1; ?>
            @foreach($data as $dt)
            <tr>
                <td>{{$no}}. </td>
                <td>{{$dt->name}}</td>
                <td>{{$dt->nama_jenis}}</td>
                <td>{{$dt->nama_sampah}}</td>
                <td>Rp {{number_format($dt->harga,0,",",".")}}</td>
                <td>{{$dt->bobot}} kg</td>
                <td>{{tanggal_indonesia($dt->tanggal_penyetoran)}}</td>
                <td>{{$dt->waktu_penyetoran}}</td>
                <td>Rp {{number_format($dt->harga*$dt->bobot,0,",",".")}}</td>
            </tr>
            <?php $no++ ?>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
