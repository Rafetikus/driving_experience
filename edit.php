<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/config/db.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: summary.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM driving_experience WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    header("Location: summary.php");
    exit;
}

function selected($a, $b) {
    return $a === $b ? "selected" : "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Driving Experience</title>
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
    max-width: 800px;
    margin: 30px auto;
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px gray;
}

h1 {
    text-align: center;
    color: darkslategray;
}

fieldset {
    border: 2px solid darkslategray;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
}

legend {
    font-weight: bold;
    color: darkslategray;
}

label {
    display: block;
    margin-top: 12px;
    font-weight: bold;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
}

button {
    margin-top: 20px;
    padding: 10px;
    background: forestgreen;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

button:hover {
    background: darkgreen;
}

a {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: darkslategray;
    text-decoration: none;
}
</style>
</head>

<body>

<header>
    <h1>Edit Driving Experience</h1>
</header>

<main>
<form method="POST" action="save.php">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<fieldset>
<legend>Your Info</legend>

<label>First Name</label>
<input type="text" name="firstname" value="<?= htmlspecialchars($row['firstname']) ?>" required>

<label>Last Name</label>
<input type="text" name="surname" value="<?= htmlspecialchars($row['surname']) ?>" required>

<label>Email</label>
<input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>

<label>Phone</label>
<input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required>
</fieldset>

<fieldset>
<legend>Driving Experience</legend>

<label>Date</label>
<input type="date" name="date" value="<?= $row['date'] ?>" required>

<label>Start Time</label>
<input type="time" name="startTime" value="<?= $row['start_time'] ?>" required>

<label>End Time</label>
<input type="time" name="endTime" value="<?= $row['end_time'] ?>" required>

<label>Distance (km)</label>
<input type="number" name="distance" value="<?= $row['distance_km'] ?>" min="0" required>

<label>Weather Condition</label>
<select name="weather" required>
    <option value="">Choose...</option>
    <option value="Sunny" <?= selected($row['weather'], "Sunny") ?>>Sunny</option>
    <option value="Cloudy" <?= selected($row['weather'], "Cloudy") ?>>Cloudy</option>
    <option value="Rainy" <?= selected($row['weather'], "Rainy") ?>>Rainy</option>
    <option value="Snowy" <?= selected($row['weather'], "Snowy") ?>>Snowy</option>
</select>

<label>Road Material</label>
<select name="roadMaterial" required>
    <option value="">Choose...</option>
    <option value="Asphalt" <?= selected($row['road_material'], "Asphalt") ?>>Asphalt</option>
    <option value="Gravel" <?= selected($row['road_material'], "Gravel") ?>>Gravel</option>
    <option value="Dirt" <?= selected($row['road_material'], "Dirt") ?>>Dirt</option>
</select>

<label>Traffic Condition</label>
<select name="traffic" required>
    <option value="">Choose...</option>
    <option value="Light" <?= selected($row['traffic'], "Light") ?>>Light</option>
    <option value="Moderate" <?= selected($row['traffic'], "Moderate") ?>>Moderate</option>
    <option value="Heavy" <?= selected($row['traffic'], "Heavy") ?>>Heavy</option>
</select>

<label>Road Type</label>
<select name="roadType" required>
    <option value="">Choose...</option>
    <option value="City" <?= selected($row['road_type'], "City") ?>>City</option>
    <option value="Highway" <?= selected($row['road_type'], "Highway") ?>>Highway</option>
    <option value="Countryside" <?= selected($row['road_type'], "Countryside") ?>>Countryside</option>
</select>

<label>Experience Level</label>
<select name="experienceLevel" required>
    <option value="">Choose...</option>
    <option value="Beginner" <?= selected($row['experience_level'], "Beginner") ?>>Beginner</option>
    <option value="Intermediate" <?= selected($row['experience_level'], "Intermediate") ?>>Intermediate</option>
    <option value="Advanced" <?= selected($row['experience_level'], "Advanced") ?>>Advanced</option>
</select>

</fieldset>

<button type="submit">Save Changes</button>

</form>

<a href="summary.php">⬅ Back to Summary</a>
</main>

<footer>
    <p>Created by Jabarov Rauf © 2025</p>
</footer>

</body>
</html>