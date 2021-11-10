<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="/assets/css/style.css" />

<title>Sign In</title>
</head>

</br></br></br></br></br></br></br>

<body class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Selamat Datang !</h5>
		        <?php if(session('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <form class="form-signin" action="/postlogin" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-label-group">
                <input name="email" type="email" id="email" class="form-control" placeholder="Email" required autofocus value="<?php echo e(old('name')); ?>">
              </div>
              </br>
              <div class="form-label-group">
                <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
              </div>
              </br></br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="/assets/js/jquery.min"></script>
<script src="/assets/js/bootstrap.min"></script>
<?php /**PATH D:\Rafel\coding\skripsi2\resources\views/auths/login.blade.php ENDPATH**/ ?>