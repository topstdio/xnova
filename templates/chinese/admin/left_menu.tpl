<div id='leftmenu'>
<script language="JavaScript">
function f(target_url,win_name) {
  var new_win = window.open(target_url,win_name,'resizable=yes,scrollbars=yes,menubar=no,toolbar=no,width=550,height=280,top=0,left=0');
  new_win.focus();
}
parent.frames['Hauptframe'].location.replace("overview.php");
</script>
<body  class="style" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<center>
<div id='menu'>
<br>
<table width="130" cellspacing="0" cellpadding="0">
<tr>
	<td colspan="2" align="center" style="border-top: 1px #545454 solid;">{servername}(<a href="changelog.php" target="{mf}" style="width:auto;color:red;">v{XNovaRelease}</a>)</td>
</tr>
<tr>
	<td background="{dpath}img/bg1.gif" align="center">{admin}</td>
</tr>
<tr>
	<td><a href="overview.php" accesskey="v" target="{mf}">{adm_over}</a></td>
</tr>
<tr>
	<td><a href="settings.php" accesskey="e" target="{mf}">{adm_conf}</a></td>
</tr>
<!-- 
<tr>
	<td><a href="XNovaResetUnivers.php" accesskey="e" target="{mf}">{adm_reset}</a></td>
</tr>
 -->
 <tr>
	<td background="{dpath}img/bg1.gif" align="center">{adm_activity}</td>
</tr>
<tr>
	<td><a href="npc.php" accesskey="v" target="{mf}">{adm_attack_npc}</a></td>
</tr>
<tr>
	<td background="{dpath}img/bg1.gif" align="center">{player}</td>
</tr>
<tr>
	<td><a href="userlist.php" accesskey="a" target="{mf}">{adm_plrlst}</a></td>
</tr>
<tr>
	<td><a href="paneladmina.php" accesskey="k" target="{mf}">{adm_plrsch}</a></td>
</tr>
<tr>
	<td><a href="add_money.php" accesskey="k" target="{mf}">{adm_addres}</a></td>
</tr>
<tr>
	<td style="background-color:#FFFFFF" height="1px"></td>
</tr>
<tr>
	<td><a href="planetlist.php" accesskey="1" target="{mf}">{adm_pltlst}</a></td>
</tr>
<tr>
	<td><a href="activeplanet.php" accesskey="k" target="{mf}">{adm_actplt}</a></td>
</tr>
<tr>
	<td style="background-color:#FFFFFF" height="1px"></td>
</tr>
<tr>
	<td><a href="moonlist.php" accesskey="k" target="{mf}">{adm_moonlst}</a></td>
</tr>
<tr>
	<td><a href="add_moon.php" accesskey="k" target="{mf}">{adm_addmoon}</a></td>
</tr>
<tr>
	<td style="background-color:#FFFFFF" height="1px"></td>
</tr>
<tr>
	<td><a href="ShowFlyingFleets.php" accesskey="k" target="{mf}">{adm_fleet}</a></td>
</tr>
<tr>
	<td style="background-color:#FFFFFF" height="1px"></td>
</tr>
<tr>
	<td><a href="banned.php" accesskey="k" target="{mf}">{adm_ban}</a></td>
</tr>
<tr>
	<td><a href="unbanned.php" accesskey="k" target="{mf}">{adm_unban}</a></td>
</tr>
<tr>
	<td background="{dpath}img/bg1.gif" align="center">{tool}</td>
</tr>
<tr>
	<td><a href="chat.php" accesskey="p" target="{mf}">{adm_chat}</a></td>
</tr>
<tr>
	<td><a href="statbuilder.php" accesskey="p" target="{mf}">{adm_updpt}</a></td>
</tr>
<tr>
	<td><a href="messagelist.php" accesskey="k" target="{mf}">{adm_msg}</a></td>
</tr>
<tr>
	<td><a href="manage_rw.php"  target="{mf}">{adm_mange_rw}</a></td>
</tr>
<tr>
	<td><a href="md5enc.php" accesskey="p" target="{mf}">{adm_md5}</a></td>
</tr>
<tr>
	<td><a href="ElementQueueFixer.php" accesskey="p" target="{mf}">{adm_build}</a></td>
</tr>
<tr>
	<td style="background-color:#FFFFFF" height="1px"></td>
</tr>
<tr>
	<td><a href="errors.php" accesskey="e" target="{mf}">{adm_error}</a></td>
</tr>
<tr>
	<td><a href="../frames.php" accesskey="i" target="_top" style="color:red">{adm_back}</a></td>
</tr>
<tr>
	<td background="{dpath}img/bg1.gif" align="center">{infog}</td>
</tr>
<tr>
	<td align="center"><a href="../credit.php" accesskey="T" target="{mf}">塞北的雪翻译</a><br>&copy; Copyright 2008</td>
</tr>
</table>

</center>
</body>
