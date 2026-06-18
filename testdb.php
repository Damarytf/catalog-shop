<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    echo "Connected successfully with empty password!\n";
} catch (PDOException $e) {
    echo "Empty password failed: " . $e->getMessage() . "\n";
}

try {
    $pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
    echo "Connected successfully to localhost with empty password!\n";
} catch (PDOException $e) {
    echo "Empty password localhost failed: " . $e->getMessage() . "\n";
}
