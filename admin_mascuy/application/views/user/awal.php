<?php $this->load->view('user/config/header.php');?>

    <div class="main">

      <?php 
        
        if(!empty($PageView)){
            $this->load->view($PageView);
        }
      ?>

    </div>

<?php $this->load->view('user/config/footer.php');?>