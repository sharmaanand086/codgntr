<!DOCTYPE html>
<html>
<head>
	<title>dynamic page</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.css" media="screen">
    <link rel="stylesheet" href="https://bootswatch.com/_assets/css/custom.min.css">
</head>
<body>


<div class="container">
	<h2>This is dynamic page </h2>
		<div class="row">
<?php echo validation_errors(); ?>
			<form action="<?php echo site_url('Dynamic_page/create_page'); ?>" method="post">
   
   <?php checkflash(); ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Pagename</label>
      <input type="text" name="pagename" class="form-control"   placeholder="Enter pagename">
       
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">description</label>
      <textarea class="form-control" name="p_text" cols="10" rows="10"></textarea>  
    </div>
     
    </fieldset>
    <button type="submit" class="btn btn-primary">submit</button>
   
</form>
		</div>
	</div>
</body>
</html>