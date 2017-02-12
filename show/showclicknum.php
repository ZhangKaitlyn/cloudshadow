<?php

/**
 * showclicknum short summary.
 *
 * showclicknum description.
 *
 * @version 1.0
 * @author Xinyu
 */


include "../conn.php";

$pid=$_GET['pid'];

$b="select count(uid) from `yy_click` where `pid`='$pid'";
$bresult=MySQL_query($b);
$brow=mysql_fetch_array($bresult);
$num=$brow[0];

echo json_encode(array('num'=>$num));

