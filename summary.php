<?php
require_once __DIR__ . "/config/db.php";

$res = $conn->query("SELECT * FROM driving_experience ORDER BY date DESC");
$rows = [];
$totalKm = 0;

while ($r = $res->fetch_assoc()) {
    $rows[] = $r;
    $totalKm += (int)$r['distance_km'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Driving Experience Summary</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    font-family: Arial, sans-serif;
    background-color: beige;
    margin: 0;
}

header, footer {
    background-color: darkslategray;
    color: white;
    text-align: center;
    padding: 15px;
}

main {
    max-width: 1100px;
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px gray;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid silver;
    padding: 8px;
    text-align: center;
}

th {
    background-color: darkslategray;
    color: white;
}

.actions a {
    margin: 0 5px;
    text-decoration: none;
    color: darkslategray;
    font-weight: bold;
}

.total {
    font-weight: bold;
    background: #f0f0f0;
}

canvas {
    max-width: 100%;
    margin: 30px auto;
    display: block;
}

button {
    background-color: forestgreen;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
}
</style>
</head>

<body>

<header>
<h1>Driving Experience Summary</h1>
</header>

<main>

<button onclick="location.href='index.php'">➕ Add New Experience</button>

<table>
<thead>
<tr>
<th>Name</th>
<th>Date</th>
<th>Km</th>
<th>Weather</th>
<th>Road</th>
<th>Traffic</th>
<th>Type</th>
<th>Level</th>
<th>Actions</th>
</tr>
</thead>

<tbody>
<?php foreach ($rows as $r): ?>
<tr>
<td><?= htmlspecialchars($r['firstname']." ".$r['surname']) ?></td>
<td><?= $r['date'] ?></td>
<td><?= $r['distance_km'] ?></td>
<td><?= $r['weather'] ?></td>
<td><?= $r['road_material'] ?></td>
<td><?= $r['traffic'] ?></td>
<td><?= $r['road_type'] ?></td>
<td><?= $r['experience_level'] ?></td>
<td class="actions">
<a href="edit.php?id=<?= $r['id'] ?>">Edit</a> |
<a href="delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Delete this entry?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>

<tr class="total">
<td colspan="2">TOTAL</td>
<td><?= $totalKm ?> km</td>
<td colspan="6"></td>
</tr>
</tbody>
</table>

<h2>Statistics</h2>

<canvas id="weatherChart"></canvas>
<canvas id="trafficChart"></canvas>
<canvas id="roadChart"></canvas>
<canvas id="typeChart"></canvas>

</main>

<footer>
<p>Created by Jabarov Rauf © 2025</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const data = <?= json_encode($rows) ?>;

function countBy(key) {
    const map = {};
    data.forEach(r => {
        if (!r[key]) return;
        map[r[key]] = (map[r[key]] || 0) + 1;
    });
    return map;
}

function draw(id, title, values) {
    new Chart(document.getElementById(id), {
        type: 'bar',
        data: {
            labels: Object.keys(values),
            datasets: [{
                label: title,
                data: Object.values(values)
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });
}

draw("weatherChart", "Weather", countBy("weather"));
draw("trafficChart", "Traffic", countBy("traffic"));
draw("roadChart", "Road Material", countBy("road_material"));
draw("typeChart", "Road Type", countBy("road_type"));
</script>

</body>
</html>