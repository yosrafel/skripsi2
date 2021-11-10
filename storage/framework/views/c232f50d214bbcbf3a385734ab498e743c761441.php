
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

<!-- SECTION -->
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title">Data Servis</h3>
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
    
    <div class="pull-right">
      <a class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
        IMPORT EXCEL
      </a>
      <a href="/servis/export" class="btn btn-success">EXPORT EXCEL</a>
    </div>
  </div>
  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutServis">
        <thead>
          <tr>
            <th>ITEM </th>
            <th>USER ID</TH>
            <th>TANGGAL MASUK</th>
            <th>NO. TANDA TERIMA</th>
            <th>NAMA CUSTOMER</th>
            <th>NO HP</th>
            <th>EMAIL </th>
            <th>TYPE</th>
            <th>STATUS UNIT</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $servis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($servis->user_id); ?></th>
              <td><?php echo e($servis->tgl_in->format('d/m/Y')); ?></td>
              <td><?php echo e($servis->no_tanda_terima); ?></td>
              <td><?php echo e($servis->nama_customer); ?></td>
              <td><?php echo e($servis->no_hp_customer); ?></td>
              <td><?php echo e($servis->email); ?></td>
              <td><?php echo e($servis->type); ?></td>
              <td><?php echo e($servis->status_unit); ?></td>
              <td>
                <a href="/detail/<?php echo e($servis->id); ?>" class="badge">DETAIL</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- END SECTION -->

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  <script>
    $(document).ready( function () {
      $('#urutServis').DataTable();
    } );
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\admin\resources\views/index.blade.php ENDPATH**/ ?>