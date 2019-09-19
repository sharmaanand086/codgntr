<?php include( 'header.php');?>
<?php include( 'top_menubar.php');?>
<?php include( 'middle_navigation_bar.php');?>

<section class="latest-assi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 upload_view">
                <div class=" col-xs-12 assi-cmp-bg  ">
                    <div class="assi_pull-left">
                        <img class="img-responsive" src="images/latest/Assignment_Complete_Icon.png">
                    </div>
                    <div class="latest_assi-body">
                        <div class="latest_assi-cpm_heading">
                            <h1>1. Write Your Name & Objective</h1>
                            <p>3<sup style="font-size: 12px;">rd</sup> June, 2016</p>
                        </div>
                        <div class="ass-cmp_objective">
                            <p>Create a simple Word Document and write down your name on it and your objective; what you want to achieve with Speak to a Fortune Workshop. Once complete, click <span style="font-family: 'MyriadPro-Bold';">“Submit”</span> button
                                below & upload your file. You can also see <span style="font-family: 'MyriadPro-Bold';">“View Reference”</span> for an example.</p>
                        </div>

                        <div class="btn_cmp_inline ">
                            <a class="btn_view_wrap btn-cmp-view" data-lead-id="banner-btn"> View </a>
                        </div>
                        <div class="btn_cmp_inline ">
                            <a class="btn_view_wrap btn-cmp-view" data-lead-id="banner-btn"> Edit </a>
                        </div>
                        <div class="ass_complete-view">
                            <img src="images/latest/Completion_Status.png" alt="">
                            <p>Completed on time</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class=" col-xs-12 user-comments ">
                    <h1 id="flip">Comments</h1>
                    <button type="button" class="btn1 btn-box-tool" id="cancel_content" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <!--------------------------------- hide section ---------------------------------!-->
        <div class="" id="panel">
            <div class="row">
                <div class="col-lg-12 col-md-1col-md-11  col-sm-12 col-xs-12 ">
                    <div class="col-xs-12  comment-here">
                        <form action="" method="">
                            <div class="input-area">
                                <input type="text" class="addinput_controls" placeholder="Type your comment here. Press enter to  post">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row main-cmments">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="col-xs-12 post-cmnt">
                        <ul class="">
                            <li class="wrapp-comments">
                                <div class="col-md-2 post-info">
                                    <h1>Arfeen Khan</h1>
                                    <p>Just now</p>
                                </div>
                                <div class="col-md-9 entry-content">
                                    <p>This is great.</p>
                                </div>
                                 <div class="col-md-1 comments-del">
                                    <p>Delete</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $("#flip").click(function() {
    //         $("#panel").slideToggle("slow");
    //        $('.user-comments').css("border-radius","0px 0px 0px 0px");
    //        //$('#cancel_content').css("display","block");
    //     });
    // });

$(document).ready(function(){
    $("#flip").click(function(){
       $("#panel").slideToggle(500);
        //$('.user-comments').css("border-radius","0px 0px 0px 0px");
        $("#cancel_content").toggleClass("main");
        //$('.user-comments').css("border-radius","0px 0px 10px 10px");
        //$('.user-comments').css("border-radius","0px 0px 0px 0px");
        $(".user-comments").toggleClass("main1");
    });
});
$(document).ready(function(){
    $("#cancel_content").click(function(){
       $("#panel").slideUp(500);
        $("#cancel_content").toggleClass("main");
        $(".user-comments").toggleClass("main1");

    });
});


 $(document).ready(function() {
    $(".strong_active").addClass('active');
    $(".trd").addClass('active');

});
</script>
