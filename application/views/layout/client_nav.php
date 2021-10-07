
<!-- background-image: linear-gradient(to right, #d80003 , #fa7e16); -->
<nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: rgb(235,47,47);margin-top: 0px;background-image: linear-gradient(to right, #d80003 , #fa7e16);">
    <div class="container">
        <div class="container text-left float-left" style="width: auto;margin-left: 0px;">
            <img class="rounded-circle" src="<?php echo base_url('../')?>assets/client/img/OriginalLogo.jpg" style="width: 50px;height: 50px;padding-left: 0px;margin-right: 5px;">
            <a class="navbar-brand" href="<?php echo base_url();?>" style="color: rgb(255,255,255);font-family: 'Averia Serif Libre', cursive;font-size: 26px;letter-spacing: 0px;">SUDAH VETERINARY</a>
        </div>
        <h1 style="height: -11px;font-size: 22px;color: rgb(255,255,255);font-family: 'Averia Serif Libre', cursive;margin-left: 0px;margin-right: 12px;margin-top: 14px;font-style: normal;">PET PORTAL</h1>
    </div>
</nav>
<div class="border-dark" id="content" style="filter: grayscale(0%);min-width: 200px;opacity: 1;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(249,249,249);">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-family: 'Averia Serif Libre', cursive;font-size: 23px;margin: 0px;"><?php echo isset($pageNavbarTitle) ? ucwords($pageNavbarTitle) : 'Welcome User'?></a>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"  role="presentation">
                    <a href="<?php echo base_url('client-dashboard');?>" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item"  role="presentation">
                    <a href="<?php echo base_url();?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-gear" style="font-size: 25px;margin-left: 0px;"></i></a>
                    <div class="dropdown-menu"><a class="dropdown-item" href="<?php echo base_url('account');?>">My Account</a><a class="dropdown-item" href="#">Change Password</a>
                    <a class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a></div>
                </li>
            </ul>
        </div>
    </nav>
</div