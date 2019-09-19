<?php include( 'header.php');?>
<div class="speaktofortune">
    <div class="box">
        <div id="header">
            <div id="cont-lock">
              <img src="<?=base_url('assets/images/login/logo.png');?>" alt="">
            </div>

            <div class="email_pass">
                <p>A password reset link will be emailed to you.<br/>
		   Please type your email ID below.
	        </p>
            </div>         
        </div>	
		
<?php $attributes=array( "id"=>"forgotpassform", "name" => "forgotpassform"); echo form_open("newadmin/Recovery/", $attributes); ?>
        <div class="form-content">         
              <div class="group">
                  <input type="email" name="email" id="email" class="inputMaterial"  required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Email ID for password reset</label>
              </div>          
      
              <input type="submit" class="button_submit_forgotpassword" data-lead-id="banner-btn" value="Send me password reset link" id="submit" name="forgotpassword">
          </form>
        </div>
        <div id="footer-box">
           <a href="<?=base_url();?>newadmin/login" class="pass-forgot2">Log In</a>
           <?php echo form_close(); ?>
        </div>
		<div class="forgotpass login_err">
                <span class="error"> <?php echo $this->session->flashdata('emailmsg');?></span>
        </div>
    </div>
  </div>
<?php include( 'footer.php');?>
   
