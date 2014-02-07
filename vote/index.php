<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Index</TITLE>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="en-us" /> 
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" /> 
<meta name="description" content="Description" />
<meta name="keywords" content="Keywords" /> 
<meta name="author" content="Enlighten Designs" />
<style type="text/css" media="all">@import "css/master.css";</style>
</HEAD>
<?php
    include("conn.php");
    ?>
<BODY>
<div id="page-container">
<div id="main-nav">
<h1>Online Vote System(OVS)</h1><br>
</div> 

<div id="header">
<h1><img src="images/logo_enlighten.gif" 
width="236" height="36" alt="Enlighten Designs" border="0" /></h1>
</div> 

<div id="sidebar-a">
<div class="padding">
<h2> 注册/登陆</h2>
<?php
session_start();

if (@$_SESSION['name'] == "admin") {
    echo "<font color=red>".$_SESSION['name'] . "已成功登陆</font><br>";
    echo "<br>";
    echo"<form action='admin.php'>";
    echo"<input type='submit' value='后台管理'>";
    echo"</form>";
} else if(@$_SESSION['name']!= NULL){
	echo"<font color=red>".$_SESSION['name'] . "已成功登陆</font><br>";
    echo "<br>";
	echo"<form action='logout.php' method='post' name='logout'>";
 	echo"<input type='submit' value='注销'>";
    echo"</form>";

}else{
?>
<form name="login" action="login.php" method="post">
用户名:  <input type="text" name="logid"><br>
密码:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="logps"><br><br>
<input type="submit" value="登陆">
</form>
<br>
<a href="user_register.htm">注册新会员</a>
<br>
<?php }
echo"<br>";
$ip = $_SERVER["REMOTE_ADDR"];
echo "IP:".$ip;
echo "<br><br>";
echo "<label id='timeShow'></lable><br>";

?>
</div>
</div> 



<DIV id=cntR>
  <DIV id=NewsTop>
    <DIV id=NewsTop_tit>
      <P class=topTit>投票项目</P>
      <P class=topC0>所有</P>
      <P class=topC0>科技</P>
      <P class=topC0>体育</P>
      <P class=topC0>娱乐</P>
    </DIV>
   <div id=NewsTop_cnt><SPAN title="Don't delete me"></SPAN>
 <SPAN>
<?php
        $pagesize = 10;
        $sql = "Select count(*) from voteinc";
        $result = mysql_query($sql, $link);
        $row = mysql_fetch_array($result);
        //$num = mysql_num_rows($result);
        $numrows = $row[0];
        //if ($num > 0) {
        $pages = intval($numrows / $pagesize);
        if ($numrows % $pagesize)
            $pages++;
        if (isset($_GET['page'])) {
            $page = intval($_GET['page']);
        } else {
            $page = 1;
        }
        $offset = $pagesize * ($page - 1);
        $rs = mysql_query("select * from voteinc order by id limit $offset,$pagesize", $link);
        if ($row = mysql_fetch_array($rs)) {
            $i = 0
            ?>
           
    <?php
    do {
        $i++;
        echo"<a href=vote.php?id=" . $row['id'] . ">" . $row['title'] . "</a><br>";
     } while ($row = mysql_fetch_array($rs));
    
}

echo"<div align='right'>共 " . $pages . " 页(" . $page . "/" . $pages . ")";
$first = 1;
for ($i = 1; $i < $page; $i++)
    echo"<a href=index.php?page=" . $i . ">" . $i . "</a>";
echo "[" . $page . "]";
for ($i = $page + 1; $i <= $pages; $i++)
    echo"<a href=index.php?page=" . $i . ">[" . $i . "]</a>";
echo"</div>";

?>
   
    </SPAN>
 <SPAN>
   <?php //科技标签下投票分页显示
        $pagesize = 10;
        $sql = "Select count(*) from voteinc where label='科技'";
        $result = mysql_query($sql, $link);
        $row = mysql_fetch_array($result);
        //$num = mysql_num_rows($result);
        $numrows = $row[0];
        //if ($num > 0) {
        $pages = intval($numrows / $pagesize);
        if ($numrows % $pagesize)
            $pages++;
        if (isset($_GET['page'])) {
            $page = intval($_GET['page']);
        } else {
            $page = 1;
        }
        $offset = $pagesize * ($page - 1);
        $rs = mysql_query("select * from voteinc where label='科技' order by id limit $offset,$pagesize", $link);
        if ($row = mysql_fetch_array($rs)) {
            $i = 0
            ?>
           
    <?php
    do {
        $i++;
        echo"<a href=vote.php?id=" . $row['id'] . ">" . $row['title'] . "</a><br>";
     } while ($row = mysql_fetch_array($rs));
    
}

