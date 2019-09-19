<?php include( 'admin/header.php');?>
<?php include( 'admin/top_menubar.php');?>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.slimscroll1.js');?>"> </script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.slimscroll.js');?>"> </script>
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
                    <div class="input">
                        <label for="search">Search assignment,people</label>

                        <input id="search" name="search" type="text">
                        <span class="spin"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="assi_section post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 seminar_modal">
                <div class="col-xs-12 assi-wrapp ">
                    <div class="assi_pull-left">
                        <img class="img-responsive" src="<?=base_url('assets/admin_design/images/dashboard/Assignment_Icon.png');?>">
                    </div>
                    <div class="assi-body">
                        <div class="assi-heading">
                            <h1>1. Seminar Module</h1>
                            <p>3<sup style="font-size: 12px;">rd</sup> June, 2016</p>
                        </div>
                        <div class="ass-objective">
                            <p>Your seminar module has to cover the points we've discussed in the last meet. It does not have to be perfect,
                                <br/>it has to be original.</p>
                        </div>
                        <div class="btn-inline-wrap-letest_ass">
                            <a href="" class="view_btn btn_view-inline" alt=""> Edit </a>
                        </div>
                        <div class="ass_complete">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/timmer.png');?>" alt="">
                            <p>Complete before: 18<sup style="font-size:12px;">th</sup> June, 2016</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class=" user-comments ">
                    <div class="notification">
                    <div class="wap_hide">
                        <img src="<?=base_url('assets/admin_design/images/dashboard/New Comment.png');?>" alt="">
                        <p>3</p> 
                    </div>
                        <h1 class="ass-det both_show">Assignment Details</h1>

                    </div>
                    <div class="commnt_count">
                    <div class="wap_hide">
                        <img src="<?=base_url('assets/admin_design/images/dashboard/Tick.png');?>" alt="">
                        <span class="comm_no">7</span>/<span class="comm_total">26</span>
                    </div>
                        <h1 class="cmmnt both_show">Comments</h1>

                    </div>
                </div>
            </div>
        </div>

        <!--    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div>
                    
                </div>
            </div>
        </div> -->


        <!-- assgnment tabel start-->

        <!--<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
         <script type="text/javascript" src="js/jquery.slimscroll1.js"></script>-->

        <div class="ass_wrapper">
            <div class="div_wrapper" id="testDiv">
                <ul class="main_wrapper">
                    <li class="ass_list">
                        <div class="name">
                            <p>Ajay Batra</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                    <li class="ass_list1">
                        <div class="name">
                            <p>chaithanya K. S.</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                    <li class="ass_list">
                        <div class="name">
                            <p>Chandrakant Arora</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                    <li class="ass_list1">
                        <div class="name">
                            <p>chintal Patel</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                    <li class="ass_list">
                        <div class="name">
                            <p>chintal Patel</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                    <li class="ass_list1">
                        <div class="name">
                            <p>parul shethai Pandey</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                      <li class="ass_list">
                        <div class="name">
                            <p>chintal Patel</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                      <li class="ass_list1">
                        <div class="name">
                            <p>parul shethai Pandey</p>
                        </div>
                        <div class="time all_width">
                            <p>On time</p>
                        </div>
                        <div class="status all_width">
                            <p>View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                      <li class="ass_list">
                        <div class="name">
                            <p>chintal Patel</p>
                        </div>
                        <div class="time all_width">
                            <p style="color:#6d6d6d">Pending</p>
                        </div>
                        <div class="status all_width">
                            <p style="color:#6d6d6d">View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                     <li class="ass_list1">
                        <div class="name">
                            <p>parul shethai Pandey</p>
                        </div>
                        <div class="time all_width">
                            <p style="color:#6d6d6d">Pending</p>
                        </div>
                        <div class="status all_width">
                            <p style="color:#6d6d6d">View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?=base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- assgnment tabel end-->


            <!--  comments part start-->
            <div class="div_wrapper1">
                <div class="commt_wrapp" id="panel">
                    <div class="comment-here">
                         <form name="form1">
                            <div class="input-area">
                            Enter Your ChatName :<input type="text" id="uname" name="uname" value="" /><br>
                                
                                <input type="text" class="addinput_controls search" name ="msg" id="msg" placeholder="Type your comment here. Press enter to  post">
                                        <!-- <a href="#" onclick="submitChat()">send</a> -->
                                 <span class="glyphicon glyphicon-paperclip "></span>
                            </div>
                        </form>
                    </div>
                    <div class="chat_process" id="chat_process">
                    </div>
                </div>
            </div>

            <!--  comments part end-->

        </div>


    </div>
</section>


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
    $(".user-comments").click(function(){
       $(".ass_wrapper").slideToggle(500);


        $(".wap_hide").toggleClass("not_show").delay(500);

        $(".user-comments").toggleClass("border-radius_set",500);
        $(".both_show").toggleClass("_show");
   });
   });


<!-- /******************************comment start ***************************************/ -->
    </script>

    <script type="text/javascript">

$("input").on("keydown",function search(e) {
    if(e.keyCode == 13) {
         getSuccessOutput();
   // submitChat();
     document.getElementById('msg').value = "";

    }

});

function getSuccessOutput() {
    $.ajax({
           "url": "<?php echo site_url('newadmin/chat')?>",
           "type": "POST",
           data: {msg: $("#msg").val(),name: $("#uname").val()},
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
function getSuccessmessage() {
    $.ajax({
           "url": "<?php echo site_url('newadmin/chat_message')?>",
           "type": "POST",
           data: {msg: $("#msg").val()},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               $('#chat_process').html(result);
          // alert('success in called11111 !!');
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore1111 !!');
        },
    });
    return false;
}



// $(document).ready(function(e){
//  $.ajaxSetup({cache:false});
//  setInterval(function()
//      {
//          $('#chat_process').load('logs.php');
//      }, 2000);


   // $.ajaxSetup({cache:false});
 setInterval(function(){ 
    // $('#chat_process').load('');
           //alert('this is first alert');
          getSuccessmessage();
      // $('#chat_process').load(function(){
          //alert('this is second alert');
          //getSuccessmessage();
       // });
     
      }, 1000);


// });

// $(document).ready(function(){
//     setInterval(function()
//      {
//          $('#chatlogs').load('logs.php');
//      }, 2000);
// });










</script>
<!-- /******************************comment end ***************************************/ -->

<!-- /******************************scrolll ***************************************/ -->

<script type="text/javascript">
    $(function(){
      $('#testDiv').slimscroll({
        height: '250px'
      }).parent().css({
        background: '#237FAD',
        border: '2px dashed #184055'
      });


    });
</script>

<script type="text/javascript">
    $(function(){
      $('#chat_process').slimscroller({
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



