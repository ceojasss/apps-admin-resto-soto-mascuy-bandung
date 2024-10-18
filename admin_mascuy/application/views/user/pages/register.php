<div class="login-page">
  <div class="form">
      <h3 class="mb-3" style="color: #C82333;">REGISTER</h3>
    <form class="login-form" method="POST" action="<?php echo base_url('index.php/Register/aksi_register'); ?>"  id="register-form">
      <input type="text" name="nama_admin" id="nama_admin" placeholder="Your Name"/>
      <input type="text" name="alamat_admin" id="alamat_admin" placeholder="Alamat"/>
      <input type="email" name="email_admin" id="email_admin" placeholder="Email"/>
      <input type="text" name="username" id="username" placeholder="Username"/>
      <input type="password" name="password" id="password" placeholder="password"/>
      
      <!-- <input type="submit" name="submit-up" id="submit-up" class="form-submit" value="Register"/> -->
      <button type="submit" name="submit-up" id="submit-up" class=" form-submit btn btn-danger">REGISTER</button>
      <!-- <a href="#" style="color: #C82333; font-size: 12px;">Lupa Password??</a></p> -->
      <p class="message"><a href="<?php echo base_url('index.php/login');?>">Login</a></p>
    </form>
  </div>
</div>
        
