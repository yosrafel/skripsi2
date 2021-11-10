
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('history', 'active'); ?>
<?php $__env->startSection('content'); ?>
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>List barang yang sudah pernah di servis</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-striped mt-5">
              <thead class="thead-dark">
                <tr>
                  <th>Kode Perwalian</th>
                  <th>Dosen</th>
                  <th>Prodi</th>
                  <th>Angkatan</th>
                  <th>Aksi</th>
                  <th>Daftar Mahasiswa</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\perwalian\resources\views/page/history.blade.php ENDPATH**/ ?>