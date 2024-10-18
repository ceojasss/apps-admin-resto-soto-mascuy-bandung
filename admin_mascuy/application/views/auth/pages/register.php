


    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-12">
            <div class="p-5">
              <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4" style='font-size:30px;'>Buat Akun &rsaquo; <strong>  YAHISHA</strong></h1>
              </div>
              <form class="user" method="post" action="<?php echo base_url('index.php/Login/register'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="<?= set_value('name');?>" autocomplete="off">
                  <?php //echo form_error('name', '<small class="text-danger pl-3"  >' , '</small>');?>
                </div>
                
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan email" value="<?= set_value('email');?>" autocomplete="off">
                  <?php //echo  form_error('email', '<small class="text-danger pl-3"  >' , '</small>');?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?php// echo   form_error('password1', '<small class="text-danger pl-3"  >' , '</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                  </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                  Register
                </button>
               
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url();?>">Sudah punya akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

