<?php

/**
 * showcomment short summary.
 *
 * showcomment description.
 *
 * @version 1.0
 * @author Xinyu
 */
include "../conn.php";

$pid=$_GET['pid'];

$sql="SELECT yy_comment.uid,yy_comment.comtext,yy_comment.comtime,yy_user.uimg,yy_user.uname,yy_user.ustatus FROM yy_comment, yy_user WHERE yy_user.uid = yy_comment.uid and pid=$pid";
//echo $sql;
$result=Mysql_query($sql);
$flist=array();
$i=0;
while($row=@mysql_fetch_array($result))
{
    $flist[$i]=$row;
    $i++;
}
//echo json_encode(array('dataList'=>$flist));
echo json_encode(array('data'=>$flist));

