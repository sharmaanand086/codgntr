<?php include( 'header.php');?>

<div class="loader" style="position:fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background: url('http://smbseminar.com/assignment/assets/images/preloader.gif') 50% 50% no-repeat #fff;">
</div>
<div class="loader12" style=" "></div>
<?php include( 'top_menubar.php');?>
<?php include( 'middle_navigation_bar.php');?>

<?php

?>

<style>
.inner1 {
    color: #000;
    display:inline-block;
    text-align: center;
    border: 3px dashed #696969;
    border-radius: 10px;
    padding: 50px 110px 30px;
    //margin-left: 385px;
}
.drop_box{
    width: 400px;
    height: 290px;
    margin: auto;
    position:relative;
    bottom : 350px;
    text-align : center;
}
.form-group a{
 position:relative;
    bottom : 50px;
 text-decoration:none;
left : 270px;

}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<!--<script src="<?=base_url('assets/js/uploading.js');?>"></script>-->



<script>
    $(document).ready(function(){

     $(window).load(function() {
         $(".loader").fadeOut("slow");
         });
        var id;
        $(".assignsubmit").click(function(){
              id = $(this).attr('id');
             //alert(id);
           var act= $(".changeaction").attr('id');
              //alert(act);
         if(act==0){
                     $("#myform").attr("action", "editsolution/" + id);
                     
                      $("#myModal").modal('show');
            
             }else{
             
                 $("#myform").attr("action",id);
                 $("#myModal").modal('show');
             }
         })  
         
           $('#solutionfile').change(function() {
                 // alert('file is submitted');
                 $('.loader12').show();
               $('.losser').show();
                $("#myModal").modal('hide'); 
               $('body').css({

               'overflow-y': 'hidden',
                 });
              $("#myform").submit();
              
          });

    var ffsize=$(".filesize").attr('id');
   //alert(ffsize);

  
   var xyz=  $(".change123").attr('id');
   //alert(xyz);
   var xyz1='#'+xyz;
   if(ffsize > 0)
   {
      
      $(".latest_assi-cmp_wrapp").css({
                            //"background": "#a5bd52",
                         "display":"none",
                            });
      
      var b=  $(".changecol").attr('id'); 
          
                     // alert(b);
                      var bb1='#'+b;
                     //$(bb1).not(this).hide();
                     
                     //alert(bb1);
                     $(bb1).css({
                           // "background": "#a5bd52",
                            "display":"block",
                             });
                             $(".amitsir").css({
                            //"background": "#a5bd52",
                         "display":"none",
                            });
    
     //alert('het');

   }
 

         
         var c=ffsize/100;
   var progression = 0,
    progress = setInterval(function() 
    {
    //alert('heyy');
        $('#progress1 .progress-text').text(Math.round(progression*c) + 'kb /'+ffsize+'kb');

        $('#progress1 .progress-bar').css({'width':progression+'%'});
        if(progression == 100) {
            clearInterval(progress);
             $(".row123").hide();
             
             $(".latest_assi-cmp_wrapp").css({
                            "background": "#a5bd52",
                         "display":"block",
                            });
                             $(".amitsir").css({
                            //"background": "#a5bd52",
                         "display":"block",
                            });
                        $('.ass_complete-view').css({
                           "display": "inline-block",
                         
                            });

                          var abc2 = $(".changefont").attr('id');
               //alert(abc2);
                      var c123='#'+abc2;
                      var c223=c123+' h1'; 
                      var c323=c123+' p';
                       
                  
                      $(c223).css({
                            "color": "#fff",
                             });
                      $(c323).css({
                            "color": "#fff",
                             });
  
                       var act= $(".changeaction").attr('id');
                    var act1="#vr"+act;
        //alert(act1);
                   $(act1).css({
                            "color": "#fff",
                            "border": "2px solid #fff",
                             });
        
        $(".submit_class1"+act).css({
                             "color": "#fff",
                            "border": "2px solid #fff",
        });

 
                        var abc123 = $(".changemidfont").attr('id');
                      var b123='#'+abc123;
                     // alert(b1);
                      var b223=b123+' p';
                      var b323=b123+' span';                      
                  
                          $(b223).css({
                            "color": "#fff",
                             });
                             $(b323).css({
                            "color": "#fff",
                            "font-family": "MyriadPro-Bold",
                             });

                     var abc523 = $(".newchangeimg").attr('id');
                     var f123='#'+abc523;
                 
                     var abc623 = $(".changeimg").attr('id');
                     var g123='#'+abc623;

                     $(f123).css({
                            "display": "none",
                             });
                      $(g123).css({
                            "display": "inline-block",
                            //"float":"left",
                            //"padding": "70px 68px 70px 58px",
                             }); 

                       $(act1).hover(function(){
                             
                             $(this).css("border", "2px solid #000");
                             
                             },function(){
                             $(this).css("border", "2px solid #fff");
                              });
                         $(".submit_class1"+act).hover(function(){
                             
                             $(this).css("border", "2px solid #000");
                             
                             },function(){
                             $(this).css("border", "2px solid #fff");
                              });

 
          } else{
          
          //alert('heyy');
          progression += 10;

          var act12= $(".changeaction").attr('id');

                        var act1="#vr"+act12;
        
       
        var abbbc='.submit_class1'+act12;
        $(abbbc).css({
                            "color": "#000",
                            "border": "2px solid #000",
        });

          $(act1).css({
                            "color": "#000",
                            "border": "2px solid #000",
                             });

          //$("#"+xyz1).css({
                            //"background": "#a5bd52",
                       //  "display":"block",
                        //    });
           $("#ia"+act12).css({
                            //"background": "#a5bd52",
                         "display":"block",
                            });
           var b=  $(".changecol").attr('id');
           var b1='#'+b;
           //alert(b1);
           //alert('heyy');
            $(b1).css({
                           "background": "#fff",
                         
                            });
            var c1=  $(".changecomplete").attr('id');
           var c11='#'+c1
                //alert(c11);
              $(c11).css({

                           "display": "none",
                         
                            });
             $(c11).hide();

            var abc2 = $(".changefont").attr('id');
               //alert(abc2);
                      var c123='#'+abc2;
                      var c223=c123+' h1'; 
                      var c323=c123+' p';
                       
                  
                      $(c223).css({
                            "color": "#d4b734",
                             });
                      $(c323).css({
                            "color": "#000",
                             });


          
              var abc123 = $(".changemidfont").attr('id');
                      var b123='#'+abc123;
                     // alert(b1);
                      var b223=b123+' p';
                      var b323=b123+' span';                      
                  
                          $(b223).css({
                            "color": "#000",
                             });
                             $(b323).css({
                            "color": "#000",
                            "font-family": "MyriadPro-Bold",
                             }); 

                     var abc523 = $(".newchangeimg").attr('id');
                     var f123='#'+abc523;
                 
                     var abc623= $(".changeimg").attr('id');
                     var g123='#'+abc623;

                     $(f123).css({
                            "display": "inline-block",
                            //"float":"left",
                            //"padding": "70px 68px 70px 58px",
                             });
                      $(g123).css({
                            "display": "none",
                             });

                      

          }
           
       
    }, 500);
        
          
     });
