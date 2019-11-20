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
	<?php echo form_open('crud/newuser'); ?>
	<label>Fullname</label>
    <?php 
     $data1 = array(
        'name'          => 'fullName',
        'id'            => 'fullName',
        'value'         => '',
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
        'value'         => '',
        'placeholder'   => 'email'  ,  
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_input($data2);echo'<br>';
    ?>
    <label>Password</label>
     <?php 
     $data3 = array(
        'name'          => 'password',
        'id'            => 'password',
        'value'         => '',
        'placeholder'   => 'password'   , 
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_input($data3);echo'<br>';
    ?>
    <label>Age</label>
     <?php 
      $data4 = array(
        'name'          => 'age',
        'id'            => 'age',
        'value'         => '',
        'placeholder'   => 'age'   , 
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_input($data4);
    ?>	 
 <?php 
   $data5 = array(
        'name'          => 'submit',
        'id'            => 'mysubmit',
        'value'         => 'mysubmit',       
        'style'         => 'width:25%;padding:2px;margin:3px;'
     );
     echo form_submit($data5);
    ?>
	 <?php echo form_close(); ?>
</body>
</html>