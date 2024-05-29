<?php
// Load the XML file
$xml = simplexml_load_file("scoreboard.xml");

// Check if the XML data was successfully loaded
if ($xml !== false) {
    // Accessing and displaying specific data from the XML
    echo "<h2>Title: " . htmlspecialchars($xml->team->matchWithANB->title) . "</h2>";
    echo "<h2>Status: " . htmlspecialchars($xml->team->matchWithANB->status) . "</h2>";
    echo "<h2>Status Now: " . htmlspecialchars($xml->team->matchWithANB->statusNow) . "</h2>";
    echo "<h2>Date: " . htmlspecialchars($xml->team->matchWithANB->date) . "</h2>";
} else {
    // Display an error message if the XML data failed to load
    echo "<error>Failed to load XML data</error>";
}
?>
