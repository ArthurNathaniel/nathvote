<?php
include 'db.php';
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('Please log in first'); window.location='admin_login.php';</script>";
    exit();
}

// Fetch all event organizers from the database
$sql = "SELECT * FROM event_organizers";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event Organizers</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="alls">
    <div class="all_box">
        <div class="title">
            <h2>Event Organizers</h2>
        </div>

        <!-- Table to display event organizers -->
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['created_at'] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No event organizers found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Optionally, you can add a link to go back to the dashboard -->
        <div class="forms">
            <a href="admin_dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</div>

</body>
</html>
