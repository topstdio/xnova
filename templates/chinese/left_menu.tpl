<div id='leftmenu'>
<script language="JavaScript">
function f(target_url,win_name) {
  var new_win = window.open(target_url,win_name,'resizable=yes,scrollbars=yes,menubar=no,toolbar=no,width=550,height=280,top=0,left=0');
  new_win.focus();
}
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
	<td colspan="2" background="{dpath}img/bg1.gif" align="center">{devlp}</td>
</tr>
<tr>
	<td colspan="2"><a href="overview.php" accesskey="g" target="{mf}">{Overview}</a></td>
</tr>
<tr>
	<td height="1px" colspan="2" style="background-color:#FFFFFF"></td>
</tr>
<tr>
	<td colspan="2"><a href="buildings.php" accesskey="b" target="{mf}">{Buildings}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="buildings.php?mode=research" accesskey="r" target="{mf}">{Research}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="buildings.php?mode=fleet" accesskey="f" target="{mf}">{Shipyard}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="buildings.php?mode=defense" accesskey="d" target="{mf}">{Defense}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="officier.php" accesskey="o" target="{mf}">{Officiers}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="marchand.php" accesskey="m" target="{mf}">{Marchand}</a></td>
</tr>
<tr>
	<td colspan="2" background="{dpath}img/bg1.gif" align="center">{navig}</td>
</tr>
<tr>
	<td colspan="2"><a href="alliance.php" accesskey="a" target="{mf}">{Alliance}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="fleet.php" accesskey="t" target="{mf}">{Fleet}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="messages.php" accesskey="c" target="{mf}">{Messages}</a></td>
</tr>
<tr>

	<td colspan="2" background="{dpath}img/bg1.gif"><center>{observ}</center></td>
</tr>
<tr>
	<td colspan="2"><a href="galaxy.php?mode=0" accesskey="s" target="{mf}">{Galaxy}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="imperium.php" accesskey="i" target="{mf}">{Imperium}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="resources.php" accesskey="r" target="{mf}">{Resources}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="techtree.php" accesskey="g" target="{mf}">{Technology}</a></td>
</tr>
<tr>
	<td height="1px" colspan="2" style="background-color:#FFFFFF"></td>
</tr>
<!-- 有点问题
<tr>
	<td colspan="2"><a href="records.php" accesskey="3" target="{mf}">{Records}</a></td>
</tr>
 -->
<tr>
	<td colspan="2"><a href="stat.php?start={user_rank}" accesskey="k" target="{mf}">{Statistics}</a></td>
</tr>
<!-- 因为能搜索出NPC坐标，暂停使用
<tr>
	<td colspan="2"><a href="search.php" accesskey="b" target="{mf}">{Search}</a></td>
</tr>
 -->
<tr>
	<td colspan="2"><a href="banned.php" accesskey="3" target="{mf}">{blocked}</a></td>
</tr>

<!-- 公告暂时用不到
<tr>
	<td colspan="2"><a href="annonce.php" accesskey="3" target="{mf}">{Annonces}</a></td>
</tr>
 -->
<tr>

	<td colspan="2" background="{dpath}img/bg1.gif"><center>{commun}</center></td>
</tr>
<tr>
	<td colspan="2"><a href="#" onClick="f('buddy.php', '');" accesskey="c">{Buddylist}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="#" onClick="f('notes.php', 'Report');" accesskey="n">{Notes}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="chat.php" accesskey="a" target="_blank">{Chat}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="{forum_url}" accesskey="1" target="_blank">{Board}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="contact.php" accesskey="3" target="{mf}" >{Contact}</a></td>
</tr>
<tr>
	<td colspan="2"><a href="options.php" accesskey="o" target="{mf}">{Options}</a></td>
</tr>
	{ADMIN_LINK}
<tr>
	<td colspan="2"><a href="logout.php" accesskey="s" style="color:red" target="_top">{Logout}</a></td>
</tr>
<tr>
	<td colspan="2" background="{dpath}img/bg1.gif"><center>{infog}</center></td>
</tr>
	{server_info}

<!--
<tr>
	<td colspan="2" align="center"><a href="credit.php" accesskey="T" target="{mf}">塞北的雪翻译</a><br>&copy; Copyright 2008</td>
</tr>
-->
<tr>
	<td colspan="2" align="center"><br>&copy; Copyright 2008<br></td>
</tr>
</table>

</center>
</body>
