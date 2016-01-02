<!-- topnav.tpl -->
<div id="header_top">
<table class="header" align="center">
<tbody>
	<tr class="header">
    	<td class="header">
        	<table width="722" border="0" cellpadding="0" cellspacing="0" class="header" id="resources" style="width: 722px;">
            <tbody>
            	<tr class="header" align="center">
                	<td class="header" width="150"><select size="1" onChange="eval('location=\''+this.options[this.selectedIndex].value+'\'');">{planetlist}</select></td>
                    <td class="header" width="150"><img src="{dpath}images/metall.gif" border="0" height="22" width="42"></td>
                    <td class="header" width="150"><img src="{dpath}images/kristall.gif" border="0" height="22" width="42"></td>
                    <td class="header" width="150"><img src="{dpath}images/deuterium.gif" border="0" height="22" width="42"></td>
                    <td class="header" width="150"><img src="{dpath}images/energie.gif" border="0" height="22" width="42"></td>
                    <td class="header" width="150"><img src="{dpath}images/message.gif" border="0" height="22" width="42"></td>
                </tr>
                <tr class="header" align="center">
                	<td class="header" width="150"><b><font color="#ffffff"></font></b></td>
                	<td class="header" width="150"><b><font color="#FFFF00">{Metal}</font></td>
                    <td class="header" width="150"><b><font color="#FFFF00">{Crystal}</font></b></td>
                    <td class="header" width="150"><b><font color="#FFFF00">{Deuterium}</font></b></td>
                    <td class="header" width="150"><b><font color="#FFFF00">{Energy}</font></b></td>
                    <td class="header" width="150"><b><font color="#FFFF00">{Message}</font></b></td>
                </tr>
                <tr class="header" align="center">
                	<td class="header" width="180" align="right"><b><font color="#FFFF00">{Ressverf}</font></b></td>
                    <td class="header" width="180"><font>{metal}</font></td>
                    <td class="header" width="180"><font>{crystal}</font></td>
                    <td class="header" width="180"><font>{deuterium}</font></td>
                    <td class="header" width="150"><font>{energy}</font></td>
                    <td class="header" width="150"><font>{message}</font></td>
                </tr>
                <tr align="center">
                	<td class="header" width="180" align="right"><b><font color="#FFFF00">{Store_max}</font></b></td>
                	<td class="header" width="180">{metal_max}</td>
                    <td class="header" width="180">{crystal_max}</td>
                    <td class="header" width="180">{deuterium_max}</td>
                    <td class="header" width="150">{energy_max}</td>
                    <td class="header" width="150"></td>
                </tr>
          	</table>
        </td>
	</tr>
</tbody>
</table>
{show_umod_notice}
</div>
<!-- end topnav.tpl -->