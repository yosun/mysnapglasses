<?php error_reporting(E_ALL ^ E_DEPRECATED);
$username = $_REQUEST['username'];

if(!isset($username))die('username needed');

require_once('_c0nn.php'); $username=quoty($username);

$query = 'SELECT * FROM snaps WHERE username=\''.$username.'\''; //echo $query;

$result = @mysql_query($query);

while($row=mysql_fetch_assoc($result)){

$json[]=array('id'=>$row['id'] , 'url'=> $row['url']);

}
if($_REQUEST['json']==1)
  echo json_encode($json);
else{
// outputs a webpage


}
