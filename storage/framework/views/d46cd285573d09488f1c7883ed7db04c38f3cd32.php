
<?php $__env->startSection('title', 'Kelas'); ?>
<?php $__env->startSection('kelas', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>List Kelas</b></h3>
    <hr>  
  </div>
  <?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
    <?php elseif(session('status')): ?>
      <div class="text-center alert alert-success">
        <?php echo e(session('status')); ?>

      </div> 
    <?php endif; ?>
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
          <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></td>
              <td><?php echo e($kelas->nama_matkul); ?></td>
              <td><?php echo e($kelas->grup); ?></td>
              <td><?php echo e($kelas->sifat); ?></td>
              <td><?php echo e($kelas->jumlah_mhs); ?></td>
              <td><?php echo e($kelas->semester); ?></td>
              <td><?php echo e($kelas->tahun_ajaran); ?></td>
              <td>
                <a href="/admin/<?php echo e($kelas->id); ?>/dtl_kelas" class="badge">DETAIL</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<!-- Modal Import Excel -->
<div class="modal fade" id="importKelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/admin/import_kelas_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
							<?php echo e(csrf_field()); ?>

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
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/admin/list_kelas.blade.php ENDPATH**/ ?>