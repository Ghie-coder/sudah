<div
  class="modal fade"
  id="addPet"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Pet</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
    <form id="addPetForm" method="POST" enctype="multipart/form-data" action="<?php echo base_url('pet-add');?>">
        <div class="form-group">
            <label for="exampleFormControlInput1">Pet Name:</label>
            <input type="text" class="form-control" name="petName" />
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Age:</label>
            <input type="number" class="form-control" name="petAge">
        </div>
        <!-- <div class="form-group">
            <label for="exampleFormControlInput1">Gender:</label>
            <input type="text" class="form-control" name="petGender">
        </div> -->
        <div class="form-group">
            <label for="genderAddPetInput">Gender:</label>
            <select class="add-pet-select-picker form-control" data-live-search="true" id="genderAddPetInput" name="petGender">
                <option value="null" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="unknown">Unknown</option>
            </select>
        </div>
        <!-- <div class="form-group">
            <label for="exampleFormControlInput1">Species:</label>
            <input type="text" class="form-control" name="petSpecies">
        </div> -->
        <div class="form-group">
            <label for="speciesNameSelect">Species</label>
            <select class="custom-select custom-select-lg mb-3" id="petSpecies" name="petSpecies">
                <option value="0" selected disabled>Select Species</option>
                <?php foreach($species as $item):?>
                    <option value="<?php echo $item->id;?>"><?php echo ucwords($item->name);?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Breed:</label>
            <select class="custom-select custom-select-lg mb-3" id="petBreed" name="petBreed">
                <option value="0" selected disabled>Select Breed</option>
                <?php foreach($breeds as $item):?>
                    <option value="<?php echo $item->id;?>"><?php echo ucwords($item->name);?></option>
                <?php endforeach;?>
            </select>
            <!-- <input type="number" class="form-control" name="petBreed"> -->
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Color:</label>
            <input type="text" class="form-control" name="petColor">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Weight:</label>
            <input type="text" class="form-control" name="petWeight">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Birthday:</label>
            <input type="text" id="addPetDOB" class="form-control" name="petDOB">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Upload Image:</label><br>
            <input type="file" id="img" name="petIMG" accept="image/*">
        </div>
            <button type="submit" class="btn btn-primary" id="submitPetForm" style="display:none;">Save</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick="submitPet()">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(function(){
        $('.add-pet-select-picker').selectpicker();
        $("#addPetDOB").datepicker({ 
            maxViewMode: 2,
            weekStart: 1,
            endDate: "+1d",
            todayHighlight: true,
            format: "dd-mm-yyyy", 
            clearBtn: true,
            autoclose: true,
        });
    })
</script>