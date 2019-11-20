<!DOCTYPE html>
<html>
<head>
	<title>all</title>
</head>
<body>
	<?php 

	if($this->session->flashdata('message'))
{
	echo $this->session->flashdata('message');
}
		?>
	<table border="1">
	    <?php if($allStudents->num_rows() > 0 ): 
	    	foreach ($allStudents->result() as $student ):?>
	         <tr>
	         	<td><?php echo $student->id ?></td>
				<td><?php echo $student->fullName ?></td>
				<td><?php echo $student->email ?></td>
				<td><?php echo $student->password ?></td>
				<td><?php echo $student->age ?></td>
				<td><a href="<?php echo site_url('Crud/editstudents/'.$student->id); ?> ">edit</a>&nbsp;
					<a href="<?php echo site_url('Crud/deletestudents/'.$student->id); ?> ">delete</a> </td>
				 
	        </tr>		 

	    	<?php endforeach; ?> 
         <?php else: ?> 
		      students not exists
        <?php endif; ?>
</table>
</body>
</html>