<?php
$username = $_REQUEST['username'];

require_once('_c0nn.php'); $username=quoty($username);

$query = 'SELECT * FROM snaps WHERE username=\''.$username.'\''; //echo $query;

$result = @mysql_query($query);

while($row=mysql_fetch_assoc($result)){

$json[]=array('id'=>$row['id'] , 'url'=> $row['url']);

}

echo json_encode($json);
