<?php $this->load->library('form_validation'); ?>

<style>
 Style all input fields 
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

 Style the submit button
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

 Style the container for inputs 
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}

.register-form {
  opacity: 1;
  margin-top:100px;
}

.custom-form {
  box-shadow: 0px 0px 4px 1px rgb(122 185 62);
  padding:25px;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <!-- Start: Registration Form -->


    <div class="row register-form">
        <div class="col-md-8 offset-md-2" style="opacity: 1;">
            
            <form action="<?php echo base_url('signup');?>" enctype="multipart/form-data" method="POST" class="custom-form">
                <img class="rounded-circle" src="<?php echo base_url('../');?>assets/img/logo.jpg?h=bbb31366e018cdad5dd1e2fe29839149" style="width: 100px;">    
                <h1 style="color: rgb(141 197 64);font-family: 'Averia Libre', cursive;">SUDAH VETERINARY CLINIC
                <!---p style="color: rgb(141 197 64);font-family: 'Averia Libre', cursive;">Grooming & Accessories</p---></h1>
                <p>Welcome to <b>SUDAH VETERINARY CLINIC, GROOMING AND ACCESSORIES.</b> Thank you for giving us the opportunity to take care of your pets. <br/>
                We'll be happy to answer any questions you have about your pet's health. To ensure the  best care possible, please take time to filt
                in this form completely. <br/>Thank you!</p>
                <?php if($this->session->flashdata('registered')):?>
                    <?php 
                        unset($_SESSION['registered']);
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registered successfully. </strong> Please check your email to verify your account..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif($this->session->flashdata('email and username exists')): ?>
                    <?php 
                        unset($_SESSION['email and username exists']);
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email already registered.</strong> Please choose different email...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Username Exists.</strong> Please choose different username...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif($this->session->flashdata('email registered')): ?>
                    <?php 
                        unset($_SESSION['email registered']);
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email already registered.</strong> Please choose different email...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif($this->session->flashdata('username exists')): ?>
                    <?php 
                        unset($_SESSION['username exists']);
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Username Exists.</strong> Please choose different username...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>
                <div><h2 style="color: rgb(255 255 255);font-family: 'Averia Libre', cursive; background-color:#8DC540">REGISTRATION</h2></div>
                <?php echo validation_errors(); ?>
                <?php echo form_error('lname'); ?>
                <?php var_dump(form_error('lname')); ?>
                <div class="form-row form-group"><label class="text-secondary">Last Name</label><input class="form-control" type="text"  placeholder="Last Name" name="lname"></div>
                <div class="form-row form-group"><label class="text-secondary">First Name</label><input class="form-control" type="text" placeholder="First Name" name="fname" ></div>
                <div class="form-row form-group"><label class="text-secondary">Middle Name</label><input class="form-control" type="text" placeholder="Middle Name" name="mname" ></div>
                <!--div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="text-secondary">Address</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" placeholder="Address" name="address" required=""></div>
                </div-->
                <div class="form-row form-group"><label class="text-secondary">Contact Number</label><input class="form-control" type="text" required="" inputmode="numeric" maxlength="11" minlength="11" name="cnum" placeholder="#"></div>
                <div class="form-row form-group"><label class="text-secondary">Email </label><input class="form-control" type="email" name="email" placeholder="Email address"></div>
                
                <div class="form-row form-group"><label class="text-secondary">Username</label><input class="form-control" type="text" id="usrname" placeholder="Username" name="uname" required=""></div>
                <div class="form-row form-group"><label class="text-secondary">Password </label><input class="form-control" type="password" id="psw" name="pass" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required=""></div>
                <!--div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Repeat Password </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" placeholder="Password" required=""></div>
                </div-->
                <div id="message">
                    <h6>Password must contain the following:</h6>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <span class="m-2"><b> *Register a Pet*</b></span>
                <div class="row ">
                  <div class="form-group col-sm-6">
                    <label class="text-secondary">Pet Name:</label>
                    <input class="form-control require" type="text" id="pet" name="petName">
                  </div>
                  <div class="form-group col-sm-6">
                  <label class="text-secondary">Birthday:</label>
                  <input type="text" id="addPetDOB" class="form-control require" name="petDOB">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-6">
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
                  <div class="form-group col-sm-6">
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
                <div class="row">
                  <div class="form-group col-sm-3">
                    <label for="exampleFormControlInput1">Weight(kg):</label>
                    <input type="number" min="0" class="form-control" name="petWeight" />
                  </div>
                  <div class="form-group col-sm-3">
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
                  <div class="form-group col-sm-3">
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
                  <div class="form-group col-sm-3">
                    <label for="exampleFormControlInput1">Upload Image:</label><br>
                    <input type="file" id="img" name="petIMG" accept="image/*">
                  </div>
                </div>
                <input type="hidden" value='<?php echo json_encode($breeds);?>' id="breedLists">
                <button class="btn btn-light submit-button" type="submit" style="background: rgb(141 197 64);">Register</button>
            </form>
                
        </div>
    </div>


				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
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
    })
</script>

    
<!-- End: Registration Form -->