@extends('layout/master')
@section('title', 'Profile Dosen')
@section('dosen', 'active')
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
<div class="container float-left mb-5">
  <a class=" container " href="/kaprodi/list_dosen"> < Kembali</a>
</div>
<div class="">
  <div class="panel-profile col-md-4">
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay"></div>
                <div class="profile-main">
                    <img src="/assets/img/guest.png" class="img-circle" width="90px" height="90px" alt="Avatar">
                    <h3 class="name">{{$dosen->nama}}</h3>
                </div>
                <div class="profile-stat">

                </div>
            </div>
            <!-- END PROFILE HEADER -->
            <!-- PROFILE DETAIL -->
            <div class="profile-detail panel">
                <div class="profile-info">
                    <h4 class="heading text-center">Data Diri</h4>
                    <ul class="list-unstyled list-justify">
                        <li>NIK <span>{{$dosen->nik}}</span></li>
                        <li>Alamat <span>{{$dosen->alamat}}</span></li>
                        <li>Nomor Telepon <span>{{$dosen->no_telp}}</span></li>
                        <li>Email <span>{{$dosen->user->email}}</span></li>
                    </ul>
                </div>
            </div>
            <!-- END PROFILE DETAIL -->
        </div>
    </div>
  </div>
  <div class="container">
    <div class="col-md-8">
      <div class="panel">
        <div class="panel-body">
            <div id="chartBkd"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Daftar Kelas</b></h3>
    <hr> 
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExample">
        <thead>
        <tr>
          <th>NOMOR </th>
          <th>NAMA MATAKULIAH</TH>
          <th>GRUP</th>
          <th>SIFAT</th>
          <th>SKS</th>
          <th>TAHUN AJARAN</th>
          <th>BKD</th>
          <th>Verifikasi</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkd = 0;@endphp
          @foreach($dosen->dosenKelas->sortBy('sifat')->sortByDesc('verifikasi') as $kelas)
          @php $sumBkd += $kelas->kelas->bkd();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $kelas->kelas->nama_matkul}}</th>
              <td>{{ $kelas->kelas->grup}}</td>
              <td>{{ $kelas->kelas->sifat}}</td>
              <td>{{ $kelas->kelas->sks}}</td>
              <td>{{ $kelas->kelas->tahun_ajaran}} - {{$kelas->kelas->semester}}</td>
              <td>{{ number_format($kelas->kelas->bkd(), 2)}}</td>
              <td>{{ $kelas->verifikasi}}</td>
              <td>
                  <a href="/kaprodi/{{$kelas->id}}/verifikasi_kls" class="badge badge-danger">VERIFIKASI</a>
              </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Daftar Pekerjaan</b></h3>
    <hr>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>JENIS PEKERJAAN</TH>
            <th>SKS</th>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
            <th>VERIFIKASI</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkdNp = 0;@endphp
          @foreach($dosen->pekerjaan->sortByDesc('verifikasi') as $pekerjaan)
          @php $sumBkdNp += $pekerjaan->bkdnp();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $pekerjaan->jenis_pekerjaan}}</th>
              <td>{{ $pekerjaan->sks}}</td>
              <td>{{ $pekerjaan->tahun_ajaran}}</td>
              <td>{{ $pekerjaan->keterangan}}</td>
              <td>{{ $pekerjaan->verifikasi}}</td>
              <td>
                  <a href="/kaprodi/{{$pekerjaan->id}}/verifikasi_pkj" class="badge badge-danger">VERIFIKASI</a>
              </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="panel panel-headline col-md-5">
  <div class="panel-heading col-md-12">
    <ul class="list-unstyled list-justify">
      @php $totalBkd = $sumBkd + $sumBkdNp; @endphp
      <li><b>BKD YANG SUDAH DISETUJUI</b></li>
      <li>Jumlah Beban Non-Pengajaran<span>{{number_format($jmlPkj, 2)}}</span> </li><br>
      <li>Jumlah Beban Pengajaran<span>{{$jmlKls}}</span></li><br>
      <li>Total Beban Pengjaran & Non-Pengajaran<span>{{number_format($jml, 2)}}</span></li><br>
      <!-- <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li> -->
    </ul>
  </div>
</div>

<div class="col-md-2">
</div>

<div class="panel panel-headline col-md-5">
  <div class="panel-heading col-md-12">
    <ul class="list-unstyled list-justify">
      @php $totalBkd = $sumBkd + $sumBkdNp; @endphp
      <li><b>BKD YANG BELUM & TIDAK DISETUJUI</b></li>
      <li>Jumlah Beban Non-Pengajaran<span>{{number_format($jmlPkj2, 2)}}</span> </li><br>
      <li>Jumlah Beban Pengajaran<span>{{$jmlKls2}}</span></li><br>
      <li>Total Beban Pengjaran & Non-Pengajaran<span>{{number_format($jml2, 2)}}</span></li><br>
      <!-- <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li> -->
    </ul>
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
        data: [{{number_format($jmlPkj, 2)}}, {{number_format($jmlKls, 2)}}]
    }]
});

$(document).ready(function(){
  $('#kelas').on('change',function(){
    var sks = $(this).children('option:selected').data('price');
    var dsn = $(this).children('option:selected').data('price2');
    var sft = $(this).children('option:selected').data('price3');
    var mhs = $(this).children('option:selected').data('price4');
    $('#kelas_sks').val(sks);
    $('#kelas_jmldsn').val(dsn);
    $('#kelas_sifat').val(sft);
    $('#kelas_jmlmhs').val(mhs);
  });
});
</script>

@endsection