<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['organizer_id'])) {
    echo "<script>alert('Please log in first.'); window.location='login.php';</script>";
    exit();
}

$organizer_name = $_SESSION['organizer_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Organizer Dashboard</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
    <div class="alls">
        <div class="all_box">


                <h2>Welcome, <?php echo htmlspecialchars($organizer_name); ?>!</h2>
                <p>This is your organizer dashboard.</p>
    

        
        </div>
    </div>
</body>
</html>
