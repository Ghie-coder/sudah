<div style="margin-left: 30px;margin-right: 30px;">
    <ul class="nav nav-tabs" role="tablist" style="margin-right: 0px;margin-left: 0px;">
        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1" style="color: rgb(187,11,0);">Schedule`</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link " role="tab" data-toggle="tab" href="#tab-2" style="color: rgb(187,11,0);">Appointments</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3" style="color: rgb(187,11,0);">Patients/Pets</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4" style="color: rgb(187,11,0);">Branches</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-5" style="color: rgb(187,11,0);">Inventory</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" role="tabpanel" id="tab-1" style="height: 900px;">
            <div style="background-color: #ffffff;margin-top: 23px;color: rgb(133,135,150);">
                <p class="text-center shadow-sm" style="font-size: 25px;font-family: 'Averia Serif Libre', cursive;color: rgb(60,60,62);margin-left: 0px;background-color: transparent;padding-left: 28px;width: 100%;">Upcoming Appointments&nbsp;<i class="fa fa-clock-o" style="margin-left: 3px;"></i></p>
            </div>
            <div class="container-fluid">
                <div class="card shadow" style="margin-top: 42px;">
                    <div class="card-header py-3">
                        <a href="<?php echo base_url('appointment/add')?>" class="btn btn-primary pull-right" type="button">
                            <i class="fa fa-plus"> Book Appointment</i>
                        </a>
                    </div>
                    <div class="card-body" style="margin-top: 0px;">
                        <header></header>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <!-- appointments -->
                        <table id="appointmentsTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Branch</th>
                                        <!-- <th>Vet</th>
                                        <th>Reason</th> -->
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($appointments as $appointment):?>
                                        <?php $vetName = $appointment->vet_title . ' ' . $appointment->vet_fname . ' ' . $appointment->vet_mname .' '. $appointment->vet_lname;?>
                                        <?php
                                            $editDsiable = "false";
                                            if($appointment->status === "confirmed"){
                                                $editDsiable = "true";
                                            }
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo ucwords($appointment->apptDate);?></td>
                                            <td><?php echo ucwords($appointment->pet_name);?></td>
                                            <td><?php echo ucwords($appointment->b_name);?></td>
                                            <!-- <td><?php echo ucwords($vetName);?></td>
                                            <td><?php echo ucwords($appointment->reason);?></td> -->
                                            <td><?php echo ucwords($appointment->status);?></td>
                                            <td class="text-center" style="background-color: rgb(248,249,252);">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php if($appointment->status === "pending"):?>
                                                            <a class="dropdown-item" href="<?php echo base_url('appointment/edit/').$appointment->appt_id;?>">Edit</a>
                                                        <?php endif;?>
                                                        <a class="dropdown-item" href="#">Download</a>
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
                </div>
            </div>
        </div> 
        <!-- Tab1 End--->

        <!-- Tab2 Start -->
        <div class="tab-pane fade" role="tabpanel" id="tab-2" style="height: 900px;">
            <div style="background-color: #ffffff;margin-top: 23px;color: rgb(133,135,150);">
                <p class="text-center shadow-sm" style="font-size: 25px;font-family: 'Averia Serif Libre', cursive;color: rgb(60,60,62);margin-left: 0px;background-color: transparent;padding-left: 28px;width: 100%;margin-top: 0px;">Appointments &nbsp;<i class="fa fa-clock" style="margin-left: 3px;"></i></p>
            </div>
            <div class="container-fluid" style="margin-bottom: 23px;">
                <div class="card shadow" style="margin-top: 42px;">
                    <div class="card-header py-3">
                        <a href="<?php echo base_url('admin/appointment/add')?>" class="btn btn-primary pull-right" type="button">
                            <i class="fa fa-plus"> Book Appointment</i>
                        </a>
                    </div>
                    <div class="card-body" style="margin-top: 0px;">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    
                            <table id="allAppointments" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Date of Appointment</th>
                                        <th>Patient/Pet</th>
                                        <th>Branch</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($allAppointments as $appointment):?>
                                        
                                        <tr>
                                            <td><?php echo ucwords($appointment->apptDate);?></td>
                                            <td><?php echo ucwords($appointment->pet_name);?></td>
                                            <td><?php echo ucwords($appointment->b_name);?></td>
                                            <td><?php echo ucwords($appointment->reason);?></td>
                                            <td><?php echo ucwords($appointment->status);?></td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo base_url('pet/view');?>">View</a>
                                                        <a class="dropdown-item" href="<?php echo base_url('pet/edit');?>">Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab3 -->
        <div class="tab-pane fade" role="tabpanel" id="tab-3" style="height: 900px;">
            <div style="background-color: #ffffff;margin-top: 23px;color: rgb(133,135,150);">
                <p class="text-center shadow-sm" style="font-size: 25px;font-family: 'Averia Serif Libre', cursive;color: rgb(60,60,62);margin-left: 0px;background-color: transparent;padding-left: 28px;width: 100%;margin-top: 0px;">PETS&nbsp;<i class="fa fa-paw" style="margin-left: 3px;"></i></p>
            </div>
            <div class="container-fluid" style="margin-bottom: 23px;">
                <div class="card shadow" style="margin-top: 42px;">
                    <div class="card-header py-3">
                        <a href="<?php echo base_url('pet/add')?>" class="btn btn-primary pull-right" type="button">
                            <i class="fa fa-plus"> Add Pet</i>
                        </a>
                    </div>
                    <div class="card-body" style="margin-top: 0px;">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    
                            <table id="petTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>IMG</th>
                                        <th>Name</th>
                                        <th>Specie</th>
                                        <th>Breed</th>
                                        <!-- <th>Species</th>
                                        <th>Breed</th>
                                        <th>DOB</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Color</th>
                                        <th>Weight</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($pets as $pet):?>
                                        <tr>
                                            <td>
                                                <img style="width:70px;height:70px;" src="<?php echo base_url('../assets/img/pets/'.$pet->img);?>" alt="<?php echo ucwords($pet->name);?>" class="img-thumbnail">
                                            </td>
                                            <td><?php echo ucwords($pet->name);?></td>
                                            <td><?php echo ucwords($pet->species_name);?></td>
                                            <td><?php echo ucwords($pet->breed_name);?></td>
                                            <!-- 
                                            <td><?php echo ucwords($pet->breed_name);?></td>
                                            <td><?php echo ucwords($pet->dob);?></td>
                                            <td><?php echo ucwords($pet->age);?></td>
                                            <td><?php echo ucwords($pet->gender);?></td>
                                            <td><?php echo ucwords($pet->color);?></td>
                                            <td><?php echo ucwords($pet->weight);?></td> -->
                                            <!-- style="background-color: rgb(248,249,252);" -->
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo base_url('pet/view/'.$pet->id);?>">View</a>
                                                        <a class="dropdown-item" href="<?php echo base_url('pet/edit/'.$pet->id);?>">Edit</a>
                                                    </div>
                                                </div>
                                                <!-- <div class="btn-group" role="group">
                                                    <a class="btn btn-primary" role="button" style="background-color: rgb(23,152,113);font-family: 'Averia Serif Libre', cursive;" data-mdb-toggle="modal" data-mdb-target="#pt-history" href="#">
                                                        <i class="far fa-eye" style="font-size: 20px;padding: 3px;"></i>
                                                    </a>
                                                    <a class="btn btn-success" role="button" style="font-family: 'Averia Serif Libre', cursive;background: rgb(249,215,90);" data-mdb-toggle="modal" data-mdb-target="#editPet" href="#editPet">
                                                        <i class="far fa-pencil-square-o" style="font-size: 20px;padding: 3px;"></i>
                                                    </a>
                                                </div> -->
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab4 Start -->
        <div class="tab-pane fade" role="tabpanel" id="tab-4" style="height: 900px;">
            <div style="background-color: #ffffff;margin-top: 23px;color: rgb(133,135,150);">
                <p class="text-center shadow-sm" style="font-size: 25px;font-family: 'Averia Serif Libre', cursive;color: rgb(60,60,62);margin-left: 0px;background-color: transparent;padding-left: 28px;width: 100%;margin-top: 0px;">Branches &nbsp;<i class="fa fa-home" style="margin-left: 3px;"></i></p>
            </div>
            <div class="container-fluid" style="margin-bottom: 23px;">
                <div class="card shadow" style="margin-top: 42px;">
                    <div class="card-header py-3">
                        <a href="<?php echo base_url('admin/branch/add')?>" class="btn btn-primary pull-right" type="button">
                            <i class="fa fa-plus"> Add Branch</i>
                        </a>
                    </div>
                    <div class="card-body" style="margin-top: 0px;">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    
                            <table id="branches" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Branch ID</th>
                                        <th>Branch Name</th>
                                        <th>Branch Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($branches as $branch):?>
                                        
                                        <tr>
                                            <td><?php echo ucwords($branch->b_id);?></td>
                                            <td><?php echo ucwords($branch->b_name);?></td>
                                            <td><?php echo ucwords($branch->b_address);?></td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo base_url('admin/branch/view/'.$branch->b_id);?>">View</a>
                                                        <a class="dropdown-item" href="<?php echo base_url('admin/branch/edit/'.$branch->b_id);?>">Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab5 Start -->
        <div class="tab-pane fade" role="tabpanel" id="tab-5" style="height: 900px;">
            <div style="background-color: #ffffff;margin-top: 23px;color: rgb(133,135,150);">
                <p class="text-center shadow-sm" style="font-size: 25px;font-family: 'Averia Serif Libre', cursive;color: rgb(60,60,62);margin-left: 0px;background-color: transparent;padding-left: 28px;width: 100%;margin-top: 0px;">Inventory&nbsp;<i class="fa fa-list-alt" style="margin-left: 3px;"></i></p>
            </div>
            <div class="container-fluid" style="margin-bottom: 23px;">
                <div class="card shadow" style="margin-top: 42px;">
                    <div class="card-header py-3">
                        <a href="<?php echo base_url('admin/inventory/add')?>" class="btn btn-primary pull-right" type="button">
                            <i class="fa fa-plus">Add Inventory</i>
                        </a>
                    </div>
                    <div class="card-body" style="margin-top: 0px;">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    
                            <table id="inventories" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Branch</th>
                                        <th>Name of Item</th>
                                        <th>Amount</th>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($inventories as $item):?>
                                        
                                        <tr>
                                            <td><?php echo ucwords($item->branch_name);?></td>
                                            <td><?php echo ucwords($item->item_name);?></td>
                                            <td><?php echo ucwords($item->amount);?></td>
                                            <td><?php echo ucwords($item->date_created);?></td>
                                            <td><?php echo ucwords($item->date_updated);?></td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo base_url('inventory/view/'.$item->id);?>">View</a>
                                                        <a class="dropdown-item" href="<?php echo base_url('inventory/edit/'.$item->id);?>">Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#petTable').DataTable();
        $('#appointmentsTable').DataTable();
        $('#appointmentsHistory').DataTable();
        $('#branches').DataTable();
        $('#inventories').DataTable();
        
    });
</script>