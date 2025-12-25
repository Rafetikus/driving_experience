<?php
require_once __DIR__ . "/config/db.php";
$id = $_GET['id'];
$conn->query("DELETE FROM driving_experience WHERE id=$id");
header("Location: summary.php");
exit;