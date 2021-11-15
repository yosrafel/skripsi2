
<?php $__env->startSection('title', 'Profile Dosen'); ?>
<?php $__env->startSection('dosen', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel mt-5 col-md-8" style="offset:3">
      <div class="card-header text-center">
        <h2>Verifikasi</h2>
      </div>
      <div class="card-body">
        <form method="post" action="/kaprodi/<?php echo e($pekerjaan->id); ?>/updateVerifPkj">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="verifikasi" id="Ya" value="Ya" <?php echo e(($pekerjaan->verifikasi=="Ya")? "checked" : ""); ?> >
              <label class="form-check-label">
                Ya
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="verifikasi" id="Tidak" value="Tidak" <?php echo e(($pekerjaan->verifikasi=="Tidak")? "checked" : ""); ?> >
              <label class="form-check-label">
                Tidak
              </label>
            </div>
          </div>
          <div class="form-group" >
              <input type="submit" class="btn btn-success" style="float:right;">
              <a type="button" class="btn btn-danger" href="/kaprodi/<?php echo e($pekerjaan->dosen->id); ?>/profiledsn"> Kembali </a>
          </div>
        </form>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/kaprodi/verifikasi_pkj.blade.php ENDPATH**/ ?>