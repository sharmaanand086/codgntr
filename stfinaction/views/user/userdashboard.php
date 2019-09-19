<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$userid =($this->session->userdata['logged_in']['id']);
$name = ($this->session->userdata['logged_in']['name']);
$contact = ($this->session->userdata['logged_in']['contact']);
} else {
header("location: https://arfeenkhan.com/stfaction/welcome/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Speak to A Fortune</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/slick/slick.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/slick/slick-theme.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/user/css/main.css'); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/user/slick/slick.min.js'); ?>"></script>
     <script>
        $(function(){
            $('.scrollvideo').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                 responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
       
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
       
      }
    },
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
                });
        });
    </script>
</head>
<body>
      <!--<span class="fsz-sm c-grey-900"> </span> <span><a href="logout">Logout</a></span> <span><a href="">changepassword</a></span> -->
    <div class="jumbotron header">
        <div class="myname dropdown">
         <p class="frhvr"><?php echo $name;  ?> <span class="caret down"></span></p>
         
           <div class="dropdown-content">
             <a href="<?=base_url('welcome/logout');?>" style=" ">Logout</a><br>
             <a href="<?=base_url('welcome/changepassword');?>" style="">Change password</a>
           </div>
        </div>
        
        <h1 class="heading"><span class="stf">Speak to a fortune </span><br> <span class="thin"> in </span> <span class="action">action</span> </h1>      
        <p class="subheading">Go through the topics listed below and begin the action!</p>
    </div>
    <div class="container" id="complete2attmpt">
        
            <?php
            foreach($getevent as $title){
                if($title['v_p'] == 'v'){
                ?>
        <div class="row btmunderline">
                <div class="col-md-12 videoholder" style="    text-align: left;">
                <h1 class="vid_heading"><?php echo $title['title']; ?></h1>
                <p><?php echo $title['description']; ?></p>
            </div>
                  <div class="scrollvideo">
            <?php
            
            foreach($getvideo as $video){
                if($title['id'] == $video['stepid']){
                    ?>
                    
                    <div class="col-md-4 col-sm-6 vidspace">
                        <div class="video">
                            <iframe src="<?php echo  $video['link'] ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
                            <!--<img src="" alt="">-->
                        </div>
                        <p class="videotitle"><?php echo $video['id']; ?>.<?php echo  $video['title'] ?></p>
                    </div>
                    <?php
                    
                }
                 
            }
            ?>
        </div>
        </div>
            <?php
                }
            }
            
            foreach($getevent as $title){
                if($title['v_p'] == 'p'){
            ?>
            
        <div class="row btmunderline">
            <div class="col-md-12 videoholder">
                <h1 class="vid_heading"><?php echo $title['title']; ?></h1>
                <p><?php echo $title['description']; ?></p>
            </div>
            <?php
            foreach($getpdf as $pdf){
                if($title['id'] == $pdf['stepid']){
            ?>
            <div class="col-md-3 topicspace">
                <div class="video">
                    <img src="<?php echo base_url('assets/user/images/Base2.png'); ?>" alt="">
                </div>
            </div>
            <div class="col-md-9 topicspace">
                <p class="topictitle"><?php echo $pdf['title']; ?></p>
                <p class="topicdesc"><?php echo $pdf['description']; ?></p>
                <button class="download">Download</button>
            </div>
            <?php }} ?>
        </div>
        <?php
                }}
        ?>
        
    </div>
      <div class="container" id="displaymsg" style="display:none;font-size: 20px;text-align: center;">
          
           <?php
                   $message_approved= $this->session->flashdata('message_approved');
                if (isset($message_approved)) {
                echo "<div class='message'  style='text-align: center;    color: green;    margin-left: -100px;'>";
                echo $message_approved;
                echo "</div>";
                }
                ?>
          <p class="textchange">You Have Completed All Your Attempts Request Admin to get 1 More Attempts
                    <?php echo form_open('Welcome/requestformuser'); ?>
                      <div class="col-md-12 mb-3" id="formshide">
                       <?php  $date =  date("Y-m-d"); ?>
                        <input type="hidden" name="id" value="<?php echo $userid; ?>">
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                         <input type="hidden" name="status" value="0">
                         <input type="hidden" name="createdat" value="<?php echo $date; ?>">
                        <input type="submit" class="form-control btn textchange-success submit" id="1"  value="Submit Request"  >
                      </div>
                      
                      <?php echo form_close(); ?>
          </p>
          </div>
         <div class="weekly-program">
         <div class="total-week">
            <p class="abc addclass" id="1">week one</p>
            <p class="abc " id="2">week two</p>
            <p class="abc " id="3">week three</p>
            <p class="abc " id="4">week four</p>
        </div>
        <div class="container" style="position:relative;">
            <div class="week-video">
                <div class="col-sm-6">
                    <div class="video-part">
                        <img src="<?php echo base_url('assets/user/images/v1.png'); ?>">
                       <!-- <iframe src="https://player.vimeo.com/video/338862721" frameborder="0" width="100%" allow="autoplay; fullscreen" allowfullscreen=""></iframe> -->
                    </div>
                    <div class="week-content">
                        <p class="week-title">Video 1</p>
                        <p class="week-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="video-part">
                         <img src="<?php echo base_url('assets/user/images/v1.png'); ?>">
                       <!--  <iframe src="https://player.vimeo.com/video/338862721" frameborder="0" width="100%" allow="autoplay; fullscreen" allowfullscreen=""></iframe> -->
                    </div>
                    <div class="week-content">
                        <p class="week-title">Video 2</p>
                        <p class="week-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            <div class="week-msg" style="position:absolute; display:none">
                <p>Access will be provided after 1 week</p>
            </div>
        </div>
    </div> 
     <script>
