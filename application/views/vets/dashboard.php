<div class="card shadow" style="margin-top: 42px;">
    <div class="card-header py-3" style="height: 49px;">
    </div>
    <div class="card-body" style="margin-top: 0px;">
        <header></header>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table id="appointmentsTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact#</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($vets as $vet):?>
                                        <?php $vetName = $vet->title . ' ' . $vet->fname . ' ' . $vet->mname .' '. $vet->lname;?>
                                        <tr>
                                            <td><?php echo ucwords($vetName);?></td>
                                            <td><?php echo $vet->email;?></td>
                                            <td><?php echo ucwords($vet->contact);?></td>
                                            <td><?php echo ucwords($vet->address);?></td>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Species Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="errorAddingSpecies" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
                        <strong>Failed: </strong> Species Name is already exists.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="requiredSpecies" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
                        <strong>Failed: </strong> Breed Name / Species is required.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="BreedNameInput">Name</label>
                        <input type="hidden" class="form-control" id="breedId" placeholder="id"  />
                        <input type="text" class="form-control" id="BreedNameInput" placeholder="Input Breed Name" required />
                    </div>
                    <div class="form-group">
                        <label for="speciesNameSelect">Species</label>
                        <select class="custom-select custom-select-lg mb-3" id="speciesNameSelect">
                            <option value="0" selected disabled>Select Species</option>
                            <?php foreach($species as $item):?>
                                <option value="<?php echo $item->id;?>"><?php echo ucwords($item->name);?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveSpecies">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#appointmentsTable').DataTable();
    } );
</script>