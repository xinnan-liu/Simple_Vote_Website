<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="en-us" /> 
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" /> 
<meta name="description" content="Description" />
<meta name="keywords" content="Keywords" /> 
<meta name="author" content="Enlighten Designs" />
<style type="text/css" media="all">@import "css/master.css";</style>
        <title>注销成功</title>
    </head>

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
        echo "<h2 style='color:red'>您已经成功退出本系统，请点击下方按钮返回首页!</h2><br>";
        session_start();
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600);
        }
        session_destroy();
        ?>
        <form name="return" action="index.php" method="">
            <input type="submit" value="返回">
        </form>
        
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