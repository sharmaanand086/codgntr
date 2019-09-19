<?php include( 'header.php');?>
<?php include( 'top_menubar.php');?>


<!-- 
<section class="folder_ass">
    <div class="container">
        <div class="row">
            <img class="img-responsive folder" src="images/dashboard/Folder.png" alt="">
            <img class="img-responsive arrow" src="images/dashboard/Arrow.png"  alt=""  style="width:390px;height:280px;">
        </div>
    </div>
</section> -->


<script type="text/javascript">	  
		$( document ).ready ( function () {
			
			$('#nickname').keyup(function() {
				var nickname = $(this).val();
				
				if(nickname == ''){
					$('#msg_block').hide();
				}else{
					$('#msg_block').show();
				}
			});
			
			// initial nickname check
			$('#nickname').trigger('keyup');

                         $('#submit').click(function (e) {
                                    //alert('this is called');
	                          e.preventDefault();
	                              
	                          var $field = $('#message');
	                          var data = $field.val();

	                          $field.addClass('disabled').attr('disabled', 'disabled');
	                          sendChat(data, function (){
		                   $field.val('').removeClass('disabled').removeAttr('disabled');
	                          });
                                });

              $('#message').keyup(function (e) {
	             if (e.which == 13) {
		             $('#submit').trigger('click');
	                   }
                         });

            setInterval(function (){
	          update_chats();
             }, 5000);
                         
	});
                
		
		
      </script>

      <script type="text/javascript">
               var sendChat = function (message, callback) {
	$.getJSON('<?php echo base_url(); ?>api/send_message?message=' + message + '&nickname=' + $('#nickname').val() + '&guid=' + getCookie('user_guid'), function (data){
		callback();
	});
}

