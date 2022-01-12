
<?php $__env->startSection('title', 'List Dosen'); ?>
<?php $__env->startSection('dosen', 'active'); ?>
<?php $__env->startSection('content'); ?>

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
          <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
              <td><?php echo e($dosen->nik); ?></th>
              <td><?php echo e($dosen->nama); ?></th>
              <td><?php echo e($dosen->pekerjaan->sum('sks')); ?> / <?php echo e($dosen->pekerjaan->count()); ?> Pekerjaan</td>
              <td><?php echo e($dosen->kelas()->sum('bkd_kelas')); ?> / <?php echo e($dosen->kelas()->count()); ?> Kelas</td>
              <td><?php echo e($dosen->kelas()->sum('bkd_inqa')); ?></th>
              <td>
                <a href="/inqa/<?php echo e($dosen->id); ?>/profiledsn" class="badge">DETAIL</a>
              </td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/inqa/list_dosen.blade.php ENDPATH**/ ?>