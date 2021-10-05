<div class="row" >
    <div class="container">
    <?php echo validation_errors(); ?>
    <?php if(isset($appData)):?>
        <form method="POST" action="<?php echo base_url('appointment/edit/'.$appData->appt_id);?>" >
    <?php else:?>
        <form method="POST" action="<?php echo base_url('appointment/add');?>" >
    <?php endif;?>
    <input type="hidden" class="form-control" name="appointmentDate" id="listOfSchedules" value='<?php echo json_encode($schedules);?>'/>
    <div class="container bg-light py-3 mt-5" style="width: 60%;" >
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Patient/Pet:</label>
                <select class="form-control form-control-xs selectpicker" name="pet_id" data-size="7" data-live-search="true" data-title="Pet" id="exampleFormControlInput1" data-width="100%">
                    <?php foreach($pets as $pet):?>    
                        <?php if(isset($appData)):?>
                            <?php if($appData->pet_id == $pet->id):?>
                                <option value="<?php echo $pet->id;?>" selected><?php echo ucwords($pet->name);?></option>
                            <?php else:?>
                                <option value="<?php echo $pet->id;?>" ><?php echo ucwords($pet->name);?></option>
                            <?php endif;?>
                        <?php else:?>
                            <?php if(isset($prePostData->pet_id) && !empty($prePostData->pet_id) && ($prePostData->pet_id == $pet->id) ): ?> 
                                <option value="<?php echo $prePostData->pet_id;?>" selected><?php echo ucwords($pet->name);?></option>
                            <?php else:?>
                                <option value="<?php echo $pet->id;?>" ><?php echo ucwords($pet->name);?></option>
                            <?php endif;?>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="branchID">Branch</label>
                    <select class="form-control form-control-xs selectpicker" name="branch_id" data-live-search="true" data-title="Branch" id="branchID" data-width="100%">
                        <?php if(isset($appData)):?>
                            <?php foreach($branches as $branch):?>
                                <?php if($appData->b_id == $branch->b_id):?>
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
        <div class="row d-flex justify-content-center ">
            <div class="form-group col-sm-8">
                <label for="exampleFormControlSelect1">Services:</label>
                <select class="selectpicker form-control" multiple data-live-search="true" id="exampleFormControlSelect1" name="service_id[]">
                
                <?php if(isset($myServices) && !empty($myServices)):?>
                    <?php foreach($myServices as $item):?>
                        <?php $myServicesIDs[] = $item->service_id; ?>
                    <?php endforeach;?>
                <?php endif;?>

                <?php foreach($services as $service):?>
                        <?php if(isset($myServicesIDs) && !empty($myServicesIDs) ): ?> 
                                <?php if(in_array($service->s_id, $myServicesIDs)) :?>
                                    <option value="<?php echo ucwords($service->s_id);?>" selected>
                                        <?php 
                                            echo ucwords($service->s_name);
                                            if($service->price){
                                                echo " (Php ".$service->price.")";
                                            }
                                        ?>
                                    </option>
                                <?php else:?>
                                    <option value="<?php echo ucwords($service->s_id);?>">
                                        <?php 
                                            echo ucwords($service->s_name);
                                            if($service->price){
                                                echo " (Php ".$service->price.")";
                                            }
                                        ?>
                                    </option>
                                <?php endif;?>
                            <?php// endforeach?>
                        <?php else:?>
                            <?php if(isset($prePostData->service_id) && !empty($prePostData->service_id) && in_array($service->s_id, $prePostData->service_id) ): ?> 
                                <option value="<?php echo ucwords($service->s_id);?>" selected>
                                    <?php 
                                        echo ucwords($service->s_name);
                                        if($service->price){
                                            echo " (Php ".$service->price.")";
                                        }
                                    ?>
                                </option>
                            <?php else:?>
                                <option value="<?php echo ucwords($service->s_id);?>">
                                    <?php 
                                        echo ucwords($service->s_name);
                                        if($service->price){
                                            echo " (Php ".$service->price.")";
                                        }
                                    ?>
                                </option>
                            <?php endif;?>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-4">
                <!-- <?php print_r($appData);?> -->
                <label for="appointmentDate">Date of Appointment:</label>
                <?php if(isset($prePostData->appointmentDate) && !empty($prePostData->appointmentDate)): ?> 
                    <input type="text" class="form-control" name="appointmentDate" id="appointmentDate" autocomplete="off" value="<?php echo $prePostData->appointmentDate; ?>"/>
                <?php else:?>
                    <input type="text" class="form-control" name="appointmentDate" id="appointmentDate" autocomplete="off" value="<?php echo isset($appData) ? $appData->apptDate : '';?>"/>
                <?php endif;?>
            </div>
            <div class="form-group col-sm-4">
                <label for="serviceDay">AM/PM:</label>
                <select class="selectpicker form-control" id="serviceDay" name="serviceDay">
                    <?php if(isset($appData)):?>
                        <?php if($appData->time == "am"):?>
                            <option value="am" selected>AM - (8:00-12:00)</option>
                        <?php else :?>
                            <option value="am">AM - (8:00-12:00)</option>
                        <?php endif;?>
                        <?php if($appData->time == "pm"):?>
                            <option value="pm" selected>PM - (1:00-5:00)</option>
                        <?php else :?>
                            <option value="pm">PM - (1:00-5:00)</option>
                        <?php endif;?>
                        
                    <?php else:?>
                        <?php if(isset($prePostData->serviceDay) && !empty($prePostData->serviceDay)): ?> 
                            <?php if($prePostData->serviceDay == "am"): ?> 
                                <option value="am" selected>AM - (8:00-12:00)</option>
                            <?php else :?>
                                <option value="am">AM - (8:00-12:00)</option>
                            <?php endif;?>

                            <?php if($prePostData->serviceDay == "pm"): ?> 
                                <option value="pm" selected>PM - (1:00-5:00)</option>
                            <?php else :?>
                                <option value="pm">PM - (1:00-5:00)</option>
                            <?php endif;?>
                        <?php else :?>
                            <option value="am">AM - (8:00-12:00)</option>
                            <option value="pm">PM - (1:00-5:00)</option>
                        <?php endif;?>
                    <?php endif;?>
                </select>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-8">
                <label for="exampleFormControlTextarea1">Reason:</label>
                <?php if(isset($prePostData->reason) && !empty($prePostData->reason)): ?> 
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reason"><?php echo $prePostData->reason;?></textarea>
                <?php else: ?>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reason"><?php echo isset($appData) ? $appData->reason : '';?></textarea>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group d-flex justify-content-center ">
            <button type="submit" class="btn btn-primary float-right">Book</button>
        </div>
        <div class="form-group d-flex justify-content-center ">
            <a class="btn btn-secondary float-right" href="<?php echo base_url('client-dashboard');?>">Cancel</a>
        </div>
    </div>
