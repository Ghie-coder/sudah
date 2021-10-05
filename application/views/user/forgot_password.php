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

.register-form{
  opacity: 1;
  margin-top:100px;
}

.custom-form {
  box-shadow: 0px 0px 4px 1px rgb(122 185 62);
  margin-bottom:100px;
}

</style>
    <!-- Start: Registration Form -->

    <div class="row register-form">
        <div class="col-md-8 offset-md-2" style="opacity: 1;">
            <form action="<?php echo base_url('forgot-password');?>" method="POST" class="custom-form">
                <img class="rounded-circle" src="<?php echo base_url('../');?>assets/img/logo.jpg?h=bbb31366e018cdad5dd1e2fe29839149" style="width: 100px;">    
                <h1 style="color: rgb(141 197 64);font-family: 'Averia Libre', cursive;">SUDAH VETERINARY CLINIC
                <!---p style="color: rgb(141 197 64);font-family: 'Averia Libre', cursive;">Grooming & Accessories</p---></h1>
                <p>Welcome to <b>SUDAH VETERINARY CLINIC, GROOMING AND ACCESSORIES.</b> Thank you for giving us the opportunity to take care of your pets. <br/>
                We'll be happy to answer any questions you have about your pet's health. To ensure the  best care possible, please take time to filt
                in this form completely. <br/>Thank you!</p>
                <?php if(isset($messages)):?>
                    <div class="alert <?php echo $messages['type']?> alert-dismissible fade show" role="alert">
                        <strong></strong> <?php echo $messages['text']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>
                <div><h2 style="color: rgb(255 255 255);font-family: 'Averia Libre', cursive; background-color:#8DC540">Forgot Password</h2></div>
                <div class="form-row form-group">
                    <label class="text-secondary">Email </label>
                    <input class="form-control" type="email" name="email" placeholder="Email address" required />
                </div>
                <button class="btn btn-light submit-button" type="submit" style="background: rgb(244,38,50);">Send Email</button>

                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
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
</script>
    
<!-- End: Registration Form -->