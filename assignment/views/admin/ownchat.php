<?php include( 'header.php');?>

<div class="loader" style="position:fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background:        url('http://smbseminar.com/assignment/assets/images/preloader.gif') 50% 50% no-repeat #fff; overflow:hidden;">
</div>
<?php include( 'top_menubar.php');?>
<div class="chats" >
      <div class="participant">
        <div class="headings"><h1 class="member"><b>Participant</b></h1></div>
        <ul class="names">
          <?php
        $i=0;
        foreach($user as $row)
        {
        
         ?>
         <script type="text/javascript">
         
         $( document ).ready(function() {
    getnoticount(<?php echo $row->contactid; ?>);
});
setInterval(function(){ 
        
    getnoticount(<?php echo $row->contactid; ?>);
    
}, 10000);


         </script>
         
         <?php
        
        
         if(($i % 2) == 0){ 
         $i=$i+1;
         
         ?>
                           
                            <a href="javascript:void(0);"><span class="badge" id="main<?=$row->contactid?>" value="<?=$row->name?>"></span><li class="part1" id="<?=$row->contactid?>" value="<?=$row->name?>"><?php echo $row->name; ?></li></a>
                                        <?php  }else{
                                        $i=0;
                                         ?>
                            
                            <a href="javascript:void(0);"><span class="badge" id="main<?=$row->contactid?>" value="<?=$row->name?>"></span><li class="part2" id="<?=$row->contactid?>"  value="<?=$row->name?>"><?php echo $row->name; ?></li></a> 
                                        
                                      <?php   }
 
        }
        
        ?>
        
         </ul>
  </div>
      <div class="chatbox">
            
            <div class="chat_screen">
            <div class="panel ">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                    <input type="hidden" name="cont_id" id="cont_id" value="" class="contact_name" />
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="loader123"></div>
                    <ul class="chat">
                        
                            
                        
                        
                       
                    </ul>
                </div>
                
            </div>
        </div>
      </div>
    </div>
    
    
    
   
    
<script type="text/javascript">
    $(document).ready(function() {
    $(".strong_active2").addClass('active');
    //$(".ssd").addClass('active');

});
</script>
<script type="text/javascript">


$(document).ready(function(){
	 
           $(window).load(function() {
           $(".loader").fadeOut("slow");
             });
           });

$(".input-sm").on("keydown",function search(e) {

    if(e.keyCode == 13) {
    
         var msg = $(this).val();
         var id=$('#cont_id').val();
          //alert(msg);
          
          setmsgdata(msg,id);
document.getElementById('btn-input').value = "";
    }

});

$( "#btn-chat" ).click(function() {
    var msg = $("#btn-input").val();
         var id=$('#cont_id').val();
          //alert(msg);
          
          setmsgdata(msg,id);
document.getElementById('btn-input').value = "";
});


var fst=0;
var as;
var ass;
 var ac;
  var ac2;
$(".names li").click(function(){
        
        $(".chat_screen").fadeIn("slow");
        $(".chat_screen").fadeIn(3000);
       $('.chat').css("display","none");
        $(".loader123").show();
        var a=$(this).attr('id');
        document.getElementById('cont_id').value = a;
         
     if(fst==0)
     {   
     fst=1;
         var accc="#"+ac2;
//alert(accc);
 if(ac=='part2')
 {
$(accc).css({

"background": "#322f28",
"color":"#fff",
});
 }
 if(ac=='part1')
 {

  $(accc).css({

  "background": "#3e3b34",
  "color":"#fff",
});
 }
$(this).css({
            "background":"#d3b730",
            "color":"#000",
        });
          ac=$(this).attr('class');
          ac2=$(this).attr('id');
    // alert(ac2);
     as=setInterval(function()
  {
  


 getpartichat(a);
 
  }, 2000);
 clearInterval(ass);
 
 }
 
 else
 {
 fst=0;
 
 clearInterval(as);
 
 //alert(fst);
 var accc="#"+ac2;
//alert(accc);
 if(ac=='part2')
 {
$(accc).css({

"background": "#322f28",
"color":"#fff",
});
 }
 if(ac=='part1')
 {

  $(accc).css({

  "background": "#3e3b34",
  "color":"#fff",
});
 }
 
 ac=$(this).attr('class');
ac2=$(this).attr('id');
$(this).css({
            "background":"#d3b730",
            "color":"#000",
        });
 
 ass=setInterval(function()
  {
 getpartichat(a);
 
  }, 2000);
 
 }
  
    });

function getnoticount(id)
{
$.ajax({
           "url": "<?php echo site_url('newadmin/count_noti')?>",
           "type": "POST",
           data: {id:id},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete111 !!');
        },
        success :  function (result) {
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_process'+id1).html(result);
              
               //alert(result);
               
               if(result > 0){
                $('#main'+id).html(result);
                $('#main'+id).css("display","block");
               }
               if(result == 0){
                $('#main'+id).hide();
               }
              
               
          
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore1111 !!');
        },
    });
    return false;

}


    


function getpartichat(id)
{
$.ajax({
           "url": "<?php echo site_url('newadmin/get_msg_noti')?>",
           "type": "POST",
           data: {id:id},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete111 !!');
        },
        success :  function (result) {
                $(".loader123").hide();
           // $('#output').html('Bummer: there was an error!');
                //setupdatenoti(id);
               $('.chat').css("display","block");
               $('.chat').html(result);
               
               
              getnoticount(id);
              // alert(result);
               
               //$('#main'+id).html(result);
               
          
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore1111 !!');
        },
    });
    return false;

}


function setmsgdata(msg,id)
{
$.ajax({
           "url": "<?php echo site_url('newadmin/set_msg_noti')?>",
           "type": "POST",
           data: {msg:msg,id:id},
           dataType: "text",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete111 !!');
        },
        success :  function (result) {
        
           // $('#output').html('Bummer: there was an error!');
              // $('.chat').html(result);
              
              getpartichat(id);
              // alert(result);
               
               //$('#main'+id).html(result);
               
          
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore1111 !!');
        },
    });
    return false;

}

</script>

