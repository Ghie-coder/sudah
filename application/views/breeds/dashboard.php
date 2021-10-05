<div class="card shadow" style="margin-top: 42px;">
    <div class="card-header py-3" style="height: 49px;">
        <button type="button" data-toggle="modal" data-target="#addSpeciesBTN" onclick="clearModal()">
            Add
        </button>
    </div>
    <div class="card-body" style="margin-top: 0px;">
        <header></header>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Breed</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($breeds as $item):?>
                <tr>
                    <td><?php echo ucwords($item->name);?></td>
                    <td><?php echo ucwords($item->species_name);?></td>
                    <td><?php echo $item->created;?></td>
                    <td><?php echo $item->updated;?></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#addSpeciesBTN"  id="editSpecies" onclick='editSpecies(<?php echo json_encode($item);?>)'>Edit</a>
                        <a href="<?php echo base_url('delete-breed/'.$item->id);?>" id="deleteSpecies">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Breed</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
        </div>
        <div class="card"></div>
    </div>
    <div class="modal fade" id="addSpeciesBTN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Breed Form</h5>
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
    let base_url = '<?php echo base_url();?>';
    $(document).ready(function() {
        $('#example').DataTable();

        $('#saveSpecies').click(function(){
            let speciesId = $('#speciesNameSelect').val();
            let breedName = $('#BreedNameInput').val();
            if( breedName&& speciesId){
                if($('#breedId').val()){
                    let url = base_url + 'updateBreed?name='+breedName+'&id='+$('#breedId').val()+'&species_id='+speciesId;
                    $.ajax({
                        method : 'get',
                        url: url,
                    }).done(function(resp) {
                        location.reload();
                    })
                }else{
                    let url = base_url + 'validateBreedName?name='+breedName+'&species_id='+speciesId;
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
    } );
    function editSpecies(obj) {
        console.log(obj);
        $('#BreedNameInput').val(obj.name);
        $('#breedId').val(obj.id);
        $('#speciesNameSelect').val(obj.species_id);
    }

    function clearModal(){
        console.log('test');
        $('#BreedNameInput').val('');
        $('#breedId').val('');
        $('#speciesNameSelect').val(0);
    }
</script>