<!DOCTYPE html>
<html lang="en">
<head>
    <title>90 Days</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/RegalCalendar.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <style>
        #90day {
            text-align: center;
            font-size: 21px;
            color: #d4b734;
            padding-top: 2%;
        }
        .err_msg{
            color: red;
font-size: 14px;
font-weight: 600;
        }

    </style>
</head>
<body>
    <div class="logouts">
            <span class="logs">
                <?php
                
                $ftime;
                $active;
                $ltime;
                
                foreach($abc as $row)
                {
                 $ftime=$row->ftime;;
                $active=$row->active;
                $ltime=$row->ltime;
                ?>
                <div class="name"><?php echo $row->name; ?> &nbsp;&nbsp;|&nbsp;&nbsp;</div> 
                <?php
                }
                ?> 
            <a class="out" href="<?php echo base_url(); ?>welcome/logout">Logout</a></span>
        </div>
<div class="main">
    <div class="leftone">
        <img src="<?php echo base_url(); ?>assets/images/left.png" class="one"/>
    </div>
    <div class="middleone">
        <p class="middlecontent">Start filling details under each category. Write titles and names in short.</p></div>
    <div class="rightone">
        <img src="<?php echo base_url(); ?>assets/images/right.png" class="two"/>
    </div>

</div>


<!-- <input type="text" name="datesub" value=""  style="display: none;"  id="abcdef">-->
<!--<span class="error"><?php //echo form_error('datesub'); ?></span>-->
<!-- calender design -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#rCalendar').RegalCalendar({
            theme: 'cyan',
            base: 'white',
            modal: false,
            minDate: new Date(2016, 1 - 1, 1),
            maxDate: new Date(2016, 12 - 1, 31),
            tooltip: 'bootstrap',
            inputDate: '#inputDate',
            inputEvent: '#inputEvent',
            inputLocation: '#inputLocation',
            mapLink: 'map',
            twitter: ' ',
            twitter1: ' ',
            twitter2: ' ',
            twitter3: ' ',
            twitter4: ' '
        });
    });
</script>

