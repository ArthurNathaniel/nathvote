<?php
include 'db.php';
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('Please log in first'); window.location='admin_login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']); // Event organizer name
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Check if the email or phone already exists in the database
    $sql_check = "SELECT * FROM event_organizers WHERE email='$email' OR phone='$phone'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('An organizer with this email or phone already exists.');</script>";
    } else {
        // Insert the organizer data into the database
        $sql = "INSERT INTO event_organizers (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Event organizer registered successfully'); window.location='register_event_organizer.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Event Organizer</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="all">
    <div class="all_box">
        <div class="title">
            <h2>Register Event Organizer</h2>
        </div>

        <form method="POST" action="">
            <div class="forms">
                <label>Organizer Name / Event Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="forms">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>

            <div class="forms">
                <label>Phone Number</label>
                <input type="tel" name="phone" required>
            </div>

            <div class="forms">
                <label>Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form">
                <input type="checkbox" onclick="togglePassword()"> Show Password
            </div>

            <div class="forms">
                <button type="submit">Register</button>
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
