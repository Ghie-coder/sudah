<div class="row" >
    <div class="container">
    <?php echo validation_errors(); ?>
    <?php if(isset($branchData)):?>
        <form method="POST" action="<?php echo base_url('admin/branch/edit/'.$branchData->b_id);?>" >
    <?php else:?>
        <form method="POST" action="<?php echo base_url('admin/branch/add');?>" >
    <?php endif;?>
     <div class="container bg-light py-3 mt-5" style="width: 60%;" >
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-8">
                <label for="exampleFormControlInput1">Branch Name:</label>
                <?php if(isset($prePostData->branch_name) && !empty($prePostData->branch_name)): ?> 
                    <input class="form-control" id="exampleFormControlInput1" rows="3" name="branch_name" value="<?php echo $prePostData->branch_name;?>"></input>
                <?php else: ?>
                    <input class="form-control" id="exampleFormControlInput1" rows="3" name="branch_name" value="<?php echo isset($branchData) ? $branchData->b_name : '';?>"></input>
                <?php endif; ?>
            </div> 
        </div>

        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-8">
                <label for="exampleFormControlInput1">Branch Address:</label>
                <?php if(isset($prePostData->branch_address) && !empty($prePostData->branch_address)): ?> 
                    <textarea class="form-control" id="exampleFormControlInput1" rows="3" name="branch_address"><?php echo $prePostData->branch_address ;?> </textarea>
                <?php else: ?>
                    <textarea class="form-control" id="exampleFormControlInput1" rows="3" name="branch_address"><?php echo isset($branchData) ? $branchData->b_address : '';?> </textarea>
                <?php endif; ?>
            </div> 
        </div>

        <div class="form-group d-flex justify-content-center ">
            <a class="btn btn-secondary float-right" href="<?php echo base_url('admin-dashboard');?>" style="margin-right:10px;">Cancel</a>
            <?php if(isset($branchData)):?>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            <?php else:?>
                <button type="submit" class="btn btn-primary float-right">Add</button>
            <?php endif;?>
        </div>
    </div>
</form>
</div>
</div>
<script>
    $(function(){
        $('.selectpicker').selectpicker();
    });
</script>

