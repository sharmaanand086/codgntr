 
<?php include( 'header.php');?>
<div class="loader" style="position:fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background:        url('http://smbseminar.com/assignment/assets/images/preloader.gif') 50% 50% no-repeat #fff;">
     </div>
    
<?php include( 'top_menubar1.php');?>
      <style>
           .error{
                   color: red;
                 }
       </style>
       
       <div class="loader12" style=" "></div>
              
       
<section class="dash_wrapp">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper">
                 
                       <?php 
                       $attributes = array("id" => "uploadassigmentform", "name" => "uploadassigmentform");
                      echo form_open_multipart("newadmin/uploadassignment1/", $attributes);
                      ?>
                            <!--<form name="uploadassigmentform" id = "myform" action = "<?php echo site_url('newadmin/uploadassignment/'); ?>" >-->
                        <div class="dash_head ">
                            <h1>New Assignment</h1>
                            <a href="<?php echo base_url('newadmin/dashboard');?>">Cancel</a>
                        </div>
                       
                        <input class="form-control ass_input" type="text" name="assignmentname" id="assignmentname" placeholder="Assignment title " value="">
                         <span class="error">
                         <?php echo form_error('assignmentname'); ?>
                         </span>
                         <span class="err" style="display:none;color:red;">The Assignment Name field is required.</span>
                         
                           

               <textarea class="form-control" name="description" id="description" cols="20" rows="4" placeholder="Short description about the assignment"></textarea>
               <span class="error"><?php echo form_error('description'); ?></span>
               <span class="err1" style="display:none;color:red;">The Description field is required.</span>
               <textarea class="form-control" name="description1" id="description1" cols="20" rows="4" placeholder="Short description about the assignment" style="display:none"></textarea>
               <div class="newwork">

<button type="button" onClick="addRow(this)">Add</button>

                         <span class="err6" style="display:none;color:red;">The Title is requried.</span>
                         
</div>

                            <div class="section_procedure">
                                <ul class="ass_procedure">
                                    <li class="add-file">
                                    <div class="btn_add_wrapp">
                                        <a  id="click_ref" onclick="div_show()" class="add_file_btn add_file_inline">Add Word File</a>
                                        
                                    </div>


                                    <!-- modal box open -->
                                   
                                        <div id="open_file" class="inner" style="display:none;">
                                            <div class="text-box">
                                                <!--<a href="">
                                        <img src="<?php echo base_url('assets/admin_design/images/dashboard/Drag_Drop_icon.png');?>" alt="">
                                                </a>-->
                                           
                               <!--<label  for="fileassignment" class="" style="width: 400px; height: 394px; margin:auto; background: url('http://smbseminar.com/assignment/assets/images/latest/Untitled-2.png'); background-repeat: no-repeat; background-position: center; cursor: pointer; "></label>-->

                                            <input type="file" name="fileassignment" id="fileassignment" placeholder=" " value="" style="width: 400px; height: 400px; margin:auto; background: url('http://smbseminar.com/assignment/assets/images/latest/Untitled-2.png'); background-repeat: no-repeat; background-position: center; cursor: pointer;  overflow: hidden;  padding: 400px 0 0 0; " >
                                            

                                                <!--<h1>Drag & Drop</h1>
                                                <p>your assignment file here, <span style="color:#a6a6a6">or <a href="">browse</a></span>
                                                </p>-->
                                                <div class="cancel-file">
                                                    <a onclick ="div_hide()" class="js-modal-close">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                       
                                            <!-- modal box open -->

                                            <p class="reference" id="fstp">No reference file added</p>
                                            <span class="error">
                         <?php echo form_error('assignmentname1'); ?>
                         </span>
                         
                         <span class="err2" style="display:none;color:red;">The Reference File field is required.</span>
                         <input class="form-control ass_input" type="text" name="assignmentname1" id="assignmentname1" placeholder="Assignment title " value="" style="display:none;">
                                            <p class="reference" id="sndp" style="display:none;color:#000;"></p>
                                           <div class="row123" style="display:none;">      
                 <div class="progress-container" style="margin:15px 0px;display:inline-block;">
                                 
                     <div id="progress1" class="progress1" style="width:250px;height:15px;background-color:#e7e7e7;border-radius: 25px;">
                          <div class="progress-bar"   style="height: 15px;width:0%;border-radius: 25px;background:#a5bd52;overflow: hidden;"> 