</script>
<script>
    
</script>
<?php //echo  $nnoofassignment;
foreach($checktooltip as $tool2){
$tooltipas12=$tool2->sttooltip;
//var_dump($tooltipas12);
}
if($tooltipas12==1)
{
?>
        <script>
        $(document).ready(function() {
      $("#hide-tooltip").hide();
          });
       </script>

<?php
}
else
{
?>

     <script>

        $(document).ready(function() {
      //$("#hide-tooltip").show();
          });
       </script>

<?php
}


 ?>



  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>-->
        
            <div class="modal-body">
             
               <form action="" id="myform" method="post" enctype="multipart/form-data">
                          
                   
                  
                      <div class="form-group">
                          <label></label>

                          <input type="file" name="solutionfile" id="solutionfile" class="form-control" style="width: 400px; height: 400px; margin:auto;border: 3px dashed #696969; background: url('http://smbseminar.com/assignment/assets/images/latest/Untitled-2.png') #fff; background-repeat: no-repeat; background-position: center; cursor: pointer; overflow: hidden;  padding: 400px 0 0 0;" value="">
<a class="cancel_modal" data-dismiss="modal">cancel</a>

                          <!--<div class="drop_box">
                           <img src="<?=base_url('assets/images/latest/Drag_Drop_icon.png');?>" alt="">                        
                           <h1>drag and drop</h1>
                           <p>your assignment file here, or browse</p>
                           <a href="">cancel</a>
                        </div> -->

                      </div>
                        
                 </form>
                  
                  
            </div>
           <!-- <div class="modal-footer"> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button  id="uploadbutton" type="submit" class="btn btn-primary">Save changes</button>             
            </div>-->
        </div>
    </div>
</div>
<?php   $fisttime=$_SESSION['firsttime'];
   $contactid= $_SESSION['contid'];
//var_dump($noofassignment);
//var_dump($complete);echo "<br>";

//var_dump($submitted);
//echo $noofassignment;
 ?>
