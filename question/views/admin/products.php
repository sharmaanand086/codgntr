<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/mycss.css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- Facebook Pixel Code General Retargeting Pixel -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '363160880504868');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=363160880504868&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>
	
	<nav class="navbar navbar-inverse" role="navigation">
  		<ul class="nav navbar-nav" >
  			<li class="active" ><a href="<?php echo base_url(); ?>admin/products" >Products</a></li>
		  	<li style="text-align: right;"><a href="<?php echo base_url(); ?>admin/user/logout" > Log Out </a></li>
		</ul>
	</nav>
	
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li class="active">Product</li>
		</ol>
		
		<div class="row" >
			<div class="col-sm-8" >
				<h2> Products </h2>
			</div>
			<div class="col-sm-4" >
				<span class="AddButton" ><a href="<?php echo base_url(); ?>admin/product/add"  class="btn btn-primary btn-lg "  > Add Product </a> </span>
			</div>
		</div>	
		
		<?php  
			if( isset($message) )
			{
				?>
				<div class="actionMessage"> <b><?php echo $message; ?></b></div>
				<?php
			}
		
		 ?>
		
		<?php
			if( $products != 0 )
			{
				?>
				<table width="100%" border="0" class="table table-striped table-hover" >
					<tr>
						<th>No</th>
						<th>Product Name</th>
						<!--<th>Inventory</th>-->
						<th>Price</th>
						<th>Product ID </th>
						<th >Action</th>
					</tr>
				<?php
				foreach ($products as $key => $value) {
					
					//$p_inventory =  $this->Products_model->getInventory( $value['Id'] );
					$link = base_url().'admin/products/edit/'.$value['Id'];
					
					?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><a href="<?php echo $link; ?>"><?php echo $value['ProductName']; ?></a></td>
						 <?php /* <td><?php echo /*$p_inventory;*/ /* $value['InventoryLimit'];  ?></td> */ ?>
						<td><?php echo $value['ProductPrice'] ?></td>
						<td><?php echo $value['Id']; ?></td>
						<td><a href="<?php echo base_url(); ?>admin/products/edit/<?php echo $value['Id']; ?>" class="btn btn-info btn-small " >Edit</a></td>
					</tr>
					
					<?php	
						
				}
				?>
				</table>
				<?php
			}
			else{
				echo "Please add Product";
			}
				
				
		?>
		
	</div>
</body>
</html>