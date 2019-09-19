<div class="loader" style="position:fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background:        url('http://smbseminar.com/assignment/assets/images/preloader.gif') 50% 50% no-repeat #fff; overflow:hidden;">
     </div>

<?php include( 'header.php');?>
<?php include( 'top_menubar.php');?>


<section class="assing_module">
    <div class="container">
        <div class="row">
            <div class="wrap">
                <form action="" autocomplete="on">
                    <div class="input_form">
                        <input type="text" class="serach_input form-control" id="search_text" placeholder="Search assignment, people">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php //var_dump($totalnoassignment); 
?>
<?php 
     //var_dump($assignment);
?>
<?php 
     // var_dump($view);
?>
<?php
        // var_dump($userstatus); 
?>
<section class="participants">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 wrap_parti" id="result">
                <ul>
                     <?php  $i=0;
                     ?>
                   <?php foreach($user as $row){  ?>
                                   <?php  $completetotal=0;$i=$i+1;?>
                                       
                    <li class="parti_row">
                        <div class="chunk-details">
                             <?php  if(($i % 2) == 0){ ?>
                            <div class="col-md-12 parti_info" id="<?=$row->contactid?>">
                                        <?php  }else{ ?>
                            <div class="col-md-12 parti_info1" id="<?=$row->contactid?>">  
                                        
                                      <?php   }?>
                                <div class="col-md-6 parti_name ">
                                      <?php  $currecheckid=$row->contactid;?>
                                   <p> <?=$row->name?><?php echo "(";?><?= $row->contactid?><?php echo ")"; ?></p>
                                </div>
                                <div class="col-md-3 details_comp">
                                      <?php 
                                      foreach($userstatus as $checkuserrow){ 
                                                                              $checkckeid=$checkuserrow->contact_id;
                                                                               if($checkckeid== $currecheckid){
                                                                               
                                                                                     $completetotal=$completetotal+1;
                                                                               }
                                                                           }
                                      ?>
                                    <span class="no_ass"><?=$completetotal?></span><span class="">/</span><span class=""><?=$totalnoassignment?> Assignments</span><span class="no_ass">Complete</span>
                                </div>
                                <div class="col-md-2 view_details">
                                    <p>View Details</p>
                                </div>
                                <div class="col-md-1 batch_count">
                                      
                                    <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                                    <p><?=intval($completetotal/3)?></p>
                                </div>
                            </div>
                            <!-- hide tabel -->
                            <div class="col-md-12 details_view" id="<?="a$row->contactid"?>">
                                 <?php $currentuserid=$row->contactid ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="name_parti"><?=$row->name?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                      <?php   foreach($assignment as $assignmentrow){
                                            $flag=0; ?>
                                        <tr>
                                            <td class="query_no"><?=$assignmentrow->aid?>.</td>
                                            <td class="query_write"><?=$assignmentrow->name?></td>
                                            <?php $currentassignemnt=$assignmentrow->aid; ?>
                                            <?php foreach($userstatus as $assignmentrow){
                                                     $cccurentassig=$assignmentrow->assignment_no;
                                                     $cccuruser=$assignmentrow->contact_id;
                                                     $cccurstatus=$assignmentrow->status;
                                                     $cccurstatoverdue=$assignmentrow->overdue;
                                            ?>
                                                   <?php  if(($cccuruser==$currentuserid)&&($cccurentassig==$currentassignemnt) ){
                                                                // echo  $cccuruser;echo $cccurentassig;
                                                                    if($cccurstatus==1){  ?>
                                                                              <?php if($cccurstatoverdue==0){ ?>    
                                                                               <td class="on-time12">Completed on time </td>
                                                                                <?php foreach($view as $viewrow){ 
                                                                                       $ccviewid=$viewrow->contactid;
                                                                                       $ccviewass=$viewrow->aid;
                                                                                       $ccviewfile=$viewrow->file;
                                                                                 ?>
                                                                                 <?php if(($cccuruser==$ccviewid)&&($cccurentassig==$ccviewass)){ ?>
                                                                                 
                          <td class="view-assi"><a  href="<?php echo base_url();?>uploads/2_submission/<?php echo $ccviewfile;?>" target="_blank" style="color:black;text-decoration: none;">View assignment</a></td>
                                                                                  <?php } ?>      
                                                                                 <?php } ?>
                                                                               <?php }else{  ?>
                                                                                <td class="on-time"><span style="color:red;">Completed late</span></td>
                                                                                 <?php foreach($view as $viewrow){ 
                                                                                       $ccviewid=$viewrow->contactid;
                                                                                       $ccviewass=$viewrow->aid;
                                                                                       $ccviewfile=$viewrow->file;
                                                                                 ?>
                                                                                 <?php if(($cccuruser==$ccviewid)&&($cccurentassig==$ccviewass)){ ?>
                                                                                       
                           <td class="view-assi"><a  href="<?php echo base_url();?>uploads/2_submission/<?php echo $ccviewfile;?>" target="_blank" style="color:black;text-decoration: none;">View assignment</a></td>
                                                                                  <?php } ?>      
                                                                                 <?php } ?>
                                                                                <!--<td class="view-assi">View assignment</td>-->
                                                                           
                                                                                 
                                                                             <?php   }?> 
                                                             <?php       $flag=$flag+1; }
                                                                 
                                                              } ?>
                                              <?php }?>
                                               <?php if($flag==0){ ?>
                                               <td class="on-time">pending</td>
                                               <td class="view-assi">View assignment</td>
                                               <?php } ?>
                                        </tr>
                                         <?php     }  ?>
                                    </tbody>
                                </table>
                            </div>
                          

                        </div>
                    </li>
                     
                   <?php } ?>   
                          


                </ul>
            </div>
        </div>
    </div>
</section>
<a href="#0" class="cd-top">Top</a>

<?php include( 'footer.php');?>
<script>

      $(document).ready(function() {
          $(".strong_active1").addClass('active');
          //$(".trd").addClass('active');

      });

     $(document).ready(function(){

         
         $(".parti_info").click(function(){
                var ac=$(this).attr('id');
                  var acd="#a"+ac;
                  console.log(acd);
            
               //alert('heyyy its calll');

              $(acd).slideToggle(500);

              $(acd).toggleClass("chunk_data");
          
              });


         $(".parti_info1").click(function(){
                
                  var ac=$(this).attr('id');
                  var acd="#a"+ac;
                  console.log(acd);

              $(acd).slideToggle(500);

              $(acd).toggleClass("chunk_data");
          
              });

         });

    //$(document).ready(function(){
           // $('.parti_info').click(function () {

            //$('.details_view').hide();      // hide previous
            //$(this).next().show('slow'); // show next element in dom (it will be <div> with class 'foo')

          //  $('.details_view').slideUp("slow"); 
            
          //  $(this).next().slideDown('slow');

        //});
    // });
</script>
<script>  
 /* $(document).ready(function(){  
     $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"<?php echo site_url('newadmin/search_name'); ?>",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#result').html(data);  
                     }  
                });  
           }  
           else  
           {  
                      $('#result').html('display this'); 
                        
           }  
      });  
 });  */
 </script>  
<script>  

      $('#search_text').keyup(function(){  
           var valThis = $(this).val().toLowerCase();  
            if(valThis == ""){
        $('ul > .parti_row').show();
    } else {
        $('ul > .parti_row').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
   };
  });
 </script>  



<script type="text/javascript">
 	jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});
 </script>
 <script type="text/javascript">
    $(window).load(function() {
   
    $(".loader").fadeOut("slow");
     });
</script>

