<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('Please log in first'); window.location='admin_login.php';</script>";
    exit();
}

$admin_name = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - NathVote</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="dashboard">
    <h1>Welcome, <?php echo htmlspecialchars($admin_name); ?> 👋</h1>
    
 
</div>

</body>
</html>
