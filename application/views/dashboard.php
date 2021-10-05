<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    if(isset($pet_portal)){
        $data['pet_portal'] = true;
    }else{
        $data['pet_portal'] = false;
    }
    $this->load->view('layout/header',$data);

    if(isset($pet_portal)){
        $this->load->view('layout/client_nav');
    }else{
        $this->load->view('layout/navigation');
        $this->load->view('user/login');
    }
    
?>


<!-- Body content here Add session checking in the future-->
<?php
    if(isset($page_file)){
        $this->load->view($page_file);    
    }else{
        $this->load->view('dashboard_section');
    }
?>
<?php if(isset($pet_portal)):?>
            </div>
        </div>
    </div>

<?php endif;?>
<?php
    $this->load->view('layout/footer', $data);
?>
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