<?php if($fisttime==0){?>
  <?php if($noofassignment==0){?>
 <section class="latest-assi" id="latest-assi1">
    <div class="container-fluid">
        <div class="row post">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 upload_view">
                <div class=" col-xs-12 assi-cmp-bg" style="border-radius: 10px;">
                    <div class="assi_pull-left1">
                        <img class="img-responsive" src="<?=base_url('assets/images/latest/Assignment_Complete_Icon.png');?>" style="display: inline-block;" >
                    </div>
                    <div class="urgent_assi_body">
                        <div class="finish_assi">
                            <h1> Write Your Name & Objective</h1>
                            
                        
                            <p>Completed assignments turn green. Once complete, you can view them or edit them to remove or add files.
                        </div>

                        <!--<div class="btn_cmp_inline ">
                            <a class="btn_view_wrap btn-cmp-view" style="cursor: pointer;" data-lead-id="banner-btn"> View </a>
                        </div>
                        <div class="btn_cmp_inline ">
                            <a class="btn_view_wrap btn-cmp-view" style="cursor: pointer;" data-lead-id="banner-btn"> Edit </a>
                        </div>
                        <div class="ass_complete-view">
                           <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="" >
                            <p>Completed on time</p>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>

      
<div class="row post" id="hide-tooltip">
            <div class="col-xs-12 hint-assi_complete">
                    <div class="urgent_hint_arrow">
                        <img src="<?=base_url('assets/images/latest/left_up_arrow.png');?>" alt="">
                    </div>
                    <div class="hints-box already_cmp">
                        <div class="hint-bulp">
                            <img src="<?=base_url('assets/images/latest/bulp.png');?>" alt="">
                        </div>
                        <div class="hint-cancel">
                            <p>Since you’ve completed a task already, it’s listed in this tab</span> 
                            </p>
                            <img src="<?=base_url('assets/images/latest/cross.png');?>" alt="" id="close-tab" >
                           
                       </div>                  
                    </div>
            </div>
        </div>
</div>
</section>
<?php }else{ ?>
 <section class="latest-assi" id="latest-assi2">
    <div class="jklnoofassign" id="<?php echo $nnoofassignment; ?>"></div>
    <div class="container-fluid">
      <?php 
      
foreach($name as $row1){
           $nameuser=$row1->name;
 }
 //echo  $nameuser;
?>
       
     <?php //var_dump($overdue);
?>
     <?php  //echo  $assignmentno;
 //echo "<br>"; 
 //echo  $filesize; 
?>
     <?php $kbdata=1024;
        
         $currentfile=intval($filesize/$kbdata);?>
     
     <?php  foreach ($assignment as $row){
              
                 $update=$row->udate;
                 $sudate=$row->subdate;
              
              $date = date_create($update);
              $date1= date_create($sudate);
              //var_dump($date);var_dump($date1);
              // echo  $date;//echo"<br>";//echo  $date1;//echo"<br>";
             
                  
                   $assigno= $row->aid;
              foreach ($complete as $row1){
                      $newassigno=$row1->assignment_no;
                          if($newassigno== $assigno){
                          
                                 $newstatus=$row1->status;
                                  if($newstatus==1) {
                                     //echo $newassigno;
               ?>
        <div class="row post">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 upload_view">
                 
                <div class=" col-xs-12 latest_assi-cmp_wrapp" id="<?php echo "a$row->aid"; ?>">
                    <div class="assi_pull-left" id="<?php echo "gd$row->aid"; ?>" >
                        <img class="img-responsive" src="<?=base_url('assets/images/latest/Assignment_Complete_Icon.png');?>" style="display: inline-block;" >
                    </div>
                    
                    <div class="assi_pull-left" id="<?php echo "fd$row->aid"; ?>" style="display:none;" >
                        <img class="img-responsive" src="<?=base_url('assets/images/latest/Assignment_Icon.png');?>" style="display: inline-block;">
                    </div>
                    
                    <div class="latest_assi-body">
                        <div class="latest_assi-cpm_heading" id="<?php echo "cd$row->aid"; ?>">
                       
                            <h1><?php echo "$row->aid";?>.<?php echo "$row->name";?></h1>
                           <!-- <p>3<sup style="font-size: 12px;">rd</sup> June, 2016</p>-->
                            <p><?php echo date_format( $date , 'j<\s\up>S</\s\up> F, Y');?></p>
                        </div>
                        <div class="ass-cmp_objective" id="<?php echo "bd$row->aid"; ?>">
                            <p><?php echo "$row->discription";?>.</p>
                        </div>

                        <div class="changeaction" id="<?php echo $assignmentno; ?>"></div>
                        
                        <div class="btn_cmp_inline ">
  <!-- <a href="<?php echo  base_url()."uploads/2_assignment/$row->file";?>" target="_blank" class="btn_view_wrap btn-cmp-view" data-lead-id="banner-btn">View</a>-->
<?php  foreach ($submitted as $row123){ 
                   $newassignmentnno=$row123->aid;
                   $currentiid=$row->aid;
                   $ccconid=$row123->contactid;
                   // var_dump( $newassignmentnno);
                   if(($newassignmentnno==$currentiid)&&($contactid==$ccconid)){
                  // echo "<br>"; //echo $newassignmentnno;
        ?>
         <a href="<?php echo  base_url()."uploads/2_submission/$row123->file";?>" target="_blank" class="btn_view_wrap btn-cmp-view" data-lead-id="banner-btn" id="<?php echo "vr$row->aid"; ?>">View</a>
         <?php  }
          } ?>
                        </div>
                       
                        <div class="btn_cmp_inline ">
                               <!-- <a href="#<?php //echo base_url()."newuser/do_upload/".$row->aid;?>" name="submit" id="<?php //echo $row->aid; ?>" class="assignsubmit gotitbtn btngotit-inline" data-lead-id="banner-btn"> Submit </a>-->
   <a href="#<?php //echo base_url()."newuser/do_upload/".$row->aid;?>" name="submit" id="<?php echo $row->aid; ?>"class=" assignsubmit btn_view_wrap btn-cmp-view submit_class1<?php echo $row->aid; ?>" data-lead-id="banner-btn"> Edit </a>
                        </div>
                 <?php  $rownumber=$row->aid;?>
                 
                 <?php foreach($overdue as $row3){
                                                             $abcno=$row3->assignment_no;
                                                           
                                                                  if($abcno==$assigno){
                                              
                                                             $newcheck=$row3->overdue;
                                                               if($newcheck==0){
                                                               // echo "$row3->overdue";//echo "<br>";
                                                               
                       ?>
                                                                               
                       <div class="ass_complete-view" id="<?php echo "ba$row->aid"; ?>">
                            <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="">
                            <p>Completed on time</p>
                        </div>
                              <?php                             
                                                                     }else{?>
                           <div class="ass_complete-view" id="<?php echo "ba$row->aid"; ?>">
                            <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="">
                            <p>Completed After Duedate</p>
                        </div>
                                                                             

                       <?php
                                               // echo "$row3->overdue";//echo "<br>";
                                                                            
                                                                           }
                                                                     
                                                      }  
                                                       }
                         ?>
                        <!--<div class="ass_complete-view" id="<?php echo "ba$row->aid"; ?>">
                            <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="">
                            <p>Completed on time</p>
                        </div>-->
                 
                 
     
  <?php if( (($assignmentno>0)&&($filesize>0))&&($rownumber==$assignmentno) ){ ?>
                      <div class="changecol" id="<?php echo "a$row->aid"; ?>"></div>
                      <div class="changecomplete" id="<?php echo "ba$row->aid"; ?>"></div>
                       <div class="changefont" id="<?php echo "cd$row->aid"; ?>"></div>
                       <div class="changemidfont" id="<?php echo "bd$row->aid"; ?>"></div>

                       <div class="changeimg" id="<?php echo "gd$row->aid"; ?>"></div>
                       <div class="newchangeimg" id="<?php echo "fd$row->aid"; ?>"></div>
                    <div class="row123">      
                        <div class="col-xs-12 col-sm-12 progress-container">
                                 
                              <div id="progress1" class="progress1" style="position: relative;width:250px;height:16px;background-color:#e7e7e7;border-radius: 25px;top:-30px;    float: right;">
                            <span class="progress-text" style=" position: absolute;z-index:2;bottom:-19px;"></span>
                      <div class="progress-bar"   style="height: 15px;width:0%;display: inline-block;position: relative;border-radius: 25px;background: #a5bd52;"> 
                        </div>
                    </div>     
           <div class="filesize" id="<?php echo"$currentfile"?>"> </div>
                 
                          
                         </div>
                      </div>   
                        <?php }?>
                        
                  
                    </div>
                    
                </div>
            </div>
          </div>
        
         <div class="row amitsir" id="<?php echo "ia$row->aid"; ?>" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class=" col-xs-12 user-comments change_color_strip<?php echo "$row->aid"; ?>" id="<?php echo "$row->aid"; ?>">
                 <h1><span id="count<?php echo $row->aid;?>" style="color:#fff;"></span></h1>
                    <h1 class="flip bottom-hide<?php echo "$row->aid"; ?>"  id="<?php echo "$row->aid"; ?>">Comments</h1>
            
                    <h1 class="flip bottom-show<?php echo "$row->aid"; ?>" style="color:white;display:none;" id="<?php echo "$row->aid"; ?>"> New Comments <span style="color:#6d6d6d;">(Click to Open)</span></h1>
                      
                    <button type="button" class="btn1 btn-box-tool" id="cancel_content<?php echo "$row->aid"; ?>" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
                
                <div class="panel open_panel" id="<?php echo "b$row->aid"; ?>">
                    <div class="row">
                       <div class="col-lg-12 col-md-1col-md-11  col-sm-12 col-xs-12 border_bottom">
                          <div class="col-xs-12  comment-here">
                             <form name="form1">
                                <div class="input-area">
                                    <input type="text" id="uname" name="uname" style="display:none;" value="<?php echo  $nameuser; ?>"  disabled />
                                    <!-- <input type="text" id="uname" name="uname" value=""  />-->
                                    <input type="text" class="addinput_controls search" name ="<?php echo $row->aid;?>" id="msg<?php echo $row->aid;?>" placeholder="Type your comment here. Press enter to  post">
                                    <!--<input type="text" class="addinput_controls search" name ="msg" id="msg" placeholder="Type your comment here. Press enter to  post">-->
                                        <!-- <a href="#" onclick="submitChat()">send</a> 
                                    <span class="glyphicon glyphicon-paperclip "></span>-->
                                </div>
                            </form>
                         </div>
                      </div>
                   </div>
                   <div class="row main-cmments">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-xs-12 post-cmnt">
                                <div class="chat_process" id="chat_process<?php echo $row->aid;?>">
                               
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                
            </div>
        
        
        
        </div>
       
          <?php  
                   } 
                 }
                }
               }?>
        <div class="row post" id="hide-tooltip">
            <div class="col-xs-12 hint-assi_complete">
                    <div class="urgent_hint_arrow">
                        <img src="<?=base_url('assets/images/latest/left_up_arrow.png');?>" alt="">
                    </div>
                    <div class="hints-box already_cmp">
                        <div class="hint-bulp">
                            <img src="<?=base_url('assets/images/latest/bulp.png');?>" alt="">
                        </div>
                        <div class="hint-cancel">
                            <p>Since you’ve completed a task already, it’s listed in this tab</span> 
                     </p>
     
<img src="<?=base_url('assets/images/latest/cross.png');?>" alt="" id="close-tab" >
                           
                       </div>                  
                    </div>
            </div>
        </div>
       </div>
    
</section>
<?php }?>
<?php }else{?>
  <?php if($noofassignment==0){ ?>
   <section class="latest-assi" id="latest-assi1">
    <div class="container-fluid">
        <div class="row post">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 upload_view">
                <div class=" col-xs-12 assi-cmp-bg" style="border-radius: 10px;">
                    <div class="assi_pull-left1">
                        <img class="img-responsive" src="<?=base_url('assets/images/latest/Assignment_Complete_Icon.png');?>" style="display: inline-block;">
                    </div>
                    <div class="urgent_assi_body" >
                        <div class="finish_assi">
                            <h1> Write Your Name & Objective</h1>
                         
                            <p>Completed assignments turn green. Once complete, you can view them or edit them to remove or add files.
                        </div>

                        <!--<div class="btn_cmp_inline ">
                            <a class="btn_view_wrap btn-cmp-view" style="cursor: pointer;" data-lead-id="banner-btn"> View </a>
                        </div>
                        <div class="btn_cmp_inline ">
                            <a class="btn_view_wrap btn-cmp-view" style="cursor: pointer;" data-lead-id="banner-btn"> Edit </a>
                        </div>
                        <div class="ass_complete-view">
                           <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="">
                            <p>Completed on time</p>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>

      

</section>
  <?php }else{?>
      

<section class="latest-assi" id="latest-assi2">
    <div class="jklnoofassign" id="<?php echo $nnoofassignment;?>"></div>
    <div class="container-fluid">
      <?php 
      
foreach($name as $row1){
           $nameuser=$row1->name;
 }
 //echo  $nameuser;
?>
       
     <?php //var_dump($overdue);?>
     <?php  //echo  $assignmentno; //echo "<br>";   ?>
     <?php $kbdata=1024;
        
         $currentfile=intval($filesize/$kbdata);?>
     
     <?php  foreach ($assignment as $row){
              
                 $update=$row->udate;
                 $sudate=$row->subdate;
              
              $date = date_create($update);
              $date1= date_create($sudate);
              //var_dump($date);var_dump($date1);
              // echo  $date;//echo"<br>";//echo  $date1;//echo"<br>";
             
                  
                   $assigno= $row->aid;
              foreach ($complete as $row1){
                      $newassigno=$row1->assignment_no;
                          if($newassigno== $assigno){
                          
                                 $newstatus=$row1->status;
                                  if($newstatus==1) {
                                   //  echo $newassigno;
               ?>
        <div class="row post" id="<?php echo "i$row->aid"; ?>">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 upload_view">
                 
                <div class=" col-xs-12 latest_assi-cmp_wrapp" id="<?php echo "a$row->aid"; ?>">
                    <div class="assi_pull-left" id="<?php echo "gd$row->aid"; ?>" >
                        <img class="img-responsive" src="<?=base_url('assets/images/latest/Assignment_Complete_Icon.png');?>" style="display: inline-block;">
                    </div>
                    <div class="assi_pull-left" id="<?php echo "fd$row->aid"; ?>" style="display:none;" >
                        <img class="img-responsive" src="<?=base_url('assets/images/latest/Assignment_Icon.png');?>" style="display: inline-block;">
                    </div>
                    <div class="latest_assi-body">
                        <div class="latest_assi-cpm_heading" id="<?php echo "cd$row->aid"; ?>">
                       
                            <h1><?php echo "$row->aid";?>.<?php echo "$row->name";?></h1>
                           <!-- <p>3<sup style="font-size: 12px;">rd</sup> June, 2016</p>-->
                            <p><?php echo date_format( $date , 'j<\s\up>S</\s\up> F, Y');?></p>
                        </div>
                        <div class="ass-cmp_objective" id="<?php echo "bd$row->aid"; ?>">
                            <p><?php echo "$row->discription";?>.</p>
                        </div>

                        <div class="changeaction" id="<?php echo $assignmentno; ?>"></div>
                        
                        <div class="btn_cmp_inline ">
   <!--<a href="<?php echo  base_url()."uploads/2_assignment/$row->file";?>" target="_blank" class="btn_view_wrap btn-cmp-view" data-lead-id="banner-btn">View</a>-->
        <?php  foreach ($submitted as $row123){ 
                   $newassignmentnno=$row123->aid;
                   $currentiid=$row->aid;
                   if( $newassignmentnno==$currentiid){
        ?>
         <a href="<?php echo  base_url()."uploads/2_submission/$row123->file";?>" target="_blank" class="btn_view_wrap btn-cmp-view" data-lead-id="banner-btn" id="<?php echo "vr$row->aid"; ?>" >View</a>
         <?php  }
          } ?>
                        </div>
                       
                        <div class="btn_cmp_inline ">
                               <!-- <a href="#<?php //echo base_url()."newuser/do_upload/".$row->aid;?>" name="submit" id="<?php //echo $row->aid; ?>" class="assignsubmit gotitbtn btngotit-inline" data-lead-id="banner-btn"> Submit </a>-->
   <a href="#<?php //echo base_url()."newuser/do_upload/".$row->aid;?>" name="submit" id="<?php echo $row->aid; ?>"class=" assignsubmit btn_view_wrap btn-cmp-view submit_class1<?php echo $row->aid; ?>" data-lead-id="banner-btn "> Edit </a>
                        </div>
                 <?php  $rownumber=$row->aid;?>
     
  
                        <?php foreach($overdue as $row3){
                                                             $abcno=$row3->assignment_no;
                                                           
                                                                  if($abcno==$assigno){
                                              
                                                             $newcheck=$row3->overdue;
                                                               if($newcheck==0){
                                                               // echo "$row3->overdue";echo "<br>";
                                                               
                       ?>
                                                                               
                       <div class="ass_complete-view" id="<?php echo "ba$row->aid"; ?>">
                            <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="">
                            <p>Completed on time</p>
                        </div>
                              <?php                             
                                                                     }else{?>
                           <div class="ass_complete-view" id="<?php echo "ba$row->aid"; ?>">
                            <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="">
                            <p>Completed After Duedate</p>
                        </div>
                                                                             

                       <?php
                                               // echo "$row3->overdue";echo "<br>";
                                                                            
                                                                           }
                                                                     
                                                      }   }
                         ?>
                        <!--<div class="ass_complete-view" id="<?php echo "ba$row->aid"; ?>">
                            <img src="<?=base_url('assets/images/latest/Completion_Status.png');?>" alt="">
                            <p>Completed on time</p>
                        </div>-->
                  
                    </div>
                    
                  <?php if( (($assignmentno>0)&&($filesize>0))&&($rownumber==$assignmentno) ){ ?>
                      <div class="changecol" id="<?php echo "a$row->aid"; ?>"></div>
                      <div class="changecomplete" id="<?php echo "ba$row->aid"; ?>"></div>
                       <div class="changefont" id="<?php echo "cd$row->aid"; ?>"></div>
                       <div class="changemidfont" id="<?php echo "bd$row->aid"; ?>"></div>

                       <div class="changeimg" id="<?php echo "gd$row->aid"; ?>"></div>
                       <div class="newchangeimg" id="<?php echo "fd$row->aid"; ?>"></div>


                    <div class="row123">      
                        <div class="col-xs-12 col-sm-12 progress-container">
                                 
                              <div id="progress1" class="progress1" style="position: relative;width:250px;height:16px;background-color:#e7e7e7;border-radius: 25px;top:-65px;    float: right;">
                            <span class="progress-text" style=" position: absolute;z-index:2;bottom:-19px;"></span>
                      <div class="progress-bar"   style="height: 15px;width:0%;display: inline-block;position: relative;bottom: 0px;border-radius: 25px;background:#a5bd52;"> 
                        </div>
                    </div>     
           <div class="filesize" id="<?php echo"$currentfile"?>"> </div>
                 
                          
                         </div>
                      </div>   
                        <?php }?>


                </div>
            </div>
          
     

         <div class="amitsir" id="<?php echo "ia$row->aid"; ?>" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class=" col-xs-12 user-comments change_color_strip<?php echo "$row->aid"; ?>" id="<?php echo "$row->aid"; ?>">
                 <h1><span id="count<?php echo $row->aid;?>" style="color:#fff;"></span></h1>
                    <h1 class="flip bottom-hide<?php echo "$row->aid"; ?>"  id="<?php echo "$row->aid"; ?>">Comments</h1>
            
                    <h1 class="flip bottom-show<?php echo "$row->aid"; ?>" style="color:white;display:none;" id="<?php echo "$row->aid"; ?>"> New Comments <span style="color:#6d6d6d;">(Click to Open)</span></h1>
                      
                    <button type="button" class="btn1 btn-box-tool" id="cancel_content<?php echo "$row->aid"; ?>" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
                
                <div class="panel open_panel" id="<?php echo "b$row->aid"; ?>">
                    <div class="row">
                       <div class="col-lg-12 col-md-1col-md-11  col-sm-12 col-xs-12 border_bottom">
                          <div class="col-xs-12  comment-here">
                             <form name="form1">
                                <div class="input-area">
                                    <input type="text" id="uname" name="uname" style="display:none;" value="<?php echo  $nameuser; ?>"  disabled />
                                    <!-- <input type="text" id="uname" name="uname" value=""  />-->
                                    <input type="text" class="addinput_controls search" name ="<?php echo $row->aid;?>" id="msg<?php echo $row->aid;?>" placeholder="Type your comment here. Press enter to  post">
                                    <!--<input type="text" class="addinput_controls search" name ="msg" id="msg" placeholder="Type your comment here. Press enter to  post">-->
                                        <!-- <a href="#" onclick="submitChat()">send</a> 
                                    <span class="glyphicon glyphicon-paperclip "></span>-->
                                </div>
                            </form>
                         </div>
                      </div>
                   </div>
                   <div class="row main-cmments">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-xs-12 post-cmnt">
                                <div class="chat_process" id="chat_process<?php echo $row->aid;?>">
                               
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                
            </div>
        
        
           </div>
        </div>
        
        <!--------------------------------- hide section ---------------------------------!-->
        
          <?php  
                   } 
                 }
                }
               }?>
        
</section>

<a href="#0" class="cd-top">Top</a> 

     <?php } ?>
<?php } ?>



