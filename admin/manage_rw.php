<?php

/**
 * manage_rw.php
 * 战报管理器
 * @version 1.0
 * @copyright 2008 by 塞北的雪 for XNova
 */

define('INSIDE'  , true);
define('INSTALL' , false);
define('IN_ADMIN', true);

$ugamela_root_path = './../';
include($ugamela_root_path . 'extension.inc');
include($ugamela_root_path . 'common.' . $phpEx);
$MAX_Page=20;//每页显示记录数

if ($user['authlevel'] < 2){AdminMessage ($lang['sys_noalloaw'], $lang['sys_noaccess']);die();}
$PageTpl   = gettemplate("admin/rw");
$parse     = array();


$c_page = $_GET["pg"];
if($c_page=='')$c_page = 1;
$CurPage=($c_page-1)*$MAX_Page;

$All=doquery("select count(rid) from {{table}}","rw");
$rs=mysql_fetch_array($All);
$all_rs=$rs[0];
unset($rs,$All);

//好复杂的联合查询
//select rw.*,ua.username as a,ub.username as b from game_rw rw left join game_users ua on rw.id_owner1=ua.id left join game_users ub on rw.id_owner2=ub.id order by time desc limit 0,30
$sql="select rw.rid,rw.time,ua.username as a,ub.username as b from {{table}} rw left join game_users ua on rw.id_owner1=ua.id left join game_users ub on rw.id_owner2=ub.id order by time desc limit {$CurPage},{$MAX_Page}";
$rs_rw=doquery($sql,"rw");

while($rs = mysql_fetch_array($rs_rw))
{
	$parse['rw_list'] .= "<tr align='center'>\r\n";
	$parse['rw_list'] .= "\t<td class='c'><input type='checkbox' value='{$rs['rid']}'></td>\r\n";
	$parse['rw_list'] .= "\t<td class='c'>{$rs['a']}</td>\r\n";
	$parse['rw_list'] .= "\t<td class='c'>{$rs['b']}</td>\r\n";
	$parse['rw_list'] .= "\t<td class='c'><a href='../rw.php?raport={$rs['rid']}' target='_blank'>".strtoupper($rs[rid])."</a></td>\r\n";
	$parse['rw_list'] .= "\t<td class='c'>".date("Y-m-d H:i:s",$rs['time'])."</td>\r\n";
	$parse['rw_list'] .= "</tr>\r\n";
}
$parse['rw_pagelist'] = page($all_rs,'?',1,$MAX_Page,10);

$Page = parsetemplate($PageTpl, $parse);
display( $Page, $lang['adm_bn_ttle'], false, '', true);

?>