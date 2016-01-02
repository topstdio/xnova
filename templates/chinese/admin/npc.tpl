<br><br>
<h2>{adm_npc_title}</h2>
<form action="npc.php" method="post">
<input type="hidden" name="mode" value="create">
<table width="50%">
<tr>
	<td class="c" colspan="2" >{adm_npc_setup}</td>
</tr>
<tr>
	<th width="30%">{adm_npc_coord}</th>
	<th width="70%"><input name="galaxy" size="3" maxlength="2" /> : <input name="system" size="3" maxlength="3"/> : <input name="planet" size="3" maxlength="2"/></th>
</tr>
<tr>
	<th>{adm_npc_level}</th>
	<th>
		<input type="radio" name="level" value="1">{adm_npc_1}
		<input type="radio" name="level" value="2">{adm_npc_2}
		<input type="radio" name="level" value="3" checked>{adm_npc_3}
		<input type="radio" name="level" value="4">{adm_npc_4}
		<input type="radio" name="level" value="5">{adm_npc_5}
	</th>
</tr>
<tr>
	<td class="c" colspan="2">{adm_npc_base}</td>
</tr>
<tr>
	<th>{Metal}</th>
	<th><input name="m" type="text" value="0" maxlength="12" /></th>
</tr>
<tr>
	<th>{Crystal}</th>
	<th><input name="c" type="text" value="0" maxlength="12" /></th>
</tr>
<tr>
	<th>{Deuterium}</th>
	<th><input name="d" type="text" value="0" maxlength="12" /></th>
</tr>
<!--
<tr>
	<td class="c" colspan="2">{adm_npc_tech}</td>
</tr>
{build_tech}
-->
<tr>
	<td class="c" colspan="2">{adm_npc_def}</td>
</tr>
{build_def}
<tr>
	<td class="c" colspan="2">{adm_npc_fleet}</td>
</tr>
{build_fleets}

<tr>
	<th colspan="2"><input type="submit" value="{adm_npc_ok}" /></th>
</tr>
</table>
</form>