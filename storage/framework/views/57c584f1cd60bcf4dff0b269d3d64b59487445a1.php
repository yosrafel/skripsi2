
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
  <div class="text-center alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php elseif(session('error')): ?>
  <div class="text-center alert alert-danger">
    <?php echo e(session('error')); ?>

  </div>
<?php endif; ?>

<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Kelas</b></h3>
    <hr>  
  </div>

  <div class="container">
    <div class="col-md-11">
      <form action="/admin/<?php echo e($pekerjaan->id); ?>/update_pekerjaan" method="POST">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>

        <div class="form-group">
        <label for="dosen_id">Dosen</label>
        <input name="dosen_id" type="text" class="form-control" id="dosen_id" hidden placeholder="dosen_id" readonly required value="<?php echo e($pekerjaan->dosen_id); ?>">
        </div>
        <div class="form-group">
        <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
        <input name="jenis_pekerjaan" type="text" class="form-control" id="jenis_pekerjaan" placeholder="Nama Mahasiswa" required value="<?php echo e($pekerjaan->jenis_pekerjaan); ?>">
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input name="keterangan" type="keterangan" class="form-control" id="keterangan" placeholder="keterangan" required value="<?php echo e($pekerjaan->keterangan); ?>">
        </div>
        <div class="form-group">
            <label for="sks">BKD</label>
            <input name="sks" type="sks" class="form-control" id="sks" placeholder="No Telepon" required value="<?php echo e($pekerjaan->sks); ?>">
        </div>
        <div class="form-group">
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" class="form-control" id="semester">
            <option value="Ganjil" <?php if($pekerjaan->semester == 'Ganjil'): ?> selected="selected" <?php endif; ?>> Ganjil</option>
            <option value="Genap" <?php if($pekerjaan->semester == 'Genap'): ?> selected="selected" <?php endif; ?>> Genap</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" placeholder="tahun_ajaran" required value="<?php echo e($pekerjaan->tahun_ajaran); ?>">
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input name="semester" type="semester" class="form-control" id="semester" placeholder="semester" required value="<?php echo e($pekerjaan->semester); ?>">
        </div>
        <div class="form-group">
            <label for="created_at">Dibuat Tanggal</label>
            <input name="created_at" type="created_at" class="form-control" id="created_at" placeholder="Kota / Kabupaten" readonly required value="<?php echo e($pekerjaan->created_at); ?>">
        </div>
        <div class="form-group">
            <label for="updated_at">Diubah Tanggal</label>
            <input name="updated_at" type="updated_at" class="form-control" id="updated_at" placeholder="updated_at" readonly required value="<?php echo e($pekerjaan->updated_at); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/admin/dtl_pekerjaan.blade.php ENDPATH**/ ?>