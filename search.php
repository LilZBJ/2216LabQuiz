<?php
include 'validate.php';

$searchTerm = $_POST['searchTerm'] ?? '';

if (isXSS($searchTerm) || isSQLInjection($searchTerm)) {
    // If invalid input, clear the term and stay on the home page
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Result</title>
</head>
<body>
    <h1>Search Result</h1>
    <p>Your search term: <?php echo htmlspecialchars($searchTerm); ?></p>
    <a href="index.php">Back to Home</a>
</body>
</html>
