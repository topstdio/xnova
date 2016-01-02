<script language="JavaScript">
function cc(){var oC=document.getElementsByTagName('input');if(oC){for(var i=0;i <oC.length;i++){if(oC(i).type=='checkbox')oC(i).checked=!oC(i).checked;}}}
</script>
<br><br>
<h2>战报管理</h2>
<table width="75%">
	<tr>
		<th width="50"><a href='javascript:void(0);' onclick='cc()'>反选</a></th><th>进攻方</th><th>防御方</th><th>编号</th><th>时间</th>
	</tr>
{rw_list}
	<tr><td colspan="5" align="center" class="c">{rw_pagelist}</td></tr>
</table>
</form>