</form>
</div>
</div>
<script>
    var enableDays = "24-07-2021, 20-08-2021, 22-08-2021, 13-09-2021".split(', ')
    function formatDate(d)
    {
        var day = String(d.getDate())
        //add leading zero if day is is single digit
        if (day.length == 1)
        {
            day = '0' + day
        }
        var month = String((d.getMonth()+1))
        //add leading zero if month is is single digit
        if (month.length == 1){
            month = '0' + month
        }
        return  d.getFullYear() + "-" + month + "-" + day
    }
    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
        month = '0' + month.toString();
        if(day < 10)
        day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $("#appointmentDate").datepicker({ 
            maxViewMode: 2,
            weekStart: 1,
            startDate: "+1d",
            todayHighlight: true,
            format: "yyyy-mm-dd", 
            clearBtn: true,
            autoclose: true,
        });
        $('.selectpicker').selectpicker();
    });

    $(function(){
        $("#branchID").change(function(e){
            let branchValue = e.target.value;
            console.log(e.target.value);
            $("#appointmentDate").datepicker("remove");
            $("#appointmentDate").val("");
            let schedules = JSON.parse($("#listOfSchedules").val());
            let enableDays = [];
            console.log(schedules);
            for(let ctr=0; ctr<schedules.length; ctr++){
                let item = schedules[ctr];
                if(item.branch_id == $('#branchID').val()){
                    enableDays.push(item.date);
                }
            }
            setTimeout(function(){
                $("#appointmentDate").datepicker({ 
                    maxViewMode: 2,
                    weekStart: 1,
                    startDate: "+1d",
                    beforeShowDay: function(date){
                        console.log('Testing Date: ', enableDays.indexOf(formatDate(date)))
                        console.log('Testing  date: ', date)

                        if (enableDays.indexOf(formatDate(date)) < 0)
                            return {
                                enabled: false
                            }
                        else
                            return {
                                enabled: true
                            }
                    },
                    todayHighlight: true,
                    format: "yyyy-mm-dd", 
                    clearBtn: true,
                    autoclose: true
                });
            }, 500);
        });

    });
</script>