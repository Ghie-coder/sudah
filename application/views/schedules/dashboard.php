<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.css">
<div class="card shadow" style="margin-top: 42px;">
    <div class="card-header py-3" style="height: 49px;">
        <div class="row">
            <div class="col-sm-6">
                <h4>Schedules</h4>
            </div>
            <div class="col-sm-6" style="text-align: end;">
                <button type="button" data-toggle="modal" data-target="#addSpeciesBTN" onclick="clearModal()">
                    Add
                </button>
            </div>
        </div>
        
        
    </div>
    <div class="card-body" style="margin-top: 0px;">
        <header></header>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Branch Name</th>
                <th>Vet</th>
                <th>Max # of appointments(AM)</th>
                <th>Max # of appointments(PM)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($schedules as $item):?>
                <?php $vetName = $item->vet_fname." ".$item->vet_mname." ".$item->vet_lname;?>
                <tr>
                    <td><?php echo $item->date;?></td>
                    <td><?php echo $item->branch_name;?></td>
                    <td><?php echo ucwords($vetName);?></td>
                    <td><?php echo $item->am_max;?></td>
                    <td><?php echo $item->pm_max;?></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#addSpeciesBTN"  id="editSpecies" onclick='editSpecies(<?php echo json_encode($item);?>)'>Edit</a>
                        <a href="<?php echo base_url('delete-species/'.$item->id);?>" id="deleteSpecies">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
        </div>
        <div class="card"></div>
    </div>
    <form method="POST" action="<?php echo base_url('add-schedule');?>" >
    <div class="modal fade" id="addSpeciesBTN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Schedule Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="appointmentDate">Date</label>
                        <input type="hidden" class="form-control" id="speciesID" placeholder="id"  />
                        <input type="text" class="form-control" id="appointmentDate" name="selectedDates" placeholder="Select Date" required />
                    </div>
                    <div class="form-group">
                        <label for="speciesNameInput">Branch</label>
                        <select class="form-control form-control-xs selectpicker" name="branch" data-size="7" data-live-search="true" data-title="Select Branch" id="exampleFormControlInput1" data-width="100%">
                            <?php foreach($branches as $branch):?>    
                                <option value="<?php echo $branch->b_id;?>" selected><?php echo ucwords($branch->b_name);?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vetSelect">Vet</label>
                        <select class="form-control form-control-xs selectpicker"  name="vet" data-size="7" data-live-search="true" data-title="Vet" id="vetSelect" data-width="100%">
                            <?php foreach($vets as $vet):?>
                                <?php $vetName = $vet->fname.' '.$vet->mname.' '.$vet->lname; ?>
                                <option value="<?php echo $vet->vet_id;?>"><?php echo ucwords($vetName);?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amInput">Max # of appointments (AM)</label>
                        <input type="number" min="0" value="0" class="form-control" id="amInput" name="amInput" placeholder="Input the max number of appointment" required />
                    </div>
                    <div class="form-group">
                        <label for="pmInput">Max # of appointments (PM)</label>
                        <input type="number" min="0" value="0" class="form-control" id="pmInput" name="pmInput" placeholder="Input the max number of appointment" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveSpecies">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
    let base_url = '<?php echo base_url();?>';
    var enableDays = "24-07-2021, 20-08-2021, 22-08-2021, 13-09-2021".split(', ')
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
        $('#example').DataTable();
        disableNegative('amInput');
        disableNegative('pmInput');

        $("#appointmentDate").datepicker({ 
            multidate : true,
            maxViewMode: 2,
            weekStart: 1,
            startDate: "+1d",
            todayHighlight: true,
            format: "dd-mm-yyyy", 
            clearBtn: true
        });
        $('#saveSpecies').click(function(){
            if($('#speciesNameInput').val()){
                if($('#speciesID').val()){
                    let url = base_url + 'updateSpecies?name='+$('#speciesNameInput').val()+'&id='+$('#speciesID').val();
                    $.ajax({
                        method : 'get',
                        url: url,
                    }).done(function(resp) {
                        location.reload();
                    })
                }else{
                    let url = base_url + 'validateSpeciesName?name='+$('#speciesNameInput').val();
                    $.ajax({
                        method : 'get',
                        url: url,
                    }).done(function(resp) {
                        if(resp === 'exist'){
                            $("#errorAddingSpecies").show();
                        }else{
                            location.reload();
                        }
                    })
                }
            }else{
                $("#requiredSpecies").show();
            }
        });
    });
    function disableNegative(el){
        var numberInput = document.getElementById(el);
        // Listen for input event on numInput.
        numberInput.onkeydown = function(e) {
            if( e.keyCode !==9){
                if(!((e.keyCode > 95 && e.keyCode < 106)
                || (e.keyCode > 47 && e.keyCode < 58) 
                || e.keyCode == 8)) {
                    return false;
                }
            }
        }
    }
    function editSpecies(obj) {
        console.log(obj);
        $('#speciesNameInput').val(obj.name);
        $('#speciesID').val(obj.id)
    }

    function clearModal(){
        console.log('test');
        $('#speciesNameInput').val('');
        $('#speciesID').val('')
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>