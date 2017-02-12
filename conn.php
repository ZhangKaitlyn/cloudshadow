<?php 
session_start();
//echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\" />";
	@$link=mysql_connect('w.rdc.sae.sina.com.cn:3307','o22k5j4m4n','hxhm30jk3kyz3wjly5wz2z021khki1033jl15z0z');

	// 连从库
	// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

	if($link)
	{
    	mysql_select_db('app_lmst',$link);
    	//your code goes here
        //echo "数据库正常！";
	}
	mysql_set_charset("utf8");
	mysql_query("set names 'utf8'");
	date_default_timezone_set('PRC');
	//echo "数据库正常！";
?>