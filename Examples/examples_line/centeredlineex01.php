<?php

/**
 * JPGraph v3.6.15
 */
require_once __DIR__ . '/../../vendor/autoload.php';
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
require_once 'jpgraph/jpgraph_error.php';

//$datax = array(3.5,3.7,3,4,6.2,6,3.5,8,14,8,11.1,13.7);
$datay = [1.23, 1.9, 1.6, 3.1, 3.4, 2.8, 2.1, 1.9];
$graph = new Graph\Graph(300, 200);
$graph->img->SetMargin(40, 40, 40, 40);
$graph->img->SetAntiAliasing();
$graph->SetScale('textlin');
$graph->SetShadow();
$graph->title->Set('Example of line centered plot');
$graph->title->SetFont(FF_FONT1, FS_BOLD);

// Use 20% "grace" to get slightly larger scale then min/max of
// data
$graph->yscale->SetGrace(20);

$p1 = new Plot\LinePlot($datay);
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor('red');
$p1->mark->SetWidth(4);
$p1->SetColor('blue');
$p1->SetCenter();
$graph->Add($p1);

$graph->Stroke();
