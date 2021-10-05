<?php

$config = array(
        'signup' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required'
                )
        ),
        'user/edit' => array(
                array(
                        'field' => 'fname',
                        'label' => 'First Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'mname',
                        'label' => 'Middle Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'lname',
                        'label' => 'Last Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email'
                ),
                array(
                        'field' => 'contact_no',
                        'label' => 'Contact Number',
                        'rules' => 'required|numeric|min_length[12]|max_length[12]'
                ),
                array(
                        'field' => 'address',
                        'label' => 'Address',
                        'rules' => 'required'
                )
        ),
        'user/change-password' => array(
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|min_length[8]'
                ),
                array(
                        'field' => 'new_password',
                        'label' => 'New Password',
                        'rules' => 'required|min_length[8]'
                ),
                array(
                        'field' => 'confirm_password',
                        'label' => 'Confirmed Password',
                        'rules' => 'required|min_length[8]'
                ),
        ),
        'appointment' => array(
                array(
                        'field' => 'appointmentDate',
                        'label' => 'Appointment Date',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'pet_id',
                        'label' => 'Patient/Pet',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'branch_id',
                        'label' => 'Branch',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'service_id[]',
                        'label' => 'Services',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'serviceDay',
                        'label' => 'Service Day',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'reason',
                        'label' => 'Reason',
                        'rules' => 'required'
                ),
        ),

        'inventory' => array(
                array(
                        'field' => 'branch_id',
                        'label' => 'Branch',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'item_name',
                        'label' => 'Name of Item',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'amount',
                        'label' => 'Amount',
                        'rules' => 'required|numeric'
                ),
        ),

);


?>