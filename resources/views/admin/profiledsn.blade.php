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
  <a class=" container " href="/admin/list_dosen"> < Kembali</a>
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

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#createKelasModal">TAMBAH KELAS</a>
    </div>
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
          <th>VERIFIKASI</th>
          <th>ACTION </th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkd = 0;@endphp
          @foreach($dosen->kelas as $kelas)
          @php $sumBkd += $kelas->bkd();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $kelas->nama_matkul}}</th>
              <td>{{ $kelas->grup}}</td>
              <td>{{ $kelas->sifat}}</td>
              <td>{{ $kelas->sks}}</td>
              <td>{{ $kelas->tahun_ajaran}} - {{$kelas->semester}}</td>
              <td>{{ number_format($kelas->bkd(), 2)}}</td>
              <td>{{ $kelas->pivot->verifikasi}}</td>
              <td>
                  <a href="/admin/{{$dosen->id}}/{{$kelas->id}}/del_kelas" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
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

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#createPekerjaanModal">BUAT DAFTAR PEKERJAAN</a>
    </div>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>JENIS PEKERJAAN</TH>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
            <th>BKD</th>
            <th>VERIFIKASI</th>
            <th>ACTION </th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkdNp = 0;@endphp
          @foreach($dosen->pekerjaan as $pekerjaan)
          @php $sumBkdNp += $pekerjaan->bkdnp();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $pekerjaan->jenis_pekerjaan}}</th>
              <td>{{ $pekerjaan->tahun_ajaran}} - {{ $pekerjaan->semester}}</td>
              <td>{{ $pekerjaan->keterangan}}</td>
              <td>{{ $pekerjaan->sks}}</td>
              <td>{{ $pekerjaan->verifikasi}}</td>
              <td>
                  <a href="/admin/{{$pekerjaan->id}}/dtl_pekerjaan" class="badge">EDIT</a>
                  <a href="/admin/{{$pekerjaan->id}}/delete_pekerjaan" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
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

<!-- Modal Buat Kelas-->
<div class="modal fade" id="createKelasModal" tabindex="-1" role="dialog" aria-labelledby="createKelasModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h2 class="modal-title text-center" id="createKelasModal">Daftar Kelas</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body mb-5">
          <form action="/admin/{{$dosen->id}}/create_kelas" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="kelas">Matakuliah</label>
                <select name="kelas" class="form-control" id="kelas">
                  <option> Silahkan Pilih </option>
                  @foreach($kelas2 as $kelas2)
                  <option value="{{$kelas2->id}}" data-price="{{$kelas2->sks}}" data-price2="{{$kelas2->jumlah_dosen}}" data-price3="{{$kelas2->sifat}}" data-price4="{{$kelas2->jumlah_mhs}}"> {{$kelas2->nama_matkul}} - Grup {{$kelas2->grup}} - {{$kelas2->sifat}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">             
              <span>Sifat</span>
              <input id="kelas_sifat" name="kelas_sifat" type="text" class="form-control" readonly>
            </div>
            <div class="form-group">             
              <span>SKS</span>
              <input id="kelas_sks" name="kelas_sks" type="text" class="form-control" readonly>
            </div>
            <div class="form-group">             
              <span>Jumlah Mahasiswa</span>
              <input id="kelas_jmlmhs" name="kelas_jmlmhs" type="text" class="form-control" readonly>
            </div>
            <div class="form-group">             
              <span>Jumlah Dosen</span>
              <input id="kelas_jmldsn" name="kelas_jmldsn" type="text" class="form-control" readonly>
            </div>
            
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Buat</button>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Buat Pekerjaan-->
<div class="modal fade" id="createPekerjaanModal" tabindex="-1" role="dialog" aria-labelledby="createPekerjaanModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="createPekerjaanModal">Daftar Pekerjaan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="/admin/{{$dosen->id}}/create_pekerjaan" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <input name="dosen_id" type="hidden" class="form-control" id="dosen_id" value="{{ $dosen->id }}">
            </div>
            <div class="form-group">
              <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
              <input name="jenis_pekerjaan" type="text" class="form-control" id="jenis_pekerjaan" placeholder="Jenis Pekerjaan" required value="{{ old('jenis_pekerjaan') }}">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Keterangan" required value="{{ old('keterangan') }}">
            </div>
            <div class="form-group">
              <label for="sks">Besar SKS</label>
              <input name="sks" type="text" class="form-control" id="sks" placeholder="Besar SKS" value="{{ old('sks') }}">
            </div>
            <div class="form-group">
              <label for="tahun_ajaran">Tahun Ajaran</label>
              <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" placeholder="Tahun Ajaran" required value="{{ old('tahun_ajaran') }}">
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <input name="semester" type="text" class="form-control" id="semester" placeholder="Semester" required value="{{ old('semester') }}">
            </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Buat</button>
              </form>
          </div>
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