<script type="text/javascript">
    $(document).ready(function() {
    $(".bhavesh").addClass('active');
    $(".trd").addClass('active');

});
</script>
<script type="text/javascript">
   $("#close-tab").click(function (e) {
   $("#hide-tooltip").hide('slow');
    getajaxcall();
   //$("#latest-up").css('margin-top','35px');
    
   
});

</script>
<script>
    // $(document).ready(function() {
    //     $("#flip").click(function() {
    //         $("#panel").slideToggle("slow");
    //        $('.user-comments').css("border-radius","0px 0px 0px 0px");
    //        //$('#cancel_content').css("display","block");
    //     });
    // });

$(document).ready(function(){
           var ttchange=0;
    $(".user-comments").click(function(e){
       // ttchange=ttchange+1;
       var same_id=$(this).attr('id');
       //alert(same_id);
        getChangeStatus(same_id);
        getCountmessage(same_id);
       e.preventDefault();
         var $div = $(this).next('.open_panel');
      $(".open_panel").not($div).slideUp("slow");
      $(".btn-box-tool").not($div).hide();
        if ($div.is(":visible")) {
           $div.slideUp("slow");
           $("#cancel_content"+same_id).hide();
           //alert('heyyy21312312312'); 
        }  else {
           $div.slideDown("slow");
           $("#cancel_content"+same_id).show();
           //alert('heyyy');
        }
       
      
       
       //comment_buuton='#'+same_id;
       //alert(comment_buuton);
       //var hideshow='#i'+same_id;
       //var hideshow1='#ia'+same_id;
       //if(ttchange==1){
                                //alert('this is for first');
                    //            $(".amitsir").hide();
                    //            $(hideshow).show();
                    //            $(hideshow1).show();
                                
                              
             //               }
             // if(ttchange==2){
             //                 // alert('this is second');
            //                   $(".amitsir").show();
            //                   ttchange=0;
            //                 }
       //alert(comment_buuton);

         

       //var b_val='b'+same_id;
       //var panel_val='#'+b_val;
       
       //alert(panel_val);
       //var same_id12=1;
       
         
       //var c_val=''+same_id;
       //var user-comments_val='#'+c_val;
       //alert(user-comments_val);

       //$(panel_val).slideToggle(500);
       //$(panel_val).toggleClass("main");
        //$('.user-comments').css("border-radius","0px 0px 0px 0px");
       // $("#cancel_content").toggleClass("main");
        //$('.user-comments').css("border-radius","0px 0px 10px 10px");
        //$('.user-comments').css("border-radius","0px 0px 0px 0px");
        //$('.user-comments').toggleClass("main1");
       
             setInterval(function(){ 
           //getSuccessmessage(same_id);
        }, 500);
    });
    
       
       //alert(same_id);

           var chenoass=$('.jklnoofassign').attr('id');
       //for(var same_id=1;same_id <=chenoass;same_id++){
         //  getCountmessage(same_id);
         //  getSuccessmessage(same_id);
         // } 
        
       
        
     //var id1=1;
     //setInterval(function(){ 
      //for(id1;id1<10;id1++){
           //getCountmessage(id1);
           // }
     //},500);
});

