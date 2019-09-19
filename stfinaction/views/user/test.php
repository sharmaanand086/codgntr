
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
                });
        });
    </script>
</head>
<body>
      <!--<span class="fsz-sm c-grey-900"> </span> <span><a href="logout">Logout</a></span> <span><a href="">changepassword</a></span> -->
    <div class="jumbotron header">
        <div class="myname dropdown">
         <p class="frhvr"><?php echo 'anand@gmail.com';  ?><span class="caret down"></span></p><P><?php echo $pp; ?></P>
         
           <div class="dropdown-content">
             <a href="<?=base_url('welcome/logout');?>" style=" ">Logout</a><br>
             <a href="<?=base_url('welcome/changepassword');?>" style="">Change password</a>
           </div>
        </div>
        
        <h1 class="heading"><span class="stf">Speak to a fortune </span><br> <span class="thin"> in </span> <span class="action">action</span> </h1>      
        <p class="subheading">Go through the topics listed below and begin the action!</p>
    </div>
    <div class="container">
        
            <?php
            foreach($getevent as $title){
                if($title['v_p'] == 'v'){
                ?>
        <div class="row btmunderline">
                <div class="col-md-12 videoholder">
                <h1 class="vid_heading"><?php echo $title['title']; ?></h1>
                <p><?php echo $title['description']; ?></p>
            </div>
                  <div class="scrollvideo">
            <?php
            foreach($getvideo as $video){
                if($title['id'] == $video['stepid']){
                    ?>
                    
                    <div class="col-md-4 vidspace">
                        <div class="video">
                            <img src="<?php echo base_url('assets/user/images/Base.png'); ?>" alt="">
                        </div>
                        <p class="videotitle">1. Title for this video</p>
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
      <!-- Modal -->
  <div class="modal" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <script>
     $( document ).ready(function() {
      var attmptcomp = "<?php echo $completecount; ?>";
      if(attmptcomp < 0 || attmptcomp == 0)
      {
        $('#myModal').modal({backdrop: 'static', keyboard: false});
        $('#myModal').modal('show');
      }
    
});

  </script>
</body>
</html>