echo"<div align='right'>共 " . $pages . " 页(" . $page . "/" . $pages . ")";
$first = 1;
for ($i = 1; $i < $page; $i++)
    echo"<a href=index.php?page=" . $i . ">" . $i . "</a>";
echo "[" . $page . "]";
for ($i = $page + 1; $i <= $pages; $i++)
    echo"<a href=index.php?page=" . $i . ">[" . $i . "]</a>";
echo"</div>";

?> 
</SPAN>
   <SPAN>
         <?php //体育标签下投票分页显示
        $pagesize = 10;
        $sql = "Select count(*) from voteinc where label='体育'";
        $result = mysql_query($sql, $link);
        $row = mysql_fetch_array($result);
        //$num = mysql_num_rows($result);
        $numrows = $row[0];
        //if ($num > 0) {
        $pages = intval($numrows / $pagesize);
        if ($numrows % $pagesize)
            $pages++;
        if (isset($_GET['page'])) {
            $page = intval($_GET['page']);
        } else {
            $page = 1;
        }
        $offset = $pagesize * ($page - 1);
        $rs = mysql_query("select * from voteinc where label='体育' order by id limit $offset,$pagesize", $link);
        if ($row = mysql_fetch_array($rs)) {
            $i = 0
            ?>
           
    <?php
    do {
        $i++;
        echo"<a href=vote.php?id=" . $row['id'] . ">" . $row['title'] . "</a><br>";
     } while ($row = mysql_fetch_array($rs));
    
}

echo"<div align='right'>共 " . $pages . " 页(" . $page . "/" . $pages . ")";
$first = 1;
for ($i = 1; $i < $page; $i++)
    echo"<a href=index.php?page=" . $i . ">" . $i . "</a>";
echo "[" . $page . "]";
for ($i = $page + 1; $i <= $pages; $i++)
    echo"<a href=index.php?page=" . $i . ">[" . $i . "]</a>";
echo"</div>";

?>
        </SPAN>
  <SPAN>
       <?php //娱乐标签下投票分页显示
        $pagesize = 10;
        $sql = "Select count(*) from voteinc where label='娱乐'";
        $result = mysql_query($sql, $link);
        $row = mysql_fetch_array($result);
        //$num = mysql_num_rows($result);
        $numrows = $row[0];
        //if ($num > 0) {
        $pages = intval($numrows / $pagesize);
        if ($numrows % $pagesize)
            $pages++;
        if (isset($_GET['page'])) {
            $page = intval($_GET['page']);
        } else {
            $page = 1;
        }
        $offset = $pagesize * ($page - 1);
        $rs = mysql_query("select * from voteinc where label='娱乐' order by id limit $offset,$pagesize", $link);
        if ($row = mysql_fetch_array($rs)) {
            $i = 0
            ?>
           
    <?php
    do {
        $i++;
        echo"<a href=vote.php?id=" . $row['id'] . ">" . $row['title'] . "</a><br>";
     } while ($row = mysql_fetch_array($rs));
    
}

echo"<div align='right'>共 " . $pages . " 页(" . $page . "/" . $pages . ")";
$first = 1;
for ($i = 1; $i < $page; $i++)
    echo"<a href=index.php?page=" . $i . ">" . $i . "</a>";
echo "[" . $page . "]";
for ($i = $page + 1; $i <= $pages; $i++)
    echo"<a href=index.php?page=" . $i . ">[" . $i . "]</a>";
echo"</div>";

?>
        </SPAN>
</div>
            <SCRIPT>
    var Tags=document.getElementById('NewsTop_tit').getElementsByTagName('p'); 
    var TagsCnt=document.getElementById('NewsTop_cnt').getElementsByTagName('span'); 
    var len=Tags.length; 
    var flag=1;//修改默认值
    for(i=1;i<len;i++){
     Tags[i].value = i;
     Tags[i].onmouseover=function(){changeNav(this.value)}; 
     TagsCnt[i].className='undis';     
    }
    Tags[flag].className='topC1';
    TagsCnt[flag].className='dis';
    function changeNav(v){ 
     Tags[flag].className='topC0';
     TagsCnt[flag].className='undis';
     flag=v; 
     Tags[v].className='topC1';
     TagsCnt[v].className='dis';
    }
   </SCRIPT>
  </DIV>
</DIV>



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

<script>
var t = null;
    t = setTimeout(time,0);
    function time()
    {
       clearTimeout(t);
       dt = new Date();
       var h=dt.getHours()
       var m=dt.getMinutes()
       var s=dt.getSeconds()
       var tp = document.getElementById("timePlace");
       result = dt.toLocaleDateString()+" "+dt.toLocaleTimeString()
       document.getElementById("timeShow").innerHTML =  ""+h+"时"+m+"分"+s+"秒"
       t = setTimeout(time,0);              
    } 
</script>
</BODY></HTML>