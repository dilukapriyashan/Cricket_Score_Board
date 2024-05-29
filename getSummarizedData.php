<?php
$xml = simplexml_load_file('scoreboard.xml'); // Replace 'scoreboard.xml' with the name of your XML file

echo "<table class='text-center'>";
echo "<tr><th colspan='2'>" . htmlspecialchars($xml->team->matchWithANB->teamOne) . "</th><th colspan='2'>" . htmlspecialchars($xml->team->matchWithANB->teamTwo) . "</th></tr>";
echo "<tr><td>Batting</td><td>Bowling</td><td>Batting</td><td>Bowling</td></tr>";
echo "<table style='margin-top:100px'>";

echo "<tr><th>Name</th><th>Over</th><th>Runs</th><th>Wicket</th></tr>";

$total_overs = 0;
$total_runs = 0;
$total_wickets = 0;

$players = $xml->xpath('//teamB/players/player[@style="bowling"]');

foreach ($players as $boller) {
    echo "<tr class='text-center'>";
    echo "<td>" . htmlspecialchars($boller->name) . "</td>";
    echo "<td>" . htmlspecialchars($boller->over) . "</td>";
    echo "<td>" . htmlspecialchars($boller->runs) . "</td>";
    echo "<td>" . htmlspecialchars($boller->wicket) . "</td>";
    echo "</tr>";   
    $total_wickets += (int)$boller->wicket;
    $total_overs += (double)$boller->over;
    $total_runs += (int)$boller->runs;
}

$total = htmlspecialchars($xml->team->matchWithANB->total);
echo "<tr><th>Total</th><th>" . $total_overs . "</th><th>" . $total . "</th><th>" . $total_wickets . "</th></tr>";

$rnd = rand(1, 100);
$playerIndex = min(intdiv($rnd - 1, 20), count($players) - 1);
echo "<tr><td colspan='4' class='table-danger text-center'>" . htmlspecialchars($players[$playerIndex]->name) . " is bowling</td></tr>";

echo "</table>";
?>
