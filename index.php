<?php
require_once __DIR__ . "/config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driving Experience Entry</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: beige;
            color: black;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
            background-color: darkslategray;
            color: white;
            text-align: center;
            padding: 15px;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px gray;
            max-width: 800px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: darkslategray;
            margin-bottom: 15px;
        }

        fieldset {
            border: 2px solid darkslategray;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        legend {
            font-size: 1.1rem;
            font-weight: bold;
            color: darkslategray;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid silver;
            border-radius: 5px;
        }

        button {
            background-color: forestgreen;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>

<header>
    <h1>Driving Experience Assistant</h1>
</header>

<main>
<form method="POST" action="save.php">

<fieldset>
<legend>Your Info</legend>

<label>First Name</label>
<input type="text" name="firstname" placeholder="Enter your first name" required>

<label>Last Name</label>
<input type="text" name="surname" placeholder="Enter your last name" required>

<label>Email</label>
<input type="email" name="email" placeholder="example@email.com" required>

<label>Phone</label>
<input type="text" name="phone" placeholder="+994 XX XXX XX XX" required>
</fieldset>

<fieldset>
<legend>Driving Experience</legend>

<label>Date</label>
<input type="date" name="date" required>

<label>Start Time</label>
<input type="time" name="startTime" required>

<label>End Time</label>
<input type="time" name="endTime" required>

<label>Distance (km)</label>
<input type="number" name="distance" min="0" placeholder="Enter distance" required>

<label>Weather Condition</label>
<select name="weather" required>
    <option value="" disabled selected>Choose weather</option>
    <option value="Sunny">Sunny</option>
    <option value="Cloudy">Cloudy</option>
    <option value="Rainy">Rainy</option>
    <option value="Snowy">Snowy</option>
    <option value="Windy">Windy</option>
</select>

<label>Road Material</label>
<select name="roadMaterial" required>
    <option value="" disabled selected>Choose road material</option>
    <option value="Asphalt">Asphalt</option>
    <option value="Gravel">Gravel</option>
    <option value="Dirt">Dirt</option>
</select>

<label>Traffic Condition</label>
<select name="traffic" required>
    <option value="" disabled selected>Choose traffic</option>
    <option value="Light">Light</option>
    <option value="Moderate">Moderate</option>
    <option value="Heavy">Heavy</option>
</select>

<label>Road Type</label>
<select name="roadType" required>
    <option value="" disabled selected>Choose road type</option>
    <option value="City">City</option>
    <option value="Highway">Highway</option>
    <option value="Countryside">Countryside</option>
</select>

<label>Experience Level</label>
<select name="experienceLevel" required>
    <option value="" disabled selected>Choose level</option>
    <option value="Beginner">Beginner</option>
    <option value="Intermediate">Intermediate</option>
    <option value="Advanced">Advanced</option>
</select>

</fieldset>

<button type="submit">Save Experience</button>

</form>
</main>

<footer>
<p>Created by Jabarov Rauf © 2025</p>
</footer>

</body>
</html>