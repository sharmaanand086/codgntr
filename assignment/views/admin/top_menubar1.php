<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-default">
      <div class="container-fluid nav_edit">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url()?>newadmin/dashboard"><img src="<?=base_url('assets/admin_design/images/dashboard/logo.png')?>" class="img-responsive" alt="company logo" /></a>
        </div>
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav  custom-menu" id="navbar">
            <li>
              <a href="<?php echo base_url('newadmin/dashboard');?>" class="strong_active"><span class="l1"> Dashboard </span><span class="l2"> Dashboard </span>
                <!-- <span class="label">1</span> -->
               <!--  <span id="rJobCntr" class="rJobCntr" style="display: inline;">1</span> -->
              </a>
            </li>
<li>
              <a href="<?php echo base_url('newadmin/superassignment');?>" class="strong_active5"><span class="l1"> Super Assignments</span><span class="l2">Super Assignments</span> 
              </a>
            </li>
<li>
              <a href="<?php echo base_url('newadmin/ownchat');?>" class="strong_active2"><span class="l1"> Chat</span><span class="l2"> Chat</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('newadmin/participants');?>" class="strong_active1"><span class="l1"> Participants </span><span class="l2"> Participants </span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('newadmin/logout');?>"><span class="l1"> Logout </span><span class="l2"> Logout </span> 
              </a>
            </li>                     
          </ul>
          
            <div id="add" class="wrapp_ass pull-right">
              <a href="<?php echo base_url('newadmin/addsuperassignemnt');?>" class="add_assi">+ Add Super assignment</a>
            </div>
                             
       
        </div>
      </div>
    </nav>

 <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
     

//get header height 
 var getHeaderHeight = $('.navbar').outerHeight();

//init last position
var lastScrollPositon = 0;

//set header container top property on page load with static position
    $('.navbar').css('top','-'+getHeaderHeight+'px');

    $(window).scroll(function(){

        var currentScrollPosition = $(window).scrollTop();

        if($(window).scrollTop()>getHeaderHeight){

            $('body').addClass('activescroll').css('padding-top',getHeaderHeight);
            $('.navbar').css('top',0);

            if(currentScrollPosition < lastScrollPositon){
                $('.navbar').css('top','-'+getHeaderHeight+'px');
            }
                        
            lastScrollPositon = currentScrollPosition;
        }
        else{
             $('body').removeClass('activescroll').css('padding-top',0);
             
        }
     });



    
 </script>

<?php include( 'footer.php');?>