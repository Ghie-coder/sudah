
<div class="modal fade" id="addAppt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="<?php echo base_url('appointment-add');?>" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Appointment</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div id="listOfSchedules" style="display:none;"></div> -->
                    <input type="hidden" class="form-control" name="appointmentDate" id="listOfSchedules" value='<?php echo json_encode($schedules);?>'/>
                    <div class="form-group">
                        <label for="branchID">Branch</label>
                        <select class="form-control form-control-xs selectpicker" name="branch_id" data-live-search="true" data-title="Branch" id="branchID" data-width="100%">
                            <?php foreach($branches as $branch):?>    
                                <option value="<?php echo $branch->b_id;?>" ><?php echo ucwords($branch->b_name);?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Patient/Pet:</label>
                        <select class="form-control form-control-xs selectpicker" name="pet_id" data-size="7" data-live-search="true" data-title="Pet" id="exampleFormControlInput1" data-width="100%">
                            <?php foreach($pets as $pet):?>    
                                <option value="<?php echo $pet->id;?>" ><?php echo ucwords($pet->name);?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Services:</label>
                        <select class="selectpicker form-control" multiple data-live-search="true" id="exampleFormControlSelect1" name="service_id[]">
                            <?php foreach($services as $service):?>
                                <option value="<?php echo ucwords($service->s_id);?>">
                                    <?php 
                                        echo ucwords($service->s_name);
                                        if($service->price){
                                            echo " (Php ".$service->price.")";
                                        }
                                    ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="appointmentDate">Date of Appointment:</label>
                        <input type="text" class="form-control" name="appointmentDate" id="appointmentDate" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="serviceDay">AM/PM:</label>
                            <select class="selectpicker form-control" id="serviceDay" name="serviceDay">
                            <option value="am">AM</option>
                            <option value="pm">PM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Reason:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reason"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Book</button>
                </div>
            </div>
        </div>
    </form>
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
            format: "dd-mm-yyyy", 
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
            let schedules = JSON.parse($("#listOfSchedules").val().toString());
            let enableDays = [];
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
                    format: "dd-mm-yyyy", 
                    clearBtn: true,
                    autoclose: true
                });
            }, 500);
        });

    });
</script>