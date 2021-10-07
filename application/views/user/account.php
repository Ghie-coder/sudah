<?php
    $this->load->view('layout/header');
    $this->load->view('layout/client_nav'); //add switch case for different types of user( vet, admin, etc.. )
?>

<!-- Body Content -->
<a class="dropdown-item" href="<?php echo base_url('account/edit');?>">Edit</a>

<?php

    $accountKeyList = ['username', 'fname', 'mname', 'lname', 'email', 'contact_no', 'address' ];
    $account = $this->session->userInfo;
    foreach($account as $accountKey=>$accountValue){
        if(in_array($accountKey, $accountKeyList)){
            echo $accountKey . ': ' . $accountValue . '<br>';
        }
    }
?>

<a class="btn btn-light submit-button" style="background: rgb(141 197 64);" href="<?php echo base_url('account/change-password');?>">Change Password</a>

<?php
    $this->load->view('layout/footer');
?>