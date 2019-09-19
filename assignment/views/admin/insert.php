<?php
$uname = $_REQUEST['uname'];

//echo $uname;
$msg = $_REQUEST['msg'];

//echo $msg;

// $servername = "localhost";
// $username1 = "root";
// $password = "";
// $dbname = "chatbox";

// // Create connection
// $conn = new mysqli($servername, $username1, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

$con = mysql_connect('localhost','worldsuc_assign','asdf1234');
mysql_select_db('worldsuc_assignment',$con);

mysql_query("INSERT INTO logs (username,msg) VALUES ('$uname', '$msg')");


$result1=mysql_query("SELECT * FROM logs ORDER BY id  DESC");



while ($extract = mysql_fetch_array($result1)) {
	
	echo $extract['username'].":".$extract['msg']. "<br>";

	 //echo "<br> ". $row["username"]. "  ". $row["msg"]. " " .  "<br>";
}


?>
