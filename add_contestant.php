<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contestant | NathVote</title>
    <?php include 'cdn.php'; ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/event.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="add_contestant_form">
        <form action="process_contestant.php" method="post" enctype="multipart/form-data">
            <div class="title_forms">
                <h1>Nath<span>Vote</span> | Add a Contestant</h1>
            </div>
            <div class="forms">
                <label for="contestant_name">Contestant Name:</label>
                <input type="text" name="contestant_name" required>
            </div>

            <div class="forms">
                <label for="contestant_title">Contestant Title:</label>
                <input type="text" name="contestant_title" required>
            </div>

            <div class="forms">
                <label for="contestant_image">Contestant Image URL:</label>
                <input type="file" name="contestant_image" required>
            </div>

            <div class="forms">
                <label for="vote_link">Vote Link:</label>
                <input type="text" name="vote_link" required>
            </div>

            <button type="submit">Add Contestant</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
    <script src="./js/navbar.js"></script>
</body>

</html>