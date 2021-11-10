
<?php $__env->startSection('title', 'Detail'); ?>
<?php $__env->startSection('content'); ?>

<!-- SECTION -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Detail Servis</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive col-md-12">
            <table class="table mt-5">
                <tr>
                    <td>User ID</td><td><?php echo e($servis->user_id); ?></td>
                </tr>  
                <tr>
                    <td >TANGGAL MASUK</td><td><?php echo e($servis->tgl_in->format('d M Y')); ?></td>
                </tr>  
                <tr>
                    <td>NO. TANDA TERIMA</td><td><?php echo e($servis->no_tanda_terima); ?></td>
                </tr>
                <tr>    
                    <td>NAMA CUSTOMER</td><td><?php echo e($servis->nama_customer); ?></td>
                </tr>
                <tr>
                    <td>NO HP</td><td><?php echo e($servis->no_hp_customer); ?></td>
                </tr>
                <tr>
                    <td>DEPT </td><td><?php echo e($servis->dept); ?></td>
                </tr>
                <tr>
                    <td>TANGGAL BELI</td><td><?php echo e($servis->tgl_beli->format('d M Y','local')); ?></td>
                </tr>
                <tr>
                    <td>TYPE</td><td><?php echo e($servis->type); ?></td>
                </tr>
                <tr>
                    <td>SERIAL NUMBER</td><td><?php echo e($servis->serial_num); ?></td>
                </tr>
                <tr>
                    <td>KELENGKAPAN</td><td><?php echo e($servis->kelengkapan); ?></td>
                </tr>
                <tr>
                    <td>KERUSAKAN</td><td><?php echo e($servis->kerusakan); ?></td>
                </tr>
                <tr>
                    <td>TEHNISI </td><td><?php echo e($servis->tehnisi); ?></td>
                </tr>
                <tr>
                    <td>TGL KIRIM VENDOR</td><td><?php echo e($servis->tgl_kirim_vendor->format('d M Y','local')); ?></td>
                </tr>
                <tr>
                    <td>VENDOR</td><td><?php echo e($servis->vendor); ?></td>
                </tr>
                <tr>
                    <td>NO. SURAT JALAN</td><td><?php echo e($servis->no_surat_jalan); ?></td>
                </tr>
                <tr >
                    <td>TGL KEMBALI VENDOR</td><td><?php echo e($servis->tgl_kembali_vendor->format('d M Y','local')); ?></td>
                </tr>
                <tr>
                    <td>STATUS UNIT</td><td><?php echo e($servis->status_unit); ?></td>
                </tr>
                <tr>
                    <td>TGL AMBIL CUSTOMER </td><td><?php echo e($servis->tgl_ambil_cust->format('d M Y','local')); ?></td>
                </tr>
                <tr >
                    <td>STATUS</td><td><?php echo e($servis->status); ?></td>
                </tr>
                <tr >
                    <td>CLOSED BY</td><td><?php echo e($servis->closed_by); ?></td>
                </tr>
                <tr>
                    <td>CHARGE</td><td><?php echo e($servis->charge); ?></td>
                </tr>
                <tr>
                    <td>NO. NOTA</td><td><?php echo e($servis->no_nota); ?></td>
                </tr>
                <tr>
                    <td>NOMINAL</td><td><?php echo e($servis->nominal); ?></td>
                </tr>
                <tr >
                    <td>USIA SERVIS </td><td><?php echo e($servis->usia_service); ?></td>
                </tr>
                <tr >
                    <td>7</td><td><?php echo e($servis->cek_7); ?></td>
                </tr>
                <tr >
                    <td>14</td><td><?php echo e($servis->cek_14); ?></td>
                </tr>
                <tr >
                    <td>30</td><td><?php echo e($servis->cek_30); ?></td>
                </tr>
                <tr >
                    <td>TINDAKAN</td><td><?php echo e($servis->tindakan); ?></td>
                </tr>
                <tr>
                    <td>KETERANGAN 1</td><td><?php echo e($servis->ket_1); ?></td>
                </tr>
                <tr>
                    <td>KETERANGAN 2 </td><td><?php echo e($servis->ket_2); ?></td>
                </tr>
                <tr                                             >
                    <td>KETERANGAN 3</td><td><?php echo e($servis->ket_3); ?></td>
                </tr>
            </table>
        </div>
        <h4><b>Hubungi Customer Via Whatsapp</b> </h4>
        <form id="salsa" method="POST">
            <div class="input form-group">
                <input placeholder="62812xxxx" name="nomor" class="form-control" type="number" class="" id="nomor" value="<?php echo e($servis->no_hp_customer); ?>" required readonly/>
            </div>
            <div class="input form-group">
                <textarea class="form-control" rows="4" id="pesan" name="pesan" placeholder="Custom Pesan . . ."></textarea>
            </div>
            <div class="submit form-group"><button type="submit" id="btn-wa" class="btn btn-primary btn-user">Kirim</button></div>
        </form>
        <div>
            <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo e($servis->no_hp_customer); ?>&amp;text=Selamat siang <?php echo e($servis->nama_customer); ?>, untuk laptop <?php echo e($servis->type); ?> dengan serial number <?php echo e($servis->serial_num); ?> sudah dapat diambil di Els Computer. Kami tunggu kedatangannya, terimakasih." class="nofocus">
                <div style="color: 	#000000">
                    <img src="https://www.els.co.id/wp-content/plugins/click-to-chat-for-whatsapp/./new/inc/assets/img/whatsapp-logo-32x32.png" alt="WhatsApp 2">
                    Konfirmasi Untuk Ambil</div>
            </a>
        </div>
    </div>
</div>


<!-- END SECTION -->

<!-- SECTION KOMEN -->
<div class="panel panel-headline">
    <div class="panel-scrolling">
        <div class="panel-heading">
            <h3 class="panel-title">Komentar</h3>
            <hr>
            <div class="right">
                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            </div>
        </div>
        <div class="panel-body">
            <ul class="list-unstyled activity-list">
                <?php $__currentLoopData = $komentar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($komen->servis_id==$id): ?>
                        <li>
                            <img src="/assets/img/guest.png" alt="Avatar" class="img-circle pull-left avatar">
                            <p><a><?php echo e($komen->user->name); ?></a><br><?php echo e($komen->message); ?> <span class="timestamp"><?php echo e($komen->created_at->diffForHumans()); ?></span></p>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <form action="" method="post">
            <?php echo csrf_field(); ?>
                <textarea class="form-control" name="komentar" rows="5" cols = "100" placeholder="Masukkan Komentar . . ." required></textarea>
            <button type="submit" class="btn main_bt">SUBMIT</button>
            </form>
        </div>                        
    </div>
</div>
<!-- END SECTION KOMEN -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<script type="text/javascript">
$("#btn-wa").click(function(){
    var nomor = document.getElementById('nomor').value;
    var pesan = document.getElementById('pesan').value;
    var win = window.open('https://web.whatsapp.com/send?phone='+nomor+'&amp;&text='+pesan);
    if (win) {
        win.focus();
    } else {
        alert('Aktifkan popups untuk website ini');
    }
    return false;   
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\admin\resources\views/detail.blade.php ENDPATH**/ ?>