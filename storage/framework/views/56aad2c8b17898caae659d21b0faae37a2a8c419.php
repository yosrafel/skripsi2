
<?php $__env->startSection('title', 'Kelas'); ?>
<?php $__env->startSection('kelas', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="container float-left mb-5">
  <a class=" container " href="/admin/list_kelas"> < Kembali</a>
</div>
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Kelas</b></h3>
    <hr>  
  </div>

  <div class="container">
    <div class="col-md-11">
      <form action="/admin/<?php echo e($kelas->id); ?>/update_pekerjaan" method="POST">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>

        <div class="form-group">
        <label for="matakuliah">Matakuliah</label>
        <input name="matakuliah" type="text" class="form-control" id="matakuliah" hidden placeholder="matakuliah" readonly required value="<?php echo e($kelas->nama_matkul); ?>">
        </div>
        <div class="form-group">
        <label for="grup">Grup</label>
        <input name="grup" type="text" class="form-control" id="grup" placeholder="Nama Mahasiswa" readonly required value="<?php echo e($kelas->grup); ?>">
        </div>
        
        <div class="form-group">
            <label for="sifat">Sifat</label>
            <input name="sifat" type="sifat" class="form-control" id="sifat" placeholder="sifat" readonly required value="<?php echo e($kelas->sifat); ?>">
        </div>
        <div class="form-group">
            <label for="sks">SKS</label>
            <input name="sks" type="sks" class="form-control" id="sks" placeholder="No Telepon" readonly required value="<?php echo e($kelas->sks); ?>">
        </div>
        <div class="form-group">
            <label for="jumlah_mhs">Jumlah Mahasiswa</label>
            <input name="jumlah_mhs" type="jumlah_mhs" class="form-control" id="jumlah_mhs" readonly placeholder="No Telepon" required value="<?php echo e($kelas->jumlah_mhs); ?>">
        </div>
        <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" readonly placeholder="tahun_ajaran" required value="<?php echo e($kelas->tahun_ajaran); ?>">
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input name="semester" type="semester" class="form-control" id="semester" readonly placeholder="semester" required value="<?php echo e($kelas->semester); ?>">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>List Dosen yang Mengampu</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutServis">
        <thead>
          <tr>
            <th>NOMOR </th>
            <th>NIK </th>
            <th>DOSEN</TH>
            <th>BKD</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $kelas->dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></td>
              <td><?php echo e($dosen->nik); ?></td>
              <td><?php echo e($dosen->nama); ?></td>
              <td><?php echo e($dosen->pivot->bkd_kelas); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/admin/dtl_kelas.blade.php ENDPATH**/ ?>