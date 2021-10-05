<div class="row" >
    <div class="container">
    <?php echo validation_errors(); ?>
    <?php if(isset($inventoryData)):?>
        <form method="POST" action="<?php echo base_url('inventory/edit/'.$inventoryData->id);?>" >
    <?php else:?>
        <form method="POST" action="<?php echo base_url('inventory/add');?>" >
    <?php endif;?>
     <div class="container bg-light py-3 mt-5" style="width: 60%;" >
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-8">
                <label for="branchID">Branch</label>
                    <select class="form-control form-control-xs selectpicker" name="branch_id" data-live-search="true" data-title="Branch" id="branchID" data-width="100%">
                        <?php if(isset($inventoryData)):?>
                            <?php foreach($branches as $branch):?>
                                <?php if($inventoryData->b_id == $branch->b_id):?>
                                    <option value="<?php echo $branch->b_id;?>" selected><?php echo ucwords($branch->b_name);?></option>
                                <?php else:?>
                                    <option value="<?php echo $branch->b_id;?>" ><?php echo ucwords($branch->b_name);?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php else:?>
                            <?php foreach($branches as $branch):?>
                                <?php if(isset($prePostData->branch_id) && !empty($prePostData->branch_id) && ($prePostData->branch_id == $branch->b_id)):?>
                                    <option value="<?php echo $prePostData->branch_id;?>" selected><?php echo ucwords($branch->b_name);?></option>
                                <?php else:?>
                                    <option value="<?php echo $branch->b_id;?>" ><?php echo ucwords($branch->b_name);?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-8">
                <label for="exampleFormControlInput1">Name of Item:</label>
                <?php if(isset($prePostData->item_name) && !empty($prePostData->item_name)): ?> 
                    <input class="form-control" id="exampleFormControlInput1" rows="3" name="item_name" value="<?php echo $prePostData->item_name;?>"></input>
                <?php else: ?>
                    <input class="form-control" id="exampleFormControlInput1" rows="3" name="item_name" value="<?php echo isset($inventoryData) ? $inventoryData->item_name : '';?>"></input>
                <?php endif; ?>
            </div> 
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-8">
                <label for="exampleFormControlInput1">Amount:</label>
                <?php if(isset($prePostData->amount) && !empty($prePostData->amount)): ?> 
                    <input class="form-control" id="exampleFormControlInput1" rows="3" name="amount" value="<?php echo $prePostData->amount;?>"></input>
                <?php else: ?>
                    <input class="form-control" id="exampleFormControlInput1" rows="3" name="amount" value="<?php echo isset($inventoryData) ? $inventoryData->amount : '';?>"></input>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group d-flex justify-content-center ">
            <a class="btn btn-secondary float-right" href="<?php echo base_url('admin-dashboard');?>" style="margin-right:10px;">Cancel</a>
            <?php if(isset($inventoryData)):?>
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

