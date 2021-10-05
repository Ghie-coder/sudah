<!--  -->
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background-color:#02020291">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <h1 class="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url('../assets/img/logo.jpg'); ?>"  class="img-fluid" style="border-radius:50%";> Sudah Veterinary Clinic</a></h1>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto" href="<?php echo base_url();?>">Home</a></li>
              <li class="dropdown"><a href="<?php echo base_url('about-us');?>"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="<?php echo base_url('about-us');?>">Our Services</a></li>
                  <li><a href="<?php echo base_url('teambranch');?>">Our Team</a></li>
                  <li><a href="<?php echo base_url('branch');?>">Our Locations</a></li>
                </ul>
              </li>
              <li><a class="nav-link scrollto" href="<?php echo base_url('blog');?>">Gallery</a></li>
              <li><a class="nav-link scrollto me-2" href="<?php echo base_url('catalog');?>"><span>Catalog</span></a></li>
              <?php if($this->session->userInfo && !$show_login):?>
                    <li><a class="nav-link scrollto" href="<?php echo base_url('client-dashboard')?>">Pet Portal</a></li>
                <?php else:?>
                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
                <?php endif;?>
                <a class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a></div>
              <!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->