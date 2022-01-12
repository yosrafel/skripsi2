@extends('layout/master')
@section('title', 'Home')
@section('home', 'active')
@section('content')
@if (session('status'))
  <div class="text-center alert alert-success">
    {{ session('status') }}
  </div>
@elseif(session('error'))
  <div class="text-center alert alert-danger">
    {{ session('error') }}
  </div>
@endif
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Kelas</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA MATAKULIAH</TH>
            <th>GRUP</th>
            <th>DOSEN</TH>
            <th>SKS</th>
            <th>SEMESTER</th>
            <th>TAHUN AJARAN</th>
            <th>BKD</th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkd = 0;@endphp
          @foreach($kelas->sortBy('kelas_id') as $kelas)
          @php $sumBkd += $kelas->kelas->bkd();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $kelas->kelas->nama_matkul}}</th>
              <td>{{ $kelas->kelas->grup}}</td>
              <td>{{ $kelas->dosen->nama}}</th>
              <td>{{ $kelas->kelas->sks}}</td>
              <td>{{ $kelas->kelas->semester}}</td>
              <td>{{ $kelas->kelas->tahun_ajaran}}</td>
              <td>{{ number_format($kelas->kelas->bkd(),2)}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Pekerjaan</b></h3>
    <hr>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExample">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA DOSEN </th>
            <th>JENIS PEKERJAAN</TH>
            <th>SKS</th>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkdNp = 0;@endphp
          @foreach($pekerjaan as $pekerjaan)
          @php $sumBkdNp += $pekerjaan->bkdnp();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $pekerjaan->dosen->nama}}</th>
              <td>{{ $pekerjaan->jenis_pekerjaan}}</th>
              <td>{{ $pekerjaan->sks}}</td>
              <td>{{ $pekerjaan->tahun_ajaran}}</td>
              <td>{{ $pekerjaan->keterangan}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div class="">
  <div class="col-md-6">
    <div class="clearfix">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title"><b>Laporan BKD</b></h3>
          <hr>
        </div>
        <div class="panel-body">
          <div class="panel-heading col-md-8">
            <ul class="list-unstyled list-justify">
              @php $totalBkd = $sumBkd + $sumBkdNp; @endphp
              <li>Jumlah Beban Non-Pengajaran<span>{{number_format($sumBkdNp, 2)}}</span> </li>
              <li>Jumlah Beban Pengajaran<span>{{number_format($sumBkd, 2)}}</span></li>
              <li>Total Beban Pengjaran & Non-Pengajaran<span>{{number_format($totalBkd, 2)}}</span></li>
              <!-- <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="col-md-6">
        <div class="panel">
        <div class="panel-body">
            <div id="chartBkd"></div>
        </div>
    </div>
</div>
</div>
@endsection
@section('footer')
<script>
Highcharts.chart('chartBkd', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perbandingan BKD Pengajaran & Non Pengajaran'
    },
    xAxis: {
        categories: [
            'BKD Non-Pengajaran',
            'BKD Pengajaran',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Beban Kerja'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Beban Kerja',
        data: [{{number_format($sumBkdNp, 2)}}, {{number_format($sumBkd, 2)}}]
    }]
});
</script>

@endsection