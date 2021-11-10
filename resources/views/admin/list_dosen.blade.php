@extends('layout/master')
@section('title', 'Home')
@section('dosen', 'active')
@section('content')
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>List Dosen</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutServis">
        <thead>
          <tr>
            <th>NOMOR </th>
            <th>NIK </th>
            <th>NAMA</TH>
            <th>BKD PENGAJARAN</th>
            <th>BKD NON-PENGAJARAN </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($dosen as $dosen)
            <tr>
              <th scope="row">{{ $loop->iteration }}</td>
              <td>{{ $dosen->nik}}</td>
              <td>{{ $dosen->nama}}</td>
              <td>{{ $dosen->kelas()->sum('bkd_kelas')}}</td>
              <td>{{ $dosen->pekerjaan->sum('sks')}}</td>
              <td>
                <a href="/admin/{{$dosen->id}}/profiledsn" class="badge">DETAIL</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection