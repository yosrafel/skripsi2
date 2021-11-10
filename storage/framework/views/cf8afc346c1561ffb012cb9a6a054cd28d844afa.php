
<?php $__env->startSection('title', 'Profile Dosen'); ?>
<?php $__env->startSection('dosen', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="container float-left mb-5">
  <a class=" container " href="/kaprodi/list_dosen"> < Kembali</a>
</div>
<div class="">
  <div class="panel-profile col-md-4">
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay"></div>
                <div class="profile-main">
                    <img src="/assets/img/guest.png" class="img-circle" width="90px" height="90px" alt="Avatar">
                    <h3 class="name"><?php echo e($dosen->nama); ?></h3>
                </div>
                <div class="profile-stat">

                </div>
            </div>
            <!-- END PROFILE HEADER -->
            <!-- PROFILE DETAIL -->
            <div class="profile-detail panel">
                <div class="profile-info">
                    <h4 class="heading text-center">Data Diri</h4>
                    <ul class="list-unstyled list-justify">
                        <li>NIK <span><?php echo e($dosen->nik); ?></span></li>
                        <li>Alamat <span><?php echo e($dosen->alamat); ?></span></li>
                        <li>Nomor Telepon <span><?php echo e($dosen->no_telp); ?></span></li>
                        <li>Email <span><?php echo e($dosen->user->email); ?></span></li>
                    </ul>
                </div>
            </div>
            <!-- END PROFILE DETAIL -->
        </div>
    </div>
  </div>
  <div class="container">
    <div class="col-md-8">
      <div class="panel">
        <div class="panel-body">
            <div id="chartBkd"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Daftar Kelas</b></h3>
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
      <table class="table" id="dtBasicExample">
        <thead>
        <tr>
          <th>NOMOR </th>
          <th>NAMA MATAKULIAH</TH>
          <th>GRUP</th>
          <th>SIFAT</th>
          <th>SKS</th>
          <th>SEMESTER</th>
          <th>TAHUN AJARAN</th>
          <th>BKD</th>
          <th>ACTION </th>
        </tr>
        </thead>
        <tbody>
        <?php $sumBkd = 0;?>
          <?php $__currentLoopData = $dosen->kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $sumBkd += $kelas->bkd();?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($kelas->matakuliah->nama); ?></th>
              <td><?php echo e($kelas->grup); ?></td>
              <td><?php echo e($kelas->sifat); ?></td>
              <td><?php echo e($kelas->sks); ?></td>
              <td><?php echo e($kelas->semester); ?></td>
              <td><?php echo e($kelas->tahun_ajaran); ?></td>
              <td><?php echo e(number_format($kelas->bkd(), 2)); ?></td>
              <td>
                  <a href="/admin/<?php echo e($kelas->id); ?>/delpresensi" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
              </td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="panel panel-headline col-md-12">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Daftar Pekerjaan</b></h3>
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
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
        <th>NOMOR </th>
            <th>JENIS PEKERJAAN</TH>
            <th>SKS</th>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
            <th>ACTION </th>
        </tr>
        </thead>
        <tbody>
        <?php $sumBkdNp = 0;?>
          <?php $__currentLoopData = $dosen->pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pekerjaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $sumBkdNp += $pekerjaan->bkdnp();?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($pekerjaan->jenis_pekerjaan); ?></th>
              <td><?php echo e($pekerjaan->bkdnp()); ?></td>
              <td><?php echo e($pekerjaan->tahun_ajaran); ?></td>
              <td><?php echo e($pekerjaan->keterangan); ?></td>
              <td>
                  <a href="/admin/<?php echo e($pekerjaan->id); ?>/dtlpresensi" class="badge">EDIT</a>
                  <a href="/admin/<?php echo e($pekerjaan->id); ?>/delpresensi" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
              </td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="panel panel-headline col-md-12">
  <div class="panel-heading col-md-6">
    <ul class="list-unstyled list-justify">
      <?php $totalBkd = $sumBkd + $sumBkdNp; ?>
      <li>Jumlah Beban Non-Pengajaran<span><?php echo e(number_format($sumBkdNp, 2)); ?></span> </li>
      <li>Jumlah Beban Pengajaran<span><?php echo e(number_format($sumBkd, 2)); ?></span></li>
      <li>Total Beban Pengjaran & Non-Pengajaran<span><?php echo e(number_format($totalBkd, 2)); ?></span></li>
      <!-- <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li> -->
    </ul>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
Highcharts.chart('chartBkd', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perbandingan BKD Pengajaran & Non Pengajaran'
    },
    xAxis: {
        categories: [
            'BKD Non-Pengajaran',
            'BKD Pengajaran',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Beban Kerja'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Beban Kerja',
        data: [<?php echo e($sumBkdNp); ?>, <?php echo e($sumBkd); ?>]
    }]
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/kaprodi/profiledsn.blade.php ENDPATH**/ ?>