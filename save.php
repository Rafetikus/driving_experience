<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/config/db.php";

$isEdit = isset($_POST['id']) && $_POST['id'] !== '';

if ($isEdit) {
    $stmt = $conn->prepare("
        UPDATE driving_experience SET
            firstname = ?,
            surname = ?,
            email = ?,
            phone = ?,
            date = ?,
            start_time = ?,
            end_time = ?,
            distance_km = ?,
            weather = ?,
            road_material = ?,
            traffic = ?,
            road_type = ?,
            experience_level = ?
        WHERE id = ?
    ");

    $stmt->bind_param(
        "sssssssisssssi",
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['date'],
        $_POST['startTime'],
        $_POST['endTime'],
        $_POST['distance'],
        $_POST['weather'],
        $_POST['roadMaterial'],
        $_POST['traffic'],
        $_POST['roadType'],
        $_POST['experienceLevel'],
        $_POST['id']
    );

} else {
    $stmt = $conn->prepare("
        INSERT INTO driving_experience (
            firstname, surname, email, phone,
            date, start_time, end_time, distance_km,
            weather, road_material, traffic, road_type, experience_level
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
    ");

    $stmt->bind_param(
        "sssssssisssss",
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['date'],
        $_POST['startTime'],
        $_POST['endTime'],
        $_POST['distance'],
        $_POST['weather'],
        $_POST['roadMaterial'],
        $_POST['traffic'],
        $_POST['roadType'],
        $_POST['experienceLevel']
    );
}

$stmt->execute();

header("Location: summary.php");
exit;