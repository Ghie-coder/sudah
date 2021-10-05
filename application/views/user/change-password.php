<?php
    $this->load->view('layout/header');
    $this->load->view('layout/client_nav'); //add switch case for different types of user( vet, admin, etc.. )
?>

<!-- Body Content -->
<form action="<?php echo base_url('account/change-password');?>" enctype="multipart/form-data" method="POST" class="custom-form">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <div class="col-md-3">
                <?php echo form_error('password'); ?>
                <label for="password">Current Password</label>
            </div>
            <div class="col-md-3">
                <input type="password" name="password" size="50" value="<?php //echo isset($account->password) ? $account->password : '' ; ?>" />
            </div>

            <div class="col-md-3">
                <?php echo form_error('new_password'); ?>
                <label for="new_password">New Password</label>
            </div>
            <div class="col-md-3">
                <input type="password" name="new_password" size="50" value="<?php //echo isset($account->new_password) ? $account->new_password : '' ; ?>" />
            </div>
            
            <div class="col-md-3">
                <?php echo form_error('confirm_password'); ?>
                <label for="confirm_password">Confirm Password</label>
            </div>
            <div class="col-md-3">
                <input type="password" name="confirm_password" size="50" value="<?php //echo isset($account->confirm_password) ? $account->confirm_password : '' ; ?>" />
            </div>

            <input type="hidden" name="user_id" value="<?php echo $account->user_id; ?>"/>
            <button class="btn btn-light submit-button" type="submit" style="background: rgb(141 197 64); margin-top:10px;">Update password</button>
        </div>

        <div class="col-md-3"></div>
    </div>


</form>

<?php
    $this->load->view('layout/footer');
?>