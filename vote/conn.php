<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>

    <body>

        <?php
        $link = mysql_connect("localhost", "root", "");
        $db = mysql_select_db("vote");
        mysql_query("set names utf8", $link);
        ?>

    </body>

</html>