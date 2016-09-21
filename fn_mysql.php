<?php

function quoty($txt){
return	mysql_real_escape_string($txt);
}

function mesc($txt,$conn){
	return mysql_real_escape_string($txt);
}

function mput($query,$conn){
    mysql_query($query,$conn) or $query = mysql_error($conn);

	return $query;
}

function mpoke($query,$conn){ // alias of mput
	return mput($query,$conn);
}

function mins($tab,$cubbyhole,$obj,$mult=0){
  // table, column name [array], objects of col [array]
  if($mult!=1){
	(!is_array($obj))?$obj=sprintf("'%s'",$obj):$que="array";
    if($que=='array'){
      $c="`".$cubbyhole[0]."`";
      $o="'".$obj[0]."'";
	  for($i=1;$i<count($cubbyhole);$i++){
		$c.=",`".$cubbyhole[$i]."`";
		$o.=",'".$obj[$i]."'";
	  }
	  $cubbyhole=$c;
	  $obj=$o;
	}

	$que=sprintf("INSERT INTO `%s` (%s) VALUES (%s)",$tab,$cubbyhole,$obj);
  }else{
	(!is_array($obj))?$obj=sprintf("'%s'",$obj):$que="array";
    if($que=='array'){
      $c=$cubbyhole[0];

      for($i=1;$i<count($cubbyhole);$i++){
	      $c.=",".$cubbyhole[$i];
	  }

      for($j=0;$j<count($obj);$j++){
          $o.="('".$obj[$j][0]."'";
		  for($i=1;$i<count($cubbyhole);$i++){

			$o.=",'".$obj[$j][$i]."'";
		  }
		  $o.="),";
	  }
	  $cubbyhole=$c;
	  $obj=substr($o,0,strlen($o)-1);
	}

	$que=sprintf("INSERT INTO %s (%s) VALUES %s",$tab,$cubbyhole,$obj);
  }
    return $que;
}


function mupd($tab,$cubbyhole,$obj,$key,$keyval){
  // table, col name [array], obj of col [array], row key to fetch, keyvalue
  (!is_array($cubbyhole))?$que=sprintf("UPDATE %s SET %s='%s' WHERE %s='%s'",$tab,$cubbyhole,$obj,$key,$keyval):$que="array";
  if($que=='array'){
    $que=sprintf("UPDATE %s SET %s='%s'",$tab,mysql_escape_string($cubbyhole[0]),mysql_escape_string($obj[0]));
  	for($i=1;$i<count($cubbyhole);$i++){
	    $que.=sprintf(", %s='%s'",$cubbyhole[$i],$obj[$i]);
	}
	$que.=sprintf(" WHERE %s='%s'",$key,$keyval);
  }
  return ltrim($que);
}

function mget($query,$conn){
  // $query = mysql_real_escape_string($query,$conn);
  $a=mysql_query($query,$conn) or $query = mysql_error($conn);

if($a!=""){
   while($row=@mysql_fetch_array($a)) {
       $ret[] = $row;
   }
   @mysql_free_result($a);
}else $ret=$query;

   return $ret;
}




?>
