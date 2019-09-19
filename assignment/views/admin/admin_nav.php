<script type="text/javascript">
$(document).ready(function(){
    $('#cssmenu a').each(function(index) {
        if(this.href.trim() == window.location)
            $(this).closest('li').addClass('active');
    });
});
</script>
<div id="main_menu">
<div id='cssmenu'>

	<ul class="navigation">
		<?php echo "<li><a href='".base_url()."admin/home'>Home</a></li>";?>
		<?php echo "<li><a href='".base_url()."admin/course'>Course</a></li>";?>
		<?php echo "<li><a href='".base_url()."admin/assignment'>Assignments</a></li>";?>
		<?php echo "<li><a href='".base_url()."admin/records'>Records</a></li>";?>
		<?php echo "<li><a href='".base_url()."admin/user'>Users</a></li>";?>
		<?php echo "<li><a href='".base_url()."admin/admin'>Admin's</a></li>";?>
		<?php echo "<li><a href='".base_url()."admin/logout'>Logout</a></li>";?>
	</ul>

</div>
</div>
