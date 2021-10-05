<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('layout/admin_header');
    
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Body content here Add session checking in the future-->
    <body>
        <div class="container-fluid">
            <?php
                if(isset($page_file)){
                    $this->load->view($page_file);    
                }else{
                    redirect('../');
                }
            ?>
        </div>
        <?php
            // $this->load->view('layout/footer', $data);
        ?>
    </body>
</html>
