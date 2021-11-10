@extends('layout/master')
@section('title', 'Detail Pekerjaan')
@section('content')
<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title " ><b>Detail Pekerjaan</b></h3>
    <hr>
  </div>

  <div class="panel-body">
    <form method="post" action="/dosen/{{$pekerjaan->id}}/update_pekerjaan">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="form-group">
        <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
        <input name="jenis_pekerjaan" class="form-control" id="jenis_pekerjaan" value="{{ $pekerjaan->jenis_pekerjaan }}" >
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input name="keterangan" type="text" class="form-control" id="keterangan" value="{{ $pekerjaan->keterangan }}">
      </div>
      <div class="form-group">
        <label for="sks">SKS</label>
        <input name="sks" type="text" class="form-control" id="sks" value="{{ $pekerjaan->sks }}">
      </div>
      <div class="form-group input-daterange">
          <label for="tahun_ajaran">Tahun Ajaran</label>
          <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" value="{{  $pekerjaan->tahun_ajaran }}">
      </div>
      <div class="form-group">
        <label for="semester">Semester</label>
        <input name="semester" type="text" class="form-control" id="semester" value="{{ $pekerjaan->semester }}">
      </div>
      <div class="form-group">
        <label for="created_at">Dibuat Tanggal</label>
        <input name="created_at" type="text" readonly class="form-control" id="created_at" value="{{ $pekerjaan->created_at }}">
      </div>
      <div class="form-group">
        <label for="updated_at">Diubah Tanggal</label>
        <input name="updated_at" type="text" readonly class="form-control" id="updated_at" value="{{ $pekerjaan->updated_at }}">
      </div>
      <a href="/" type="button" style="float:left;" class="btn btn-secondary ">Kembali</a>
      <button type="submit" style="float:right;" class="btn btn-success">Buat</button>
    </form>
  </div>
</div>
@endsection