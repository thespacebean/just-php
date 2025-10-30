<?php

use App\DB\DbConnector;

require __DIR__ . '/bootstrap.php';


$db = new DbConnector();
$dbc = $db->connect();

$dbc->exec("
 CREATE TABLE IF NOT EXISTS messages (
     id INT AUTO_INCREMENT PRIMARY KEY,
     message VARCHAR(255) NOT NULL
 )
");


$stmt = $dbc->query("SELECT COUNT(*) as count FROM messages");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $row['count'];
$dbc->exec("
 INSERT INTO messages (message)
 SELECT CONCAT('message-', '$count')
 WHERE NOT EXISTS (
  SELECT 1 FROM messages WHERE message = CONCAT('message-', '$count')
 )
");

$stmt = $dbc->query("SELECT * FROM messages");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
 echo $row['id'] . " " . $row['message'] . "<br>";
}

