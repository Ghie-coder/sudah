<?php
    $this->load->view('layout/header');
    $this->load->view('layout/client_nav'); //add switch case for different types of user( vet, admin, etc.. )
?>

<!-- Body Content -->
<?php //echo validation_errors(); ?>
<?php //echo form_open('../account/edit'); ?>
<form action="<?php echo base_url('account/edit');?>" enctype="multipart/form-data" method="POST" class="custom-form">
    <table>
		<tr>
            <td><?php echo form_error('fname'); ?></td>
			<td><label for="fname">First Name</label></td>
			<td><input type="input" name="fname" size="50" value="<?php echo $account->fname ?>" /></td>
		</tr>
		<tr>
            <td><?php echo form_error('mname'); ?></td>
			<td><label for="mname">Middle Name</label></td>
			<td><input type="input" name="mname" size="50" value="<?php echo $account->mname ?>" /></td>
		</tr>
		<tr>
            <td><?php echo form_error('lname'); ?></td>
			<td><label for="lname">Last Name</label></td>
			<td><input type="input" name="lname" size="50" value="<?php echo $account->lname ?>" /></td>
		</tr>
		<tr>
            <td><?php echo form_error('email'); ?></td>
			<td><label for="email">Email</label></td>
			<td><input type="input" name="email" size="50" value="<?php echo $account->email ?>" /></td>
		</tr>
		<tr>
            <td><?php echo form_error('contact_no'); ?></td>
			<td><label for="contact_no">Contact Number</label></td>
			<td><input type="input" name="contact_no" size="50" value="<?php echo $account->contact_no ?>" /></td>
		</tr>
		<tr>
            <td><?php echo form_error('address'); ?></td>
			<td><label for="address">Address</label></td>
			<td><input type="input" name="address" size="50" value="<?php echo $account->address ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><button class="btn btn-light submit-button" type="submit" style="background: rgb(141 197 64);">Update account</button></td>
		</tr>
	</table>
</form>

<?php
    $this->load->view('layout/footer');
?>