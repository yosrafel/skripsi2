@extends('layout/master')
@section('title', 'Profile Dosen')
@section('dosen', 'active')
@section('content')
<div class="panel mt-5 col-md-8" style="offset:3">
      <div class="card-header text-center">
        <h2>Verifikasi</h2>
      </div>
      <div class="card-body">
        <form method="post" action="/kaprodi/{{$pekerjaan->id}}/updateVerifPkj">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="verifikasi" id="Ya" value="Ya" {{ ($pekerjaan->verifikasi=="Ya")? "checked" : ""}} >
              <label class="form-check-label">
                Ya
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="verifikasi" id="Tidak" value="Tidak" {{ ($pekerjaan->verifikasi=="Tidak")? "checked" : ""}} >
              <label class="form-check-label">
                Tidak
              </label>
            </div>
          </div>
          <div class="form-group" >
              <input type="submit" class="btn btn-success" style="float:right;">
              <a type="button" class="btn btn-danger" href="/kaprodi/{{$pekerjaan->dosen->id}}/profiledsn"> Kembali </a>
          </div>
        </form>
      </div>
    </div>
@endsection