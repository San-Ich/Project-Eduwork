<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    echo "✓ MySQL Connected successfully!\n";
    
    $databases = $pdo->query('SHOW DATABASES')->fetchAll();
    echo "Databases found:\n";
    foreach($databases as $db) {
        echo "  - " . $db['Database'] . "\n";
    }
} catch(Exception $e) {
    echo "✗ Connection Error: " . $e->getMessage() . "\n";
}
?>
