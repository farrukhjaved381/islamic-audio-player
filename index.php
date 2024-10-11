<?php
session_start();
include 'config.php'; // Database connection


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
include($_SERVER['DOCUMENT_ROOT'] . "/myweb/Projects/Spotify_clone/helper.php");

// Handle the search query
$search_query = "";
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];
}


// Fetch playlists or items based on the search query
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
$sql = "SELECT * FROM tracks WHERE title LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($sql);
$search_term = "%" . $search_query . "%";
$stmt->bind_param("ss", $search_term, $search_term);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Idreesia</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/utility.css" />
</head>

<body>
    <div class="container flex bg-black">
        <div class="left">
            <div class="home bg-grey rounded m-1">
                <div class="logo flex items-center">
                    <a href="index.php">
                        <img src="assets/idreesia-logo.png" alt="logo" width="90px" height="90px" />
                    </a>
                    <a href="index.php">
                        <h3>
                            Silsila <br />
                            Muhammadia <br />
                            Ameenia <br />
                            Idreesia <br />
                        </h3>
                    </a>
                </div>
                <ul>
                    <a href="index.php">
                        <li>

                            <img class="invert" src="assets/home.svg" alt="home" />

                            <h3>Home</h3>

                        </li>
                    </a>

                    <li>
                        <img class="invert" src="assets/search.svg" alt="search" />
                        <span id="search-text">
                            <h3>Search</h3>
                        </span>
                    </li>
                    <div class="search-container">
                    <form id="search-form" action="index.php" method="GET">
                        <input type="text" name="query" id="search-input" class="hidden"
                            value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>" placeholder="Search...">
                        <button type="submit" class="search-btn hidden">Search</button>
                        </form>
                    </div>

                </ul>
            </div>
            <div class="library bg-grey rounded m-1 p-1">
                <div class="left-heading">
                    <img class="invert" src="assets/playlist.svg" alt="playlist" />
                    <h2>Your Library</h2>
                </div>
                <div class="footer">
                    <div>
                        <span>Idreesia Player - All rights reserved <br>
                            &copy;2024 | Made by Farrukh MAIB </span>

                    </div>
                </div>
            </div>
        </div>
        <div class="right bg-grey">
            <div class="right-header bg-black rounded m-1 p-1">
                <div class="nav">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000"
                        fill="none">
                        <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="#ffffff"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000"
                        fill="none">
                        <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="#ffffff"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="buttons">
                    <?php if (is_loggged_in()) {
                        $user_info_arr = wpent_get_current_user();
                        ?>
                        <span class="btn signup-btn">Username:
                            <?php echo $user_info_arr["user_fields"]['display_name']; ?>
                        </span>
                        <a href="logout.php">
                            <button class="login-btn">Logout</button>
                        </a>
                        <?php
                    } else { ?>
                        <a href="signup.php">
                            <button class="signup-btn">Sign Up</button>
                        </a>
                        <a href="login.php">
                            <button class="login-btn">Login</button>
                        </a>
                    <?php } ?>
                </div>
            </div>

            <div class="spotify-playlists p-1 m-1">
                <h1>Islamic Playlists</h1>
                <div class="card-container">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                    <div class="card">
                        <div class="play-button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                                <path d="M18.8906 12.846C18.5371 14.189 16.8667 15.138 13.5257 17.0361C10.296 18.8709 8.6812 19.7884 7.37983 19.4196C6.8418 19.2671 6.35159 18.9776 5.95624 18.5787C5 17.6139 5 15.7426 5 12C5 8.2574 5 6.3861 5.95624 5.42132C6.35159 5.02245 6.8418 4.73288 7.37983 4.58042C8.6812 4.21165 10.296 5.12907 13.5257 6.96393C16.8667 8.86197 18.5371 9.811 18.8906 11.154C19.0365 11.7084 19.0365 12.2916 18.8906 12.846Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <img src="assets/' . $row['image'] . '" alt="' . $row['title'] . '">
                        <h2>' . $row['title'] . '</h2>
                        <p>' . $row['description'] . '</p>
                    </div>';
                        }
                    } else {
                        echo '<p>No results found for "' . htmlspecialchars($search_query) . '"</p>';
                    }
                    ?>
                </div>
            </div>


            <div class="playbar">
                <div class="playbar-content">
                    <img id="playbar-img" src="assets/play.svg" alt="Now Playing" />
                    <div class="playbar-info">
                        <h2 id="playbar-title">Add Track</h2>
                        <p id="playbar-artist">Click on any track to play</p>
                    </div>
                    <audio id="audio-player" controls>
                        <source id="audio-source" src="" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
            <script src="js/script.js"></script>
</body>

</html>