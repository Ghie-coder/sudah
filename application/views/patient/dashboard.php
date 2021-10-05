<!-- <?php $owner = $pet->user_fname . ' ' . $pet->user_mname .' '. $pet->user_lname;?> -->

<div class="card shadow" style="margin-top: 42px;">
    <div class="card-header py-3" style="height: 49px;">
    </div>
    <div class="card-body" style="margin-top: 0px;">
        <header></header>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table id="petTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>IMG</th>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Species</th>
                        <th>Breed</th>
                        <th>DOB</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($pets as $pet):?>
                        <?php $owner = $pet->user_fname . ' ' . $pet->user_mname .' '. $pet->user_lname;?>
                        <tr>
                            <td>
                                <img style="width:70px;height:70px;" src="<?php echo base_url('../assets/img/pets/'.$pet->img);?>" alt="<?php echo ucwords($pet->name);?>" class="img-thumbnail">
                            </td>
                            <td><?php echo ucwords($pet->name);?></td>
                            <td><?php echo ucwords($owner);?></td>
                            <td><?php echo ucwords($pet->species_name);?></td>
                            <td><?php echo ucwords($pet->breed_name);?></td>
                            <td><?php echo ucwords($pet->dob);?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="card"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#petTable').DataTable();
    } );
</script>