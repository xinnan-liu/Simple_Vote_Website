<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title></title>
    </head>

    <?php
    include("conn.php");
    ?>
    <body>

        <?php
        session_start();
        if (isset($_POST['originator'])) {
            if ($_POST['originator'] == $_SESSION['code']) {

                //echo "successfully";
                $test = $_POST['item'];
                $title = $_POST['title'];
                $label = $_POST['label'];
                $cnum = $_POST['cnum'];
                $som = $_POST['som'];
                $info=$_POST['info'];
                if ($test == '') {
                    header("Location:admin.php");
                }

                //echo $key;
                //echo substr($key,5);
                //$ssql="Select * from voteinc"." where title='".$title."'";
                //$sresult=mysql_query($ssql,$link);
                //$srow=mysql_fetch_array($sresult);
                //$count=count($srow);
                //echo $count;
                $sql = "Insert into voteinc(title,label,cnum,som,info) values('" . $title . "','" . $label . "',
    '" . $cnum . "','" . $som . "','".$info."')";
                $result = mysql_query($sql, $link);
                //$count=count($test);
                //echo $count;
                $tsql = "Select * from voteinc" . " where title='" . $title . "'";
                $tresult = mysql_query($tsql, $link);
                $row = mysql_fetch_array($tresult);
                //echo $row['id'];
                //echo $som;
                if (is_array($test)) {
                    foreach ($test as $key => $var) {
                        echo $var . "<br>";
                        //echo $title."<br>";
                        $fsql = "Insert into voteitem(name,count,pid,som) values('" . $var . "',0," . $row['id'] . "," . $som . ")";
                        $fresult = mysql_query($fsql, $link);
                        //$sql= "Update voteitem set count=count+1 where name='".$var."'";
                        //$result=mysql_query($sql,$link);
                    }
                }

                unset($_SESSION['code']);
            } else {
                header("Location:admin.php");
            }
        } else {
            header("Location:admin.php");
        }
        ?>

    </body>

</html>