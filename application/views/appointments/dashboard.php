<div class="card shadow" style="margin-top: 42px;">
    <div class="card-header py-3" style="height: 49px;">
    </div>
    <div class="card-body" style="margin-top: 0px;">
        <header></header>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table id="appointmentsTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Pet Owner</th>
                                        <th>Pet Name</th>
                                        <th>Branch</th>
                                        <th>Vet</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($appointments as $appointment):?>
                                        <?php $petOwner = $appointment->owner_fname . ' ' . $appointment->owner_mname .' '. $appointment->owner_lname;?>
                                        <?php $vetName = $appointment->vet_title . ' ' . $appointment->vet_fname . ' ' . $appointment->vet_mname .' '. $appointment->vet_lname;?>
                                        <tr>
                                            <td><?php echo ucwords($appointment->apptDate);?> | <?php echo ucwords($appointment->time);?> </td>
                                            <td><?php echo ucwords($petOwner);?></td>
                                            <td><?php echo ucwords($appointment->pet_name);?></td>
                                            <td><?php echo ucwords($appointment->b_name);?></td>
                                            <td><?php echo ucwords($vetName);?></td>
                                            <td><?php echo ucwords($appointment->reason);?></td>
                                            <td><?php echo ucwords($appointment->status);?></td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php if($appointment->status === 'pending'):?>
                                                            <a class="dropdown-item" href="<?php echo base_url('confirm-appointment/'.$appointment->appt_id);?>">Confirm</a>
                                                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#addSpeciesBTN" onclick='cancelAppointment(<?php echo $appointment->appt_id;?>)'>Cancel</a>
                                                        <?php endif;?>
                                                        <?php if($appointment->status === 'confirmed'):?>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#doneAppoinment" onclick='doneAppointment(<?php echo $appointment->appt_id;?>)'>Done</a>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
        </div>
        <div class="card"></div>
    </div>
    <div class="modal fade" id="addSpeciesBTN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form method="POST" action="<?php echo base_url('appointment/cancel');?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="requiredSpecies" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
                        <strong>Failed: </strong> Reason is required.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="speciesNameInput">Reason for Cancel:</label>
                        <input type="hidden" class="form-control" id="speciesID" placeholder="id"  name="appointment_id" />
                        <!-- <input type="text" class="form-control" id="speciesNameInput" placeholder="Input Species Name" required /> -->
                        <textarea class="form-control" id="speciesNameInput" placeholder="Input Reasons for cancel" maxlength="1000" name="reason"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveSpecies">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="doneAppoinment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form method="POST" action="<?php echo base_url('appointment/done');?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Done Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="weightInput">Weight(kg):</label>
                        <input type="Number" min="0" class="form-control" id="weightInput" placeholder="Weight"  name="weight" />
                    </div>
                    <div class="form-group">
                        <label for="temperatureInput">Temperature(degrees):</label>
                        <input type="Number" min="0" class="form-control" id="temperatureInput" placeholder="Temperature"  name="temperature" />
                    </div>
                    <div class="form-group">
                        <label for="findingsInput">Diagnosis:</label>
                        <input type="hidden" class="form-control" id="doneId" placeholder="id"  name="appointment_id" />
                        <textarea class="form-control" id="findingsInput" placeholder="Patient appointment findings here..." maxlength="1000" name="findings"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="treatmentInput">Treatment:</label>
                        <textarea class="form-control" id="treatmentInput" placeholder="Treatment" maxlength="1000" name="treatment"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="remarksInput">Remarks:</label>
                        <textarea class="form-control" id="remarksInput" placeholder="Remarks" maxlength="1000" name="remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveSpecies">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#appointmentsTable').DataTable();
    } );
    function cancelAppointment(obj) {
        console.log(obj);
        // $('#speciesNameInput').val(obj);
        $('#speciesID').val(obj)
    }
    function doneAppointment(obj) {
        console.log(obj);
        // $('#speciesNameInput').val(obj);
        $('#doneId').val(obj)
    }
</script>