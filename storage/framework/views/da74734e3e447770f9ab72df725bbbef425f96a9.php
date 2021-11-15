
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
  <div class="text-center alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php elseif(session('error')): ?>
  <div class="text-center alert alert-danger">
    <?php echo e(session('error')); ?>

  </div>
<?php endif; ?>
<div class="panel panel-headline">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Laporan Kelas</b></h3>
    <hr>  
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA MATAKULIAH</TH>
            <th>GRUP</th>
            <th>DOSEN</TH>
            <th>SKS</th>
            <th>SEMESTER</th>
            <th>TAHUN AJARAN</th>
            <th>BKD</th>
        </tr>
        </thead>
        <tbody>
        <?php $sumBkd = 0;?>
          <?php $__currentLoopData = $kelas->sortBy('kelas_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $sumBkd += $kelas->kelas->bkd();?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($kelas->kelas->matakuliah->nama); ?></th>
              <td><?php echo e($kelas->kelas->grup); ?></td>
              <td><?php echo e($kelas->dosen->nama); ?></th>
              <td><?php echo e($kelas->kelas->sks); ?></td>
              <td><?php echo e($kelas->kelas->semester); ?></td>
              <td><?php echo e($kelas->kelas->tahun_ajaran); ?></td>
              <td><?php echo e(number_format($kelas->kelas->bkd(),2)); ?></td>
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
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExample">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA DOSEN </th>
            <th>JENIS PEKERJAAN</TH>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
            <th>BKD</th>
        </tr>
        </thead>
        <tbody>
        <?php $sumBkdNp = 0;?>
          <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pekerjaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $sumBkdNp += $pekerjaan->bkdnp();?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($pekerjaan->dosen->nama); ?></th>
              <td><?php echo e($pekerjaan->jenis_pekerjaan); ?></th>
              <td><?php echo e($pekerjaan->tahun_ajaran); ?> - <?php echo e($pekerjaan->semester); ?></td>
              <td><?php echo e($pekerjaan->keterangan); ?></td>
              <td><?php echo e($pekerjaan->sks); ?></td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div class="">
  <div class="col-md-6">
    <div class="clearfix">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title"><b>Laporan BKD</b></h3>
          <hr>
        </div>
        <div class="panel-body">
          <div class="panel-heading col-md-8">
            <ul class="list-unstyled list-justify">
              <?php $totalBkd = $sumBkd + $sumBkdNp; ?>
              <li>Jumlah Beban Non-Pengajaran<span><?php echo e(number_format($sumBkdNp, 2)); ?></span> </li>
              <li>Jumlah Beban Pengajaran<span><?php echo e(number_format($sumBkd, 2)); ?></span></li>
              <li>Total Beban Pengjaran & Non-Pengajaran<span><?php echo e(number_format($totalBkd, 2)); ?></span></li>
              <!-- <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="col-md-6">
        <div class="panel">
        <div class="panel-body">
            <div id="chartBkd"></div>
        </div>
    </div>
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
        data: [<?php echo e(number_format($sumBkdNp, 2)); ?>, <?php echo e(number_format($sumBkd, 2)); ?>]
    }]
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/admin/index.blade.php ENDPATH**/ ?>