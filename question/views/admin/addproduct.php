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
	<div class="container">
		<h4><a href="<?php echo base_url(); ?>admin/user/logout" > Log Out </a></h4>
		<h2> Add Product </h2>
		<hr>
		<form action="<?php echo base_url(); ?>admin/products/save" method="post" >
			<table >
				<tr>
					<td>Product Name</td>
					<td><input type="text" name="ProductName" ></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="ProductPrice" ></td>
				</tr>
				<tr>
					<td>Short Description</td>
					<td><textarea name="ShortDescription" ></textarea> </td>
				</tr>
				<tr>
					<td><input type="submit" value="Add Product" ></td>
					<td><a href="<?php echo base_url(); ?>admin/products" > Cancel </a> </td>
				</tr>
			</table>	
		</form>	
		
	</div>
</body>
</html>