<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Online Vote System</TITLE>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="en-us" /> 
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" /> 
<meta name="description" content="Description" />
<meta name="keywords" content="Keywords" /> 
<meta name="author" content="Enlighten Designs" />
<style type="text/css" media="all">@import "css/master.css";</style>
</HEAD>

<body>
<div id="page-container">
<div id="main-nav">
<h1>Online Vote System(OVS)</h1><br>
</div> 

<div id="header">
<h1><img src="images/logo_enlighten.gif" 
width="236" height="36" alt="Enlighten Designs" border="0" /></h1>
</div> 

<?php
include("conn.php");
$aduser = "admin";
$adpass = "admin";

if (trim(@$_POST['logid']) == $aduser && trim($_POST['logps']) == $adpass) {
    session_start();
    //session_register("admin");
    //ssession_register('user');
    $_SESSION['name'] = "admin";
    //$_SESSION['user'] = $user;
    header("Location:admin.php");
} else {
	$user=trim(@$_POST['logid']);
	$pass=trim(@$_POST['logps']);
	$sql="Select * from voteuser where username='".$user."'";
	$result = mysql_query($sql, $link);
   	$count=mysql_num_rows($result);
   	$row = mysql_fetch_array($result);
    if($count!=0 && md5($pass)==$row['userpwd'])
    {
    	session_start();
    	$_SESSION['name']=$row['username'];
    	header("Location:index.php");
    	//echo "login complete!";

    }else
    {?>
    <h1><font color=red>请输入正确的用户名和密码！！！</font></h1>
    <br>
    <form action="index.php" name="" method="">
    <input type="submit" value="返回首页">
    </form>
    <br>
<?php
    }
}
?>
<div id="footer">
<div id="altnav">
<a href="http://css.jorux.com/wp-admin/post.php#" >About</a> - 
<a href="http://css.jorux.com/wp-admin/post.php#" >Services</a> - 
<a href="http://css.jorux.com/wp-admin/post.php#" >Portfolio</a> - 
<a href="http://css.jorux.com/wp-admin/post.php#" >Contact Us</a> - 
<a href="http://css.jorux.com/wp-admin/post.php#" >Terms of Trade</a>
</div>
Copyright © Enlighten Designs
Powered by <a href="http://www.enlightenhosting.com/" >Enlighten Hosting</a> and
<a href="http://www.vadmin.co.nz/" >Vadmin 3.0 CMS</a>
</div>
</div>
</body>
</html>