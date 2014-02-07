<?php

include("jpgraph/jpgraph.php");
include("jpgraph/jpgraph_line.php");
include("jpgraph/jpgraph_bar.php");
    include("jpgraph/jpgraph_pie.php");
    include("jpgraph/jpgraph_pie3d.php");
@$id=$_GET['id'];


$link = mysql_connect("localhost", "root", "");
        $db = mysql_select_db("vote");
        mysql_query("set names utf8", $link);

$sql = "Select * from voteitem" . " where pid='" . trim($_GET['id']) . "'";
    $result = mysql_query($sql, $link);
    $num=mysql_num_rows($result);
    $i=1;
    while ($row = mysql_fetch_array($result)) {
	$data[$i-1]=$row['count'];
	$legend[$i-1]=$row['name'];
	$i++;
}


$graph=new PieGraph(700,400);

$graph->SetShadow();


$graph->title->Set("Í¶Æ±½á¹û");
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);


$pieplot=new PiePlot3D($data);
$pieplot->SetCenter(0.5);
$pieplot->SetLegends($legend);


$graph->Add($pieplot);

$graph->Stroke();


?>
