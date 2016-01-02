<?php
//	if ($CurrentUser['urlaubs_modus'] == 1) {echo "假期模式，不涨资源 !";return;}
/**
 * common.php
 *
 * @version 1.0
 * @copyright 2008 by ??????? for XNova
 */
ini_set("display_errors","off");//显示错误信息
error_reporting(6135);
define('VERSION','0.8');
date_default_timezone_set('Asia/Shanghai');	//设置默认时区
header("Content-type: text/html;charset=utf-8");//告诉浏览器使用UTF-8编码
set_magic_quotes_runtime(0);
/*限制提交时间*/
/*
session_start();
$AllowRefrushPage=array("leftmenu.php","login.php","reg.php","frames.php","overview.php");
$CurrentPage=split('/',$PHP_SELF);
if(!in_array(end($CurrentPage),$AllowRefrushPage))
{
	if(time()-$_SESSION["LastReqTime"]<1)
	{
		die("请勿连续刷新本系统！");
	}
}
$_SESSION["LastReqTime"]=time();
*/
$phpEx = "php";
$game_config   = array();
$user          = array();
$lang          = array();
$IsUserChecked = false;

define('DEFAULT_SKINPATH' , 'skins/evolution/');
define('TEMPLATE_DIR'     , 'templates/');
define('TEMPLATE_NAME'    , 'chinese');
define('DEFAULT_LANG'     , 'cn');

$HTTP_ACCEPT_LANGUAGE = DEFAULT_LANG;
include($ugamela_root_path . 'includes/SQL_injection.'.$phpEx);
include($ugamela_root_path . 'includes/debug.class.'.$phpEx);
$debug = new debug();

include($ugamela_root_path . 'includes/constants.'.$phpEx);
include($ugamela_root_path . 'includes/functions.'.$phpEx);
include($ugamela_root_path . 'includes/unlocalised.'.$phpEx);
include($ugamela_root_path . 'includes/todofleetcontrol.'.$phpEx);
include($ugamela_root_path . 'language/'. DEFAULT_LANG .'/lang_info.cfg');


if (INSTALL != true)
{
    include($ugamela_root_path . 'includes/vars.'.$phpEx);
    include($ugamela_root_path . 'includes/db.'.$phpEx);
    include($ugamela_root_path . 'includes/strings.'.$phpEx);

    // Lecture de la table de configuration
    $query = doquery("SELECT * FROM {{table}}",'config');
    while ( $row = mysql_fetch_assoc($query) )
    {
	    $game_config[$row['config_name']] = $row['config_value'];
    }
    //print_r($game_config);

	if ($InLogin != true)
	{
		$Result        = CheckTheUser ( $IsUserChecked );
		$IsUserChecked = $Result['state'];
		$user          = $Result['record'];
	}
	elseif ($InLogin == false)
	{
		// Jeux en mode 'clos' ???
		if( $game_config['game_disable'])
		{
			if ($user['authlevel'] < 1)
			{
				message ( stripslashes ( $game_config['close_reason'] ), $game_config['game_name'] );
			}
		}
	}

	includeLang ('system');
	includeLang ('tech');

	if ( isset ($user) )
	{
		$_fleets = doquery("SELECT * FROM {{table}} WHERE `fleet_start_time` <= '".time()."';", 'fleets'); //  OR fleet_end_time <= ".time()
		while ($row = mysql_fetch_array($_fleets))
		{
			$array                = array();
			$array['galaxy']      = $row['fleet_start_galaxy'];
			$array['system']      = $row['fleet_start_system'];
			$array['planet']      = $row['fleet_start_planet'];
			$array['planet_type'] = $row['fleet_start_type'];
			$temp = FlyingFleetHandler ($array);
		}

		$_fleets = doquery("SELECT * FROM {{table}} WHERE `fleet_end_time` <= '".time()."';", 'fleets'); //  OR fleet_end_time <= ".time()

		while ($row = mysql_fetch_array($_fleets))
		{
			$array                = array();
			$array['galaxy']      = $row['fleet_end_galaxy'];
			$array['system']      = $row['fleet_end_system'];
			$array['planet']      = $row['fleet_end_planet'];
			$array['planet_type'] = $row['fleet_end_type'];
			$temp = FlyingFleetHandler ($array);
		}

		unset($_fleets);

		include($ugamela_root_path . 'rak.'.$phpEx);
		if ( defined('IN_ADMIN') ) {
			$UserSkin  = $user['dpath'];
			$local     = stristr ( $UserSkin, "http:");
			if ($local === false) {
				if (!$user['dpath']) {
					$dpath     = "../". DEFAULT_SKINPATH  ;
				} else {
					$dpath     = "../". $user["dpath"];
				}
			} else {
				$dpath     = $UserSkin;
			}
		} else {
			$dpath     = (!$user["dpath"]) ? DEFAULT_SKINPATH : $user["dpath"];
		}

		SetSelectedPlanet ( $user );

		$planetrow = doquery("SELECT * FROM {{table}} WHERE `id` = '".$user['current_planet']."';", 'planets', true);
		$galaxyrow = doquery("SELECT * FROM {{table}} WHERE `id_planet` = '".$planetrow['id']."';", 'galaxy', true);

		CheckPlanetUsedFields($planetrow);
	} else {
		// Bah si dja y a quelqu'un qui passe par l et qu'a rien a faire de press ...
		// On se sert de lui pour mettre a jour tout les retardataires !!

	}
}
else
{
	$dpath     = "../" . DEFAULT_SKINPATH;
}

?>
