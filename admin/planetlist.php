<?php

/**
 * planetlist.php
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
includeLang('admin');
	if ($user['authlevel'] >= "2") {

$MAX_Page=20;//每页显示记录数
$c_page = $_GET["pg"];
if($c_page=='')$c_page = 1;
$CurPage=($c_page-1)*$MAX_Page;
$All=doquery("select count(id) from {{table}}","planets");
$rs=mysql_fetch_array($All);
$all_rs=$rs[0];
unset($rs,$All);

		$parse = $lang;
		$query = doquery("SELECT * FROM {{table}} WHERE planet_type='1' order by id limit {$CurPage},{$MAX_Page}", "planets");
		while ($u = mysql_fetch_array($query)) {
			$parse['planetes'] .= "<tr align='center'>"
			. "<td class=b><b><a target='_blank' href='planets_detail.php?pid={$u[0]}'>{$u[0]}</a></b></td>"
			. "<td class=b><b><a target='_blank' href='planets_detail.php?pid={$u[0]}'>" . $u[1] . "</a></b></td>"
			. "<td class=b><b>" . $u[4] . "</b></td>"
			. "<td class=b><b>" . $u[5] . "</b></td>"
			. "<td class=b><b>" . $u[6] . "</b></td>"
			. "</tr>";
		}

		if ($i == "1")
			$parse['planetes'] .= "<tr><th class=b colspan=5>".$lang['adm_pl_onlyone']."</th></tr>";
		else
			$parse['planetes'] .= "<tr><th class=b colspan=5>" .$lang['adm_pl_total'] ."{$all_rs}</th></tr>";
		
		$parse['rw_pagelist'] = page($all_rs,'?',1,$MAX_Page,10);
		
		$Page=parsetemplate(gettemplate('admin/planetlist_body'), $parse);
		display($Page, 'Planetlist', false, '', true);
	} else {
		message($lang['sys_noalloaw'], $lang['sys_noaccess']);
	}

// Created by e-Zobar. All rights reversed (C) XNova Team 2008
?>