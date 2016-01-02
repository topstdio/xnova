<?php


/**
 * constants.php
 *
 * @version 1
 * @copyright 2008 By Chlorel for XNova
 */

// ----------------------------------------------------------------------------------------------------------------

if ( defined('INSIDE') ) {
	define('ADMINEMAIL'               , "sbdx@sina.com");
	define('GAMEURL'                  , "http://".$_SERVER['HTTP_HOST']."/");

	// 定义已知世界 !
	define('MAX_GALAXY_IN_WORLD'      , 9);
	define('MAX_SYSTEM_IN_GALAXY'     , 499);
	define('MAX_PLANET_IN_SYSTEM'     , 15);
	//间谍卫星报告行数?
	define('SPY_REPORT_ROW'           , 2);
	// Cases données par niveau de Base Lunaire
	define('FIELDS_BY_MOONBASIS_LEVEL', 4);
	define('MAX_PLAYER_PLANETS'       , 10);	//最大星球数量，包括殖民星和母星
	define('MAX_BUILDING_QUEUE_SIZE'  , 10);	//建筑最大建造队列
	define('MAX_FLEET_OR_DEFS_PER_ROW', 1000000);//舰队&防御最大建造队列
	define('MAX_OVERFLOW'             , 1.1);//最大溢出上限 1.1=110%

	//行星基础设置
	define('BASE_STORAGE_SIZE'        , 1000000000);	//仓库上限
	define('BUILD_METAL'              , 500);			//金属矿
	define('BUILD_CRISTAL'            , 500);			//晶体矿
	define('BUILD_DEUTERIUM'          , 500);			//重氢

	// Debug Level
	define('DEBUG', 1); // Debugging off
	
	$ListCensure = array ( "<", ">", "script", "doquery", "http", "javascript");//过滤的词
	$SuspectUser =array();//嫌疑用户，用于跟踪SQL
}
else
{
	die("Hacking attempt");
}



?>