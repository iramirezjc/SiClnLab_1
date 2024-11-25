<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

$datay1 = 	array(50, 60, 70);
$datay2 = 	array(20, 30, 40);
$datay3 = 	array(50, 60, 70);

// Create the graph. These two calls are always required
$graph = new Graph(300,200);
$graph->clearTheme();
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->img->SetMargin(40,30,20,40);

// Create the linear plots for each category
$dplot[] = new LinePLot($datay1);
$dplot[] = new LinePLot($datay2);
$dplot[] = new LinePLot($datay3);

$dplot[0]->value->Show();
$dplot[0]->value->SetFont(FF_DEFAULT, FS_NORMAL, 6);
//$dplot[0]->value->SetMargin(-10);
$dplot[0]->value->SetAlign('center', 'center');
$dplot[1]->value->Show();
$dplot[1]->value->SetFont(FF_DEFAULT, FS_NORMAL, 6);
$dplot[1]->value->SetAlign('center', 'top');
$dplot[2]->value->Show();
//$dplot[2]->value->SetMargin(-10);
$dplot[2]->value->SetFont(FF_DEFAULT, FS_NORMAL, 6);
$dplot[2]->value->SetAlign('center', 'top');

$dplot[0]->SetFillColor("red");
$dplot[1]->SetFillColor("blue");
$dplot[2]->SetFillColor("green");

// Create the accumulated graph
$accplot = new AccLinePlot($dplot);

// Add the plot to the graph
$graph->Add($accplot);

$graph->xaxis->SetTextTickInterval(2);
$graph->title->Set("Example 17");
$graph->xaxis->title->Set("X-title");
$graph->yaxis->title->Set("Y-title");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$graph->Stroke();
?>
