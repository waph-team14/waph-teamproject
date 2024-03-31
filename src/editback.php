<?php
// Assuming database.php includes the PDO connection $pdo
require_once 'database-data.sql';

session_start();

header('Content-Type: application/json');

// Function to update the user profile. You need to implement this function.
function update_user_profile($pdo, $userID, $name, $email, $phone, $isDisabled, $isSuperuser) {
    $sql = "UPDATE USER SET name = :name, email = :email, phone = :phone, isDisabled = :isDisabled, isSuperuser = :isSuperuser WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':isDisabled', $isDisabled, PDO::PARAM_BOOL);
    $stmt->bindParam(':isSuperuser', $isSuperuser, PDO::PARAM_BOOL);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userID'], $_POST['name'], $_POST['email'], $_POST['phone'])) {
        // Get the values from POST variables and ensure you validate and sanitize them properly
        $userID = $_SESSION['userID'];
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        // You need to determine how you handle the 'isDisabled' and 'isSuperuser' flags
        $isDisabled = false; // Example flag, you need to implement your own logic
        $isSuperuser = false; // Example flag, you need to implement your own logic

        try {
            // Call the function to update the user profile with the database connection passed in
            $rowCount = update_user_profile($pdo, $userID, $name, $email, $phone, $isDisabled, $isSuperuser);
            echo json_encode(['success' => $rowCount > 0]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Missing required fields']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>

