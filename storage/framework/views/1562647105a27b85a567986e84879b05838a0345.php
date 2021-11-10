
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>

<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>Cek Status Perbaikan</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-striped mt-5">
              <thead class="thead-dark">
                <tr>
                  <th>Item </th>
                  <th>No Perbaikan</th>
                  <th>No Serial</th>
                  <th>Product</th>
                  <th>Tanggal Penerimaan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($barang->servis->tanda_terima); ?></td>
                    <td><?php echo e($barang->serial_num); ?></td>
                    <td><?php echo e($barang->type); ?></td>
                    <td><?php echo e($barang->servis->tgl_masuk); ?></td>
                    <td><?php echo e($barang->servis->status); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\perwalian\resources\views/page/index.blade.php ENDPATH**/ ?>