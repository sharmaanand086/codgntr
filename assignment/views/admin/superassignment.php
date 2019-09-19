<?php include( 'header.php');?>


<div class="loader" style="position:fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background:        url('http://smbseminar.com/assignment/assets/images/preloader.gif') 50% 50% no-repeat #fff; overflow:hidden;">
</div>
<?php include( 'top_menubar1.php');?>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.slimscroll1.js');?>"> </script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.slimscroll.js');?>"> </script>

<script type="text/javascript" src="<?=base_url('assets/admin_design/js/custom.js');?>"> </script>



<script>
	$(document).ready(function(){
	 
           $(window).load(function() {
           $(".loader").fadeOut("slow");
             });
           });
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $(".strong_active5").addClass('active');
    //$(".ssd").addClass('active');

});
</script>

<!-- 
<section class="folder_ass">
    <div class="container">
        <div class="row">
            <img class="img-responsive folder" src="<?=base_url('assets/images/dashboard/cancel.png');?>" alt="">
            <img class="img-responsive arrow" src="<?=base_url('assets/images/dashboard/Arrow.png');?>"  alt=""  style="width:390px;height:280px;">
        </div>
    </div>
</section> -->



<section class="assing_module">
    <div class="container">
        <div class="row">
            <div class="wrap">
                <form action="" autocomplete="on">
                    <div class="input_form">
                       <!-- <label for="search">Search assignment,people</label> -->

                        <input class="serach_input form-control" id="search" name="search" type="text"  placeholder="Search assignment, people">
                      <!--  <span class="spin"></span> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php //var_dump($view); 
?>
<?php  //var_dump($assignment);
  // echo "<br>";
?>

<?php  //var_dump($user);
  // echo "<br>";
?>

<?php  //var_dump($userstatus);
   //echo "<br>";
?>

<?php 
      
foreach($name as $row1){
           $nameuser=$row1->name;
 }
 //echo  $nameuser;
?>

