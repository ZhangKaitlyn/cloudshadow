<?php

/**
 * chg short summary.
 *
 * chg description.
 *
 * @version 1.0
 * @author Xinyu
 */

include "../conn.php";
$spinfo=array(
    "status"=>0,
    "errorinfo"=>""
    );

function Checknick($name){
    $sql="select `uname` from `yy_user` where `uname`='$name'";
    $a=MySQL_query($sql);
    $row=mysql_fetch_array($a);
    $name=$row ["uname"];
    return $name;
}
function Checkpass($id){
    $sql="select `upassword` from `yy_user` where `uid`='$id'";
    $a=MySQL_query($sql);
    $row=mysql_fetch_array($a);
    $pass=$row ["upassword"];
    return $pass;
}

$item=$_POST['item']; //1为修改昵称，2为修改密码


if($item=="1"){
    $id=$_POST['id'];
    $name=$_POST['name'];
    if(!$name) $error="昵称不能为空噢！~~";
    if((!isset($error)) and (Checknick($name))) $error="用户名已存在！请修改";
    if(!isset($error))
    {
        $sql="UPDATE `yy_user` SET `uname`='$name'  where `uid`='$id'";
        //echo $sql;
        MySQL_query($sql);

        $b="select * from `yy_user` where `uname`='$name'";
        //echo $b;
        $result=MySQL_query($b);
        $row=mysql_fetch_array($result);
        $name0=$row["uname"];
        if($name0) $spinfo['status']=1;
        else
        {
            $spinfo['status']=0;
            $spinfo['errorinfo']="获取错误！";
        }
    }
    else
    {
        $spinfo['status']=0; $spinfo['errorinfo']=$error;
    }

}
else if($item=="2"){
    $id=$_POST['id'];
    $oldpass=$_POST['oldpass'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    if((!isset($error)) and (Checkpass($id)!=$oldpass)) $error="原密码错误！";
    if((!isset($error)) and (!$password)) $error="请输入密码！";
    if((!isset($error)) and (!@ereg("^[_0-9A-Za-z?!@#.,]*$", $password))) $error="密码需要由字母、数字或#?!_@.,构成";
    if((!isset($error)) and ($password!=$password2)) $error="两次密码不同喔!!";
    if(!isset($error))
    {
        $sql="UPDATE `yy_user` SET `upassword`='$password'  where `uid`='$id'";
        //echo $sql;
        MySQL_query($sql);
        $spinfo['status']=1;
    }
    else
    {
        $spinfo['status']=0; $spinfo['errorinfo']=$error;
    }

}

$spinfoencode=json_encode($spinfo);
echo $spinfoencode;
