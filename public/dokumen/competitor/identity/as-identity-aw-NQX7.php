<?php
$mysqli = new mysqli("localhost", "u1345747_comic", "1B1$q=,B=6tQ", "u1345747_comic");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$result = $mysqli->query("UPDATE payment_methods SET ref_number='61105350051' WHERE id='1'");

$mysqli->close();
