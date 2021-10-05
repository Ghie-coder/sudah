<!DOCTYPE html>
<html lang="en">
    <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        $this->load->view('layout/client_header');
    ?>
    <style>
        div.dataTables_wrapper div.dataTables_length select{
            width: 60px;
        }
    </style>
    <body id="page-top">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <!-- <div id="wrapper"> -->
            <!-- <div class="d-flex flex-column" id="content-wrapper"> -->
                <?php $this->load->view('layout/client_nav'); ?>
                <?php
                    if(isset($page_file)){
                        $this->load->view($page_file); 
                    }else{
                        redirect('../');
                    }
                ?>
            
            
    </body>
    <!-- <script src="<?php echo base_url('../')?>assets/client/js/jquery.min.js"></script> -->
    <!-- <script src="<?php echo base_url('../')?>assets/client/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="<?php echo base_url('../')?>assets/client/js/theme.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        (function($, window) {
            $.fn.replaceOptions = function(options) {
                var self, $option;

                this.empty();
                self = this;

                $.each(options, function(index, option) {
                $option = $("<option></option>")
                    .attr("value", option.value)
                    .text(option.text);
                self.append($option);
                });
            };
        })(jQuery, window);
    </script>
</html>