<?php foreach($assignment as $row ){  $ttt=0; ?>
  <?php          $update=$row->udate;
                 $sudate=$row->subdate;
           
              $date = date_create($update);
              $date1= date_create($sudate);
        
             
             //var_dump($assignmentno);
              $currentassignment=$row->aid;
        ?>
        <?php 
               foreach($userstatus1 as $rowstatus1){
                                                    $chheckassign=$rowstatus1->assignment_no;
                                                      if($chheckassign==$currentassignment){
                                                                  $ttt=$ttt+1;
                                                          }
                                                  }
        ?>
      
<section class="assi_section post" id="assi_section<?php echo $row->aid;?>">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 seminar_modal">
                <div class="col-xs-12 assi-wrapp ">
                    <div class="assi_pull-left">
                        <img class="img-responsive" src="<?=base_url('assets/admin_design/images/dashboard/Assignment_Icon.png');?>">
                    </div>
                    <div class="assi-body">
                        <div class="assi-heading ">
                             <!--<h1><?php echo $row->aid; ?>.<?php echo $row->name; ?></h1>-->
                             <ul class="comments123" style="display: inline-block;"> <li class="comments12" id="<?php echo "$row->aid"; ?>"><h1 class="bhavesh"><?php echo $row->aid; ?>.<?php echo $row->name; ?></h1></li></ul>
                            <p><?php echo date_format( $date , 'j<\s\up>S</\s\up> F, Y');?></p>
                        </div>
                        
                        <div class="ass-objective">
                            <p><?php echo $row->discription;?></p>
                        </div>

<?php

foreach($question as $ques){
if($row->aid == $ques->aid){
//var_dump( $ques);
?>

				<div class="ass-objective1">
                            <p>Q<?php echo $ques->question_no; ?>. <?php echo $ques->question;?></p>
                        </div>
<?php

}


}

?>

                        <div class="ass_process">
                            <div class="btn-inline-wrap-letest_ass">
                               <?php  $iid=$row->aid;?>
                               <a href="<?php echo base_url();?>newadmin/editassignments/<?=$iid?>" class="view_btn btn_view-inline" alt=""> Edit </a>
                           </div>
                           <div class="ass_complete">
                               <img src="<?=base_url('assets/admin_design/images/dashboard/timmer.png');?>" alt="">
                               <p>Complete before : <?php echo date_format( $date1 , 'j<\s\up>S</\s\up> F, Y');?></p>
                           </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class=" user-comments new_comments<?php echo "$row->aid"; ?>" id="<?php echo "$row->aid"; ?>" value="<?php echo "$row->aid"; ?>">
                    <div class="notification">
                       <div class="wap_hide" id="<?php echo "b$row->aid"; ?>">
                          <img class="alert_chat yes_alert<?php echo "$row->aid"; ?>" src="<?=base_url('assets/admin_design/images/dashboard/New Comment.png');?>" alt="" style="display:none;">
                          <img  class="alert_chat_no no_alert<?php echo "$row->aid"; ?>" src="<?=base_url('assets/admin_design/images/dashboard/Comments.png');?>" alt="" style="display:none;">
                          <p><span id="count<?php echo "$row->aid"; ?>"></span></p> 
                       </div>
                        <h1 class="ass-det both_show" id="<?php echo "c$row->aid"; ?>">Assignment Details</h1>

                    </div>

                    <div class="commnt_count">
                        <div class="wap_hide1" id="<?php echo "d$row->aid"; ?>">
                           <img src="<?=base_url('assets/admin_design/images/dashboard/Tick.png');?>" alt="">
                           <span class="comm_no"><?=$ttt?></span>/<span class="comm_total"><?=$nnoofuser?></span>
                        </div>
                        <h1 class="cmmnt both_show" id="<?php echo "e$row->aid"; ?>">Comments</h1>
                    </div>
                </div>
                
                <!-- assgnment tabel start-->

       

        <div class="ass_wrapper" id="<?php echo "a$row->aid"; ?>">
            <!--<div class="div_wrapper" id="testDiv">-->
             <div class="div_wrapper">
                <ul class="main_wrapper">
                    <?php $i=0; ?>
                   <?php  foreach($user as $user1){$i=$i+1; ?>
                                <?php $currentusert=$user1->contactid; ?>
                                 <?php $cccheckcounter=0; ?>
                                 <?php if( ($i%2)==1){?>
                                 <li class="ass_list">
                                 <?php }else{ ?>
                                   <li class="ass_list1">
                                 <?php }?>
                         
                        <div class="name">
                      
                                <p><?=$user1->name?></p>
                               <!-- <p><?=$user1->contactid?></p>-->
                        </div>
                        <div class="time all_width">
                                 <?php foreach($userstatus1 as $rowstatus){ 
                                        
                                        $currentstatuserid=$rowstatus->contact_id;
                                        $currentstatassid=$rowstatus->assignment_no;
                                        $currentstatus=$rowstatus->status;
                                        $currentoverdue=$rowstatus->overdue;
                                      if(($currentusert==$currentstatuserid)&&($currentstatassid== $currentassignment)){ ?>
                                       
                                               
                                                 
                                            <?php       if($currentoverdue==0)
								            { 
												$cccheckcounter=$cccheckcounter+1; ?>
                                            <?php $ttt=$ttt+1;
											?>
                                                      <p>on time
                                                      <?php
                                                       $checkaa=0;
                       
                         foreach ($check as $rowsa) {
                         
                              if ($row->aid==$rowsa->myassign_id) {
                                  
                                  if($user1->contactid==$rowsa->mycontact_id)
                             {
                                     if($rowsa->check_status==1)
                              {
                                   $checkaa=1;
                              }
                             }
                        }
                             
                 }
                 if($checkaa==1)
                 {
                     ?>
                              <div  class="checkbox checkbox-success">
                        <input id="<?php echo $currentusert; ?>" type="checkbox" class="checkbox3" name="<?php echo $currentassignment;?>"  checked/>
                        <label for="checkbox3">
                            
                        </label>
                    </div> </p>
                     <?php
                     
                 }else
                 {
                     ?>
                              <div  class="checkbox checkbox-success">
                        <input id="<?php echo $currentusert; ?>" type="checkbox" class="checkbox3" name="<?php echo $currentassignment;?>" />
                        <label for="checkbox3">
                            
                        </label>
                    </div> </p>
                     <?php
                     
                 }
                                                      ?>
                                                      
                                             
                                              </div>  
                                        <div class="status all_width">  
                                       <?php             }if($currentoverdue==1){
                                       $cccheckcounter=$cccheckcounter+1; 
                                            $ttt=$ttt+1; 
											?>
													  <p>Completed late
													  
													  <?php
													  
													  $checkaa=0;
                       
                         foreach ($check as $rowsa) {
                         
                              if ($row->aid==$rowsa->myassign_id) {
                                  
                                  if($user1->contactid==$rowsa->mycontact_id)
                             {
                                     if($rowsa->check_status==1)
                              {
                                   $checkaa=1;
                              }
                             }
                        }
                         }
							if($checkaa==1)
							{
							   ?>
							   <div  class="checkbox checkbox-success">
                        <input id="<?php echo $currentusert; ?>" type="checkbox" class="checkbox3" name="<?php echo $currentassignment;?>"  checked />
                        <label for="checkbox3">
                            
                        </label>
                    </div> </p>
							   <?php
							    
							}
							else
							{
							    ?>
							    <div  class="checkbox checkbox-success">
                        <input id="<?php echo $currentusert; ?>" type="checkbox" class="checkbox3" name="<?php echo $currentassignment;?>" />
                        <label for="checkbox3">
                            
                        </label>
                    </div> </p>
							    <?php
							    
							}
													  ?>
													  
													  
                                              </div>  
                                        <div class="status all_width">  
                                        <?php
                                       }
                                        ?>
                                          <?php
                                                $batchcount=0;
                                                $batchcounts=0;
                                                foreach($view as $rowview){ 
                                                                         $currentviewid=$rowview->contactid;
                                                                         $currentviewassigid=$rowview->aid;
                                                                         $currentviewfile=$rowview->file;
                                                                           
                                                                         if(($currentviewid==$currentusert)&&($currentviewassigid==$currentstatassid)){ ?>
                                                                                   
                                                 <p><a href="#" id="<?php echo $user1->contactid; ?>" title="<?php echo $row->aid;?>" class="myview" style="color: white;text-decoration: none;" data-toggle="modal" data-target="#viewmodal">View</a></p>
                                                                                </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                                            <?php
                                                   foreach($userstatus as $rowrowst){
                                                                                     $rowrowcurrentid=$rowrowst->contact_id;
                                                                                     //var_dump($rowrowcurrentid);
                                                                                       if($rowrowcurrentid==$currentviewid)
                                                                                       {
                                                                                                  $batchcount= $batchcount+1;
                                                                                           }
                                                                                     } 
                                                  foreach($userstatus1 as $rowrowst1){
                                                                                     $rowrowcurrentid1=$rowrowst1->contact_id;
                                                                                     //var_dump($rowrowcurrentid);
                                                                                       if($rowrowcurrentid1==$currentviewid)
                                                                                       {
                                                                                                  $batchcounts= $batchcounts+1;
                                                                                           }
                                                                                     } 
                                        
                                      $abccc  =$batchcount+$batchcounts;
                                            ?>
                            <p><?=intval($abccc/3)?></p>
                            
                        </div>
                    </li>
                                                                               <!--<p><?=$currentviewfile?></p>-->
                                                                               
                                                                    <?php         }
                                                                                
                                                                         }
                                                 ?>
                                       
                                       
                               <?php      }
                                       
                                          
                                 } ?>
                                  <?php if($cccheckcounter==0){$batchcount=0;  ?>
                                  <p style="color:#6d6d6d">pending</p>
                                         </div>
                                 <div class="status all_width">
                            <p style="color:#6d6d6d">View</p>
                         
                           
                            
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                                          <?php
                                                   foreach($userstatus as $rowrowst){
                                                                                     $rowrowcurrentid=$rowrowst->contact_id;
                                                                                       if($rowrowcurrentid==$currentusert){
                                                                                                  $batchcount= $batchcount+1;
                                                                                           }
                                                                                     } 
                                            ?>
                            <p><?=intval($batchcount/3)?></p>
                        </div>
                    </li>
                                  <?php }else{ $currentstatassid=0;} ?>
                            
                      
               
                    
                    <?php } ?>
                     <!--<p>currentassignment:<?=$currentassignment?></p>-->
                </ul>
            </div>
            <!-- assgnment tabel end-->
            
             <!--  comments part start-->
            <div class="div_wrapper1">
                <div class="commt_wrapp" id="panel">
                    <div class="comment-here">
                         <form name="form1">
                            <div class="input-area">
                           <input type="text" id="uname" name="uname" style="display:none;" value="<?php echo  $nameuser; ?>"  disabled />
                                
                                <input type="text" class="addinput_controls search" name ="<?php echo $row->aid;?>" id="msg<?php echo $row->aid;?>" placeholder="Type your comment here. Press enter to post">
                                       <!--<input type="text" class="addinput_controls search" name ="msg" id="msg" placeholder="Type your comment here. Press enter to  post">-->
                                        <!-- <a href="#" onclick="submitChat()">send</a> -->
                                 <span class="glyphicon glyphicon-paperclip "></span>
                            </div>
                        </form>
                    </div>
                    <div class="chat_process" id="chat_process<?php echo $row->aid;?>">
                    </div>
                </div>
            </div>

            <!--  comments part end-->
                
            </div>
        </div>
        
        </div>


    </div>
</div>
 
</section>

<?php }?>
<a href="#0" class="cd-top">Top</a>

