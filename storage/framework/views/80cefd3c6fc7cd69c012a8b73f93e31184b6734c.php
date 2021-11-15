
<?php $__env->startSection('title', 'Profile Dosen'); ?>
<?php $__env->startSection('dosen', 'active'); ?>
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
<div class="container float-left mb-5">
  <a class=" container " href="/admin/list_dosen"> < Kembali</a>
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
  </div>

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#createKelasModal">BUAT DAFTAR KELAS</a>
    </div>
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
              <td><?php echo e($kelas->tahun_ajaran); ?> - <?php echo e($kelas->semester); ?></td>
              <td><?php echo e(number_format($kelas->bkd(), 2)); ?></td>
              <td>
                  <a href="/admin/<?php echo e($dosen->id); ?>/<?php echo e($kelas->id); ?>/del_kelas" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
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
  </div>

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#createPekerjaanModal">BUAT DAFTAR PEKERJAAN</a>
    </div>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="dtBasicExamples">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>JENIS PEKERJAAN</TH>
            <th>TAHUN AJARAN</th>
            <th>KETERANGAN</th>
            <th>BKD</th>
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
              <td><?php echo e($pekerjaan->tahun_ajaran); ?> - <?php echo e($pekerjaan->semester); ?></td>
              <td><?php echo e($pekerjaan->keterangan); ?></td>
              <td><?php echo e($pekerjaan->sks); ?></td>
              <td>
                  <a href="/admin/<?php echo e($pekerjaan->id); ?>/dtl_pekerjaan" class="badge">EDIT</a>
                  <a href="/admin/<?php echo e($pekerjaan->id); ?>/delete_pekerjaan" class="badge badge-danger" onclick="return confirm('Yakin Ingin Menghapus?')">DELETE</a>
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

<!-- Modal Buat Kelas-->
<div class="modal fade" id="createKelasModal" tabindex="-1" role="dialog" aria-labelledby="createKelasModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h2 class="modal-title text-center" id="createKelasModal">Daftar Kelas</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body mb-5">
          <form action="/admin/<?php echo e($dosen->id); ?>/create_kelas" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="kelas">Matakuliah</label>
                <select name="kelas" class="form-control" id="kelas">
                  <option> Silahkan Pilih </option>
                  <?php $__currentLoopData = $kelas2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($kelas2->id); ?>" data-price="<?php echo e($kelas2->sks); ?>" data-price2="<?php echo e($kelas2->jumlah_dosen); ?>" data-price3="<?php echo e($kelas2->sifat); ?>" data-price4="<?php echo e($kelas2->jumlah_mhs); ?>"> <?php echo e($kelas2->matakuliah->nama); ?> - Grup <?php echo e($kelas2->grup); ?> - <?php echo e($kelas2->sifat); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">             
              <span>Sifat</span>
              <input id="kelas_sifat" name="kelas_sifat" type="text" class="form-control" readonly>
            </div>
            <div class="form-group">             
              <span>SKS</span>
              <input id="kelas_sks" name="kelas_sks" type="text" class="form-control" readonly>
            </div>
            <div class="form-group">             
              <span>Jumlah Mahasiswa</span>
              <input id="kelas_jmlmhs" name="kelas_jmlmhs" type="text" class="form-control" readonly>
            </div>
            <div class="form-group">             
              <span>Jumlah Dosen</span>
              <input id="kelas_jmldsn" name="kelas_jmldsn" type="text" class="form-control" readonly>
            </div>
            
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Buat</button>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Buat Pekerjaan-->
<div class="modal fade" id="createPekerjaanModal" tabindex="-1" role="dialog" aria-labelledby="createPekerjaanModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="createPekerjaanModal">Daftar Pekerjaan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="/admin/<?php echo e($dosen->id); ?>/create_pekerjaan" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <input name="dosen_id" type="hidden" class="form-control" id="dosen_id" value="<?php echo e($dosen->id); ?>">
            </div>
            <div class="form-group">
              <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
              <input name="jenis_pekerjaan" type="text" class="form-control" id="jenis_pekerjaan" placeholder="Jenis Pekerjaan" required value="<?php echo e(old('jenis_pekerjaan')); ?>">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Keterangan" required value="<?php echo e(old('keterangan')); ?>">
            </div>
            <div class="form-group">
              <label for="sks">Besar SKS</label>
              <input name="sks" type="text" class="form-control" id="sks" placeholder="Besar SKS" required value="<?php echo e(old('sks')); ?>">
            </div>
            <div class="form-group">
              <label for="tahun_ajaran">Tahun Ajaran</label>
              <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" placeholder="Tahun Ajaran" required value="<?php echo e(old('tahun_ajaran')); ?>">
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <input name="semester" type="text" class="form-control" id="semester" placeholder="Semester" required value="<?php echo e(old('semester')); ?>">
            </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Buat</button>
              </form>
          </div>
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

$(document).ready(function(){
  $('#kelas').on('change',function(){
    var sks = $(this).children('option:selected').data('price');
    var dsn = $(this).children('option:selected').data('price2');
    var sft = $(this).children('option:selected').data('price3');
    var mhs = $(this).children('option:selected').data('price4');
    $('#kelas_sks').val(sks);
    $('#kelas_jmldsn').val(dsn);
    $('#kelas_sifat').val(sft);
    $('#kelas_jmlmhs').val(mhs);
  });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/admin/profiledsn.blade.php ENDPATH**/ ?>