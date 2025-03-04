<?php
$host = "localhost";
$dbname = "mentorapp";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO bedrijven (naam, adres, telefoonnummer, gemaakt_op, geupdate_op) 
            VALUES (:naam, :adres, :telefoonnummer, NOW(), NOW())";

    $stmt = $pdo->prepare($sql);

    $bedrijfData = [
        'naam' => 'MentorApp BV',
        'adres' => 'Hoofdstraat 123, 1011AB Amsterdam',
        'telefoonnummer' => '0612345678'
    ];

    $stmt->execute($bedrijfData);

    echo "✅ Company inserted successfully!";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
