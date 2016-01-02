<?php

/**
 * planets_detail.php
 *
 * @version 1.0
 * @copyright 2008 塞北的雪
 * 0:46 2008-6-29
 */

define('INSIDE'  , true);
define('INSTALL' , false);
define('IN_ADMIN', true);

$ugamela_root_path = './../';
include($ugamela_root_path . 'extension.inc');
include($ugamela_root_path . 'common.' . $phpEx);
includeLang('galaxy');
includeLang('admin/planets_detail');
if ($user['authlevel'] >= "1")
{
	if(!isset($_GET["pid"])){die("参数错误");}
	$UsrMain = doquery("SELECT * FROM {{table}} WHERE `id` = '". intval($_GET["pid"]) ."';", 'planets', true);
	if(!$UsrMain){die(message("没找到这个球！","错误"));}
	//基本资料
	$body .= "<table width='100%' border='0'><tbody>";
	$body .= "<tr><td colspan=\"2\" class=\"c\">".$lang['adm_base']."</td></tr>";
	$body .= "<tr><th>{$lang['planets_id']}</th><th>".$UsrMain["id"]."</th></tr>";
	$body .= "<tr><th>{$lang['planets_type']}</th><th>".(($UsrMain['planet_type'] == 1) ? $lang['Planet'] : $lang['Moon'] )."</th></tr>";
	$body .= "<tr><th>{$lang['Pos']}</th><th>[".$UsrMain['galaxy'].":".$UsrMain['system'].":".$UsrMain['planet']."]</th></tr>";
	$body .= "<tr><th>{$lang['diameter']}</th><th>".$UsrMain['diameter']." KM</th></td>";
	$body .= "<tr><th>{$lang['Place']}</th><th>".$UsrMain['field_current'].'/'.CalculateMaxPlanetFields($UsrMain)."</th></td>";
	//废墟资源，内容保存在 表game_galaxy
	//$body .= "<tr><th>{$lang['debris']}</th><th></th>".$lang['metal'].$UsrMain['metal_debris'].$UsrMain['cristal'].$UsrMain['crystal_debris']."</td>";
	$body .= "<tr><th>{$lang['Metal']}</th><th>".pretty_number($UsrMain['metal'])."</th></td>";
	$body .= "<tr><th>{$lang['Crystal']}</th><th>".pretty_number($UsrMain['crystal'])."</th></td>";
	$body .= "<tr><th>{$lang['Deuterium']}</th><th>".pretty_number($UsrMain['deuterium'])."</th></td>";
	$body .= "<tr><th></th><th></th></td>";
	$body .= "<tr><th></th><th></th></td>";
	$body .= "<tr><th></th><th></th></td>";
	$body .= "<tr><th></th><th></th></td>";
	$body .= "<tr><th></th><th></th></td>";
	$body .= "<tr><th></th><th></th></td>";
	$body .= "</tbody></table>";
	
	//基础建筑
	$body .= "<table width='100%' border='0'><tbody>";
	$body .= "<tr><td colspan=\"2\" class=\"c\">{$lang['tech'][0]}</td></tr>";
	for ($Item = 1; $Item <= 50; $Item++)
	{
		if ($resource[$Item] != "")
		{
			$body .= "<tr><th style='text-align:left;width:80%'>".$lang['tech'][$Item]." [{$resource[$Item]}]</th>";
			$body .= "<th>".$UsrMain[$resource[$Item]]."</th></tr>";
		}
	}
	$body .= "</tbody></table>";

	//舰队
	$body  .= "<table width='100%' border='0'><tbody>";
	$body .= "<tr><td colspan=\"2\" class=\"c\">{$lang['tech'][200]}</td></tr>";
	for ($Item = 202; $Item <= 215; $Item++)
	{
		if ($resource[$Item] != "")
		{
			$body .= "<tr><th style='text-align:left;width:80%'>".$lang['tech'][$Item]." [{$resource[$Item]}]</th>";
			$body .= "<th>".$UsrMain[$resource[$Item]]."</th></tr>";
		}
	}
	$body .= "</tbody></table>";
	
	//防御
	$body  .= "<table width='100%' border='0'><tbody>";
	$body .= "<tr><td colspan=\"2\" class=\"c\">{$lang['tech'][400]}</td></tr>";
	for ($Item = 401; $Item <= 503; $Item++)
	{
		if ($resource[$Item] != "")
		{
			$body .= "<tr><th style='text-align:left;width:80%'>".$lang['tech'][$Item]." [{$resource[$Item]}]</th>";
			$body .= "<th>".$UsrMain[$resource[$Item]]."</th></tr>";
		}
	}
	$body .= "</tbody></table>";
	echo message($body,"详细资料");
}
else
{
	message( $lang['sys_noalloaw'], $lang['sys_noaccess'] );
}
?>