<section class="no_data_found" style="display: none;">
    <div >
        <h1>There is no data found</h1>
    </div>
</section>
  <div class="modal fade" id="viewmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title">
            <img class="img-responsive myimgs" src="<?=base_url('assets/admin_design/images/dashboard/stf.png');?>">
            <div class="mycontent">
              <div class="datas">
              <input type="hidden" value="" name="" class="hiddenassignid" />
              <input type="hidden" value="" name="" class="hiddencontactid" />
              </div>
                  <div  class="heading">
                    </div>
                  <div class="username_wow">
                  </div>
          </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="my_qa">
          
         </div>
       
           
         <div class="uploadd">
           <div class="mydocument">
           </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="view_btn btn_view-inline sendme" style="float:left;">Send</button>
          <button type="button" class="view_btn btn_view-inline nochanges" style="float:right;" data-dismiss="modal">No Changes</button>
        
        </div>
      </div>
      
    </div>
  </div>


<script>  

      $('#search').keyup(function(){  
          //alert('heyy');
           var valThis = $(this).val().toLowerCase();  
            if(valThis == ""){
        $('.comments123 > .comments12').show();
        $('.assi_section').show();
        $(".no_data_found").hide();
    } else {
        $('.comments123 > .comments12').each(function(){
            var text = $(this).text().toLowerCase();
            //alert(text);
            var abc=$(this).attr('id');
            var c="#assi_section"+abc;
            //alert(abc);
            if(text.indexOf(valThis) >= 0) { 
                $(this).show();
                $(c).show();
                var csd=text.indexOf(valThis);
                    //alert('if'+csd);
                
            }else{ 
                $(this).hide();
                $(c).hide();
                var csd=text.indexOf(valThis);
                    //alert('else'+csd);
                if ( $(".bhavesh:visible").length === 0)
                {
                     $(".no_data_found").show();
                }
                else
                {
                    $(".no_data_found").hide();
                }
                
            };
        });
   };
  });
  $(document).ready(function() {

  $('#search').keypress(function(event){
    
    if (event.keyCode == 10 || event.keyCode == 13) 
    {
        event.preventDefault();
    }
  });
});
 </script>
