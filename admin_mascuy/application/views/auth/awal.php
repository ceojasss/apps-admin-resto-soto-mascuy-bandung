<?php $this->load->view('auth/config/auth_header.php');?>    

<div class="container">
      <?php 
        if(!empty($PageView)){
            $this->load->view($PageView);
        }
      ?>
  <!-- Outer Row -->
</div>

<?php $this->load->view('auth/config/auth_footer.php');?>



     