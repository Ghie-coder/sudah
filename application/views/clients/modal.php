<div
  class="modal fade"
  id="editAppt"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Patient/Pet:</label>
            <select class="form-control form-control-xs selectpicker" name="" data-size="7" data-live-search="true" data-title="Location" id="state_list" data-width="100%">
                <option value="" selected>Manufacturer's Name</option>
                <option value="">Aarkay Engineering Corpot</option>
                <option value="">HAAS GROUP INTERNATIONAL INC., USA</option>
                <option value="">HOLLANDSE SIGNAAL APPARATEN GMBH,NETHERLAND</option>
                <option value="">KLIMAAT TOTAAL, NEDERLAND</option>
                <option value="">LIAAEN BAMFORD LTD,ENGLAND</option>
                <option value="">SAAB, SWEDEN</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Type of Appointment:</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Branch:</label>
            <select multiple class="form-control" id="exampleFormControlSelect2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Reason:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


<div
  class="modal fade"
  id="editPet"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pet</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Pet Name:</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Age:</label>
            <input type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Gender:</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Species:</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Breed:</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Color:</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Weight:</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Birthday:</label>
            <input type="date" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Upload Image:</label><br>
            <input type="file" id="img" name="img" accept="image/*">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="pt-history"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Patient History</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
        <div class="modal-body">
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
            <a
                class="nav-link active"
                id="ex1-tab-1"
                data-mdb-toggle="tab"
                href="#ex1-tabs-1"
                role="tab"
                aria-controls="ex1-tabs-1"
                aria-selected="true"
                >History</a
            >
            </li>
            <li class="nav-item" role="presentation">
            <a
                class="nav-link"
                id="ex1-tab-2"
                data-mdb-toggle="tab"
                href="#ex1-tabs-2"
                role="tab"
                aria-controls="ex1-tabs-2"
                aria-selected="false"
                >Next Schedule</a>
            </li>
            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                <div class="">
		            <table  class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Description</th>
                                <th>Vet</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            Tab 2 content
            </div>
            </div>
            <!-- Tabs content -->
        </div>  
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>

<div
  class="modal fade"
  id="editAccount"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account Details</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Username:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">First Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Middle Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Last Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Email:</label>
            <input type="email" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">COntact No:</label>
            <input type="number" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Address:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="changePass"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Old Password:</label>
            <input type="password" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">New Password:</label>
            <input type="password" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Re-Enter New Password:</label>
            <input type="password" class="form-control" id="exampleFormControlInput1">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Password</button>
      </div>
    </div>
  </div>
</div>


<script>
  
    $(document).ready(function(){
        $('#petSpecies').change(function(e){
          
        })
    });
    // var enableDays = "24-07-2021, 20-08-2021, 22-08-2021, 13-09-2021".split(', ')

    // function formatDate(d) {
    //   var day = String(d.getDate())
    //   //add leading zero if day is is single digit
    //   if (day.length == 1)
    //     day = '0' + day
    //   var month = String((d.getMonth()+1))
    //   //add leading zero if month is is single digit
    //   if (month.length == 1)
    //     month = '0' + month
    //   return day + "-" + month + "-" + d.getFullYear()
    // }

    function submitPet(){
        $('#submitPetForm').click()
    }
    // function bookAppointment(){
    //     console.log('submit form');
    //     $("#submitAppointment").click();
    // }
    // $(function(){
    //     var dtToday = new Date();
        
    //     var month = dtToday.getMonth() + 1;
    //     var day = dtToday.getDate();
    //     var year = dtToday.getFullYear();
    //     if(month < 10)
    //         month = '0' + month.toString();
    //     if(day < 10)
    //         day = '0' + day.toString();
    //     var maxDate = year + '-' + month + '-' + day;
        
    //     $("#appointmentDate").datepicker({ 
    //       maxViewMode: 2,
    //       weekStart: 1,
    //       startDate: "+1d",
    //       beforeShowDay: function(date){
    //         if (enableDays.indexOf(formatDate(date)) < 0)
    //           return {
    //             enabled: false
    //           }
    //         else
    //           return {
    //             enabled: true
    //           }
    //       },
    //       todayHighlight: true,
    //       format: "dd-mm-yyyy", 
    //       clearBtn: true,
    //       autoclose: true
    //   });
    //   $('.selectpicker').selectpicker();

    // });
</script>