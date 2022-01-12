@extends('layout/master')
@section('title', 'Profil')
@section('profil', 'active')
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
<div class=" panel-profile col-md-4">
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay"></div>
                <div class="profile-main">
                    <img src="/assets/img/guest.png" class="img-circle" width="90px" height="90px" alt="Avatar">
                    <h3 class="name">{{auth()->user()->dosen->nama}}</h3>
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
                        <li>NIK <span>{{auth()->user()->dosen->nik}}</span></li>
                        <li>Alamat <span>{{auth()->user()->dosen->alamat}}</span></li>
                        <li>Nomor Telepon <span>{{auth()->user()->dosen->no_telp}}</span></li>
                        <li>Program Studi <span>{{auth()->user()->dosen->prodi}}</span></li>
                        <li>Email <span>{{auth()->user()->email}}</span></li>
                    </ul>
                </div>
                <div class="text-center"><a href="#" data-toggle="modal" data-target="#editProfileModal" class="btn btn-primary">Edit Profile</a></div>
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

<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Daftar Kelas</b></h3>
    <hr>
  </div>

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#createKelasModal">BUAT DAFTAR KELAS</a>
    </div>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA MATAKULIAH</TH>
            <th>GRUP</th>
            <th>SIFAT</th>
            <th>SKS</th>
            <th>SEMESTER</th>
            <th>TAHUN AJARAN</th>
            <th>VERIFIKASI</th>
            <th>BKD</th>
            <th>ACTION </th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkd = 0;@endphp
          @foreach($profil->kelas->sortBy('sifat') as $kls)
              @php $sumBkd += $kls->bkd();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $kls->nama_matkul}}</th>
              <td>{{ $kls->grup}}</td>
              <td>{{ $kls->sifat}}</td>
              <td>{{ $kls->sks}}</td>
              <td>{{ $kls->semester}}</td>
              <td>{{ $kls->tahun_ajaran}}</td>
              <td>{{ $kls->pivot->verifikasi}}</td>
              <td>{{ number_format($kls->bkd(), 2)}}</td>
              <td>
                  <a href="/kaprodi/{{$profil->id}}/{{$kls->id}}/del_kelas" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
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
      <table class="table" id="dtBasicExample">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>JENIS PEKERJAAN</TH>
            <th>BKD</th>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
            <th>VERIFIKASI</th>
            <th>ACTION </th>
        </tr>
        </thead>
        <tbody>
        @php $sumBkdNp = 0;@endphp
          @foreach($profil->pekerjaan as $pekerjaan)
          @php $sumBkdNp += $pekerjaan->bkdnp();@endphp
              <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $pekerjaan->jenis_pekerjaan}}</th>
              <td>{{ $pekerjaan->bkdnp()}}</td>
              <td>{{ $pekerjaan->tahun_ajaran}} - {{ $pekerjaan->semester}}</td>
              <td>{{ $pekerjaan->keterangan}}</td>
              <td>{{ $pekerjaan->verifikasi}}</td>
              <td>
                  <a href="/kaprodi/{{$pekerjaan->id}}/detail_pekerjaan" class="badge">EDIT</a>
                  <a href="/kaprodi/{{$pekerjaan->id}}/delete_pekerjaan" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
              </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="panel panel-headline col-md-12">
  <div class="panel-heading col-md-6">
    <ul class="list-unstyled list-justify">
      @php $totalBkd = $sumBkd + $sumBkdNp; @endphp
      <li>Jumlah Beban Non-Pengajaran<span>{{number_format($sumBkdNp, 2)}}</span> </li>
      <li>Jumlah Beban Pengajaran<span>{{number_format($sumBkd, 2)}}</span></li>
      <li>Total Beban Pengjaran & Non-Pengajaran<span>{{number_format($totalBkd, 2)}}</span></li>
      <!-- <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li> -->
    </ul>
  </div>
</div>

<!-- Modal Edit Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="/kaprodi/{$dosen->id}/update_profil" method="POST">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="nik">NIK</label>
              <input name="nik" type="text" class="form-control" id="nik" placeholder="nik" readonly required value="{{ $profil->nik }}">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" required value="{{ $profil->nama }}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat" required value="{{ $profil->alamat }}">
            </div>
            <div class="form-group">
                <label for="no_telp">No Telepon</label>
                <input name="no_telp" type="text" class="form-control" id="no_telp" placeholder="No Telepon" required value="{{ $profil->no_telp }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email" readonly required value="{{ $profil->user->email }}">
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
              </form>
          </div>
      </div>
    </div>
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
          <form action="/kaprodi/{{$profil->id}}/create_kelas" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="kelas">Matakuliah</label>
                <select name="kelas" class="form-control" id="kelas">
                  <option> Silahkan Pilih</option>
                  @foreach($kelas as $kelas)
                    <option value="{{$kelas->id}}" data-price="{{$kelas->sks}}" data-price2="{{$kelas->jumlah_dosen}}" data-price3="{{$kelas->sifat}}" data-price4="{{$kelas->jumlah_mhs}}"> {{$kelas->nama_matkul}} - Grup {{$kelas->grup}} - {{$kelas->sifat}}</option>
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
              <h2 class="modal-title" id="createPekerjaanModal">Daftar Pekerjaan</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="/kaprodi/{{$profil->id}}/create_pekerjaan" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <input name="dosen_id" type="hidden" class="form-control" id="dosen_id" value="{{ auth()->user()->dosen->id }}">
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
              <input name="sks" type="text" class="form-control" id="sks" placeholder="Besar SKS" required value="{{ old('sks') }}">
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
        data: [{{number_format($sumBkdNp, 2)}}, {{number_format($sumBkd, 2)}}]
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