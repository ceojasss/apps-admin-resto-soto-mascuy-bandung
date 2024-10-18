<?php $this->load->view('administrator/config/header');?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php $this->load->view('administrator/config/sidebar');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- navbar -->
        <?php $this->load->view('administrator/config/navbar');?>
        <!-- End of navbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <?php 
                if(!empty($PageView)){
                    $this->load->view($PageView);
                }
            ?> 

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('administrator/config/footer');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <!-- Logout Modal-->
    <?php $this->load->view('administrator/config/logout-modal');?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view('administrator/config/footer-link');?>