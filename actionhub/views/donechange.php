<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<form action="userdashboard" method="post" id="target">
    <input type="hidden" value="<?php echo $_SESSION['email']; ?>" name="email" />
    <input type="hidden" value="<?php echo $_SESSION['password1']; ?>" name="password" />
</form>
<script>
    $( document ).ready(function() {
    $( "#target" ).submit();
});
</script>
</body>
</html>