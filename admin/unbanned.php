<?php

/**
 * unbanned.php
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

	if ($user['authlevel'] >= "2") {

		$parse['dpath'] = $dpath;
		$parse = $lang;

		$mode = $_GET['mode'];

		if ($mode != 'change') {
			$parse['Name'] = "帐号";
		} elseif ($mode == 'change') {
			$nam = $_POST['nam'];
			doquery("DELETE FROM {{table}} WHERE who2='{$nam}'", 'banned');
			doquery("UPDATE {{table}} SET bana=0, banaday=0 WHERE username='{$nam}'", "users");
			message("帐号 {$nam} 已被解封!", '消息');
		}

		display(parsetemplate(gettemplate('admin/unbanned'), $parse), "Overview", false, '', true);
	} else {
		message( $lang['sys_noalloaw'], $lang['sys_noaccess'] );
	}

?>