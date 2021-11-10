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
            <th>ALAMAT</th>
            <th>EMAIL </th>
            <th>NO TELEPON</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($dosen->where('id', '!=' , auth()->user()->dosen->id) as $dosen)
            <tr>
              <th scope="row">{{ $loop->iteration }}</td>
              <td>{{ $dosen->nik}}</td>
              <td>{{ $dosen->nama}}</td>
              <td>{{ $dosen->alamat}}</td>
              <td>{{ $dosen->user->email}}</td>
              <td>{{ $dosen->no_telp}}</td>
              <td>
                <a href="/kaprodi/{{$dosen->id}}/profiledsn" class="badge">DETAIL</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection