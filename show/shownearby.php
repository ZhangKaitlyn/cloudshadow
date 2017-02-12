<?php

/**
 * shownearby short summary.
 *
 * shownearby description.
 *
 * @version 1.0
 * @author Xinyu
 */


include "../conn.php";
$longitude=$_POST['longitude'];
$latitude=$_POST['latitude'];
$radius=0.05;

$sql="SELECT pid,ptext,purl,ptime,plongitude,platitude,yy_user.uid, yy_user.uimg, yy_user.uname, yy_user.ustatus FROM `yy_post`,`yy_user` WHERE yy_user.uid=yy_post.uid and yy_post.plongitude<=$longitude+$radius and yy_post.platitude<=$latitude+$radius and yy_post.plongitude>=$longitude-$radius and yy_post.platitude>=$latitude-$radius ORDER BY ptime desc";
//echo $sql;
$result=Mysql_query($sql);
$flist=array();
$i=0;
while($row=@mysql_fetch_array($result))
{
    $flist[$i]=$row;
    $i++;
}

if(!$flist[0])
    echo json_encode(array('status'=>0,'dataList'=>$flist));
else
    echo json_encode(array('status'=>1,'dataList'=>$flist));

