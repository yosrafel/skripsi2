@extends('layout/master')
@section('title', 'Kelas')
@section('kelas', 'active')
@section('content')
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>List Kelas</b></h3>
    <hr>  
  </div>
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
  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#importKelasModal">IMPORT KELAS</a>
    </div>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
          <tr>
            <th>NOMOR </th>
            <th>MATAKULIAH </th>
            <th>GRUP</TH>
            <th>SIFAT</th>
            <th>JUMLAH MAHASISWA </th>
            <th>SEMESTER </th>
            <th>TAHUN AJARAN </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($kelas as $kelas)
            <tr>
              <th scope="row">{{ $loop->iteration }}</td>
              <td>{{ $kelas->nama_matkul}}</td>
              <td>{{ $kelas->grup}}</td>
              <td>{{ $kelas->sifat}}</td>
              <td>{{ $kelas->jumlah_mhs}}</td>
              <td>{{ $kelas->semester}}</td>
              <td>{{ $kelas->tahun_ajaran}}</td>
              <td>
                <a href="/admin/{{$kelas->id}}/dtl_kelas" class="badge">DETAIL</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

<!-- Modal Import Excel -->
<div class="modal fade" id="importKelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/admin/import_kelas_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
							{{ csrf_field() }}
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>