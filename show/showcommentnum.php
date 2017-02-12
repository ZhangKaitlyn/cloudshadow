<?php

/**
 * showcommentnum short summary.
 *
 * showcommentnum description.
 *
 * @version 1.0
 * @author Xinyu
 */

include "../conn.php";

$pid=$_GET['pid'];

$sql="SELECT count(*) FROM yy_comment, yy_user WHERE yy_user.uid = yy_comment.uid and pid=$pid";
//echo $sql;
$result=Mysql_query($sql);

$row=mysql_fetch_array($result);
$num=$row[0];

echo json_encode(array('num'=>$num));
