<?php require 'header.php'; ?>
	</ol>
		
		<div class="row" >
			<div class="col-sm-8" >
				<h2> Questionnaires </h2>
			</div>
			<div class="col-sm-4" >
				<span class="AddButton" ><a href="<?php echo base_url(); ?>admin/questionnaire/add"  class="btn btn-primary btn-lg "  > Add Questionnaires </a> </span>
			</div>
		</div>	
		
		<?php  
			if( isset($_GET['message']) )
			{
				?>
				<div class="actionMessage"> <b><?php echo $_GET['message']; ?></b></div>
				<?php
			}
		
		 ?>
		
		<?php
			if( $questionnaires )
			{
				?>
				<table width="100%" border="0" class="table table-striped table-hover" >
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Date</th>
						<th>Questionnaire ID</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				<?php
				
				foreach ($questionnaires as $key => $value) 
				{
					
					?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['title'] ?></td>
						<td><?php echo $value['date'] ?></td>
						<td><?php echo $value['questionnaire_id']; ?></td>
						<td><?php echo ( $value['status'] == 0 ) ?  "Enable" : 'Disable'; ?></td>
						<td>
							<a href="<?php echo base_url(); ?>admin/questionnaires/edit/<?php echo $value['questionnaire_id']; ?>" class="btn btn-info btn-small " >Update</a>
							<a href="<?php echo base_url(); ?>admin/questionnaires/addQuest/<?php echo $value['questionnaire_id']; ?>" class="btn btn-info btn-small " >Question</a>
							<a href="<?php echo base_url(); ?>showQuestionOpt/<?php echo $value['questionnaire_id']; ?>" class="btn btn-info btn-small " > View </a>
							<a title="delete <?php echo $value['title'] ?>" href="<?php echo base_url(); ?>admin/questionnaires/delete/<?php echo $value['questionnaire_id']; ?>" class="confirmClick btn btn-info btn-small " >Delete</a>
							<a href="#" onclick="getMarkByOnLoad( <?php echo intval($value['questionnaire_id']); ?> );" data-toggle="modal"  data-target="#marksModal" class="btn btn-info btn-small" > Marks </a>
							<a href="#" onclick="CopyQnSetQnId(<?php echo intVal($value['questionnaire_id']); ?>)"  data-toggle="modal"  data-target="#newQnModal" class="btn btn-info btn-small" > Copy </a>
						</td>
					</tr>
					
					<?php	
						
				}
				?>
				</table>
				
				
		
				<?php
			}
			else{
				echo "<b> Please add Questionnaires. <b/>";
			}
				
				
		?>
		
	</div>
	
						
					<!-- Mark -->
							<div class="modal fade" id="marksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog" style="width:90%;" >
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Mark Lists </h4>
							      </div>
							      <div class="modal-body">
							      	<div id="marksModalMsg" ></div>
							      		  <div id="userInfoTable" >
								       		Mark is empty.
										  </div>
								      </div>
							     </div>	
							    </div>
							  </div>
							<!--</div> -->
							
				<!-- Copy Questionnaire -->
						<div class="modal fade" id="newQnModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel"  >Copy Questionnaires, Name of new Questionnaire  </h4>
							      </div>
							      <div class="modal-body">
							      	<div class="row">
										<div class="col-sm-2">	
											Title
										</div>
										<div class="col-sm-10">
											<input type="text" id="title" required  />
										</div>
									</div>	
								 </div>
							      <div class="modal-footer">
							        <input type="hidden" id="qn_id"  />
							        <input type="hidden" id="ShortDescription"  />
							        <input type="hidden" id="per_page"  />
							        
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" onclick="return copyQn();" class="btn btn-primary"> Save </button>
							      </div>
							    </div>
							  </div>
							</div>
									
	
	<script>
	
	function getMarkByOnLoad( $qn_id, message )
	{
		
		var msg = (message === undefined) ? false : message;
		
		if ( $qn_id <= 0 )
		{
			return false;
		}
						
		$.ajax(
		{
			type: "POST",
			url: "<?php echo base_url(); ?>admin/user/showMarksByQnId",
			data: "qn_id="+$qn_id,
			cache: false,
			success: 
					function(data)
					{
						
						
						$('#userInfoTable').html(data);
						$('#marksModalMsg').empty();
						
						if((data == ""))
						{
							$('#marksModalMsg').html('<b> Mark List is empty.</b>');
						}
						
						if ( msg )
						{
							$('#marksModalMsg').html('<b> '+msg+' </b>');
							$('#marksModalMsg').css("background-color","#5BC0DE");
						}
						
					}
		});
		
	}
	
	function deleteUserinfo( user_id, q_id)
	{
			if ( user_id <= 0  )
			{
				alert( "Invalid UserInfos." );
			}
			
			$.ajax(
			{
				type: "POST",
				url: "<?php echo base_url(); ?>admin/user/deleteUserinfoByUserId",
				data: "u_id="+user_id,
				 cache: false,
				success: 
					function(data)
					{
						$('#userInfoTable').empty();
						getMarkByOnLoad( q_id, data );
					}
			});
		}
	
	function CopyQnSetQnId( qn_id )
	{
		$('#qn_id').val( qn_id );
		$.ajax(
			{
				type: "POST",
				url: "<?php echo base_url(); ?>admin/questionnaires/getQnInfoByQnIdWithAjax",
				data: "qn_id="+qn_id,
				cache: false,
				dataType: 'json',
				success: 
					function(data)
					{
						var title = data['qn_info']['title'];
						$('#title').val(" Copy "+ title);
						$('#ShortDescription').val( data['qn_info']['min_desc'] ); 
						$('#per_page').val( data['qn_info']['per_page'] );
					}
						
			});
		
	}
	
	function copyQn()
	{
		var old_qn_id 			=  $('#qn_id').val();
		var title 				=  $('#title').val();
		var ShortDescription 	=  $('#ShortDescription').val(); 
		var per_page 			=  $('#per_page').val();
		
		$.ajax(
			{
				type: "POST",
				url: "<?php echo base_url(); ?>admin/questionnaires/copyQnbyQnId",
				data: "old_qn_id="+old_qn_id+"&title="+title+"&ShortDescription="+ShortDescription+"&per_page="+per_page,
				cache: false,
				success: 
					function(data)
					{
						$('#newQnModal').hide();
						window.location = "<?php echo base_url(); ?>admin/questionnaires?message="+data;
					}
						
			});
		
	}
		
	</script>
	
</body>
</html>