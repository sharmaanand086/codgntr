<div class="container">
	<?php echo validation_errors(); ?>
<?php 

	if($this->session->flashdata('message'))
{
	echo $this->session->flashdata('message');
}
		?>
<form method="post" action="<?php echo site_url('Signup/newUser'); ?>">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" name="Fullname" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Name">
       
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="Email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input type="password" class="form-control" name="confirmpassword" id="exampleInputPassword2" placeholder="Confirm Password">
    </div>
    <input type="submit" name="submit" value="Signup" class="btn btn-primary">
</fieldset>
</form>
</div>