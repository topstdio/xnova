<?php
function doquery($query, $table, $fetch = false)
{
  global $link,$debug,$ugamela_root_path,$user,$SuspectUser;
	require($ugamela_root_path.'config.php');
	if(!$link)
	{
		$link = mysql_connect($dbsettings["server"], $dbsettings["user"],$dbsettings["pass"]) or $debug->error(mysql_error()."<br />$query","SQL Error");
		//message(mysql_error()."<br />$query","SQL Error");
		mysql_select_db($dbsettings["name"]) or $debug->error(mysql_error()."<br />$query","SQL Error");
		//mysql_query("set character set utf8");
		mysql_query("set names utf8");
		echo mysql_error();
	}

	$sql = str_replace("{{table}}", $dbsettings["prefix"].$table, $query);
	//echo($sql."<br>");//输出显示SQL
	write_log($sql,"log/mysql.txt");//写入日志
	//var_dump($SuspectUser);//重点监视对象
	//if(isset($user) && isset($SuspectUser) && (strpos($sql,"UPDATE")!===false))
	if(isset($user) && isset($SuspectUser) && (strpos($sql,"UPDATE")!==false))
	{
		if(in_array($user['username'],$SuspectUser))
		{
			file_put_contents("log/{$user['username']}.txt","[".date("Y-m-d H:i:s",time())."][".$_SERVER['PHP_SELF']."]".$sql."\r\n",FILE_APPEND);
		}
	}
	$sqlquery = mysql_query($sql) or $debug->error(mysql_error()."<br />$sql<br />","SQL Error");
	//print(mysql_error()."<br />$query"."SQL Error");

	unset($dbsettings);

	global $numqueries,$debug;
	$numqueries++;
	$debug->add("<tr><th>Query $numqueries: </th><th>$query</th><th>$table</th><th>$fetch</th></tr>");

	if($fetch)
	{
		$sqlrow = mysql_fetch_array($sqlquery);
		return $sqlrow;
	}
	else
	{
		return $sqlquery;
	}
	mysql_close($link);
	
}
// Created by Perberos. All rights reversed (C) 2006
?>
