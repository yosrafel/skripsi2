@extends('layout/master')
@section('title', 'Kelas')
@section('kelas', 'active')
@section('content')
<div class="container float-left mb-5">
  <a class=" container " href="/admin/list_kelas"> < Kembali</a>
</div>
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Kelas</b></h3>
    <hr>  
  </div>

  <div class="container">
    <div class="col-md-11">
      <form action="/admin/{{$kelas->id}}/update_pekerjaan" method="POST">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="form-group">
        <label for="matakuliah">Matakuliah</label>
        <input name="matakuliah" type="text" class="form-control" id="matakuliah" hidden placeholder="matakuliah" readonly required value="{{$kelas->nama_matkul}}">
        </div>
        <div class="form-group">
        <label for="grup">Grup</label>
        <input name="grup" type="text" class="form-control" id="grup" placeholder="Nama Mahasiswa" readonly required value="{{ $kelas->grup }}">
        </div>
        
        <div class="form-group">
            <label for="sifat">Sifat</label>
            <input name="sifat" type="sifat" class="form-control" id="sifat" placeholder="sifat" readonly required value="{{ $kelas->sifat }}">
        </div>
        <div class="form-group">
            <label for="sks">SKS</label>
            <input name="sks" type="sks" class="form-control" id="sks" placeholder="No Telepon" readonly required value="{{ $kelas->sks }}">
        </div>
        <div class="form-group">
            <label for="jumlah_mhs">Jumlah Mahasiswa</label>
            <input name="jumlah_mhs" type="jumlah_mhs" class="form-control" id="jumlah_mhs" readonly placeholder="No Telepon" required value="{{ $kelas->jumlah_mhs }}">
        </div>
        <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" readonly placeholder="tahun_ajaran" required value="{{ $kelas->tahun_ajaran }}">
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input name="semester" type="semester" class="form-control" id="semester" readonly placeholder="semester" required value="{{ $kelas->semester }}">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>List Dosen yang Mengampu</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutServis">
        <thead>
          <tr>
            <th>NOMOR </th>
            <th>NIK </th>
            <th>DOSEN</TH>
            <th>BKD</th>
          </tr>
        </thead>
        <tbody>
          @foreach($kelas->dosen as $dosen)
            <tr>
              <th scope="row">{{ $loop->iteration }}</td>
              <td>{{$dosen->nik}}</td>
              <td>{{$dosen->nama}}</td>
              <td>{{$dosen->pivot->bkd_kelas}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection