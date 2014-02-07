<?php
	include("conn.php");
	session_start();

    $username	= isset($_POST['username']) ? trim($_POST['username']) : '';
    $password	= isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
    $email		= isset($_POST['email']) ? trim($_POST['email']) : '';
	$action		= isset($_POST['action']) ? trim($_POST['action']) : '';
    

/* 注册新会员 */
if ($action == 'register')
{
    if (strlen($username) < 3)
    {
		//return false;
		header("Location: user_register.htm");
    }

    else if (strlen($password) < 6)
    {
    	//return false;
	    header("Location: user_register.htm");
    }
    else if ($password!=$confirm_password)
    {
	//return false;
	    header("Location: user_register.htm");
    }
	else
	{
		$sql = "Insert voteuser (username,mail,`userpwd`) values ('" . $username . "','" . $email . "',md5('" . $password . "'))";

		if( $result=mysql_query($sql,$link))
		{
			$_SESSION['name']   = $username;
			header("Location:index.php");
		}
	}

}

/* 验证用户注册用户名是否可以注册 */
elseif ($action == 'check_user')
{
    if (strlen($username) < 3)
    {
		echo "- 用户名长度不能少于 3 个字符。";
    }
	elseif(!check_user($username))
	{
		echo "* 用户名已经存在,请重新输入";
	}
	else
	{
		echo "* 可以注册";
	}
    //$username = trim($_GET['username']);
}

/* 验证用户邮箱地址是否被注册 */
elseif($action == 'check_email')
{
    $email = trim($_POST['email']);
    if (!check_email($email))
    {
        echo "* 邮箱已存在,请重新输入";
    }
    else
    {
        echo "* 可以注册";
    }
}

function check_user($username)
{
	include("conn.php");
	$sql="select * from voteuser where username='" . $username . "'";
	$result = mysql_query($sql, $link);
    $count=mysql_num_rows($result);
	if($count> 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function check_email($email)
{
	include("conn.php");
	$sql="select * from voteuser where mail='" . $email . "'";
	$result = mysql_query($sql, $link);
    $count=mysql_num_rows($result);
	if($count> 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

?>