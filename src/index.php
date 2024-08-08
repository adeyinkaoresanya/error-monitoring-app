<?php
// src/index.php

require 'error_handling.php';
require 'database.php';

echo "Starting the application...\n";

// Attempt to connect to the database
$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "Connected to the database successfully.\n";
} else {
    echo "Failed to connect to the database.\n";
}
