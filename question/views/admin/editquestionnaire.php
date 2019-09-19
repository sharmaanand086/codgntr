<?php require_once "header.php"; ?>
		  		<li class="active">Edit</li>
			</ol>
		
		<h2> Edit Questionnaire </h2>
		<hr>
		<form action="<?php echo base_url(); ?>admin/questionnaire/update" method="post" >
			
			
			<div class="row">
						<div class="col-sm-2">	
							<b>Title</b>
						</div>
						<div class="col-sm-10">
							<input type="text" name="title" value="<?php echo $title; ?>" required  />
						</div>
					</div>	
					<br/>
					<div class="row">
						<div class="col-sm-2">	
							<b>Short Description</b>
						</div>
						<div class="col-sm-10">
							<textarea name="ShortDescription" ><?php echo (isset($min_desc))? $min_desc:" "; ?></textarea> 
							<input type="hidden" name="questionnaire_id" value="<?php echo $questionnaire_id; ?>" />
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-2">	
							<b>Question Per Page</b>
						</div>
						<div class="col-sm-10">
							<select class="selectpicker btn-inverse" name="per_page" >
							  	<option value="3"  <?php echo ($per_page == 3 ) ? "selected" : "" ; ?> > 3</option>
							  	<option value="5"  <?php echo ($per_page == 5 ) ? "selected" : "" ; ?> > 5</option>
							  	<option value="10" <?php echo ($per_page == 10 )? "selected" : "" ; ?> > 10</option>
							 </select> 
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-2">	
							<b>Status</b>
						</div>
						<div class="col-sm-10">
							<select class="selectpicker btn-inverse" name="status" >
							  	<option value="0" <?php echo ($status == 0 ) ? "selected" : "" ; ?> > Enable </option>
							  	<option value="1" <?php echo ($status == 1 ) ? "selected" : "" ; ?>  >  Disable </option>
							  </select> 
						</div>
					</div>
					<br/>
					
					<div class="row">
						<div class="col-sm-2">	
							<b>Timer</b> 
						</div>
						<div class="col-sm-1">
							<select class="selectpicker btn-inverse" name="minutes" >
								<option value="0"  > Minutes </option>
							  	<?php for ($i=10; $i <= 60 ; $i+=10 ) { 	?>
									<option value="<?php echo $i; ?>"  <?php echo ($minutes == $i ) ? "selected" : "" ; ?> > <?php echo $i; ?> </option>
							  	<?php  echo $i; } ?>
							 </select> 
						</div>
						
						<div class="col-sm-9">
							<select class="selectpicker btn-inverse" name="seconds" >
								<option value="0"  > Seconds </option>
							  	<?php for ($i=15; $i <= 60 ; $i+=15 ) { 	?>
									<option value="<?php echo $i; ?>" <?php echo ($seconds == $i ) ? "selected" : "" ; ?> > <?php echo $i; ?> </option>
							  	<?php  echo $i; } ?>
							 </select> 
						</div>
					</div>
					<br/>
					<br/>
					<input class="btn btn-primary" type="submit" value="Update Questionnaire" >
					<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/questionnaires" > Cancel </a>
		</form>	
	
	</div>
</body>
</html>