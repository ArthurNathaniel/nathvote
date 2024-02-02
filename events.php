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
    <section>
        <div class="event_hero">
            <h1>NathVote</h1>
            <h1> Innovative solutions for electronic voting and ticketing.</h1>
        </div>
    </section>
    <section>
        <section>
            <div class="search_all">
                <div class="search_title">
                    <h1>Events | NathVote</h1>
                    <p>Find an event by entering the event name in the search input box below</p>
                </div>
                <div class="search_bar">
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" id="eventSearch" placeholder="Search by entering either the event name or the event itself.">
                </div>
            </div>
        </section>

        <section>
            <div class="events_grid">
                <a href="knust.php">
                    <div class="event_card eventItem">
                        <div class="event_image"></div>
                        <div class="event_info">
                            <h3>Face of KNUST</h3>
                            <p>Computer Science Department</p>
                        </div>
                    </div>
                </a>
                <div class="event_card eventItem">
                    <div class="event_image"></div>
                    <div class="event_info">
                        <h3>Face of KSTU</h3>
                        <p>Medical Laboratory</p>
                    </div>
                </div>

                <div id="noResultsMessage" style="display: none;">No matching events found.</div>


            </div>
        </section>
        <?php include 'footer.php' ?>
        <script src="./js/search_function.js"></script>
        <script src="./js/navbar.js"></script>
</body>

</html>