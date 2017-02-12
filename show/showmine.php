<?php

/**
 * showmine short summary.
 *
 * showmine description.
 *
 * @version 1.0
 * @author Xinyu
 */


include "../conn.php";

$uid=$_GET['uid'];

$sql="SELECT pid, ptext,purl,ptime,plongitude,platitude,yy_user.uimg,yy_user.uname,yy_user.ustatus FROM yy_post, yy_user WHERE yy_user.uid = yy_post.uid and yy_post.uid=$uid ORDER BY ptime desc";
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

