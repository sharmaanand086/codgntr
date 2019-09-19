<?php include( 'admin/header.php');?>
<?php include( 'admin/top_menubar.php');?>
<?php echo $errore; ?>
<section class="error_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 file_upload_box">
                <div class="inner-error">
                    <div class="error_page">
                        <a href="">
                            <img src="images/dashboard/Error Icon.png" alt="">
                        </a>
                        <h1>Unsupported format!</h1>
                        <p><?php echo $errore;?></p>
                        <div class="Reupload_file">
                          <a href="latest_file_upload_page.php" >Re-upload</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $(".strong_active").addClass('active');
        $(".fst").addClass('active');

    });
</script>