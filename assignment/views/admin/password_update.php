<?php include( 'header.php');?>
<div class="speaktofortune">
    <div class="box2">
        <div id="header">
            <div id="cont-lock1">
              <img src="<?=  base_url('assets/images/login/logo.png');?>"  alt="">
            </div>
        </div>

        <div class="form-content">          
            <div class="animated_class">
                <canvas class="cancv" height="160"></canvas>
            </div>
            <div class="fst_line2">
                <p class="reset-link">Your password has been successfully updated</p>
            </div>
        </div>
        <div id="footer-box">
              <a href="<?=base_url();?>newadmin/login" class="pass-forgot2">Log In</a>         
        </div>
                 
    </div>
</div>

<script type="text/javascript">
    var start = 100;
    var mid = 145;
    var end = 220;
    var width = 18;
    var leftX = start;
    var leftY = start;
    var rightX = mid + 2;
    var rightY = mid - 3;
    var animationSpeed = 20;

    var ctx = document.getElementsByTagName('canvas')[0].getContext('2d');
    ctx.lineWidth = width;
    ctx.strokeStyle = 'rgba(165, 189, 82, 1)';

    for (i = start; i < mid; i++) {
        var drawLeft = window.setTimeout(function() {
            ctx.beginPath();
            ctx.moveTo(start, start);
            ctx.lineTo(leftX, leftY);
            ctx.lineCap = 'round';
            ctx.stroke();
            leftX++;
            leftY++;
        }, 1 + (i * animationSpeed) / 3);
    }

    for (i = mid; i < end; i++) {
        var drawRight = window.setTimeout(function() {
            ctx.beginPath();
            ctx.moveTo(leftX + 2, leftY - 3);
            ctx.lineTo(rightX, rightY);
            ctx.stroke();
            rightX++;
            rightY--;
        }, 1 + (i * animationSpeed) / 3);
    }
</script>

<?php include( 'footer.php');?>