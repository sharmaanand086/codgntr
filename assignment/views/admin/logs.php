<?php
$con = mysql_connect('localhost','worldsuc_assign','asdf1234');
mysql_select_db('worldsuc_assignment',$con);

$result1=mysql_query("SELECT * FROM logs ORDER BY id  DESC");
while ($extract = mysql_fetch_array($result1)) {
	
	echo "<li class='wrapp-comments'> <div class='post-info'><p>".$extract['username']."</p></div>: <div class='post_cmmnt'><p>".$extract['msg']. "</p></div></li>";	
}

?>
