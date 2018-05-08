<?php

/**
 * JPGraph v3.6.15
 */
require_once __DIR__ . '/../../vendor/autoload.php';
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

$data = [0.1235, 0.4567, 0.67, 0.45, 0.832];

// Callback function
// Get called with the actual value and should return the
// value to be displayed as a string
function cbFmtPercentage($aVal)
{
    return sprintf('%.1f%%', 100 * $aVal); // Convert to string
}

// Create the graph.
$graph = new Graph\Graph(400, 300);
$graph->SetScale('textlin');

// Create a bar plots
$bar1 = new Plot\BarPlot($data);

// Setup the callback function
$bar1->value->SetFormatCallback('cbFmtPercentage');
$bar1->value->Show();

// Add the plot to the graph
$graph->Add($bar1);

// .. and send the graph back to the browser
$graph->Stroke();
