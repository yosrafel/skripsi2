@extends('layout/master')
@section('title', 'Home')
@section('home', 'active')
@section('content')
<div class="">
  <div class="col-md-6">
    <div class="clearfix">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title"><b>Laporan BKD</b></h3>
          <hr>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <ul class="list-unstyled list-justify">
              <li>Jumlah Beban Non-Pengajaran<span>28,34</span> </li>
              <li>Jumlah Beban Pengajaran di Sistem Informasi<span>28,34</span></li>
              <li>Jumlah Beban Pengajaran di Program Studi Lain<span>28,34</span></li>
              <li>Total Beban Pengjaran & Non-Pengajaran<span>28,34</span></li>
              <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">
          <h3 class="panel-title"><b>Total Beban Pengjaran & Non-Pengajaran Tiap Tahun</b></h3>
          <hr>
      </div>
      <div class="panel-body">
          <div id="demo-bar-chart" class="ct-chart"></div>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Kelas</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutKelas">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA MATAKULIAH</TH>
            <th>GRUP</th>
            <th>SKS</th>
            <th>SIFAT</th>
            <th>BKD</th>
            <th>TAHUN AJARAN</th>
        </tr>
        </thead>
        <tbody>
          @foreach($kelas as $kelas)
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $kelas->matakuliah->nama}}</th>
              <td>{{ $kelas->grup}}</td>
              <td>{{ $kelas->sks}}</td>
              <td>{{ $kelas->sifat}}</td>
              <td>{{ number_format($kelas->bkd(), 2)}}</td>
              <td>{{ $kelas->tahun_ajaran}} - {{$kelas->semester}}</td>
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
    @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @elseif (session('status'))
      <div class="text-center alert alert-success">
        {{ session('status') }}
      </div> 
    @endif  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutPekerjaan">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>JENIS PEKERJAAN</TH>
            <th>BKD</th>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
        </tr>
        </thead>
        <tbody>
          @foreach($pekerjaan as $pekerjaan)
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $pekerjaan->jenis_pekerjaan}}</th>
              <td>{{ $pekerjaan->sks}}</td>
              <td>{{ $pekerjaan->tahun_ajaran}} - {{$pekerjaan->semester}}</td>
              <td>{{ $pekerjaan->keterangan}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection