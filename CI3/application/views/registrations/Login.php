<div class="container">
	<?php echo validation_errors(); ?>
<?php 

	if($this->session->flashdata('message'))
{
	echo $this->session->flashdata('message');
}
		?>
<form method="post" action="<?php echo site_url('Login/checkuser'); ?>">
  <fieldset>
    <legend>Login</legend>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="Email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
    
    <input type="submit" name="submit" value="Login" class="btn btn-primary">
</fieldset>
</form>
</div>