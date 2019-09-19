<?php
$this->db2 = $this->load->database('appointment', TRUE);
//var_dump($questions);
$maxOptValue=10;
header('Access-Control-Allow-Origin: *');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Discover your mindset blueprint</title>
  	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <link rel="stylesheet" type="text/css" href="http://arfeenkhan.com/question/css/mainpagestyle.css">
<!-- calender -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style>
	    .dbdate{
	        position: relative;
            width: 20%;
	    }
	    .dbtime{
	          width: 13%;
              margin-left: 303px;
	    }
	</style>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/cc-style.css"></li>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/cc-responsive.css"></li>
  
</head>
<body>

<div class="main-identity">
  <div class="heading1">
     <p class="arfeenkhan">arfeen khan </p>
     <p class="kyidentity"style="">Discover your mindset blueprint</p>
     <!-- <p class="inminutes">in 6 minutes</p>  -->
  </div>
</div>
  <div class="card">
    <iframe src="https://player.vimeo.com/video/341523301?title=0&amp;byline=0&amp;portrait=0"  width=100%; height="450px"; frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
  </div>
 <div class="section-title2">
    
  <div class="getstarted forms ">
     <form style="width:100%" class="getstarted" id="questionnaireForm" method="post" action="<?php echo base_url(); ?>thankYouPage" >
    <input type="text" placeholder="Enter your name" name="firstname" id="firstname" class="form-control" required>
    <input type="email" placeholder="Enter your email" class="form-control" name="email" id="email"  required>
    <input type="text" placeholder="Enter your contact number" class="form-control" name="mobile" id="mobile"required>
     <input type="hidden" name="qn_title"  value="<?php echo $qn_title; ?>" />				
		<input type="hidden" name="questionnaire_id"  value="<?php echo $questionnaire_id; ?>" />
		<input type="hidden"  id="totalpage" value="<?php echo $totalpage; ?>" />
		<input type="hidden"  id="totalQuestion" value="<?php echo $totalQuestion; ?>" />
	    <input type="hidden" name="session_date" id="session_date" value="" required>
        <input type="hidden" name="session_time" id="session_time" value="" required>
		<?php
	$a= 1;
	foreach($abc as $row){
	    ?>
	    <input type="hidden" id="abc<?php echo  $a; ?>" name="abc<?php echo  $a; ?>" class="green" value="<?php echo $row; ?>" >
	    <?php
	    $a++;
	}
	$j=1;
	while($j < 84)
			{?>
			<input type="hidden" class="question_id" name="question_id[]" value="<?php echo $this->encrypt->encode(intval($questions[$j]->question_id)); ?>" />
			<input type="hidden" id="value_max[<?php echo intval($questions[$j]->question_id); ?>]" name="value_max[<?php echo intval($questions[$j]->question_id); ?>]" value="<?php echo $this->encrypt->encode(intval($maxOptValue)); ?>" />

  	
  	<?php $j++;	} ?>
  	
   
 
 		</div>
 		<div>
 		    </form>
    
 				<p class="heading-duration"><b>Duration:</b><span>15 minutes</span></p>
 			
 			<div class="main-box">
 			    <div class="adjust-title">
 			    <p style="">Available starting times for<span><b id="textchabge"> Thu, September 20, 2019</b></span></p>
 			    </div>
 			<div class="calender" id="calender" >
            <div class="date_div" id="thdec"><p >19th Sep</p></div>
            <div class="date_div" id="nddec1"><p >20th SEp</p></div>
               

            <input type="hidden" name="maindate" id="maindate" value="September-19-2019" />
            <input type="hidden" name="formateddate" id="formateddate" value="2019-09-19" />
 				</div>
 				<div class="calender-schedule">
 					
 					<div class="time-slot" style="text-align: center;">
 						<div class="amslot">
 				<?php      $this->db->select('*');
                            $this->db->from('calander');
                            $this->db->order_by('id', 'ASC');
                            $this->db->where('coach_id','1');
                            $query1 = $this->db->get();
                            $results = $query1->result_array();
                      
            	   // var_dump($results);
            	    foreach($results as $result1)
            	    {
            	         $disable = $result1['apmtime'];
            	        $disable1 = $result1['date'];
            	         $condition22 = "session_date = '" .  $disable1. "' AND session_time = '" .  $disable. "'   AND coach_id = '1' ";
            	          $this->db->select('*');
                            $this->db->from('client_registrations');
                            $this->db->where($condition22);
                            $query12 = $this->db->get();
                          $rowCount = $query12->num_rows();
                         if($rowCount < 1)
                         {
                           //  echo $result1['email'];
         				?>
         				
                              <p class="schedule-time displayclass<?php echo $result1['dateid']; ?>" onClick="set_time(this.id)" name="" id="<?php echo $result1['apmtime']; ?>" tabindex="1"><?php echo $result1['apmtime']; ?></p>
                        <?php
                         }
                          else{
                              ?>
                              <p class="schedule-time displayclass<?php echo $result1['dateid']; ?>" style="background-color:#89a0a0;cursor: not-allowed;" tabindex="1"><?php echo $result1['apmtime']; ?></p>
                              <?php
                          }
            	    }
                ?>
                <input type="hidden" id="timedatevalue" name="timedatevalue" value="" required>
            </div>
 					</div>
 				</div>
 			</div>
 			<div class="change">

 			</div>
        </div>
 		<div class="final-sub">
  <button class="sub-butn" onclick="finalsubmit();" >SUBMIT</button>
  </div>
 	</div>

    
           
    <script>
    $( document ).ready(function() {
        
    $('.schedule-time').hide();
    $('.displayclass1').show();
    
        });
     
    $( "#thdec" ).click(function() {
             $('.displayclass2').hide();
            $('.displayclass1').show();
            $('#textchabge').text(' Thu, September 19, 2019');
            $('#maindate').val('September-19-2019');
            $('#formateddate').val('2019-09-19');
            var ddd= '2019-09-19';
            
           document.getElementById('session_date').value = ddd;
            
    });
      
    $( "#nddec1" ).click(function() {
        $('.displayclass1').hide();
        $('.displayclass2').show();
        $('#textchabge').text(' Fri, Sep 20, 2019');
        $('#maindate').val('September-20-2019');
        $('#formateddate').val('2019-09-20');
         var ddd1= '2019-09-20';
            
        document.getElementById('session_date').value = ddd1;
});
  
    
function set_time(timedate){
      $('#timedatevalue').val(timedate);
      var aplytime =  document.getElementById('timedatevalue').value;
      document.getElementById('session_time').value =aplytime;
}
  function finalsubmit(){
      var t =  document.getElementById('session_time').value;
      var d =  document.getElementById('session_date').value;
       var fn =  document.getElementById('firstname').value;
      var ei =  document.getElementById('email').value;
       var mn =  document.getElementById('mobile').value;
     
     if(d==''){
         alert('Please select Your Appointment Date !');
         return false;
     }else if(t==''){
         alert('Please select Your Appointment Time !');
         return false;
     }else if(fn==''){
          alert('Please Fill Your Name !');
         return false;
     }else if(ei==''){
          alert('Please select Your Email Id !');
         return false;
     }else if(mn==''){
          alert('Please select Your Mobile Number !');
         return false;
     }else{
           $("#questionnaireForm").submit();
     }
      
  }
</script>    
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("calender");
var btns = header.getElementsByClassName("date_div");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    if (current.length > 0) { 
      current[0].className = current[0].className.replace(" active", "");
    }
    this.className += " active";
  });
}
</script>
   </div> 
    </div>
</body>
</html>