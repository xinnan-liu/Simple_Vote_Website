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
        <title>add the vote</title>
    </head>

    <?php
    include("conn.php");
    session_start();
    $code = mt_rand(0, 10000000);
    $_SESSION['code'] = $code;
    ?>
    
    <script type="text/javascript">
        function selt(obj)
        {    for(var i=0; i<obj.length; i++)
            {        if(obj.options[i].selected)
                {            var num = obj.options[i].value;
                }
            }

            var divct = "";
            for(var j=1; j<=num; j++){
                divct += '<div>选项'+j+':<input type="text" name="item['+j+']" id="item'+j+'" /><br><br></div>';
            }
            document.getElementById("showdiv").innerHTML = divct;
            return true;}
    </script>


    <body>

        <script language="javascript">
            function CheckData(){
                if(document.addvote.title.value=="")
                {
                    alert("标题不能为空!");
                    document.addvote.title.focus();
                    return false;
                }
                else if(document.addvote.info.value=="")
                {
                    alert("投票简介不能为空！");
                    document.addvote.info.focus();
                    return false;
                }
                else if(document.getElementById("cnum").value==0||document.getElementById("cnum").value==1)
                {
                    alert("请选择选项数目(不能为0且至少2个选项)")
                    document.addvote.cnum.focus();
                    return false;
                }
                else
                {
                    var len=document.getElementById("cnum").value;
                    var map={};
                    for(var i=1;i<=len;i++)
                    {
                        if(document.getElementById("item"+i).value=="")
                        {
                            alert("选项"+i+" 不能为空!");
                            document.addvote.elements["item"+i].focus();
                            return false;
                        }
                        var item=document.getElementById("item"+i).value;
                        var val=item;
                        if(map[val]!=null)
                        {
                            alert("投票选项存在重复，请重新输入");
                            return false;
                            }
                        map[val]=val;
                    }
                    


                }
              
                return true;
            }
        </script>
        <?php
        if (@$_SESSION['name'] == "admin") {
            ?>

<div id="page-container">
<div id="main-nav">
<h1>Online Vote System(OVS)</h1><br>
</div> 

<div id="header">
<h1><img src="images/logo_enlighten.gif" 
width="236" height="36" alt="Enlighten Designs" border="0" /></h1>
</div> 

            <H2 style="color:red">您现在可以新增一个投票项目</H2><br>
            <form name="addvote" action="addvotesuc.php" method="post" onSubmit="return CheckData();">
                <input type="hidden" name="originator" value="<?php echo $code; ?>"/>
                <table width="600">
                    <tr>
                        <td width="50%" valign="top">
                            投票标题:  <br>
                            <input type="text" name="title"><br>
                            <br>
                            投票简介：<br>
                            <input type="text" name="info"><br>
                            <br>
                            投票分类:	<br>
                            <select name="label">
                                <option value="科技">科技
                                <option value="体育">体育
                                <option value="娱乐">娱乐
                            </select>	<br><br>
                            单选/复选:	<br>
                            <input name="som" type="radio" value="1" checked="checked">单选
                            <input name="som" type="radio" value="0">复选
                            <br><br>
                            <label>
                                投票选项个数:	<br>
                                <select name="cnum" id="cnum" onchange="selt(this)">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </label>
                            <br><br>
                            <input name="next" type="submit"  value="新增投票">
                        </td>
                        <td><div id="showdiv"></div>


                        </td>
                    </tr>
                </table>
            </form>

            <?php
        } else {
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