<div class="col-lg-12 col-sm-12">
 <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            
            <div type="button" id="step1" class="btn btn-default ">
                <div class="hidden-xs " style="margin-top: 2%;color: #000;">Step 1</div>
               
            </div>
             </a>
        </div>
        <div class="btn-group" role="group">
            <?php
            if($ftime == 1 && $active == 1 && $ltime == 1)
            {
            ?>
             <a href="<?php  echo base_url(); ?>welcome/calenders2"> 
             <?php
            }
            ?>
            <div type="button" id="step2" class="btn btn-default actives">
                <div class="hidden-xs" style="margin-top: 2%;color: #000;">Step 2</div>
            </div>
             </a>
        </div>
        <div class="btn-group" role="group">
            <?php
            if($ftime == 1 && $active == 1 && $ltime == 1)
            {
            ?>
             <a href="<?php  echo base_url(); ?>welcomes"> 
             <?php
            }
            ?>
            <div type="button" id="step3" class="btn btn-default" > 
                <div class="hidden-xs" style="margin-top: 2%;color: #000;" >Step 3</div> 
            </div>
            </a>
        </div>
    </div>

    <div class="well">
        <!-- <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">


                <div class=" overlay-content popup1">
                    <div class="calender_modal">
                        <div style=" display: inline-block;background: #fff; border-radius:8px; padding: 44px; box-shadow: 0px 0px 30px 0 #e6e6e6;">
                            <div id="rCalendar" class="regalcalendar" style="">
                                <input type="hidden" id="mydates">

                            </div>
                        </div>
                    </div>
                </div>

                <p style="width: 40%;margin-left: 30%;text-align: center;margin-top: 2%;font-size: 21px;">Your 90 Days
                    Master plan ends on <span id="90day"></span></p>


            </div>
        </div> -->
            <div class="tab-pane fade in" id="tab2">
            <form action="<?php echo base_url(); ?>welcome/calenders3" method="post" id="form-id">
                
                <?php
                
                if($mycountdata == 0)
                {
                    
                foreach($getalladmin as $row)
                {
                ?>
                    <div class="containers content">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-md-12">
                            <div class="testimonials">
                                <div class="active item">
                                    <div class="carousel-info">
                                        <img alt="" src="<?php echo base_url(); ?><?php echo $row->logo; ?>"
                                             class="left1">
                                        <div class="right1">
                                            <span class="testimonials-name"><?php echo $row->name; ?></span>
                                            <span class="testimonials-post"><?php echo $row->info; ?></span>
                                            <textarea class="textans" onkeyup="" onmouseover="" id="new<?php echo $row->id; ?>"
                                                      name="new[]"></textarea>
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
            if($mycountdata > 0)
            {
                foreach($getalladmin as $row)
                {
                    foreach($getandinfo as $row1)
                    {
                        if($row->id == $row1->qid)
                        {
                            ?>
                            <div class="containers content">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-md-12">
                            <div class="testimonials">
                                <div class="active item">
                                    <div class="carousel-info">
                                        <img alt="" src="<?php echo base_url(); ?><?php echo $row->logo; ?>"
                                             class="left1">
                                        <div class="right1">
                                            <span class="testimonials-name"><?php echo $row->name; ?></span>
                                            <span class="testimonials-post"><?php echo $row->info; ?></span>
                                            <textarea class="textans newtext" onkeyup="" onmouseover="" id="new<?php echo $row->id; ?>"
                                                      name="new[]"><?php echo $row1->ans ?></textarea>
                                                      <span class="err_msg" id="error<?php echo $row->id; ?>" style="display: none;">Please fill the above input</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                   
                   <?php     }
                    }
                }
                
            }
                
                ?>
                
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Profile</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new1"-->
                <!--                                      name="new1"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Books</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new2"-->
                <!--                                      name="new2"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->

                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Book chapters</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new3"-->
                <!--                                      name="new3"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Videos</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new4"-->
                <!--                                      name="new4"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Magazines</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new5"-->
                <!--                                      name="new5"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->

                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Social Media Posts</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new6"-->
                <!--                                      name="new6"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Free Speaking Engagements</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new7"-->
                <!--                                      name="new7"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Articles</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new8"-->
                <!--                                      name="new8"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Audio Products</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new9"-->
                <!--                                      name="new9"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Video Products</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new10"-->
                <!--                                      name="new10"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->
                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Interviews</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new11"-->
                <!--                                      name="new11"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->


                <!--<div class="containers content">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12 col-lg-12 col-md-12">-->
                <!--            <div class="testimonials">-->
                <!--                <div class="active item">-->
                <!--                    <div class="carousel-info">-->
                <!--                        <img alt="" src="<?php echo base_url(); ?>assets/images/code.png"-->
                <!--                             class="pull-left">-->

                <!--                        <div class="pull-left">-->
                <!--                            <span class="testimonials-name">Miscellaneous</span>-->
                <!--                            <span class="testimonials-post">Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write</span>-->
                <!--                            <textarea class="textans" onkeyup="" onmouseover="" id="new12"-->
                <!--                                      name="new12"></textarea>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                </form>
                <!--<button class="smallleftbuttons"><span>Previous </span></button>-->
                <button class="smallbuttons" id="btnclick"><span>Next </span></button>
                
            </div>
           <!--  <div class="tab-pane fade in" id="tab3">
                <div class="sections">
                    <div class="secleft">
                        <button class="menu magazine ">M-Magazines</button>
                        <button class="menu book">B-Book</button>
                    </div>
                    <div class="secright">

                    </div>
                </div>
            </div> -->
    <!--     </div>
    </div>
 -->
</div>
<script>
     $( document ).ready(function() {
  //  Handler for .ready() called.
  $( "#btnclick" ).click(function() {
  var newabc=$('#new1').val();
  var newabc1=$('#new2').val();
  var newabc2=$('#new3').val();
  var newabc3=$('#new4').val();
  var newabc4=$('#new5').val();
  var newabc5=$('#new6').val();
  var newabc6=$('#new7').val();
  var newabc7=$('#new8').val();
  var newabc8=$('#new9').val();
  var newabc9=$('#new10').val();
  var newabc10=$('#new11').val();
  var newabc11=$('#new12').val();
  
  //alert(newabc);
 if(newabc == '' || newabc1 == '' || newabc2 == '' || newabc3 == '' || newabc4 == '' || newabc5 == '' || newabc6 == '' || newabc7 == '' || newabc8 == '' || newabc9 == '' || newabc10 == '' || newabc11 == '')
  {
     alert("Please fill all categories");
      if(newabc == ''){
        $("#error1").show();
      }
      else{
          $("#error1").hide();
      }
      
      
      if(newabc1 == ''){
        $("#error2").show();
       
      }
      else{
          $("#error2").hide();
      }
      
      
      if(newabc2 == ''){
        $("#error3").show();
      }
      else{
          $("#error3").hide();
      }
      
      if(newabc3 == ''){
        $("#error4").show();
      }
      else{
          $("#error4").hide();
      }
      
      
      if(newabc4 == ''){
        $("#error5").show();
      }
      else{
          $("#error5").hide();
      }
      
      if(newabc5 == ''){
        $("#error6").show();
      }
      else{
          $("#error6").hide();
      }
      
      if(newabc6 == ''){
        $("#error7").show();
      }
      else{
          $("#error7").hide();
      }
      if(newabc7 == ''){
        $("#error8").show();
      }
      else{
          $("#error8").hide();
      }
      if(newabc8 == ''){
        $("#error9").show();
      }
      else{
          $("#error9").hide();
      }
      
      if(newabc9 == ''){
        $("#error10").show();
      }
      else{
          $("#error10").hide();
      }
      
      if(newabc10 == ''){
        $("#error11").show();
      }
      else{
          $("#error11").hide();
      }
      
      if(newabc11 == ''){
        $("#error12").show();
      }
      else{
          $("#error12").hide();
      }
      
      if(newabc12 == ''){
        $("#error13").show();
      }
      else{
          $("#error13").hide();
      }
      
  }
  else{
      document.getElementById("form-id").submit();
  }
});

    $( ".newtext" ).keypress(function() {
        var id=$(this).attr('id');
        //alert(id);
        var ans=$(this).val();
        //alert(ans);
});

    $( ".newtext" ).keyup(function() {
        var id=$(this).attr('id');
        //alert(id);
        var ans=$(this).val();
        //alert(ans);
        var newid=id.slice(3);
        //alert(newid);
        
        $.ajax({
           "url": "<?php echo site_url('welcome/insertpetext')?>",
           "type": "POST",
           data: {msg:ans,id:newid},
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
        
});

});
</script>

</body>
</html>