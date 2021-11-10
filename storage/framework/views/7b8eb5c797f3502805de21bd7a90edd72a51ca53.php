
<?php $__env->startSection('title', 'Detail Pekerjaan'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title " ><b>Detail Pekerjaan</b></h3>
    <hr>
  </div>

  <div class="panel-body">
    <form method="post" action="/dosen/<?php echo e($pekerjaan->id); ?>/update_pekerjaan">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('PUT')); ?>

      <div class="form-group">
        <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
        <input name="jenis_pekerjaan" class="form-control" id="jenis_pekerjaan" value="<?php echo e($pekerjaan->jenis_pekerjaan); ?>" >
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input name="keterangan" type="text" class="form-control" id="keterangan" value="<?php echo e($pekerjaan->keterangan); ?>">
      </div>
      <div class="form-group">
        <label for="sks">SKS</label>
        <input name="sks" type="text" class="form-control" id="sks" value="<?php echo e($pekerjaan->sks); ?>">
      </div>
      <div class="form-group input-daterange">
          <label for="tahun_ajaran">Tahun Ajaran</label>
          <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" value="<?php echo e($pekerjaan->tahun_ajaran); ?>">
      </div>
      <div class="form-group">
        <label for="semester">Semester</label>
        <input name="semester" type="text" class="form-control" id="semester" value="<?php echo e($pekerjaan->semester); ?>">
      </div>
      <div class="form-group">
        <label for="created_at">Dibuat Tanggal</label>
        <input name="created_at" type="text" readonly class="form-control" id="created_at" value="<?php echo e($pekerjaan->created_at); ?>">
      </div>
      <div class="form-group">
        <label for="updated_at">Diubah Tanggal</label>
        <input name="updated_at" type="text" readonly class="form-control" id="updated_at" value="<?php echo e($pekerjaan->updated_at); ?>">
      </div>
      <a href="/" type="button" style="float:left;" class="btn btn-secondary ">Kembali</a>
      <button type="submit" style="float:right;" class="btn btn-success">Buat</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/dosen/detail_pkj.blade.php ENDPATH**/ ?>