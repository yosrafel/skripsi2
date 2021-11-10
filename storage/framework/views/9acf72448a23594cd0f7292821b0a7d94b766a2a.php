
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('dosen', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>List Dosen</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutServis">
        <thead>
          <tr>
            <th>NOMOR </th>
            <th>NIK </th>
            <th>NAMA</TH>
            <th>ALAMAT</th>
            <th>EMAIL </th>
            <th>NO TELEPON</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $dosen->where('id', '!=' , auth()->user()->dosen->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></td>
              <td><?php echo e($dosen->nik); ?></td>
              <td><?php echo e($dosen->nama); ?></td>
              <td><?php echo e($dosen->alamat); ?></td>
              <td><?php echo e($dosen->user->email); ?></td>
              <td><?php echo e($dosen->no_telp); ?></td>
              <td>
                <a href="/kaprodi/<?php echo e($dosen->id); ?>/profiledsn" class="badge">DETAIL</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/kaprodi/list_dosen.blade.php ENDPATH**/ ?>