
<div class="card shadow" style="margin-top: 42px;">
    <div class="card-header py-3" style="height: 49px;">
    </div>
    <div class="card-body" style="margin-top: 0px;">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img  style="max-width:100%;max-height:100%;" src="<?php echo base_url('../assets/img/pets/'.$pet->img);?>" alt="" class="img-circle img-responsive">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <h2><?php echo ucwords($pet->name);?></h2>
                    <p><strong>DOB: </strong> <?php echo $pet->dob;?>. </p>
                    <p><strong>Gender: </strong> <?php echo ucwords($pet->gender);?>. </p>
                    <p><strong>Color: </strong><?php echo ucwords($pet->color_name);?> </p>
                    <p><strong>Species: </strong><?php echo ucwords($pet->species_name);?> </p>
                    <p><strong>Breed: </strong><?php echo ucwords($pet->breed_name);?> </p>
                </div>
            </div>
        </div>
        <div>
        <table id="appointmentsTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Service</th>
                    <th>Weight</th>
                    <th>Temp</th>
                    <th>Diagnosis</th>
                    <th>Treatment</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pet_appointments as $item):?>
                    <tr>
                        <td><?php echo $item->apptSchedule;?></td>
                        <td><?php echo ucwords($item->service_name);?></td>
                        <td><?php echo ucwords($item->weight);?></td>
                        <td><?php echo ucwords($item->temp);?></td>
                        <td><?php echo $item->diagnosis;?></td>
                        <td><?php echo $item->treatment;?></td>
                        <td><?php echo $item->treatment;?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#appointmentsTable').DataTable();
    } );
</script>