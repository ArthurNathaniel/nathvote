<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | NathVote</title>
    <?php include 'cdn.php' ?>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/event.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="contestant_tile">
        <h1>NathVote | Contestant</h1>
    </div>
    <div class="contestant_all">
        <?php
       include'db.php';

        // Fetch and display contestants
        $result = $conn->query("SELECT * FROM contestants");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="contestant_card">
                        <div class="contestant_img" style="background-image: url(' . $row["image"] . ');"></div>
                        <div class="contestant_info">
                            <h3>' . $row["name"] . '</h3>
                            <p>' . $row["title"] . '</p>
                            <button><a href="' . $row["vote_link"] . '" target="_blank">Vote</a></button>
                        </div>
                    </div>';
            }
        } else {
            echo "No contestants available.";
        }

        $conn->close();
        ?>
    </div>
    <!-- <div class="contestant_all">
        <div class="contestant_card">
            <div class="contestant_img"></div>
            <div class="contestant_info">
                <h3>Wendy Asante</h3>
                <p>Face of KNUST</p>
                <button>
                    <a href="">Vote</a>
                </button>
            </div>
        </div>




    </div> -->

    <?php include 'footer.php' ?>
    <script src="./js/search_function.js"></script>
    <script src="./js/navbar.js"></script>
</body>

</html>