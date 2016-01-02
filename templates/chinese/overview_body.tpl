<center>
<br>
<table width="75%">
<tr><font size="5" color="#FF0000"></font>
	<td class="c" colspan="4">
		<a href="overview.php?mode=renameplanet" title="{Planet_menu}">{Planet} "{planet_name}"</a> ({user_username})
	</td>
</tr>
{Have_new_message}
{Have_new_level_mineur}
{Have_new_level_raid}
<tr>
	<th>服务器时间</th>
	<th colspan="3">{server_time}</th>
</tr>
<th>{MembersOnline}</th>
	<th colspan="3">{NumberMembersOnline}</th>
</tr>
{NewsFrame}
<tr>
	<td colspan="4" class="c">事件</td>
</tr>
{fleet_list}
<tr>
	<th>{moon_img}<br>{moon}</th>
	<th colspan="2"><img src="{dpath}planeten/{planet_image}.jpg" height="200" width="200"><br>{building}</th>
	<th class="s">
		<table class="s" align="top" border="0">
		<tr>
			{anothers_planets}
		</tr>
		</table>
	</th>
</tr>
<tr>
	<th>{Position}</th>
	<th colspan="3"><a href="galaxy.php?mode=0&galaxy={galaxy_galaxy}&system={galaxy_system}">[{galaxy_galaxy}:{galaxy_system}:{galaxy_planet}]</a></th>
</tr>
<tr>
	<th>直径</th>
	<th colspan="3">{planet_diameter} km (<a title="{Developed_fields}">{planet_field_current}已用</a> / 总共<a title="{max_eveloped_fields}">{planet_field_max}</a>)</th>
</tr>
<tr>
	<th>基建</th>
	<th colspan="3">金属 : {metal_debris} / 晶体 : {crystal_debris}{get_link}</th>
</tr>
	<!--Ajout du pourcentage de case utilis锟絜 et d'une barre-->
	<th >星球使用率</th>
	<th colspan="3" align="center">
		<div  style="border: 1px solid rgb(153, 153, 255); width: 400px;">
		<div  id="CaseBarre" style="background-color: {case_barre_barcolor}; width: {case_barre}px;">
		<font color="#CCF19F">{case_pourcentage}</font>&nbsp;</div>
	</th>
<tr>
<tr>
	<th>等级</th>
	<th>指挥官: {lvl_minier}</th>
	<th></th>
	<th>战斗: {lvl_raid}</th>
</tr>
<tr>
	<th>经验</th>
	<th>矿产: {xpminier} / {lvl_up_minier}</th>
	<th></th>
	<th>战斗: {xpraid} / {lvl_up_raid} </th>
</tr>
	<th>温度</th>
	<th colspan="3">摄氏 {planet_temp_min}&deg;C 到 {planet_temp_max}&deg;C</th>
</tr>
<tr>
	<th>积分</th>
	<th colspan="3">建筑: {user_points} <br>
	舰队 : {user_fleet} <br>
	科技 : {player_points_tech} <br>
	防御: {user_def} <br>	
	全部 : {total_points} <br>
	(排名第 <a href="stat.php?start={u_user_rank}">{user_rank}</a> 共有玩家 {max_users})
	</th>
</tr>
{ExternalTchatFrame}
</table>
<br>
{ClickBanner}
</center>
</body>
</html>