<span class="progress-text" style="position: absolute;z-index: 2;bottom: -5px;color: #000;left: 70px;font-size: 14px;color: #929292;font-family: 'MyriadPro-Regular' !important;font-size: 16px;"></span>
                          </div>
                          
                    </div>     
                    <div class="filesize" id=""> </div>
                          <!--<div class="progress progress-striped active">
                                 <div class="progress-bar1 progress-bar-success" style="width:0%"></div>
                              </div>-->
                    </div>

                 </div>   
                                </li>


                                        
                                   <!-- <input type="text" name="datesub" value=""  style="display: none;"  id="abcdef">-->
                                   <!--<span class="error"><?php //echo form_error('datesub'); ?></span>-->
                                    <!-- calender design -->
                                    <script type="text/javascript">
                                        $(document).ready(function() {
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
                                    <div class=" overlay-content popup1">
                                        <div class="calender_modal">
                                            <div style=" display: inline-block;background: #fff; border-radius:8px; padding: 44px; box-shadow: 0px 0px 30px 0 #e6e6e6;">
                                                <div id="rCalendar" class="regalcalendar" style="">

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- calender design -->
                                    <li class="wrapp_date_box">
                                    
                                        <div class="btn_date_wrapp">
                                            <a href="" class="date_btn date_btn_inline show-popup" data-showpopup="1">Set A Due Date</a>
                                        </div>
                                        
                                        
                                        <div class="date_picker">	
                                        <!-- <p>No due date set</p>-->
                                        <p id="date7">No due date set</p>
                                        
                                        <p id="date5" style="display: none;">No due date set</p>
                                        <p id="date6" style="display: none;">No due date set</p>
                                        </div>	
                                        <span class="error">
                         <?php echo form_error('datesub'); ?>
                         </span>
                         <span class="err3" style="display:none;color:red;">The Last date field is required.</span>
                                        <input type="text" name="datesubtext" value=""  style="display: none;"  id="abcdef">
                                        <input type="date" name="datesub" value=""  style="display: none;"  id="abcdefg">



                                    </li>


                                    <li class="wrapp_btn">
                                        <div class="btn_send_wrapp">
                                        <input type="submit" class="date_btn date_btn_inline top_sild"  data-lead-id="banner-btn" value="Finish & Send Assignment" id="submit" name = "addassignment" >
                                        <!-- <a  class="send_file_btn send_file_inline">Finish & Send Assignment</a>-->
	   <!--<input type="submit" class="date_btn date_btn_inline top_sild"  data-lead-id="banner-btn" value="Finish & Send Assignment" id="submit" name = "addassignment">-->
              <!--<button type="submit" id="submit" name ="addassignment" class="send_file_btn send_file_inline" >Finish & Send Assignment</button>-->
                <!--<input type="button" name = "addassignmen1t" value="Finish & Send Assignment"  class="date_btn date_btn_inline top_sild" data-lead-id="banner-btn" onclick="return myFunction()">-->
               <!--<input type="button" name = "addassignment" value="Finish & Send Assignment" class="date_btn date_btn_inline top_sild"  data-lead-id="banner-btn" onclick="myFunction()">-->
              
         
                                        </div>
                                    </li>

                                </ul>
                                </div>
                       <?php //echo form_close(); ?>
                       </form>
                    </div>
                </div>

            </div>
        </div>
</section>
<div class="overlay-bg">
</div>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
        //Function To Display Popup
         function div_show() {
            document.getElementById('open_file').style.display = "block";

            
          }
        //Function to Hide Popup
         function div_hide(){
             document.getElementById('open_file').style.display = "none";
             
              
          }
          

  //function for change
 $('#fileassignment').change(function() {
           
           var filename = $('#fileassignment').val();
           var fsize=this.files[0].size;
            //alert(fsize);
           // alert(this.files[0].size);
             if (filename.substring(3,11) == 'fakepath') {
            filename = filename.substring(12);
                 // alert(filename);
                }   
              document.getElementById("sndp").innerHTML = filename;
              document.getElementById("assignmentname1").value = filename;        
             $('#open_file').css( {
                            "display":"none"
                                 });
             $('#fstp').css( {
                            "display":"none"
                                 });
             
              //alert('heyyy');
            $(".row123").css({
                  "display":"block", 
                    });
           var progression = 0;
           var c=(fsize/100).toFixed(2);
           
          // alert(c);
            var ifa=0;
            
          progress = setInterval(function() 
            {
              
              $('#progress1 .progress-text').text((progression*c).toFixed(2) + 'kb /'+fsize+'kb');

              $('#progress1 .progress-bar').css({'width':progression+'%'});
                  if(progression == 100) {
                         
                         
                      progression = 0;
                      
                    clearInterval(progress);
                    $('#sndp').css( {
                            "display":"block"
                                 });
                    $('.row123').css( {
                            "display":"none"
                                 });
                   document.getElementById("submit").disabled = false;
                      progression = 0;
                  } else{
          //alert(progression);
          progression += 10; 
           $('#sndp').css( {
                            "display":"none"
                                 });
  document.getElementById("submit").disabled = true;
            }           
            }, 500);
          });
       
</script>




<script>
    $(document).ready(function() {
          
        // function to show our popups
        function showPopup(whichpopup) {
            var docHeight = $(document).height(); //grab the height of the page
            var scrollTop = $(window).scrollTop(); //grab the px value from the top of the page to where you're scrolling
            $('.overlay-bg').show().css({
                'height': docHeight
            }); //display your popup background and set height to the page height
            $('.popup' + whichpopup).show().css({
                'top': scrollTop + 35 + 'px'
            }); //show the appropriate popup and set the content 20px from the window top
        }

        // function to close our popups
        function closePopup() {
            $('.overlay-bg, .overlay-content').hide(); //hide the overlay
        }

        // timer if we want to show a popup after a few seconds.
        //get rid of this if you don't want a popup to show up automatically
        //setTimeout(function() {
        // Show popup3 after 2 seconds
        //showPopup(3);
        // }, 2000);


        // show popup when you click on the link
        $('.show-popup').click(function(event) {
            event.preventDefault(); // disable normal link function so that it doesn't refresh the page
            var selectedPopup = $(this).data('showpopup'); //get the corresponding popup to show

            showPopup(selectedPopup); //we'll pass in the popup number to our showPopup() function to show which popup we want
        });

        // hide popup when user clicks on close button or if user clicks anywhere outside the container
        $('.close-btn, .overlay-bg').click(function() {
            closePopup();
              var filename = $('#fileassignment').val();
              console.log(filename);
        });

        // hide the popup when user presses the esc key
        $(document).keyup(function(e) {
            if (e.keyCode == 27) { // if user presses esc key
                closePopup();
            }
        });
        
       
    });

 
                
 
</script>

<script type="text/javascript">
  $(document).ready(function(){
        
        $('#submit').click(function() {
            
            //alert('aa');
            //document.getElementById('uploadassigmentform').submit();
           // $('#loading').html('<img src="http://rpg.drivethrustuff.com/shared_images/ajax-loader.gif"/>');
            $('.loader12').show();
            $('.losser').show();
            
            
            
            
            
          });
          
        
          
        });


</script>
<script type="text/javascript">
	
$('#description').keyup(function(e){
var a=$('#description').val();
  // alert(a);
   var str = a.replace(/(?:\r\n|\r|\n)/g, '<br />');
   
    $('#description1').val(str);
});

</script>
<script>
function myFunction() {

var fst=document.getElementById("assignmentname1").value;
//alert(fst);

var snd=document.getElementById("assignmentname").value;
//alert(snd);
var thid=document.getElementById("description").value;
//alert(thid);
var forth=document.getElementById("abcdefg").value;
//alert(forth);

if(snd=="")
{
$('.err').css( {
                            "display":"block"
                                 });
}
if(thid=="")
{
$('.err1').css( {
                            "display":"block"
                                 });
}
if(fst=="")
{
$('.err2').css( {
                            "display":"block"
                                 });
}
if(forth=="")
{
$('.err3').css( {
                            "display":"block"
                                 });
}
if(snd!="")
{
$('.err').css( {
                            "display":"none"
                                 });
}
if(thid!="")
{
$('.err1').css( {
                            "display":"none"
                                 });
}
if(fst!="")
{
$('.err2').css( {
                            "display":"none"
                                 });
}
if(forth!="")
{
$('.err3').css( {
                            "display":"none"
                                 });
}

if(snd!="" && thid!="" && fst!="" && forth!=""){

 $('.loader12').show();
            $('.losser').show();
    document.getElementById("myform").submit();
}


}
</script>

<script>
var a=0;
var b=0;
function addRow(btn) {
a=a+1;
b=b+1;
var txtbox = '<div><input class="form-control ass_input" type="text" name="newll[]" id="newo'+a+'" placeholder="Adding Question.." value="" style="margin-bottom: 15px;width:94% !important;display:inline-block;"></div>';
//document.getElementById("new").value = a;
    $(btn).closest('.newwork').append(txtbox);
}

function removeRow(id) {

b=b-1;
$('#'+id).remove();
$('#newo'+id).remove();
}


</script>

<script type="text/javascript">
    $(window).load(function() {
    $(".loader").fadeOut("slow");
     });
</script>


<!-- calender design -->

<?php include( 'footer.php');?>