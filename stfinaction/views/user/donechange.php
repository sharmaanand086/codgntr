<?php 
if (isset($this->session->userdata['logged_in'])) {
$username = $_POST['username'];
 $password1 = $this->session->userdata('password1');
}else {
header("location: https://arfeenkhan.com/stfaction/welcome/");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<form action="userdashboard" method="post" id="target">
    <input type="hidden" value="<?php echo $username; ?>" name="username" />
    <input type="hidden" value="<?php echo $password1 ?>" name="password" />
</form>
<script>
    $( document ).ready(function() {
   $( "#target" ).submit();
});
</script>
</body>
</html>