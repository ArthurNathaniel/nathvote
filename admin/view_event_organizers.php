<?php
include 'db.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('Please log in first'); window.location='admin_login.php';</script>";
    exit();
}

// Disable organizer
if (isset($_GET['disable_id'])) {
    $disable_id = $_GET['disable_id'];
    $disable_sql = "UPDATE event_organizers SET status='disabled' WHERE id='$disable_id'";
    mysqli_query($conn, $disable_sql);
    echo "<script>alert('Organizer disabled'); window.location='view_event_organizers.php';</script>";
}

// Enable organizer
if (isset($_GET['enable_id'])) {
    $enable_id = $_GET['enable_id'];
    $enable_sql = "UPDATE event_organizers SET status='active' WHERE id='$enable_id'";
    mysqli_query($conn, $enable_sql);
    echo "<script>alert('Organizer enabled'); window.location='view_event_organizers.php';</script>";
}

// Fetch organizers
$sql = "SELECT * FROM event_organizers";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

            <table border="1" cellpadding="10" style="width:100%; text-align:left;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name/Event Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['status']}</td>
                                <td>" . date("M d, Y h:i A", strtotime($row['created_at'])) . "</td><td>";
                            if ($row['status'] == 'active') {
                                echo "<a href='view_event_organizers.php?disable_id={$row['id']}' onclick='return confirm(\"Disable this organizer?\")'>Disable</a>";
                            } else {
                                echo "<a href='view_event_organizers.php?enable_id={$row['id']}' onclick='return confirm(\"Enable this organizer?\")'>Enable</a>";
                            }
                            echo "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No event organizers found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="forms" style="margin-top: 20px;">
                <a href="admin_dashboard.php">Back to Dashboard</a>
            </div>
        </div>
    </div>

</body>

</html>