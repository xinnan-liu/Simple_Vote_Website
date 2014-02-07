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
  <title>修改成功</title>
</head>

<?php
	include("conn.php");
	session_start();
	@$temp=$_GET['id'];
	@$cnum=$_POST['count'];
	@$title=$_POST['title'];
    @$info=$_POST['info'];
	@$label=$_POST['label'];
	@$som=$_POST['som'];
	@$item=$_POST['item'];
	@$text=$_POST['text'];
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
     if (@$_SESSION['name'] == "admin") {


     $sql = "update voteinc set title='".$title."',info='".$info."',label='".$label."',som='".$som."' where id='".$temp."'";
     $result = mysql_query($sql, $link);
     $i=0;
     if(is_array($text)){
     	foreach ($text as $key=> $test)
     	{
            $names[$i]=$test;
            $i++;
     	}
     }


     $i=0;
     if (is_array($item)) {
                    foreach ($item as $key => $var)
                      {
                        //	echo $var;
                        //	echo $names[$i];
                        $fsql = "update voteitem set name='".$var."',som='".$som."' where name='".$names[$i]."' and pid='".$temp."'";
                        $fresult = mysql_query($fsql, $link);
                        $i++;
                        //$sql= "Update voteitem set count=count+1 where name='".$var."'";
                        //$result=mysql_query($sql,$link);
                        }

     }

     echo "   <h2 style='color: red;'>您已经成功地修改了这个投票项目，请点击下方的按钮返回管理页面！</h2>";
     echo"   <form name='back' action='admin.php' method=''>";
     echo"   <input type='submit' value='返回'>";
     echo"   </form>";


     }else{
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