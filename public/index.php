<?php
global $pdo;
require_once 'includes/db.php';
require_once 'includes/home.php';

function initializeDatabase($pdo) {
    $sql = file_get_contents('includes/tables.sql');
    $pdo->exec($sql);
}
try {
    $pdo->query("SELECT 1 FROM countries LIMIT 1");
} catch (PDOException $e) {
    echo "Tables missing. Creating...\n";
    initializeDatabase($pdo);
}