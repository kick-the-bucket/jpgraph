<?php

/**
 * JPGraph v3.6.15
 */
require_once __DIR__ . '/../../vendor/autoload.php';
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
require_once 'jpgraph/jpgraph_date.php';

// Create a data set in range (50,70) and X-positions
define('NDATAPOINTS', 360);
define('SAMPLERATE', 240);
$start = time();
$end   = $start + NDATAPOINTS * SAMPLERATE;
$data  = [];
$xdata = [];
for ($i = 0; $i < NDATAPOINTS; ++$i) {
    $data[$i]  = rand(50, 70);
    $xdata[$i] = $start + $i * SAMPLERATE;
}

// Create the new Graph\Graph
$graph = new Graph\Graph(540, 300);

// Slightly larger than normal margins at the bottom to have room for
// the x-axis labels
$graph->SetMargin(40, 40, 30, 130);

// Fix the Y-scale to go between [0,100] and use date for the x-axis
$graph->SetScale('datlin', 0, 100);
$graph->title->Set('Example on Date scale');

// Set the angle for the labels to 90 degrees
$graph->xaxis->SetLabelAngle(90);

// The automatic format string for dates can be overridden
$graph->xaxis->scale->SetDateFormat('H:i');

// Adjust the start/end to a specific alignment
$graph->xaxis->scale->SetTimeAlign(MINADJ_10);

$line = new Plot\LinePlot($data, $xdata);
$line->SetLegend('Year 2005');
$line->SetFillColor('lightblue@0.5');
$graph->Add($line);
$graph->Stroke();