</script>
<?php



foreach ($nnoofassignment1 as $roew){
    
  ?>
<script>
    $(document).ready(function() {

    getSuccessmessage(<?php echo $roew->aid;?>);
     getCountmessage(<?php echo $roew->aid;?>);

     });

    setInterval(function(){ 
        
    
    getSuccessmessage(<?php echo $roew->aid;?>);
    getCountmessage(<?php echo $roew->aid;?>);
    
}, 10000);
</script>   
   <?php  
    
}

?>

<script>
$(document).ready(function(){
    $("#cancel_content").click(function(){

       $(".panel").slideUp(500);
        $("#cancel_content").toggleClass("main");
        $(".user-comments").toggleClass("main1");

    });
});


 $(document).ready(function() {
    $(".strong_active").addClass('active');
    $(".trd").addClass('active');

});
</script>
<script type="text/javascript">

$("input").on("keydown",function search(e) {

    if(e.keyCode == 13) {
         var id1 = $(this).attr('name');
          //alert(id1);
         getSuccessOutput(id1);
         getSuccessmessage(id1);
         
   // submitChat();
     document.getElementById('msg'+id1).value = "";

    }

});
function getajaxcall(){
$.ajax({
           "url": "<?php echo site_url('newuser/comchangetooltip')?>",
           "type": "POST",
           data: {},
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
function getSuccessOutput(id1) {
          // alert(id1);
    $.ajax({
           "url": "<?php echo site_url('newuser/chat')?>",
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
           "url": "<?php echo site_url('newuser/chat_message')?>",
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
function getChangeStatus(id1) {
    $.ajax({
         
           "url": "<?php echo site_url('newuser/Notification_message')?>",
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
           "url": "<?php echo site_url('newuser/Notification_Count')?>",
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
               
               //console.log(result);
               if ($(".main").is(':visible')){
                    // var id1=$(this).attr('class');
                       //alert(id1);  
                     //getChangeStatus(id1);
                   $('#count'+id1).html(result);
                  $('#count'+id1).hide();
                  $('.bottom-hide'+id1).show(); 
                  $('.bottom-show'+id1).hide();
                  $('#c'+id1).css({'background-color': '#fff'});
 
                    }
              else{
              if(result==0)
             {
                //its 0 comments than no display
                //alert(result+''+id1);
                  $('#count'+id1).html(result);
                  $('#count'+id1).hide();
                  $('.bottom-hide'+id1).show(); 
                  $('.bottom-show'+id1).hide();
                   
                  $('.change_color_strip'+id1).css({'background-color': '#fff'});
             }else{ 
                  //its more comments than no display
                  //alert(result+''+id1);
                   $('#count'+id1).show();
                   $('#count'+id1).html(result);
                  $('.bottom-hide'+id1).hide(); 
                  $('.bottom-show'+id1).show();
                  $('.change_color_strip'+id1).css({'background-color': '#000'});
                  }
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


 //setInterval(function(){ 
      //     getSuccessmessage();
        //}, 1000);
</script>
<script type="text/javascript">
    $(function(){
      $('.chat_process').slimscroll({
        height: '388px'
      }).parent().css({
        background: '#237FAD',
        border: '2px dashed #184055'
      });


    });
</script>
<script>
$(document).ready(function(){
  var $content = $(".content").hide();
  var $content1 = $("#aa").hide();
  $(".toggle").on("click", function(e){
    $(this).toggleClass("expanded");
    $content.slideToggle();
    $content1.slideToggle();
  });
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
<?php include( 'footer.php');?>