$(".total-week p").click(function(){
    var ab = this.id;
    // alert(ab);
    if(ab>1){
       $(".abc").removeClass("addclass");
       $(this).addClass("addclass");
       $(".week-video").css("opacity","0.3");
       $(".week-video").css("cursor","not-allowed");
       $(".week-msg").show();
    }
    else{
       $(".abc").removeClass("addclass");
       $(this).addClass("addclass");
       $(".week-video").css("opacity","1");
       $(".week-msg").hide();
       $(".week-video").css("cursor","pointer");
    }
    
});
</script>   
<!-- modal for requests-->
    <div class="modal in" id="myModal2" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-body" style="text-align:center"> 
        <p id="finalattmpt">You have Only two Attempts </p>
        <button type="button" class="btn btn-default btn-cls myModal2" data-dismiss="myModal2" >Close</button>
        </div>
        <div class="modal-footer" style="border-top:none;padding:0">
         
        </div>
      </div>
      
    </div>
  </div>
    
    <!-- -->

      <!-- Modal -->
      
  <div class="modal" id="myModal" role="dialog" style="display:none" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
            <?php
                   $message_approved= $this->session->flashdata('message_approved');
                if (isset($message_approved)) {
                echo "<div class='message'  style='text-align: center;    color: green;    margin-left: -100px;'>";
                echo $message_approved;
                echo "</div>";
                }
                ?>
          <p class="textchange" >You Have Completed All Your Attempts Request Admin to get 1 More Attempts
                    <?php echo form_open('Welcome/requestformuser'); ?>
                      <div class="col-md-12 mb-3" id="formshide">
                       <?php  $date =  date("Y-m-d"); ?>
                        <input type="hidden" name="id" value="<?php echo $userid; ?>">
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                         <input type="hidden" name="status" value="0">
                         <input type="hidden" name="createdat" value="<?php echo $date; ?>">
                        <input type="submit" class="form-control btn btn-success submit" id="1"  value="Submit Request"  >
                      </div>
                      
                      <?php echo form_close(); ?>
          </p>
             <?php echo form_open('Welcome/logout'); ?>
                 <button class="btn-success submit" id="ok-btn" style="display:none">OK</button> 
                  <?php echo form_close(); ?>
        </div>
        <div class="modal-footer" style="border-top:none;padding:0;padding-bottom: 18px;">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div>
      
    </div>
  </div>
  <?php 
    foreach($popupshow as $atmpt){
          $true =         $atmpt['attempts']; 
          $bothtrue =      $atmpt['allowattmpt']; 
             
    }
  ?>
   <script>
     $( document ).ready(function() {
      var attmptcomp = "<?php echo $true; ?>";
      var att = "<?php echo $bothtrue; ?>";
      if(attmptcomp   == att  )
      {
        $('#complete2attmpt').hide();
        $('#displaymsg').show();
      //  $('#myModal').modal('show');
      }
      if(attmptcomp   == 1  )
      {
         
        $('#myModal2').show();
      
      }
       if(attmptcomp   == 2 )
      {
         
        $('#myModal2').show();
         $('#finalattmpt').text('This is Your Final Attempts ')
      }
     
});

 $('.myModal2').click(function(){
      $('#myModal2').hide();
 });
  </script>
  
  <?php
           
$condition22 = "" . "status =" . "'0' AND  " . "username =" . "'" .$username. "' ";
$this->db->select('*');
$this->db->from('requestes');
$this->db->where($condition22);
$query1 = $this->db->get();
                           
 if ($query1->num_rows()>0) {
                        ?>
                         <script>
                             
                            $('#formshide').hide();
                            $('.textchange').text('Your request Has been sent The admin will do the needfull in 24-48 hr');
                            $('#ok-btn').show();
                         </script>
    <?php
         return true;
     }else{
           return false;
     }
   
   
    ?>
  
  
    
  
</body>
</html>