<script>
   
     
    $(function() {

        $(".input input").focus(function() {

            $(this).parent(".input").each(function() {
                $("label", this).css({
                    "line-height": "18px",
                    "font-size": "15px",
                    "font-weight": "100",
                    "top": "2px"
                })
                $(".spin", this).css({
                    "width": "100%"
                })
                $(".input input").css({
                    "color": "#000",
                    "font-weight": "600",
                    //"height": "50px",
                    "top": "5px"
                })
            });
        }).blur(function() {
            $(".spin").css({
                "width": "0px"
            })
            if ($(this).val() == "") {
                $(this).parent(".input").each(function() {
                    $("label", this).css({
                        "line-height": "60px",
                        "font-size": "20px",
                        "font-weight": "300",
                        "top": "0px"
                    })
                });

            }
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
               var ttchange=0;
    $(".user-comments").click(function(e){
       //$(".ass_wrapper").slideToggle(500);
             var a = $(this).attr('id');
             
       // $(".wap_hide").toggleClass("not_show").delay(500);
           
        $(".new_comments"+a).toggleClass("border-radius_set",500);


       // $(".both_show").toggleClass("_show");
                
         //ttchange=ttchange+1;
           // alert(ttchange);
            
                 
         
           
           e.preventDefault();
      var $div = $(this).next('#a'+a);
      $(".ass_wrapper").not($div).slideUp("slow");
      $(".both_show").not($div).hide();
      
      $(".wap_hide").not($div).show();
      $(".wap_hide1").not($div).show();
       
           
      
        if ($div.is(":visible")) {
            $div.slideUp("slow");
           // alert(a);
            //alert(""+a);
            $("#b"+a).show();
           $("#d"+a).show();
           $("#c"+a).hide();
           $("#e"+a).hide();
   
        }  else {
            
            //alert(a);
           $div.slideDown("slow");
           getChangeStatus(a);
           getCountmessage(a);
           $("#c"+a).show();
           $("#e"+a).show();
           $("#b"+a).hide();
           $("#d"+a).hide();
           //alert('show');
           }
         //var hideshow='#assi_section'+a;
            // if(ttchange==1){
                                //alert('this is for first');
             //                   $(".assi_section").hide();
              //                  $(hideshow).show();
                              
             //               }
             // if(ttchange==2){
                              // alert('this is second');
             //                  $(".assi_section").show();
             //                  ttchange=0;
             //                }
            
             //var abc1234=$(this).attr('value');
             //alert(abc1234);
            // var ts='#'+a;
            // alert(ts);
            
             //var abc2='a'+a;
            // var th='#'+abc2;
             //alert(th);

             //var abc3='b'+a;
             //var th1='#'+abc3;
            // alert(th1);

            // var abc4='c'+a;
             //var th2='#'+abc4;
             //alert(th2);

             //var abc5='d'+a;
             //var th3='#'+abc5;
            // alert(th3);
 
            // var abc6='e'+a;
            // var th4='#'+abc6;
             //alert(th4);
             
             //var abc7='j'+abc1;
             //var th5='#'+abc7;
             //alert(th5);

             
             //$(th).slideToggle(500);


             //$(th1).toggleClass("not_show").delay(500);
             //$(th3).toggleClass("not_show").delay(500);

             //$(ts).toggleClass("border-radius_set",500);
             //$(th2).toggleClass("_show");
             //$(th4).toggleClass("_show");

        // setInterval(function(){ 
           //getSuccessmessage(a);
          
        //}, 1000);
 
   });

       // setInterval(function(){   
       //alert(same_id);
       //for(var same_id=1;same_id < 13;same_id++){
         //getCountmessage(same_id);
       //   } 
        //}, 500);


$(".myview").click(function(){
var someid=$(this).attr('id');
var my_aid=$(this).attr('title');
//alert(my_aid);
$('.hiddencontactid').val(someid);
$('.hiddenassignid').val(my_aid);
sendme(someid,my_aid);
sendme_myquestion(someid);
sendmeassname(my_aid);
getfile(someid,my_aid);
getuploadfile(someid,my_aid);

});

$(".sendme").click(function(){
    
var a=$('.hiddenassignid').val();
//alert(myassignment);
var c=$('.hiddencontactid').val();
//alert(contact_id);
if(confirm("Click OK! To send email to ")==true){
               //alert(myid);
                //alert(b);
                allresendmail(c,a);

             // alert("mail sent");
            }
            else{
              unresendmail(contact_ids,myassignments);
            }

});

    $( '.nochanges' ).click(function() {
// alert(1);

var myassignment=$('.hiddenassignid').val();
var contact_id=$('.hiddencontactid').val();
//alert(contact_id);

    if(confirm("Click OK! To send email to ")==true){
               //alert(myid);
                //alert(b);
                checkedmail(contact_id,myassignment);

             // alert("mail sent");
            }
            else{
              uncheckmail(contact_id,myassignment);
            }

 
});
   
   });
   </script>
   
   
      <?php

         foreach ($gettotalass as $roew){
    
        ?>
<script>
     $(document).ready(function() {
     
     //getSuccessmessage(<?php echo $roew->aid;?>);
     //getCountmessage(<?php echo $roew->aid;?>);

     });
    
    setInterval(function(){ 
        
    //getSuccessmessage(<?php echo $roew->aid;?>);
    //getCountmessage(<?php echo $roew->aid;?>);
    
}, 10000);
</script>   
      <?php  
    
      }
        ?>

<!-- /******************************comment start ***************************************/ -->
    <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('input propertychange', "textarea[name='Notes']", function () {
   var a=$(this).val();
   var c=$(this).attr('id');
   var all=c.length;
    var n = c.indexOf("qu");
    var id=c.substr(0, n);
   //alert(id);
    var assnoindex = c.indexOf("o");
    var v=assnoindex+1;
    var assno=c.substr(v, all);
    //alert(assno);
    var aa = c.indexOf("u");
    aca=aa+1;
     var bb = c.indexOf("a");
  var queno=c.substr(aca, 1);
  //alert(queno); 
  //alert(a);
  resetans(a,assno,id,queno);
  
});
});
</script>

    <script type="text/javascript">

