<!DOCTYPE html>
<html lang="en">
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    if($this->session->userInfo){
        $this->load->view('layout/admin_header');
    }else{
        $this->load->view('layout/staffs_header');
    }
    
?>
    <!-- Body content here Add session checking in the future-->
    <body>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <?php if($this->session->userInfo):?>
            <div class="d-flex" id="wrapper">
                <?php $this->load->view('layout/sidebar'); ?>
                <div id="page-content-wrapper">
                    <?php $this->load->view('layout/staff_navbar'); ?>
                    <div class="container-fluid">
                        <?php
                            if(isset($page_file)){
                                $this->load->view($page_file);    
                            }else{
                                redirect('../');
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Core theme JS-->
            <script src="<?php echo base_url('../')?>assets/staffs/js/scripts.js"></script>
            <script src="https://kit.fontawesome.com/cf903100f6.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <?php else:?>
            <?php
                if(isset($page_file)){
                    $this->load->view($page_file);    
                }else{
                    redirect('../');
                }
            ?>
            <!-- <script src="<?php echo base_url('../')?>assets/staffs/js/jquery.min.js"></script> -->
            <script src="<?php echo base_url('../')?>assets/staffs/bootstrap/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url('../')?>assets/staffs/js/bs-init.js"></script>
        <?php endif;?>
    </body>
    
</html>