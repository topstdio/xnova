<?php

/**
 * userlist.php
 *
 * @version 1.0
 * @copyright 2008 by Chlorel for XNova
 */

define('INSIDE'  , true);
define('INSTALL' , false);
define('IN_ADMIN', true);

$ugamela_root_path = './../';
include($ugamela_root_path . 'extension.inc');
include($ugamela_root_path . 'common.' . $phpEx);

	if ($user['authlevel'] >= 2) {
		includeLang('admin');
		if ($_GET['cmd'] == 'dele') {
			DeleteSelectedUser ( $_GET['user'] );
		}
		if ($_GET['cmd'] == 'sort') {
			$TypeSort = $_GET['type'];
		} else {
			$TypeSort = "id";
		}
		
		$c_page = $_GET["pg"];
		if($c_page=='')$c_page = 1;
		$MAX_Page=20;
		$CurPage=($c_page-1)*$MAX_Page;
		
		$PageTPL = gettemplate('admin/userlist_body');
		$RowsTPL = gettemplate('admin/userlist_rows');
		
		$query   = doquery("SELECT * FROM {{table}} ORDER BY `". $TypeSort ."` ASC limit {$CurPage},{$MAX_Page}", 'users');

		$parse                 = $lang;
		$parse['adm_ul_table'] = "";
		$i                     = 0;
		$Color                 = "lime";
		while ($u = mysql_fetch_assoc ($query) ) {
			if ($PrevIP != "") {
				if ($PrevIP == $u['user_lastip']) {
					$Color = "red";
				} else {
					$Color = "lime";
				}
			}
			$Bloc['adm_ul_data_id']     = $u['id'];
			$Bloc['adm_ul_data_name']   = $u['username'];
			$Bloc['adm_ul_data_mail']   = $u['email'];
			$Bloc['adm_ul_data_adip']   = "<a href='http://www.ip.cn/?q={$u['user_lastip']}' target='_blank'><font color='{$Color}'>{$u['user_lastip']}</font></a>";
			$Bloc['adm_ul_data_regd']   = date ( "Y-m-d H:i:s", $u['register_time'] );
			$Bloc['adm_ul_data_lconn']  = date ( "Y-m-d H:i:s", $u['onlinetime'] );
			$Bloc['adm_ul_data_banna']  = ( $u['bana'] == 1 ) ? "<a href # title=\"". date ( "Y-m-d H:i:s", $u['banaday']) ."\">". $lang['adm_ul_yes'] ."</a>" : $lang['adm_ul_no'];
			$Bloc['adm_ul_data_detai']  = "&nbsp;"; // Lien vers une page de details genre Empire
			$Bloc['adm_ul_data_actio']  = "<a href=\"userlist.php?cmd=dele&user=".$u['id']."\" onclick=\"return confirm('".$lang['adm_ul_del']."')\"><img src=\"../images/r1.png\"></a>"; // Lien vers actions 'effacer'
			$PrevIP                     = $u['user_lastip'];
			$parse['adm_ul_table']     .= parsetemplate( $RowsTPL, $Bloc );
			$i++;
		}
		$parse['adm_ul_count'] = $game_config['users_amount'];

		$page = parsetemplate( $PageTPL, $parse );
		$page .=page($game_config['users_amount'],'?',1,$MAX_Page);
		display( $page, $lang['adm_ul_title'], false, '', true);
	} else {
		message( $lang['sys_noalloaw'], $lang['sys_noaccess'] );
	}

// Created by e-Zobar. All rights reversed (C) XNova Team 2008
?>