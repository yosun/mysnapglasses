<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$id = $_REQUEST['id'];
require_once('_c0nn.php');$id=quoty($id);



$query = 'UPDATE snaps SET votes = votes + 1 WHERE id = '.$id;
mysql_query($query);

 ?>
