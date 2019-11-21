<!DOCTYPE html>
<html>
<head>
	<title>crud</title>

</head>
<body>

	 <fieldset>
    <legend>Login</legend>
    <?php
   if($this->session->flashdata('error')){
   	echo $this->session->flashdata('error');
   }
	?>
     <div class="form-group">
      <label for="exampleInputEmail1">Name  </label>
      <input type="text" class="form-control name" name="name"   aria-describedby="emailHelp" placeholder="Enter email">
      
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control email" name="Email"  aria-describedby="emailHelp" placeholder="Enter email">
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control password" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
    
    <input type="submit" name="submit" value="Login" class="btn btn-primary mysubmit">
<div  class="feedback"></div>
<div  class="dynamicontentdiv"></div>

    <div> 
    <table border="1" class="mytable">
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Date</th>
      <th>edit</th>
      <th>delete</th>
<?php   if($allrecords): ?>
<?php foreach ($allrecords->result_array() as $std): ?>
          <tr class="tr<?php echo $std['stid']; ?>">
             <td class="dyid<?php echo $std['stid']; ?>">
              <?php echo $std['stid']; ?>                
              </td>
            <td class="dyName<?php echo $std['stid']; ?>">
              <?php echo $std['stName']; ?>                
              </td>
             <td class="dyEmail<?php echo $std['stid']; ?>">
              <?php echo $std['stEmail']; ?>                
              </td>
              <td class="dyDate<?php echo $std['stid']; ?>" >
                <?php echo $std['stDate']; ?>
                
              </td>
    <td> 
      <a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($std['stid']);  ?>" data-id="<?php echo  $std['stid']; ?>" class="edit">
       edit
       </a>
     </td>
     <td> 
      <a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($std['stid']);  ?>" data-id="<?php echo  $std['stid']; ?>" class="delete">
       delete 
      </a>
       </td>
          </tr>

<?php endforeach; ?>
<?php else: ?>

  data not exists
<?php endif; ?>
    </table>
</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
 <script > 
  	var surl = "<?php echo site_url(); ?>";

  </script>
<script src="<?php echo base_url('assets/js/custom.js'); ?>"> </script>
</body>


</html>