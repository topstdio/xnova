<?php

/**
 * functions.php
 *
 * @version 1
 * @copyright 2008 By Chlorel for XNova
 */
//xdebug 调试
//echo sprintf("调用文件 %s 行:%s 来自 %s",xdebug_call_file(),xdebug_call_line(),xdebug_call_function());
// ----------------------------------------------------------------------------------------------------------------
//
// Routine pour la gestion du mode vacance
//
function write_log($info,$logfile="log/Global.txt")
{
	file_put_contents($logfile,"[".date("Y-m-d H:i:s",time())."]".$info."\r\n",FILE_APPEND);
}
function check_urlaubmodus () {
	global $user;
	if ($user['urlaubs_modus'] == 1) {
		message("你正处于假期模式!", $title = $user['username'], $dest = "", $time = "3");
	}
}
/*
function check_urlaubmodus_time () {
	global $user, $game_config;
	if ($game_config['urlaubs_modus_erz'] == 1) {
		$begrenzung = 86400;
		//24x60x60=86400
		//最少间隔时间
		$urlaub_modus_time = $user['urlaubs_modus_time'];
		$urlaub_modus_time_soll = $urlaub_modus_time + $begrenzung;
		$time_jetzt = time();
		if ($user['urlaubs_modus'] == 1 && $urlaub_modus_time_soll > $time_jetzt) {
			$soll_datum = date("Y-m-d", $urlaub_modus_time_soll);
			$soll_uhrzeit = date("H:i:s", $urlaub_modus_time_soll);
			message("你正处于假期模式!<br>时间截止到：从$soll_datum到$soll_uhrzeit<br>您可以在选项里更改假期状态！", "假期模式");
		}
	}
}
*/
//
//重写编写check_urlaubmodus_time函数
//
function check_urlaubmodus_time ()
{
	global $user;
	if ($user['urlaubs_modus'] == 1 && $user['urlaubs_modus_time'] > time())
	{
		$endtime=date("Y-m-d H:i:s",$user['urlaubs_modus_time']);
		message("你正处于假期模式!<br>时间截止到：$endtime<br>您可以在选项里更改假期状态！", "假期模式");
	}
}
//分页函数
//records_num 记录总数
//p_link连接地址
function page($records_num, $p_link, $st_ed = 0, $page_num = 20, $p_view = 6)
{
	$c_page = $_GET["pg"];
	if($c_page=='')$c_page = 1;
	$pg_string = '';
	$max_page = floor($records_num/$page_num) + 1;
	$jum_page = floor($p_view/2);
	$for_start = ($c_page>$jum_page)?($c_page-$jum_page):$c_page;
	$for_end = $for_start + $p_view;

	for($i=$for_start;$i<=$for_end;$i++)
	{
		if($i == $c_page)
		{
			$pg_string.= '<a href=\''.$p_link.'&pg='.$c_page.'\'><font color="red">['.$c_page."]</font></a>\n";
		}
		elseif($i>$max_page)
		{
			break;
		}
		else
		{
			$pg_string.= '<a href=\''.$p_link.'&pg='.$i.'\'>['.$i."]</a>\n";
		}
	}

	if($st_ed)
	{
		if($c_page>1){$first_p = "<a href='$p_link&pg=1'>[首页]</a>.. \n"; }
		if($c_page<$max_page){$end_p = '..<a href=\''.$p_link.'&pg='.$max_page."'>[末页]</a>\n"; }
		$page_string = $first_p.$pg_string.$end_p;
	}
	else
	{
		$page_string = $first_p.$pg_string.$end_p;
	}
	return $page_string;
}


// ----------------------------------------------------------------------------------------------------------------
//
// Routine Test de validit d'une adresse email
//
function is_email($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
}

