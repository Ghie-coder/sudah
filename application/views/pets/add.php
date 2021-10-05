<div class="row">
    <div class="container">
<?php if(isset($pet_data)):?>
    <form id="addPetForm" class="needs-validation " novalidate method="POST" enctype="multipart/form-data" action="<?php echo base_url('pets/edit/'.$pet_data->id);?>">
<?php else:?>
    <form id="addPetForm" class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="<?php echo base_url('pets/add');?>">
<?php endif;?>    
    <div class="container bg-light py-3 mt-5" style="width: 60%;" >
        <div class="row d-flex justify-content-center">
     
            <div class="form-group col-sm-8">
                <label for="exampleFormControlInput1">Pet Name: *</label>
                <input type="text" class="form-control require" name="petName" required value="<?php echo isset($pet_data->name) ? ucwords($pet_data->name) : '';?>"/>
                <input type="hidden" class="form-control" name="petID" value="<?php echo isset($pet_data->id) ? ucwords($pet_data->id) : '';?>"/>
            </div>
        </div>
        <div class="row d-flex justify-content-center ">
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Birthday: *</label>
                <input type="text" id="addPetDOB" class="form-control require" name="petDOB" value="<?php echo isset($pet_data->dob) ? ucwords($pet_data->dob) : '';?>" />
            </div>
            <div class="form-group col-sm-4">
                <label for="genderAddPetInput">Gender: *</label>
                <select class="add-pet-select-picker form-control require" data-hassiblings="true" data-live-search="true" id="genderAddPetInput" name="petGender" required>
                    <?php if(isset($pet_data->gender)):?>
                        <option value="" disabled>Select Gender</option>
                        <?php if($pet_data->gender == "male"):?>
                            <option value="male" selected>Male</option>
                        <?php else:?>
                            <option value="male">Male</option>
                        <?php endif;?>
                        <?php if($pet_data->gender == "female"):?>
                            <option value="female" selected>Female</option>
                        <?php else:?>
                            <option value="female">Female</option>
                        <?php endif;?>
                        <?php if($pet_data->gender == "unknown"):?>
                            <option value="unknown" selected>Unknown</option>
                        <?php else:?>
                            <option value="unknown">Unknown</option>
                        <?php endif;?>
                    <?php else:?>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="unknown">Unknown</option>
                    <?php endif;?>
                </select>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-4">
                <label for="speciesNameSelect">Species: *</label>
                <select class="add-pet-select-picker form-control require" data-hassiblings="true"  data-live-search="true" id="petSpecies" name="petSpecies">
                    <option value="" selected disabled>Select Species</option>
                    <?php foreach($species as $item):?>
                        <?php if(isset($pet_data->species_id)):?>
                            <?php if($pet_data->species_id == $item->id):?>
                                <option value="<?php echo $item->id;?>" selected><?php echo ucwords($item->name);?></option>
                            <?php else:?>
                                <option value="<?php echo $item->id;?>"><?php echo ucwords($item->name);?></option>
                            <?php endif;?>
                        <?php else:?>
                            <option value="<?php echo $item->id;?>"><?php echo ucwords($item->name);?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Breed: *</label>
                <input type="hidden" value='<?php echo json_encode($breeds);?>' id="breedLists">
                <select class="add-pet-select-picker form-control require" data-hassiblings="true" data-live-search="true" id="petBreed" name="petBreed">
                    <?php if(isset($pet_data->breed_id)):?>
                        <?php foreach($selectedBreed as $item):?>
                            <?php if($item->id == $pet_data->breed_id):?>
                                <option value="<?php echo $item->id;?>" selected><?php echo ucwords($item->name);?></option>
                            <?php else:?>
                                <option value="<?php echo $item->id;?>"><?php echo ucwords($item->name);?></option>
                            <?php endif?>
                        <?php endforeach;?>
                    <?php else:?>
                        <option value="0" selected disabled>Select Breed</option>
                        <?php foreach($breeds as $item):?>
                            <option value="<?php echo $item->id;?>"><?php echo ucwords($item->name);?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-4">
                <label for="petColor">Color: *</label>
                <!-- <input type="text" class="form-control require" name="petColor"> -->
                <select class="add-pet-select-picker form-control require" data-hassiblings="true"  data-live-search="true" id="petColor" name="petColor">
                    <?php if(isset($pet_data->color_id)):?>
                        <?php foreach($colors as $item):?>
                            <?php if($pet_data->color_id == $item->id):?>
                                <option value="<?php echo $item->id;?>" selected><?php echo ucwords($item->color);?></option>
                            <?php else:?>
                                <option value="<?php echo $item->id;?>"><?php echo ucwords($item->color);?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php else:?>
                        <option value="" selected disabled>Select Color</option>
                        <?php foreach($colors as $item):?>
                            <option value="<?php echo $item->id;?>"><?php echo ucwords($item->color);?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="exampleFormControlInput1">Weight(kg):</label>
                <input type="text" class="form-control" name="petWeight" value="<?php echo isset($pet_data->weight) ? ucwords($pet_data->weight) : '';?>" />
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="form-group col-sm-8">
                <label for="exampleFormControlInput1">Upload Image:</label><br>
                <input type="file" id="img" name="petIMG" accept="image/*">
            </div>
        </div>
        <div class="form-group d-flex justify-content-center ">
            <button type="submit" class="btn btn-primary" id="submitPetForm" >Save</button>
        </div>
    </div>
</form>
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
            format: "yyyy-mm-dd", 
            clearBtn: true,
            autoclose: true,
        });
        $('#petSpecies').change(function(e){
            console.log(e.target.value);
            var options = [];
            let breedLists = JSON.parse($('#breedLists').val());
            for(let ctr=0; ctr<breedLists.length; ctr++){
                let item = breedLists[ctr];
                if(item.species_id === e.target.value){
                    let data = {
                        text : item.name,
                        value : item.id
                    }
                    options.push(data);
                }
            }
            $("#petBreed").replaceOptions(options);
            $('.add-pet-select-picker').selectpicker("refresh");
        });
        $('#addPetForm').submit(function(e){
            e.preventDefault();
            e.stopPropagation();
            let requiredEl = $(this).find('select.require,input.require');
            let hasError = false;
            requiredEl.each(function(){
                if($(this).val()){
                    if($(this).data().hassiblings){
                        $(this).siblings('button').removeClass('myerror');
                    }else{
                        $(this).removeClass('myerror');
                    }
                }else{
                    hasError = true;
                    if($(this).data().hassiblings){
                        $(this).siblings('button').addClass('myerror');
                    }else{
                        $(this).addClass('myerror');
                    }
                }
            });
            if(hasError === false){
                this.submit();
            }
        });
    })
</script>