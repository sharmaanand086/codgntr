<?php include( 'header.php');?>
<div class="speaktofortune">
<?php $ccid=$userid;?>
    <div class="box">
        <div id="header">
            <div id="cont-lock">
              <img src="<?=  base_url('assets/images/login/logo.png');?>"  alt="">
            </div>
        </div>
		<?php $attributes=array( "id"=>"updatepassform", "name" => "updatepassform"); echo form_open("newadmin/updatepass/$ccid", $attributes); ?>
        <div class="form-content">          
              <div class="group">
                  <input  type="password" name="newpassword" id="newpassword" class="inputMaterial" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
				  <span class="error"><?php echo form_error('newpassword'); ?></span>
                  <label for="newpassword">New Password</label>
              </div>
              <div class="group">
                  <input class="inputMaterial inputMaterial1" type="password" name="confirmpassword" id="confirmpassword" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
				  <span class="error"><?php echo form_error('confirmpassword'); ?></span>	
                  <label for="confirmpassword">Confirm New Password</label>
              </div>
             
              <input type="submit" class="button_submit1" data-lead-id="banner-btn" value="Change Password" id="submit" name="Change Password">
  
        </div>
        
                    <center class="login_err">
                        <?php echo form_close(); ?>
                        <span class="error"> <?php echo $this->session->flashdata('resetpassmsg');?></span>
                    </center>

    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $("#banner-btn").on("click", function() {
        window.location = "href";
        // window.demo1.index3.
    });
</script>

<?php include( 'footer.php');?>