// ----------------------------------------------------------------------------------------------------------------
//
// Routine Affichage d'un message administrateur avec saut vers une autre page si souhait
//
function AdminMessage ($mes, $title = '错误', $dest = "", $time = "3") {
	$parse['color'] = $color;
	$parse['title'] = $title;
	$parse['mes']   = $mes;

	$page .= parsetemplate(gettemplate('admin/message_body'), $parse);

	display ($page, $title, false, (($dest != "") ? "<meta http-equiv=\"refresh\" content=\"$time;URL=javascript:self.location='$dest';\">" : ""), true);
}

// ----------------------------------------------------------------------------------------------------------------
//
// Routine Affichage d'un message avec saut vers une autre page si souhait
//
function message ($mes, $title = '错误', $dest = "", $time = "3") {
	$parse['color'] = $color;
	$parse['title'] = $title;
	$parse['mes']   = $mes;

	$page .= parsetemplate(gettemplate('message_body'), $parse);

	display ($page, $title, false, (($dest != "") ? "<meta http-equiv=\"refresh\" content=\"$time;URL=javascript:self.location='$dest';\">" : ""), false);
}

// ----------------------------------------------------------------------------------------------------------------
//
// Routine d'affichage d'une page dans un cadre donn
//
// $page      -> la page
// $title     -> le titre de la page
// $topnav    -> Affichage des ressources ? oui ou non ??
// $metatags  -> S'il y a quelques actions particulieres a faire ...
// $AdminPage -> Si on est dans la section admin ... faut le dire ...
function display ($page, $title = '', $topnav = true, $metatags = '', $AdminPage = false) {
	global $link, $game_config, $debug, $user, $planetrow;

	if (!$AdminPage) {
		$DisplayPage  = StdUserHeader ($title, $metatags);
	} else {
		$DisplayPage  = AdminUserHeader ($title, $metatags);
	}

	if ($topnav) {
		$DisplayPage .= ShowTopNavigationBar( $user, $planetrow );
	}
	$DisplayPage .= "<center>\n". $page ."\n</center>\n";
	// Affichage du Debug si necessaire
	if ($user['authlevel'] == 1 || $user['authlevel'] == 3) {
		if ($game_config['debug'] == 1) $debug->echo_log();
	}

	$DisplayPage .= StdFooter();
	if (isset($link)) {
		mysql_close();
	}

	echo $DisplayPage."<center><script type='text/javascript' src='51la.js'></script></center>";

	die();
}

// ----------------------------------------------------------------------------------------------------------------
//
// Entete de page
//
function StdUserHeader ($title = '', $metatags = '') {
	global $user, $dpath, $langInfos;

	$parse           = $langInfos;
	$parse['dpath']  = $dpath;
	$parse['title']  = $title;
	$parse['-meta-'] = ($metatags) ? $metatags : "";
	$parse['-body-'] = "<body>"; //  class=\"style\" topmargin=\"0\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
	return parsetemplate(gettemplate('simple_header'), $parse);
}

// ----------------------------------------------------------------------------------------------------------------
//
// Entete de page administration
//
function AdminUserHeader ($title = '', $metatags = '') {
	global $user, $dpath, $langInfos;

	$parse           = $langInfos;
	$parse['dpath']  = $dpath;
	$parse['title']  = $title;
	$parse['-meta-'] = ($metatags) ? $metatags : "";
	$parse['-body-'] = "<body>"; //  class=\"style\" topmargin=\"0\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
	return parsetemplate(gettemplate('admin/simple_header'), $parse);
}

// ----------------------------------------------------------------------------------------------------------------
//
// Pied de page
//
function StdFooter() {
	global $game_config, $lang;
	$parse['copyright']     = $game_config['copyright'];
	$parse['TranslationBy'] = $lang['TranslationBy'];
	return parsetemplate(gettemplate('overall_footer'), $parse);
}

// ----------------------------------------------------------------------------------------------------------------
//
// Calcul de la place disponible sur une planete
//
function CalculateMaxPlanetFields (&$planet) {
	global $resource;

	return $planet["field_max"] + ($planet[ $resource[33] ] * 5);
}

?>
