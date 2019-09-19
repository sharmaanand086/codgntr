
<?php
//var_dump($abc);

?>
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
    <!-- <script src="<?php echo base_url(); ?>assets/js/main.js"></script> -->
    <style>
        #90day {
            text-align: center;
            font-size: 21px;
            color: #d4b734;
            padding-top: 2%;
        }

    </style>
</head>
<body>
    <div class="logouts">
            <span class="logs">
                <?php
                foreach($abc as $row)
                {

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
        <p class="middlecontent">Click on a date from which you want to start your 90 day plan</p></div>
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
            <!-- <a href="<?php  echo base_url(); ?>welcome/calenders"> -->
            <div type="button" id="step1" class="btn btn-default actives">
                <div class="hidden-xs " style="margin-top: 2%;color: #000;">Step 1</div>
               
            </div>
             </a>
        </div>
        <div class="btn-group" role="group">
            <!-- <a href="<?php  echo base_url(); ?>welcome/calenders2"> -->
            <div type="button" id="step2" class="btn btn-default">
                <div class="hidden-xs" style="margin-top: 2%;color: #000;">Step 2</div>
            </div>
             </a>
        </div>
        <div class="btn-group" role="group">
            <!-- <a href="<?php  echo base_url(); ?>welcomes"> -->
            <div type="button" id="step3" class="btn btn-default" > 
                <div class="hidden-xs" style="margin-top: 2%;color: #000;" >Step 3</div> 
            </div>
            </a>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">


                <div class=" overlay-content popup1">
                    <div class="calender_modal">
                        <div style=" display: inline-block;background: #fff; border-radius:8px; padding: 44px; box-shadow: 0px 0px 30px 0 #e6e6e6;">
                            <div id="rCalendar" class="regalcalendar" style="">
                                

                            </div>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url(); ?>welcome/calenders2" id="form-id" method="post">
                <input type="hidden" name="mydate" id="mydates">
                <input type="hidden" name="mydate1" id="mydates1">
               </form>
                <p class="planning" style="">Your 90 Days
                    Master plan ends on <span id="90day"></span></p>


            </div>
            <button class="buttons" id="btnclick"><span>Next </span></button>
             
        </div>
         




            </div>
         

</div>
<script>
    $( document ).ready(function() {
  // Handler for .ready() called.
  $( "#btnclick" ).click(function() {
  var newabc=$('#mydates').val();
  //alert(newabc);
  if(newabc == '')
  {
      alert('Please select a date to continue');
  }
  else{
      document.getElementById("form-id").submit();
  }
});
});
</script>

</body>
</html>