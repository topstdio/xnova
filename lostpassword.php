<?php

/**
 * lostpassword.php
 *
 * @version 1.0
 * @copyright 2008 by Tom1991 for XNova
 */

define('INSIDE'  , true);
define('INSTALL' , false);

$ugamela_root_path = './';
include($ugamela_root_path . 'extension.inc');
include($ugamela_root_path . 'common.' . $phpEx);
includeLang('lostpassword');
$servername = $game_config['game_name'];
	if ($action != 1) {
		$parse               = $lang;
		$parse['servername'] = $servername;
		$page .= parsetemplate(gettemplate('lostpassword'), $parse);
		display($page, $lang['system'], false);
	}
	if ($action == 1) {
		$email               = $_POST['email'];
		sendnewpassword($email);
		message($lang['NewPassSendSuccess'], 'OK');
	}

// History version
// 1.0 Création (Tom)
?>
