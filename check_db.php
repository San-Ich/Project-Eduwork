<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=example_app', 'root', '');
    
    echo "✓ Connected to example_app!\n\n";
    
    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    echo "Tables in database:\n";
    foreach($tables as $table) {
        echo "  - $table\n";
    }
    
    echo "\n\nChecking critical tables:\n";
    $requiredTables = ['products', 'categories', 'users'];
    foreach($requiredTables as $table) {
        $exists = in_array($table, $tables);
        echo ($exists ? "✓" : "✗") . " $table\n";
    }
    
} catch(Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}
?>
