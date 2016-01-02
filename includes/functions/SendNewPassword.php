<?php
function sendnewpassword($mail)
{
	global $lang;
	global $servername;
  	$ExistMail = doquery("SELECT `email` FROM {{table}} WHERE `email` = '". $mail ."' LIMIT 1;", 'users', true);

    if (empty($ExistMail['email']))	{
	   message($lang['DontExistMail'],'错误');
	}

	else
	{
	    $Caracters="aazertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
	    $Count=strlen($Caracters);
	    $NewPass="";
	    $Taille=6;
	    srand((double)microtime()*1000000);
		for($i=0;$i<$Taille;$i++)
		{
			$CaracterBoucle=rand(0,$Count-1);
			$NewPass=$NewPass.substr($Caracters,$CaracterBoucle,1);
		}
	    $Title = $servername.":新密码";
	    $Body = "您的新密码为:".$NewPass;
	    mail($mail,$Title,$Body);
	    $NewPassSql = md5($NewPass);
	    $QryPassChange = "UPDATE {{table}} SET ";
	    $QryPassChange .= "`password` ='". $NewPassSql ."' ";
	    $QryPassChange .= "WHERE `email`='". $mail ."' LIMIT 1;";
	    doquery( $QryPassChange, 'users');
    }
}
?>