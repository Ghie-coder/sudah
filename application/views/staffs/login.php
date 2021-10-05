<div class="login-card" style="background-color: rgb(253,98,1);">
    <img class="rounded-circle img-fluid border border-white profile-img-card" src="<?php echo base_url('../')?>assets/staffs/img/sudah_logo.jpg" style="width: 160px;margin: auto;margin-top: -110px;border-style: none;">
    <h4 class="text-center text-white" style="font-family: 'Averia Serif Libre', cursive;margin: auto;margin-top: 8px;">STAFF PORTAL</h4>
    <form class="form-signin" action="<?php echo base_url('staff-login');?>" method="post">
        <span class="reauth-email"> </span>
        <input class="form-control" type="text" id="inputEmail" required="" placeholder="Username" autofocus="" name="uname" />
        <input class="form-control" type="password" id="inputPassword" required="" placeholder="Password" name="pass"/>
        <div class="checkbox"></div>
        <button class="btn btn-primary btn-block btn-lg bg-success btn-signin" data-bs-hover-animate="pulse" type="submit" style="font-family: 'Averia Serif Libre', cursive;font-size: 18px;">Login</button>
    </form>
</div>