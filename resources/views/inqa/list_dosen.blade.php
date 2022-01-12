@extends('layout/master')
@section('title', 'List Dosen')
@section('dosen', 'active')
@section('content')

<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>List Dosen</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
            <th>NIK</TH>
            <th>NAMA DOSEN</TH>
            <th>TOTAL BKD NON-PENGAJARAN</th>
            <th>TOTAL BKD PENGAJARAN</th>
            <th>TOTAL BKD PENGAJARAN (INQA)</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach($dosen as $dosen)
              <tr>
              <td>{{ $dosen->nik}}</th>
              <td>{{ $dosen->nama}}</th>
              <td>{{ $dosen->pekerjaan->sum('sks')}} / {{ $dosen->pekerjaan->count()}} Pekerjaan</td>
              <td>{{ $dosen->kelas()->sum('bkd_kelas')}} / {{ $dosen->kelas()->count()}} Kelas</td>
              <td>{{ $dosen->kelas()->sum('bkd_inqa')}}</th>
              <td>
                <a href="/inqa/{{$dosen->id}}/profiledsn" class="badge">DETAIL</a>
              </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection