<?php
/**
 * rw.php
 *
 * @version 1.0
 * @copyright 2008 by ????? for XNova
 */

define('INSIDE'  , true);
define('INSTALL' , false);

$ugamela_root_path = './';
include($ugamela_root_path . 'extension.inc');
include($ugamela_root_path . 'common.'.$phpEx);

	$open = true;

	$raportrow = doquery("SELECT * FROM {{table}} WHERE `rid` = '".(mysql_escape_string($_GET["raport"]))."';", 'rw', true);

	if (($raportrow["id_owner1"] == $user["id"]) or
		($raportrow["id_owner2"] == $user["id"]) or
		 $open) {
		$Page  = "<html>";
		$Page .= "<head>";
		$Page .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$dpath."/formate.css\">";
		$Page .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
		$Page .= "</head>";
		$Page .= "<body>";
		$Page .= "<center>";
		$Page .= "<table width=\"99%\">";
		$Page .= "<tr>";
		if (($raportrow["id_owner1"] == $user["id"]) and ($raportrow["a_zestrzelona"] == 1))
		{
			$Page .= "<td>失去与攻击舰队的联系。<br>";
			$Page .= "(换句话说，在第一轮的战斗中，他不幸壮烈了……)</td>";
		}
		else
		{
			$Page .= "<td>". stripslashes( $raportrow["raport"] ) ."</td>";
		}
		$Page .= "</tr>";
		$Page .= "</table>";
		$Page .= "</center>";
		$Page .= "</body>";
		$Page .= "</html>";
		echo $Page;
	}

?>
