<?php include( 'header.php');?>
<div class="speaktofortune">
    <div class="box">
        <div id="header">
            <div id="cont-lock">
              <img src="<?=  base_url('assets/images/login/logo.png');?>"  alt="">
            </div>
        </div>
		<?php $attributes=array( "id"=>"loginform", "name" => "loginform"); echo form_open("newadmin/login/", $attributes); ?>
        <div class="form-content">          
              <div class="group">
                  <input class="inputMaterial" type="email" name="email" id="email" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
				  <span class="error" id="error1"><?php echo form_error('email'); ?></span>	
                  <label>Email ID</label>
              </div>
              <div class="group">
                  <input class="inputMaterial inputMaterial1" type="password" name="password" id="pass" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
				  <span class="error" id="error2"><?php echo form_error('password'); ?></span>
                  <label>Password</label>
              </div>
             
              <input type="submit" class="button_submit" data-lead-id="banner-btn" value="Go Inside" id="submit" name="Login">  
  
        </div>
        <div id="footer-box">
              <a href="<?=base_url();?>newadmin/forgot" class="footer-text">Forgot Password</a>            
        </div>
	<center class="login_err">
            <?php echo form_close(); ?>
            <span class="error"> <?php echo $this->session->flashdata('usermsg');?></span>
        </center>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $.fn.center = function() {
        this.css("position", "absolute");
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
        this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
        return this;
    }

    $("#banner-btn").on("click", function() {
        window.location = "href";
        // window.demo1.index3.
    });
</script>
<script>
    $('#email').keyup(function() {
        if ($(this).val() != "") {
            console.log($(this).val());
            $("#error1").hide();
        } else {
            $("#error1").show();
        }
    });

    $('#email').blur(function() {
        if ($(this).val() != "") {
            console.log($(this).val());
            $("#error1").hide();
        } else {
            $("#error1").show();
        }
    });

    $('#pass').keyup(function() {
        if ($(this).val() != "") {
            console.log($(this).val());
            $("#error2").hide();
        } else {
            $("#error2").show();
        }
    });

    $('#pass').blur(function() {
        if ($(this).val() != "") {
            console.log($(this).val());
            $("#error2").hide();
        } else {
            $("#error2").show();
        }
    });
</script>
<?php include( 'footer.php');?>