$(".addinput_controls").on("keydown",function search(e) {

    if(e.keyCode == 13) {
         var id1 = $(this).attr('name');
          //alert(id1);
         getSuccessOutput(id1);
         getSuccessmessage(id1);
         
   // submitChat();
     document.getElementById('msg'+id1).value = "";

    }

});

function resetans(a,assno,id,queno){
          // alert(id1);
    $.ajax({
           "url": "<?php echo site_url('newadmin/ans_reset')?>",
           "type": "POST",
           data: {msg:a,name:assno,id:id,qno:queno},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_process').html(result);
              
          console.log(result);
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore !!');
        },
    });
    return false;
}

function allresendmail(a,c){
          // alert(id1);
    $.ajax({
           "url": "<?php echo site_url('newadmin/allmsgre')?>",
           "type": "POST",
           data: {ass:a,con:c},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_process').html(result);
              
          //alert(result);
          sendmailwith(a,c);
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore !!');
        },
    });
    return false;
}

function sendmailwith(a,c)
{
    
     $.ajax({
           "url": "<?php echo site_url('newadmin/sendmailwith')?>",
           "type": "POST",
           data: {ass:a,con:c},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_process').html(result);
              
          //alert(result);
        
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore !!');
        },
    });
    return false;
    
}


