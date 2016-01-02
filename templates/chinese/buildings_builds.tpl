<script   type= "text/javascript ">
function click(event) {
event = event ? event : (window.event ? window.event : null); 
if (event.keyCode==13) {return false;}
}
document.onkeypress=click
</script>
<style>button{border:1px #545454 solid;background-color: #344566; color: #E6EBFB;}</style>
{BuildListScript}
<table width="75%" align="center">
	{BuildList}
	<tr>
		<th >{bld_usedcells}</th>
		<th colspan="2" >
			<font color="#00FF00">{planet_field_current}</font> / <font color="#FF0000">{planet_field_max}</font> {bld_theyare} {field_libre} {bld_cellfree}
		</th >
	</tr>
	{BuildingsList}
</table>