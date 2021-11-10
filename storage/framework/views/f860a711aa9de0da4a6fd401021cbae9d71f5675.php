
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title">Presensi Dosen</h3>
    <hr>  
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
  </div>

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">BUAT PRESENSI</a>
    </div>
    <!-- <div class="pull-right">
      <a class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
        IMPORT EXCEL
      </a>
      <a href="/servis/export" class="btn btn-success">EXPORT EXCEL</a>
    </div> -->
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutServis">
        <thead>
          <tr>
            <th>NOMOR </th>
            <th>JENIS</TH>
            <th>NAMA PEKERJAAN</th>
            <th>SKS</th>
            <th>SEMESTER</th>
            <th>TAHUN AJARAN</th>
            <th>DIBUAT TANGGAL </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $presensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($presensi->jenis); ?></th>
              <td><?php echo e($presensi->nama_pekerjaan); ?></td>
              <td><?php echo e($presensi->sks); ?></td>
              <td><?php echo e($presensi->semester); ?></td>
              <td><?php echo e($presensi->tahun_ajaran); ?></td>
              <td><?php echo e($presensi->created_at->format('d/m/Y')); ?></td>
              <td>
                <a href="/detail/<?php echo e($presensi->id); ?>" class="badge">DETAIL</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="/servis/import_excel" enctype="multipart/form-data">
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

 <!-- Modal Insert-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Presensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="POST">
                <?php echo e(csrf_field()); ?>  
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <input name="jenis" type="text" class="form-control" id="jenis" placeholder="..." required value="<?php echo e(old('jenis')); ?>" >
                    <?php $__errorArgs = ['perwalian_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>                                 
                <div class="form-group">
                    <label for="nama_pekerjaan">Nama Pekerjaan</label>
                    <input name="nama_pekerjaan" type="text" class="form-control" id="nama_pekerjaan" placeholder="..." required value="<?php echo e(old('nama_pekerjaan')); ?>" >
                    <?php $__errorArgs = ['karyawan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="sks">SKS</label>
                    <input name="sks" type="text" class="form-control" id="sks" placeholder="..." required value="<?php echo e(old('sks')); ?>">
                    <?php $__errorArgs = ['jdl_pertemuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input name="semester" type="text" class="form-control" id="semester" placeholder="..." required value="<?php echo e(old('semester')); ?>">
                    <?php $__errorArgs = ['jdl_pertemuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" placeholder="..." required value="<?php echo e(old('tahun_ajaran')); ?>">
                    <?php $__errorArgs = ['jdl_pertemuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>  
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/index.blade.php ENDPATH**/ ?>