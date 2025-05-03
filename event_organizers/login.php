<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = mysqli_real_escape_string($conn, $_POST['identifier']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM event_organizers WHERE email='$identifier' OR phone='$identifier'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['status'] == 'disabled') {
            echo "<script>alert('Your account has been disabled. Contact admin.');</script>";
        } elseif (password_verify($password, $row['password'])) {
            $_SESSION['organizer_id'] = $row['id'];
            $_SESSION['organizer_name'] = $row['name'];
            echo "<script>alert('Login successful'); window.location='dashboard.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('No account found with this email or phone number.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Organizer Login</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
<div class="all">
    <div class="all_box">
        <div class="title">
            <h2>Organizer Login</h2>
        </div>
        <form method="POST" action="">
            <div class="forms">
                <label>Email or Phone Number</label>
                <input type="text" name="identifier" required>
            </div>
            <div class="forms">
                <label>Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form">
                <input type="checkbox" onclick="togglePassword()"> Show Password
            </div>
            <div class="forms">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    var x = document.getElementById("password");
    x.type = (x.type === "password") ? "text" : "password";
}
</script>
</body>
</html>
