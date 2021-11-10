
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="">
  <div class="col-md-6">
    <div class="clearfix">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title"><b>Laporan BKD</b></h3>
          <hr>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <ul class="list-unstyled list-justify">
              <li>Jumlah Beban Non-Pengajaran<span>28,34</span> </li>
              <li>Jumlah Beban Pengajaran di Sistem Informasi<span>28,34</span></li>
              <li>Jumlah Beban Pengajaran di Program Studi Lain<span>28,34</span></li>
              <li>Total Beban Pengjaran & Non-Pengajaran<span>28,34</span></li>
              <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">
          <h3 class="panel-title"><b>Total Beban Pengjaran & Non-Pengajaran Tiap Tahun</b></h3>
          <hr>
      </div>
      <div class="panel-body">
          <div id="demo-bar-chart" class="ct-chart"></div>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Kelas</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutKelas">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA MATAKULIAH</TH>
            <th>GRUP</th>
            <th>SKS</th>
            <th>SIFAT</th>
            <th>BKD</th>
            <th>TAHUN AJARAN</th>
        </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($kelas->matakuliah->nama); ?></th>
              <td><?php echo e($kelas->grup); ?></td>
              <td><?php echo e($kelas->sks); ?></td>
              <td><?php echo e($kelas->sifat); ?></td>
              <td><?php echo e(number_format($kelas->bkd(), 2)); ?></td>
              <td><?php echo e($kelas->tahun_ajaran); ?> - <?php echo e($kelas->semester); ?></td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Pekerjaan</b></h3>
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

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutPekerjaan">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>JENIS PEKERJAAN</TH>
            <th>BKD</th>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
        </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pekerjaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($pekerjaan->jenis_pekerjaan); ?></th>
              <td><?php echo e($pekerjaan->sks); ?></td>
              <td><?php echo e($pekerjaan->tahun_ajaran); ?> - <?php echo e($pekerjaan->semester); ?></td>
              <td><?php echo e($pekerjaan->keterangan); ?></td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/kaprodi/index.blade.php ENDPATH**/ ?>