
<?php $__env->startSection('title', 'Detail'); ?>
<?php $__env->startSection('content'); ?>

<!-- SECTION -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Detail Servis</h3>
    </div>

    <div class="panel-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table mt-5">
                    <tr style="height: 80px">
                        <td>User ID</td><td><?php echo e($servis->user_id); ?></td>
                    </tr>  
                    <tr style="height: 80px">
                        <td >TANGGAL MASUK</td><td><?php echo e($servis->tgl_in->format('d M Y')); ?></td>
                    </tr>  
                    <tr style="height: 80px">
                        <td>NO. TANDA TERIMA</td><td><?php echo e($servis->no_tanda_terima); ?></td>
                    </tr>
                    <tr style="height: 80px">    
                        <td>NAMA CUSTOMER</td><td><?php echo e($servis->nama_customer); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>NO HP</td><td><?php echo e($servis->no_hp_customer); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>DEPT </td><td><?php echo e($servis->dept); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>TANGGAL BELI</td><td><?php echo e($servis->tgl_beli->format('d M Y','local')); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>TYPE</td><td><?php echo e($servis->type); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>SERIAL NUMBER</td><td><?php echo e($servis->serial_num); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>KELENGKAPAN</td><td><?php echo e($servis->kelengkapan); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>KERUSAKAN</td><td><?php echo e($servis->kerusakan); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>TEHNISI </td><td><?php echo e($servis->tehnisi); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>TGL KIRIM VENDOR</td><td><?php echo e($servis->tgl_kirim_vendor->format('d M Y','local')); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>VENDOR</td><td><?php echo e($servis->vendor); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>NO. SURAT JALAN</td><td><?php echo e($servis->no_surat_jalan); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>TGL KEMBALI VENDOR</td><td><?php echo e($servis->tgl_kembali_vendor->format('d M Y','local')); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>STATUS UNIT</td><td><?php echo e($servis->status_unit); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>TGL AMBIL CUSTOMER </td><td><?php echo e($servis->tgl_ambil_cust->format('d M Y','local')); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>STATUS</td><td><?php echo e($servis->status); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>CLOSED BY</td><td><?php echo e($servis->closed_by); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>CHARGE</td><td><?php echo e($servis->charge); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>NO. NOTA</td><td><?php echo e($servis->no_nota); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>NOMINAL</td><td><?php echo e($servis->nominal); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>USIA SERVIS </td><td><?php echo e($servis->usia_service); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>7</td><td><?php echo e($servis->cek_7); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>14</td><td><?php echo e($servis->cek_14); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>30</td><td><?php echo e($servis->cek_30); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>TINDAKAN</td><td><?php echo e($servis->tindakan); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>KETERANGAN 1</td><td><?php echo e($servis->ket_1); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>KETERANGAN 2 </td><td><?php echo e($servis->ket_2); ?></td>
                    </tr>
                    <tr style="height: 80px">
                        <td>KETERANGAN 3</td><td><?php echo e($servis->ket_3); ?></td>
                    </tr>
                </table>
            </div>
            <p><b>Hubungi Customer Via Whatsapp - <?php echo e($servis->no_hp_customer); ?></b> </p>
                <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo e($servis->no_hp_customer); ?>&amp;text=aaa">
                    <div style= "color: 	#000000">
                        <img src="https://www.els.co.id/wp-content/plugins/click-to-chat-for-whatsapp/./new/inc/assets/img/whatsapp-logo-32x32.png" alt="WhatsApp 1">
                        Tanya Kepastian</div>
                </a></br>
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
    <div class="panel-heading">
        <h3 class="panel-title">Komentar</h3>
        <hr>
    </div>

    <div class="panel-body">
    </div>
</div>
<!-- END SECTION KOMEN -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\perwalian\resources\views/detail.blade.php ENDPATH**/ ?>