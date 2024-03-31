<?php
// Import your database configuration/connection.
require_once 'database.php';

session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['userID'])) {
    echo json_encode(['success' => false, 'message' => 'User is not logged in.']);
    exit;
}

$userID = $_SESSION['userID'];

try {
    // Assuming $pdo is your PDO database connection object from database.php
    $stmt = $pdo->prepare("SELECT name, email, phone FROM USER WHERE userID = :userID");
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    
    $userProfile = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($userProfile) {
        echo json_encode(['success' => true, 'user' => $userProfile]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Profile not found.']);
    }
} catch (PDOException $e) {
    // Handle the exception
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
