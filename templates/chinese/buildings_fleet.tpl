<table align="center" >
<tr>
	<td>
		<form action="buildings.php?mode=fleet" method="post" id="buildfleet">
		<table width="75%" align="center">
		{buildlist}
		<tr>
			<td class="c" colspan=3 align="center"><input type="submit" value="{Construire}" onclick="javascript:this.disabled=true;buildfleet.submit();"></td>
		</tr>
		</table>
		</form>
	</td>
	  <td valign="top"></td>
	</tr>
</table>
{buildinglist}