
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><b>Detail Presensi</b></h3>
    </div>
    <div class="panel-body">
        <form  method="post" action="/admin/<?php echo e($find->id); ?>/dtlpresensi">
            <?php echo e(csrf_field()); ?>  
            <?php echo e(method_field('PUT')); ?>

            <div class="form-group">
                <label for="karyawan_id">Karyawan</label>
                <select name="karyawan_id" class="form-control" id="karyawan_id" value="<?php echo e($find->karyawan_id); ?>">                  
                    <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
                        <option value="<?php echo e($kry->id); ?>"><?php echo e($kry->nama); ?></option>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
                </select>
            </div>                                 
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" class="form-control" id="jenis" value="<?php echo e($find->jenis); ?>">                  
                        <option value="Mengajar">Mengajar</option>                    
                        <option value="Penelitian">Penelitian</option>                    
                        <option value="Pengabdian">Pengabdian</option>                    
                        <option value="Seminar">Seminar</option>                                   
                </select>
            </div>                                 
            <div class="form-group">
                <label for="nama_pekerjaan">Nama Pekerjaan</label>
                <textarea name="nama_pekerjaan" type="text" rows="3" class="form-control" id="nama_pekerjaan" placeholder="..." 
                    required><?php echo e($find->nama_pekerjaan); ?></textarea>
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input name="sks" type="text" class="form-control" id="sks" placeholder="0.000" required value="<?php echo e($find->sks); ?>">
                <?php $__errorArgs = ['sks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <select name="semester" class="form-control" id="semester" value="<?php echo e($find->semester); ?>">                  
                        <option value="Gasal">Gasal</option>                    
                        <option value="Genap">Genap</option>                                                      
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_ajaran">Tahun Ajaran</label>
                <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" placeholder="..." required value="<?php echo e($find->tahun_ajaran); ?>">
                <?php $__errorArgs = ['tahun_ajaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success pull-right" value="Ubah">
            </div>
        </form>  
        <a type="button" class="btn btn-danger pull-left" href="/">Tutup</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Rafel\coding\skripsi2\resources\views/admin/dtlpresensi.blade.php ENDPATH**/ ?>