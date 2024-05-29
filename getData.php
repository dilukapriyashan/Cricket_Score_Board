<?php 
require_once 'connection.php';

$xml = simplexml_load_file('scoreboard.xml'); // replace 'scoreboard.xml' with the name of your xml file

echo "<table class='text-center'>";
echo "<tr><th colspan='2'>" . htmlspecialchars($xml->team->matchWithANB->teamOne) . "</th><th colspan='2'>" . htmlspecialchars($xml->team->matchWithANB->teamTwo) . "</th></tr>";
echo "<tr><td>Batting</td><td>Bowling</td><td>Batting</td><td>Bowling</td></tr>";

foreach ($xml->team->matchWithANB->teamA->players->player as $player) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($player->name) . "</td>";
    echo "<td colspan='2'>" . htmlspecialchars($player->description) . "</td>";
    echo "<td>" . htmlspecialchars($player->marks) . "</td>";
    echo "</tr>";
}

$extras = htmlspecialchars($xml->team->matchWithANB->extras);
$total = htmlspecialchars($xml->team->matchWithANB->total);

echo "<tr><th>Extras</th><td colspan='2'></td><td>{$extras}</td></tr>";
echo "<tr><th>Total:</th><td colspan='2'></td><td>{$total}</td></tr>";
echo "</table>";
?>




   