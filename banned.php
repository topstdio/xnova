<html>
<head>
<title>被封名单</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="skins/evolution/default.css" />
<link rel="stylesheet" type="text/css" href="skins/evolution/formate.css" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php

/**
 * banned.php
 *
 * @version 1.0
 * @copyright 2008 by ??????? for XNova
 */
define('INSIDE'  , true);
define('INSTALL' , false);

$ugamela_root_path = './';
include($ugamela_root_path . 'extension.inc');
define('DEFAULT_SKINPATH' , 'skins/evolution/');
define('TEMPLATE_DIR'     , 'templates/');
define('TEMPLATE_NAME'    , 'chinese');
define('DEFAULT_LANG'     , 'cn');
require($ugamela_root_path.'config.php');
include($ugamela_root_path . 'includes/unlocalised.'.$phpEx);
include($ugamela_root_path . 'language/'. DEFAULT_LANG .'/lang_info.cfg');

includeLang('banned');
$parse = $lang;

$link = mysql_connect($dbsettings["server"], $dbsettings["user"],$dbsettings["pass"]);
mysql_select_db($dbsettings["name"]);
mysql_query("set character set utf8");
mysql_query("set names utf8");
$query = mysql_query("SELECT * FROM {$dbsettings["prefix"]}banned ORDER BY `id`;") or die(mysql_error());

$i=0;
while($u = mysql_fetch_array($query)){
	$parse['banned'] .=
    "<tr><td class=b><center><b>".$u[1]."</center></td></b>".
	"<td class=b><center><b>".$u[2]."</center></b></td>".
	"<td class=b><center><b>".date("Y-m-d H:i:s",$u[4])."</center></b></td>".
	"<td class=b><center><b>".date("Y-m-d H:i:s",$u[5])."</center></b></td>".
	"<td class=b><center><b>".$u[6]."</center></b></td></tr>";
	$i++;
}
if ($i=="0")
 $parse['banned'] .= "<tr><th class=b colspan=5>".$lang["Msg_No_user"]."</th></tr>";
else
  $parse['banned'] .= "<tr><th class=b colspan=5>".$i.$lang["Msg_total_user"]."</th></tr>";

echo(parsetemplate(gettemplate('banned_body'), $parse));


// Created by e-Zobar (XNova Team). All rights reversed (C) 2008
?>