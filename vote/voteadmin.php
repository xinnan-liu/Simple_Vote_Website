<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Vote Admin</title>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="en-us" /> 
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" /> 
<meta name="description" content="Description" />
<meta name="keywords" content="Keywords" /> 
<meta name="author" content="Enlighten Designs" />
<style type="text/css" media="all">@import "css/master.css";</style>
        <?php
        include("conn.php");
        session_start();
        @$temp = $_GET['id'];
        ?>
   
    </head>
    <script language="JavaScript">
        function Delete(){
            if(confirm("确定删除吗?"))
            {
                window.location.href="deletesuc.php?id=<?php echo $temp; ?>";

            }
            else
            {
                alert("删除操作已取消!");
                return false;
            }

        }
        function Modify(){
            if(confirm("确定修改吗?"))
            {
                window.location.href="modifysuc.php?id=<?php echo $temp; ?>";
                return ture;

            }
            else
            {
                alert("修改操作已取消!");
                return false;
            }

        }
    </script>
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
        if (@$_SESSION['name'] == "admin") {
        	$sql="Select * from voteinc where id=".$temp."";
        	$result=mysql_query($sql,$link);
        	$row=mysql_fetch_array($result);
        	$tsql="Select name from voteitem where pid=".$temp."";
        	$tresult=mysql_query($tsql,$link);

        	$count=mysql_num_rows($tresult);
        ?>
        <div style="text-align:center;">
        <form method="post" action="modifysuc.php?id=<?php echo $temp;?>" >
        <input type="hidden" name="count" value="<?php echo $count;?>">
        <table width="600" border='0' align="center">
        	<h2 style=color:red>投票具体信息</h2>
        <tr>
        	<td width=30%>投票标题:</td>
        	<td><input type="text" name="title" size="50" value="<?php echo $row['title'];?>"></td>
        </tr>
        <tr><td><br><br></td></tr>
        <tr>
            <td width=30%>投票简介:</td>
            <td><textarea name="info" cols="45" rows="5"><?php echo $row['info'];?></textarea></td>
        </tr>
        <tr><td><br><br></td></tr>
        <tr>
        	<td width=30%>投票分类:</td>
        	<td><input type="text" style="border: none;" name="label" size="50" readonly="readonly" value="<?php echo $row['label'];?>"></td>
        </tr>
        <tr><td><br><br></td></tr>
        <tr>
         	<td width=30%>单选/复选:</td>
         	<?php
         		if ($row['som']) {
         	?>
         	 <td>
           		<input name="som" type="radio" value="1" checked="checked">单选
             	<input name="som" type="radio" value="0">复选</td>

            <?php
                } else {?>
            		 <td>
                     <input name="som" type="radio" value="1" >单选
                            <input name="som" type="radio" value="0" checked="checked">复选</td>
            <?php
                }?>
        </tr>
        <tr><td><br><br></td></tr>
        <?php
        $i=1;
        while($trow=mysql_fetch_array($tresult)){

        	echo "<tr><td width=30%>选项".$i.":</td>";
        	echo "<td><input type=text size=50 value=".$trow['name']." name=item[".$i."] id=item".$i."></td></tr>";
        	echo "<tr><td><br></td></tr>";
        	echo "<td><input type=hidden value=".$trow['name']." name=text[".$i."]></td></tr>";
        	$i++;
        }
        ?>


        </table>
        <input type='submit' value='修改投票' onclick='return Modify()'>&nbsp;&nbsp;&nbsp;
        <input type='button' value='删除投票' onclick='return Delete()'>
        </form>
        </div>
        <?php

         }else {
            echo "<h1 style=" . "color:red;>Sorry, you don't have the permission!</h1><br>";
            echo "Press the below button return to the index page!";
            echo "<form action='index.php'>";
            echo "<input type='submit' value='return'>";
            echo "</form>";
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