function getSuccessOutput(id1) {
          // alert(id1);
    $.ajax({
           "url": "<?php echo site_url('newadmin/chatss')?>",
           "type": "POST",
           data: {msg: $("#msg"+id1).val(),name: $("#uname").val(),id:id1},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_process').html(result);
              getSuccessmessage();
          // alert('success in called !!');
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore !!');
        },
    });
    return false;
}
function getSuccessmessage(id1) {
    $.ajax({
           "url": "<?php echo site_url('newadmin/chat_messagess')?>",
           "type": "POST",
           data: {msg: $("#msg").val(),name: $("#uname").val(),id:id1},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               $('#chat_process'+id1).html(result);
          // alert('success in called11111 !!');
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore1111 !!');
        },
    });
    return false;
}

function getChangeStatus(a) {
    $.ajax({
           "url": "<?php echo site_url('newadmin/chat_messagesss1234')?>",
           "type": "POST",
           data: {id:a},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_process'+id1).html(result);
          // alert('success in called11111 !!');
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore1111 !!');
        },
    });
    return false;
}

function getCountmessage(id1) {
    $.ajax({
           "url": "<?php echo site_url('newadmin/chat_messagessss12')?>",
           "type": "POST",
           data: {id:id1},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               
               if(result==0){
                   $('#count'+id1).html(result);
                  $('#count'+id1).hide();
                   $(".no_alert"+id1).show();
                   $(".yes_alert"+id1).hide();
               }else{
                   $(".yes_alert"+id1).show();
                   $(".no_alert"+id1).hide();
                   $('#count'+id1).html(result);
                   $('#count'+id1).show();
               }
               
               
          // alert('success in called11111 !!');
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore1111 !!');
        },
    });
    return false;
}
function sendme(someid,my_aid){
 $.ajax({
           "url": "<?php echo site_url('newadmin/myanswers')?>",
           "type": "POST",
           data: {name:someid,id:my_aid},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
            //alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_processs'+id1).html(result);
             //alert(1);
          //alert(result);
          $('.my_qa').html(result);
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
       ///alert('errore1111 !!');
        },
    });
    return false;


}
function sendme_myquestion(my_aid){
 $.ajax({
           "url": "<?php echo site_url('newadmin/myquestions')?>",
           "type": "POST",
           data: {id:my_aid},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
            //alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_processs'+id1).html(result);
             //alert(1);
          //alert(result);
          $('.username_wow').html(result);
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
       ///alert('errore1111 !!');
        },
    });
    return false;


}
function sendmeassname(my_aid){
 $.ajax({
           "url": "<?php echo site_url('newadmin/getassname_name')?>",
           "type": "POST",
           data: {id:my_aid},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
            //alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_processs'+id1).html(result);
             //alert(1);
          //alert(result);
          $('.heading').html(result);
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
       ///alert('errore1111 !!');
        },
    });
    return false;


}
function getfile(someid,my_aid){
 $.ajax({
           "url": "<?php echo site_url('newadmin/getmyfile')?>",
           "type": "POST",
           data: {name:someid,id:my_aid},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
            //alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_processs'+id1).html(result);
             //alert(1);
          //alert(result);
         // $('.my_qa').html(result);
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
       ///alert('errore1111 !!');
        },
    });
    return false;


}

function checkedmail(contact_id,myassignment){
 $.ajax({
           "url": "<?php echo site_url('newadmin/mailme')?>",
           "type": "POST",
           data: {name:contact_id,id:myassignment},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
            //alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_processs'+id1).html(result);
             //alert(1);
         // alert(result);
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
       ///alert('errore1111 !!');
        },
    });
    return false;


}



 //setInterval(function(){ 
      //     getSuccessmessage();
        //}, 1000);
</script>
<!-- /******************************comment end ***************************************/ -->

<!-- /******************************scrolll ***************************************/ -->

<script type="text/javascript">
    $(function(){
  
        
       $('.div_wrapper').slimscroll({
        height: '250px'
      }).parent().css({
        background: '#237FAD',
        border: '2px dashed #184055'
      });


    });
</script>


<script type="text/javascript">
    $(function(){
     
        $('.chat_process').slimscroller({
        height: '250px'
      }).parent().css({
        background: '#237FAD',
        border: '2px dashed #184055'
      });


    });
</script>
<!-- <script type="text/javascript">

  //enable syntax highlighter
  prettyPrint();

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3112455-22']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script> -->


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




