
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

<!-- SECTION -->
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title">Data Servis</h3>
    <hr>
    <a class="btn btn-primary mr-5 float-right" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</a>
    <a class="btn btn-primary mr-5 float-right" data-toggle="modal" data-target="#importExcel2">
			IMPORT coba
		</a>
    <a href="/servis/export" class="btn btn-success float-right">EXPORT EXCEL</a>
  </div>
  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table">
        <thead>
          <tr>
            <th>ITEM </th>
            <th>USER ID</TH>
            <th>TANGGAL MASUK</th>
            <th>NO. TANDA TERIMA</th>
            <th>NAMA CUSTOMER</th>
            <th>NO HP</th>
            <th>DEPT </th>
            <th>TANGGAL BELI</th>
            <th>TYPE</th>
            <th>SERIAL NUMBER</th>
            <th>KELENGKAPAN</th>
            <th>KERUSAKAN</th>
            <th>TEHNISI </th>
            <th>TGL KIRIM VENDOR</th>
            <th>VENDOR</th>
            <th>NO. SURAT JALAN</th>
            <th>TGL KEMBALI VENDOR</th>
            <th>STATUS UNIT</th>
            <th>TGL AMBIL CUSTOMER </th>
            <th>STATUS</th>
            <th>CLOSED BY</th>
            <th>CHARGE</th>
            <th>NO. NOTA</th>
            <th>NOMINAL</th>
            <th>USIA SERVIS </th>
            <th>7</th>
            <th>14</th>
            <th>30</th>
            <th>TINDAKAN</th>
            <th>KETERANGAN 1</th>
            <th>KETERANGAN 2 </th>
            <th>KETERANGAN 3</th>
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
              <td><?php echo e($servis->dept); ?></td>
              <td><?php echo e($servis->tgl_beli->format('d/m/Y')); ?></td>
              <td><?php echo e($servis->type); ?></td>
              <td><?php echo e($servis->serial_num); ?></td>
              <td><?php echo e($servis->kelengkapan); ?></td>
              <td><?php echo e($servis->kerusakan); ?></td>
              <td><?php echo e($servis->tehnisi); ?></td>
              <td><?php echo e($servis->tgl_kirim_vendor->format('d/m/Y')); ?></td>
              <td><?php echo e($servis->vendor); ?></td>
              <td><?php echo e($servis->no_surat_jalan); ?></td>
              <td><?php echo e($servis->tgl_kembali_vendor->format('d/m/Y')); ?></td>
              <td><?php echo e($servis->status_unit); ?></td>
              <td><?php echo e($servis->tgl_ambil_cust->format('d/m/Y')); ?></td>
              <td><?php echo e($servis->status); ?></td>
              <td><?php echo e($servis->closed_by); ?></td>
              <td><?php echo e($servis->charge); ?></td>
              <td><?php echo e($servis->no_nota); ?></td>
              <td><?php echo e($servis->nominal); ?></td>
              <td><?php echo e($servis->usia_service); ?></td>
              <td><?php echo e($servis->cek_7); ?></td>
              <td><?php echo e($servis->cek_14); ?></td>
              <td><?php echo e($servis->cek_30); ?></td>
              <td><?php echo e($servis->tindakan); ?></td>
              <td><?php echo e($servis->ket_1); ?></td>
              <td><?php echo e($servis->ket_2); ?></td>
              <td><?php echo e($servis->ket_3); ?></td>
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








<!-- Modal Import Excel -->
<div class="modal fade" id="importExcel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/servis/import" enctype="multipart/form-data">
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
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\perwalian\resources\views/index.blade.php ENDPATH**/ ?>