<html>

    <head>
        <title>投票页面</title>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="en-us" /> 
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" /> 
<meta name="description" content="Description" />
<meta name="keywords" content="Keywords" /> 
<meta name="author" content="Enlighten Designs" />
<style type="text/css" media="all">@import "css/master.css";</style>
    </head>

    <?php
    include("conn.php");
    session_start();
    $code=mt_rand(0,1000000);
    $_SESSION['code']=$code;
    @$temp = $_GET['id'];
    $sql = "Select * from voteitem" . " where pid='" . trim($_GET['id']) . "'";
    $result = mysql_query($sql, $link);
    $count=mysql_num_rows($result);
    $tsql= "Select * from voteinc where id=".$temp."";
    $tresult = mysql_query($tsql, $link);
    @$trow=mysql_fetch_array($tresult);
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
    
        <form name="votedirect" action="votehandle.php?id=<?php echo trim($_GET['id'])?>" method="post">
            <?php
            $i=1;
             echo "<h2 style='color:red;text-align:left'>投票名称：".$trow['title']."</h2><br>";
                echo "<h3 style='color:blue;text-align:left'>".$trow['info']."</h3><br>";
            while ($row = mysql_fetch_array($result)) {
               
                
                if ($row['som']) {
                    echo"<input name='item[]' type='radio' id='item".$i."' value=" . $row['name'] . ">";
                    echo $row['name'] . "<br/>";
                    echo"<br/>";
                } else {
                    echo"<input name='item[]' type='checkbox' id='item".$i."' value=" . $row['name'] . ">";
                    echo $row['name'] . "<br/>";
                    echo "<br/>";
                }
                $i++;
            }
        

            ?>
            <input type="hidden" name="originator" value="<?=$code?>">
            <input name="go" type="submit"  value="提交投票" >
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