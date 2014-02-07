<html>

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="en-us" /> 
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" /> 
<meta name="description" content="Description" />
<meta name="keywords" content="Keywords" /> 
<meta name="author" content="Enlighten Designs" />
<style type="text/css" media="all">@import "css/master.css";</style>
        <title>投票处理</title>
    </head>

    <?php
    include("conn.php");
    session_start();
    @$test = $_POST['item'];
    @$id=$_GET['id'];
    ?>
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

    if(@$_SESSION['name']!= NULL)
    {
  	if(isset($_POST['originator']))
    {   if($_POST['originator']==@$_SESSION['code'])
    {
    if($test=='')
    {
    	 echo "<h2 style='color:red'>您没有选择任何选项，请返回重新选择！</h2>";
    }else if (is_array($test)) {
        foreach ($test as $key => $var) {
            $sql = "Update voteitem set count=count+1 where name='" . $var . "'";
            $result = mysql_query($sql, $link);
        }
        ?>
        <h2 style="color: red;">您已经成功地完成了一次投票，点击下方的按钮可以查看投票结果!</h2>
        <h2 style="color: red;">当然您也可以<a href="index.php">返回首页</a></h2><br>
      <form name="votedirect" action="voteresult.php?id=<?php echo trim($_GET['id'])?>" method="post" target="_blank">
      <input type="submit" value="查看投票结果">
      </form>

    <?php
    }

    unset($_SESSION['code']);
    }else{
    	echo "<h2 style='color:red'>您已经完成了一次投票操作！</h2><br>";
        echo "<h2 style='color:red'>请不要重复刷新，这样并不能增加实际的票数！</h2><br>";
        echo "<h2 style='color:red'>您可以点击下方的按钮返回首页！</h2><br>";
         echo"<form name='return' action='index.php' method=''>";
        echo"    <input type='submit' value='返回首页'>";
        echo"</form>";

    }
    }


    }else
    {
    	echo "<h2 style='color:red'>很抱歉，您没有登录无法进行投票操作！</h2><br>";
    	echo "<h2 style='color:red'>您可以点击下方的链接进行注册也可以返回首页！</h2><br>";
        echo "<h3><a href='user_register.htm'>注册新会员</a></h3><br>";
        echo"<form name='return' action='index.php' method=''>";
        echo"    <input type='submit' value='返回首页'>";
        echo"</form>";
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