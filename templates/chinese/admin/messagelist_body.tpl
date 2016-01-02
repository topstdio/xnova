{mlst_scpt}
<br><br>
<h2>{mlst_title}</h2>
<form action="" method="post">
<input type="hidden" name="curr" value="{mlst_data_page}">
<input type="hidden" name="pmax" value="{mlst_data_pagemax}">
<input type="hidden" name="sele" value="{mlst_data_sele}">
<table width="75%" border="0" cellspacing="1" cellpadding="1">
<tr align="center">
	<td class="c"><input type="submit" name="prev"value="{mlst_hdr_prev}" /></td>
	<td class="c">{mlst_hdr_page}</td>
	<td class="c">
		<select name="page" onchange="submit();">
		{mlst_data_pages}
		</select>
	</td>
	<td class="c"><input type="submit" name="next" value="{mlst_hdr_next}" /></td>
</tr>
<tr align="center">
	<td class="c">&nbsp;</td>
	<td class="c">{mlst_hdr_type}</td>
	<td class="c">
		<select name="type" onchange="submit();">
		{mlst_data_types}
		</select>
	</td>
	<td class="c">&nbsp;</td>
</tr>
<tr align="center">
	<td class="c"><input type="submit" name="delsel" value="{mlst_bt_delsel}" /></td>
	<td class="c">{mlst_hdr_delfrom}</td>
	<td class="c"><input type="text"   name="selyear" size="6" title="{mlst_title_year}"/>-<input type="text"   name="selmonth" size="3"  title="{mlst_title_month}"/>-<input type="text"   name="selday" size="3"  title="{mlst_title_day}"/></td>
	<td class="c"><input type="submit" name="deldat" value="{mlst_bt_deldate}" /></td>
</tr>
<tr>
	<th colspan="4">
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
		<tr align="center" valign="middle">
			<th class="c">{mlst_hdr_action}</th>
			<th class="c">{mlst_hdr_id}</th>
			<th class="c">{mlst_hdr_time}</th>
			<th class="c">{mlst_hdr_from}</th>
			<th class="c">{mlst_hdr_to}</th>
			<th class="c" width="350">{mlst_hdr_text}</th>
		</tr>
		{mlst_data_rows}
		</table>
	</th>
</tr>
</table>
</form>