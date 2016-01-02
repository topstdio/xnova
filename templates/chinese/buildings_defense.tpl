<script   type= "text/javascript ">
function click(event) {
event = event ? event : (window.event ? window.event : null); 
if (event.keyCode==13) {return false;}
}
document.onkeypress=click
</script> 
<table align="center">
<tr>
	<td>
		<form action="buildings.php?mode=defense" method="post" id="defense">
		<table width="75%"  align="center">
		{buildlist}
		<tr>
			<td class="c" colspan=3 align="center"><input type="submit" value="{Construire}" onclick="javascript:this.disabled=true;defense.submit();"></td>
		</tr>
		</table>
		</form>
	</td>
</tr>
</table>
{buildinglist}