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
        <title>删除成功</title>
    </head>
    <?php
    include("conn.php");
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
        $test = $_GET['id'];
        $sql = "delete from voteinc where id='" . $test . "'";
        $result = mysql_query($sql, $link);
        $sqlitem = "delete from voteitem where pid='" . $test . "'";
        $resultitem = mysql_query($sqlitem, $link);
        ?>

        <h2 style="color: red;">您已经成功地删除了这个投票项目，请点击下方的按钮返回管理页面！</h2>
        <form name="back" action="admin.php" method="">
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