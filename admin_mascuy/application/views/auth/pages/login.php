<div class="row justify-content-center">

<div class="col-5">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4" style='font-size:30px;'>Login &rsaquo; <strong>  MASCUY</strong></h1>
            </div>

            <?php echo $this->session->flashdata('message');?>
            <form class="user" method="post" action="<?php echo base_url('index.php/Login/aksi_login'); ?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="email" id="email"  placeholder="Enter Email Address..." required="">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required="">
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                Login
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="forgot-password.html">Lupa password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>