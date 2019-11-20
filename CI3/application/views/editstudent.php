<!DOCTYPE html>
<html>
<head>
	<title>students</title>
</head>
<body>
	<?php 

	if($this->session->flashdata('message'))
{
	echo $this->session->flashdata('message');
}
		?>
	<?php echo form_open('crud/updaterecords'); ?>
      <!-- <?php var_dump($returnid); ?>  -->
      
<?php 
 $data6 = array(
        'type'  => 'hidden',
        'name'  => 'userid',
        'id'    => 'userid',
        'value' => $returnid[0]["id"]        
);

echo form_input($data6);
?>
	<label>Fullname</label>
    <?php 
     $data1 = array(
        'name'          => 'fullName',
        'id'            => 'fullName',
        'value'         => $returnid[0]["fullName"],
        'placeholder'   => 'fullName' ,    
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_input($data1);echo'<br>';
    ?>
    <label>Email</label>
     <?php 
     $data2 = array(
        'name'          => 'email',
        'id'            => 'email',
        'value'         => $returnid[0]["email"],
        'placeholder'   => 'email'  ,  
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_input($data2);echo'<br>';
    ?>
     
    <label>Age</label>
     <?php 
      $data4 = array(
        'name'          => 'age',
        'id'            => 'age',
        'value'         => $returnid[0]["age"],
        'placeholder'   => 'age'   , 
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_input($data4);
    ?>

 <?php 
   $data5 = array(
        'name'          => 'submit',
        'id'            => 'mysubmit',
        'value'         => 'Update',       
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_submit($data5);
    ?>
	 <?php echo form_close(); ?>
</body>
</html>