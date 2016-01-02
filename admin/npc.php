<?php

/**
 * banned.php
 *
 * @version 1.0
 * @copyright 2008 by ??????? for XNova
 */

define('INSIDE'  , true);
define('INSTALL' , false);
define('IN_ADMIN', true);

$ugamela_root_path = './../';
include($ugamela_root_path . 'extension.inc');
include($ugamela_root_path . 'common.' . $phpEx);

if ($user['authlevel'] < 2){AdminMessage ($lang['sys_noalloaw'], $lang['sys_noaccess']);die();}

	includeLang('admin/npc');
	includeLang('tech');
	$mode      = $_POST['mode'];

	$PageTpl   = gettemplate("admin/npc");

	$parse     = $lang;
	if ($mode == 'create')
	{
		$sql="";
		$sql .="M:".abs(intval($_POST["m"]))."<br>";
		$sql .="C:".abs(intval($_POST["c"]))."<br>";
		$sql .="D:".abs(intval($_POST["d"]))."<br>";
		for ($Item = 401; $Item <= 503; $Item++)
		{
			if ($resource[$Item] != ""){$sql .= $resource[$Item].":".abs(intval($_POST[$resource[$Item]]))."<br>";}
		}
		echo $sql;

		//doquery( $QryInsertBan, 'banned');

		//AdminMessage ($DoneMessage, $lang['adm_npc_create_success']);
	}
	else
	{
		/*
		//基建
		for ($Item = 1; $Item <= 50; $Item++)
		{
			if ($resource[$Item] != "")
			{
				$parse['build_tech'] .= "<tr><th>".$lang['tech'][$Item]."</th>";
				$parse['build_tech'] .= "<th><input type='text' name='{$resource[$Item]}'></th></tr>";
			}
		}
		*/
		//防御
		for ($Item = 401; $Item <= 503; $Item++)
		{
			if ($resource[$Item] != "")
			{
				$parse['build_def'] .= "<tr><th>".$lang['tech'][$Item]."</th>";
				$parse['build_def'] .= "<th><input type='text' name='{$resource[$Item]}'></th></tr>";
			}
		}
		//舰队
		for ($Item = 202; $Item <= 215; $Item++)
		{
			if ($resource[$Item] != "")
			{
				$parse['build_fleets'] .= "<tr><th>".$lang['tech'][$Item]."</th>";
				$parse['build_fleets'] .= "<th><input type='text' name='{$resource[$Item]}'></th></tr>";
			}
		}
		$Page = parsetemplate($PageTpl, $parse);
		display( $Page, $lang['adm_bn_ttle'], false, '', true);
	}
?>