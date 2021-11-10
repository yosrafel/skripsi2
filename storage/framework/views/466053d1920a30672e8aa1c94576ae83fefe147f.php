
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class=" panel-profile col-md-4">
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay"></div>
                <div class="profile-main">
                    <img src="/assets/img/guest.png" class="img-circle" width="90px" height="90px" alt="Avatar">
                    <h3 class="name"><?php echo e(auth()->user()->nama); ?> - <?php echo e(auth()->user()->nik); ?></h3>
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
                        <li>Alamat <span><?php echo e(auth()->user()->alamat); ?></span></li>
                        <li>Nomor Telepon <span><?php echo e(auth()->user()->no_telp); ?></span></li>
                        <li>Program Studi <span><?php echo e(auth()->user()->prodi); ?></span></li>
                        <li>Email <span><?php echo e(auth()->user()->email); ?></span></li>
                    </ul>
                </div>
                <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
            </div>
            <!-- END PROFILE DETAIL -->
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-8">
        <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><b>SKS Tiap Tahun Ajaran</b></h3>
            <hr>
        </div>
        <div class="panel-body">
            <div id="demo-bar-chart" class="ct-chart"></div>
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

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">BUAT DAFTAR KELAS</a>
    </div>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutKelas">
        <thead>
        <tr>
            <th>NOMOR </th>
            <th>NAMA MATAKULIAH</TH>
            <th>GRUP</th>
            <th>SKS</th>
            <th>SEMESTER</th>
            <th>TAHUN AJARAN</th>
            <th>ACTION </th>
        </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($kelas->nama_matakuliah); ?></th>
              <td><?php echo e($kelas->grup); ?></td>
              <td><?php echo e($kelas->sks); ?></td>
              <td><?php echo e($kelas->semester); ?></td>
              <td><?php echo e($kelas->tahun_ajaran); ?></td>
              <td>
                  <a href="/admin/<?php echo e($kelas->id); ?>/dtlpresensi" class="badge">EDIT</a>
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

  <div class="container">
    <div class="pull-left">
      <a class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">BUAT DAFTAR PEKERJAAN</a>
    </div>
  </div>

  <div class="panel-body">
    <div style="overflow-x:auto;">
      <table class="table" id="urutPekerjaan">
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
          <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pekerjaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
              <th scope="row"><?php echo e($loop->iteration); ?></th>
              <td><?php echo e($pekerjaan->jenis_pekerjaan); ?></th>
              <td><?php echo e($pekerjaan->sks); ?></td>
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
      <li>Jumlah Beban Non-Pengajaran<span>28,34</span> </li>
      <li>Jumlah Beban Pengajaran di Sistem Informasi<span>28,34</span></li>
      <li>Jumlah Beban Pengajaran di Program Studi Lain<span>28,34</span></li>
      <li>Total Beban Pengjaran & Non-Pengajaran<span>28,34</span></li>
      <li>Jumlah kelebihan Beban Pengajaran<span>28,34</span></li>
    </ul>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/dosen/profile.blade.php ENDPATH**/ ?>