var append_chat_data = function (chat_data) {
	chat_data.forEach(function (data) {
		var is_me = data.guid == getCookie('user_guid');
		
		if(is_me){
			var html = '<li class="right clearfix">';
			html += '	<span class="chat-img pull-right">';
			html += '		<img src="http://placehold.it/50/FA6F57/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<small class="text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			html += '			<strong class="pull-right primary-font">' + data.nickname + '</strong>';
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}else{
		  
			var html = '<li class="left clearfix">';
			html += '	<span class="chat-img pull-left">';
			html += '		<img src="http://placehold.it/50/55C1E7/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<strong class="primary-font">' + data.nickname + '</strong>';
			html += '			<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}
		$("#received").html( $("#received").html() + html);
	});
  
	$('#received').animate({ scrollTop: $('#received').height()}, 1000);
}

var update_chats = function () {
	if(typeof(request_timestamp) == 'undefined' || request_timestamp == 0){
		var offset = 60*15; // 15min
		request_timestamp = parseInt( Date.now() / 1000 - offset );
	}
	$.getJSON('<?php echo base_url(); ?>api/get_messages?timestamp=' + request_timestamp, function (data){
		append_chat_data(data);	

		var newIndex = data.length-1;
		if(typeof(data[newIndex]) != 'undefined'){
			request_timestamp = data[newIndex].timestamp;
		}
	});      
}
      </script>

      <script>
                var request_timestamp = 0;

var setCookie = function(key, value) {
	var expires = new Date();
	expires.setTime(expires.getTime() + (5 * 60 * 1000));
	document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

var getCookie = function(key) {
	var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
	return keyValue ? keyValue[2] : null;
}

var guid = function() {
	function s4() {
		return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
	}
	return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

if(getCookie('user_guid') == null || typeof(getCookie('user_guid')) == 'undefined'){
	var user_guid = guid();
	setCookie('user_guid', user_guid);
}


// https://gist.github.com/kmaida/6045266
var parseTimestamp = function(timestamp) {
	var d = new Date( timestamp * 1000 ), // milliseconds
		yyyy = d.getFullYear(),
		mm = ('0' + (d.getMonth() + 1)).slice(-2),	// Months are zero based. Add leading 0.
		dd = ('0' + d.getDate()).slice(-2),			// Add leading 0.
		hh = d.getHours(),
		h = hh,
		min = ('0' + d.getMinutes()).slice(-2),		// Add leading 0.
		ampm = 'AM',
		timeString;
			
	if (hh > 12) {
		h = hh - 12;
		ampm = 'PM';
	} else if (hh === 12) {
		h = 12;
		ampm = 'PM';
	} else if (hh == 0) {
		h = 12;
	}

	timeString = yyyy + '-' + mm + '-' + dd + ', ' + h + ':' + min + ' ' + ampm;
		
	return timeString;
}
      </script>
     






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
<?php foreach($assignment as $row){?>
  <?php          $update=$row->udate;
                 $sudate=$row->subdate;
           
              $date = date_create($update);
              $date1= date_create($sudate);
        
             
             //var_dump($assignmentno);
             
        ?>
<section class="assi_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 seminar_modal">
                <div class="col-xs-12 assi-wrapp ">
                    <div class="assi_pull-left">
                        <img class="img-responsive" src="<?php echo base_url('assets/admin_design/images/dashboard/Assignment_Icon.png');?>">
                    </div>
                    <div class="assi-body">
                        <div class="assi-heading">
                            <h1><?php echo $row->aid; ?>.<?php echo $row->name; ?></h1>
                            <p><?php echo date_format( $date , 'jS F, Y');?></p>
                        </div>
                        <div class="ass-objective">
                            <p><?php echo $row->discription;?></p>
                        </div>
                        <div class="btn-inline-wrap-letest_ass">
                            <a href="" class="view_btn btn_view-inline" alt=""> Edit </a>
                        </div>
                        <div class="ass_complete">
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/timmer.png');?>" alt="">
                            <p>Complete before:<?php echo date_format( $date1 , 'jS F, Y');?></p>
                        </div>
                    </div>
                </div>
            </div>
       
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="user-comments" id="<?php echo "$row->aid"; ?>" value="<?php echo "$row->aid"; ?>">
                    <div class="notification">
                        <div class="ass_hide" id="<?php echo "b$row->aid"; ?>">
                        <img src="<?php echo base_url('assets/admin_design/images/dashboard/New Comment.png');?>" alt="">
                        <p>3</p> 
                       
                        </div>
                        <h1 class="ass-det ass_show" id="<?php echo "c$row->aid"; ?>">Assignment Details</h1>

                    </div>
                    <div class="commnt_count">
                        <div class="ass_hide" id="<?php echo "d$row->aid"; ?>">
                        <img src="<?php echo base_url('assets/admin_design/images/dashboard/Tick.png');?>" alt="">
                        <span  class="comm_no">7</span><span class="ass_hide">/</span><span class="comm_total ass_hide">26</span>
                        </div>
                        <h1 class="ass-det ass_show" id="<?php echo "e$row->aid"; ?>">Comments</h1>

                    </div>
                </div>
            </div>
        </div>

      </div>
      

        


        <!-- assgnment tabel start-->
        <div class="ass_wrapper" id="<?php echo "a$row->aid"; ?>">
            <div class="div_wrapper">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                    <li class="ass_list">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                      <li class="ass_list">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                      <li class="ass_list1">
                        <div class="name">
                            <p>chintal bhavesh Patel</p>
                        </div>
                        <div class="time all_width">
                            <p style="color:#6d6d6d">Pending</p>
                        </div>
                        <div class="status all_width">
                            <p style="color:#6d6d6d">View</p>
                        </div>
                        <div class="batch all_width">
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
                            <p>3</p>
                        </div>
                    </li>
                     <li class="ass_list">
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
                            <img src="<?php echo base_url('assets/admin_design/images/dashboard/sheld.png');?>" alt="">
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
                                   <div class="container" style="width: 100%;">
    <div class="row">
		<div class="panel panel-primary" >
			<div class="panel-heading">
				<span class="glyphicon glyphicon-comment"></span> Chat
			</div>
			<div class="panel-body">
				<ul class="chat" id="received">
					
				</ul>
			</div>
			<div class="panel-footer">
				<div class="clearfix">
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon">
								Nickname:
							</span>
							<input id="nickname" type="text" class="form-control input-sm" placeholder="Nickname..." />
						</div>
					</div>
					<div class="col-md-8" id="msg_block">
						<div class="input-group">
							<input id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="submit">Send</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>  

                         <!--<form name="form1">
                            <div class="input-area">
                            Enter Your ChatName :<input type="text" id="uname" name="uname" value="" /><br>
                                
                                <input type="text" class="addinput_controls search" name ="msg" id="msg" placeholder="Type your comment here. Press enter to  post">
                                       <a href="#" onclick="submitChat()">send</a> 
                                 <span class="glyphicon glyphicon-paperclip "></span>
                            </div>
                        </form>-->
                    </div>

                     

                    <div class="chat_process" id="chat_process">
                    </div>
                </div>
            </div>

            <!--  comments part end-->
           

        </div>


    </div>
</section>
<?php }?>
<script>

    $(document).ready(function(){

          

        $(".user-comments").click(function(){
             
             var abc1 = $(this).attr('id');
              alert(abc1);
             if(abc=abc1234){
               alert('');
                }
             else{
               alert('this no work');
                }
             var abc1234=$(this).attr('value');
            alert(abc1234);

             
             console.log(abc1);
             var ts='#'+abc1;
             //alert(ts);
            
             var abc2='a'+abc1;
             var th='#'+abc2;
             //alert(th);

             var abc3='b'+abc1;

             var th1='#'+abc3;
             //alert(th1);

             var abc4='c'+abc1;
             var th2='#'+abc4;
             //alert(th2);

             var abc5='d'+abc1;
             var th3='#'+abc5;
             //alert(th3);
 
             var abc6='e'+abc1;
             var th4='#'+abc6;
             //alert(th4);
             
             //var abc7='j'+abc1;
             //var th5='#'+abc7;
             //alert(th5);

             $(th).slideToggle(500);
             $(ts).toggleClass("main");

             $(th1).toggleClass("hide");
             $(th2).toggleClass("hide1");

             $(th3).toggleClass("hide");
             $(th4).toggleClass("hide1");

             

               //$(".ass_hide").toggleClass("hide");
               // $(".ass_wrapper").hide();
               

             //  $(th).slideToggle(500);
         //$(".wap_hide").toggleClass("not_show").delay(500);

       // $(".user-comments").toggleClass("border-radius_set",500); 
       //$(".both_show").toggleClass("_show");

               //$(th1).hide();     
               //$(this).next().show('slow');

             });
        });
</script>



     <script type="text/javascript">
    $(document).ready(function(){
    //$(".user-comments ").click(function(){


       //$(th).slideToggle(500);
       //  $(".wap_hide").toggleClass("not_show").delay(500);

       // $(".user-comments").toggleClass("border-radius_set",500); 
      // $(".both_show").toggleClass("_show");
 // }); 
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

$("input").on("keydown",function search(e) {
    if(e.keyCode == 13) {
    submitChat();
     document.getElementById('msg').value = "";

    }

});



function submitChat(){

    var uname=document.getElementById('uname').value;
    console.log(uname);
    var msg=document.getElementById('msg').value;
    console.log(msg);


    if (uname == '' || msg == '' ) 
    {
        alert("plzz enter all  fieldes!!!!");
        return;

    }


    document.getElementById('uname').readOnly='true';
    document.getElementById('uname').style.border='none';

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById('chat_process').innerHTML=xmlhttp.responseText;

        }

    }

   // xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
     xmlhttp.open('GET','newadmin/do_search(uname,msg)',true);
    xmlhttp.send();
}




    //$.ajaxSetup({cache:false});
 //setInterval(function(){ 
    // $('#chat_process').load('logs.php');
    //  }, 2000);

</script>
