<?php

/**
 * phalanx.php
 *
 * @version 1.0
 * @copyright 2008 by ??????? for XNova
 */

define('INSIDE'  , true);
define('INSTALL' , false);

$ugamela_root_path = './';
include($ugamela_root_path . 'extension.inc');
include($ugamela_root_path . 'common.' . $phpEx);


$galaktyka = $planetrow['galaxy'];
$system = $planetrow['system'];
$planeta = $planetrow['planet'];

global $planetrow;
$liczba = $poziom * 10000;
if ($planetrow['deuterium'] > $liczba);
doquery("UPDATE {{table}} SET deuterium=deuterium-10000 WHERE id='{$user['current_planet']}'", 'planets');
if ($planetrow['deuterium'] = $planetrow['deuterium'] - $liczba);
else {
	message ("<b>没有足够的燃料!!!!</b>", "错误", "overview." . $phpEx, 2);
}

if ($planetrow['planet_type'] != '3') {
	message("该传感器只能针对月球！", "错误", "overview." . $phpEx, 1);
}
if ($planetrow['sensor_phalax'] == '0') {
	message("您必须建立空间感应阵！", "错误", "overview." . $phpEx, 1);
}

$poziom = $planetrow['sensor_phalax'];
$systemdol = $system - $poziom * 3;
$systemgora = $system + $poziom * 3;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$g  = $_GET["galaxy"];
	$s  = $_GET["system"];
	$i  = $_GET["planet"];
	$id = $_GET["id"];
	$id_owner = $_GET['id_owner'];
}

$planetas = doquery("SELECT * FROM {{table}} WHERE `galaxy` = '". $g ."' AND `system` = '". $s ."' AND `planet` = '". $i ."';", 'planets');
while ($row_planetas = mysql_fetch_array($planetas)) {
	$nome = $row_planetas['name'];
}

$missiontype = array(
	1 => '攻击',
	3 => '运输',
	4 => '部署',
	5 => '摧毁',
	6 => '侦查',
	7 => 'Stationer',
	8 => '回收',
	9 => '殖民',
	);

$fq = doquery("SELECT * FROM {{table}} WHERE  (
		( fleet_start_galaxy=$g AND fleet_start_system=$s AND fleet_start_planet=$i )
		OR
		( fleet_end_galaxy=$g AND fleet_end_system=$s AND fleet_end_planet=$i )
		) ORDER BY `fleet_start_time`", 'fleets');

if (mysql_num_rows($fq) == "0") {
	$page .= "<table width=519>
	<tr>
	  <td class=c colspan=7>空间感应阵报告</td>
	</tr><th>未探测到有舰队活动！</th></table>";
} else {
	$page .= "<center><table>";
	$parse = $lang;

	while ($row = mysql_fetch_array($fq)) {
		$i++;
		$timerek    = $row['fleet_start_time'];
		$timerekend = $row['fleet_end_time'];

		if ($row['fleet_mission'] == 1) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 2) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 3) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 4) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 5) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 6) { $kolormisjido = orange; }
		if ($row['fleet_mission'] == 7) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 8) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 9) { $kolormisjido = lime;   }
		if ($row['fleet_mission'] == 1) { $kolormisjiz = green;   }
		if ($row['fleet_mission'] == 2) { $kolormisjiz = green;   }
		if ($row['fleet_mission'] == 3) { $kolormisjiz = green;   }
		if ($row['fleet_mission'] == 4) { $kolormisjiz = green;   }
		if ($row['fleet_mission'] == 5) { $kolormisjiz = green;   }
		if ($row['fleet_mission'] == 6) { $kolormisjiz = B45D00;  }
		if ($row['fleet_mission'] == 7) { $kolormisjiz = green;   }
		if ($row['fleet_mission'] == 8) { $kolormisjiz = green;   }
		if ($row['fleet_mission'] == 9) { $kolormisjiz = green;   }

		// variable avec les coordoner d'origine
		$g1 = $row['fleet_start_galaxy'];
		$s1 = $row['fleet_start_system'];
		$i1 = $row['fleet_start_planet'];

		// variable avec les coordoner de destination
		$g2 = $row['fleet_end_galaxy'];
		$s2 = $row['fleet_end_system'];
		$i2 = $row['fleet_end_planet'];

		$parse['manobras'] .= "<tr><th><div id=\"bxxfs$i\" class=\"z\"></div><font color=\"lime\">" . date("H:i:s", $row['fleet_start_time']-5 * 60 * 60) . "</font> </th><th colspan=\"3\">";
		$parse['manobras'] .= "<th><font color=\"$kolormisjido\">一只";
		$parse['manobras'] .= '(<a title="';
		/*
		  Il faut faire une liste de flotte
		*/
		$fleet = explode(";", $row['fleet_array']);
		$e = 0;
		foreach($fleet as $a => $b) {
			if ($b != '') {
				$e++;
				$a = explode(",", $b);
				$parse['manobras'] .= "{$lang['tech']{$a[0]}}: {$a[1]}, \n";
				if ($e > 1) {
					$parse['manobras'] .= "\t";
				}
			}
		}
		$parse['manobras'] .= "\">舰队</a>)";

		$parse['manobras'] .= " 从星球 <font color=\"white\">[$g1:$s1:$i1]</font> 登陆 <font color=\"white\">[$g2:$s2:$i2]</font>. 任务:";
		$parse['manobras'] .= " <font color=\"white\">{$missiontype[$row['fleet_mission']]}</font></th><br>";

		$parse['manobras'] .= "<tr><th><div id=\"bxxfs$i\" class=\"z\"></div><font color=\"green\">" . date("H:i:s", $row['fleet_end_time']-5 * 60 * 60) . "</font></th><th colspan=\"3\">";
		$parse['manobras'] .= "<th><font color=\"$kolormisjido\">一只 ";
		$parse['manobras'] .= '(<a title="';
		/*
		  Il faut faire une liste de flotte
		*/
		$fleet = explode(";", $row['fleet_array']);
		$e = 0;
		foreach($fleet as $a => $b) {
			if ($b != '') {
				$e++;
				$a = explode(",", $b);
				$parse['manobras'] .= "{$lang['tech']{$a[0]}}: {$a[1]}, \n";
				if ($e > 1) {
					$parse['manobras'] .= "\t";
				}
			}
		}
		$parse['manobras'] .= "\">舰队</a>)";

		$parse['manobras'] .= " 从星球 <font color=\"white\">[$g2:$s2:$i2]</font> 返回 <font color=\"white\">[$g1:$s1:$i1]</font>. 任务:";
		$parse['manobras'] .= " <font color=\"white\">{$missiontype[$row['fleet_mission']]}</font></th></tr><br>";
	}

	$page = parsetemplate(gettemplate('phalanx_body'), $parse);
}

display($page, "phalanx");

?>
