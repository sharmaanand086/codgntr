<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.css" media="screen">
    <link rel="stylesheet" href="https://bootswatch.com/_assets/css/custom.min.css">
</head>
<body>
	<div class="container">
		<div class="row">

			<form action="<?php echo site_url('CustomHelper/home'); ?>" method="post">
  <fieldset>
   <?php checkflash(); ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
     
    </fieldset>
    <button type="submit" class="btn btn-primary">Login</button>
  </fieldset>
</form>
		</div>
	</div>

</body>
</html>

