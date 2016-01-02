<?php
/*************************
说明：
判断传递的变量中是否含有非法字符
如$_POST、$_GET
功能：防注入
保存为checkpostandget.php 
然后在每个php文件前加include(“checkpostandget.php“);即可
**************************/
error_reporting(E_ALL);
//要过滤的非法字符
$ArrFiltrate=array("'",'/','\\',';','union');
//出错后要跳转的url,不填则默认前一页
$StrGoUrl="";
//是否存在数组中的值
function FunStringExist($StrFiltrate,$ArrFiltrate)
{
	foreach ($ArrFiltrate as $key=>$value)
	{
		
	    if (strpos($StrFiltrate,$value)===1)
	    {
	        return true;
	    }
	}
	return false;
}

//合并$_POST 和 $_GET
if(function_exists("array_merge"))
{
    $ArrPostAndGet=array_merge($_POST,$_GET);
}
else
{
    foreach($_POST as $key=>$value)
    {
        $ArrPostAndGet[]=$value;
    }
    foreach($_GET as $key=>$value)
    {
        $ArrPostAndGet[]=$value;
    }
}

//验证开始
foreach($ArrPostAndGet as $key=>$value)
{
	if (FunStringExist($value,$ArrFiltrate))
	{
		echo '<script language="javascript">alert("非法字符");</script>';
		if (empty($StrGoUrl))
		{
			echo '<script language="javascript">history.go(-1);</script>';
		}
		else
		{
			echo '<script language="javascript">window.location="'.$StrGoUrl.'";</script>';
		}
		exit;
	}
}
?>