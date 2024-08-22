<?php
include("nav.php")
?>
<?php
$id = "";
$name = "";

if (isset($_SESSION['login']) && $_SESSION['login'] == 'true') {
    $userid = $_SESSION['id'];
    include 'server.php';
    $from = "SELECT * FROM `table` WHERE `userid`='$userid' ";

    $result = mysqli_query($conn, $from);
} else {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter-Like Post Page</title>
    <link rel="stylesheet" href="blogstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
 
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li>Home</li>
                <li>Explore</li>
                <li>Notifications</li>
                <li>Messages</li>
            </ul>
        </div>

        <div class="main-content">
            <div class="posts">
                <?php
                while ($row = mysqli_fetch_assoc($result)) { //fetching all data
                    $title = $row['title'];
                    $blog = $row['blog'];
                    $userid = $row['userid'];

                    echo '
                    <div class="post">
                        <div class="user-info">
                            <img class="Avatar" src="images/profile 2.jpg" alt="User Avatar">
                            <div class="user-details">
                                <h3>' . $fname . '</h3>
                                <p>' . $title . '</p>
                            </div>
                        </div>
                        <p class="post-content">' . $blog . '</p>
                    </div>';
                }
                ?>
            </div>
        </div>

        <div class="sidebar right">
            <h2>Trending</h2>
            <ul>
                <li>Trend 1</li>
                <li>Trend 2</li>
                <li>Trend 3</li>
            </ul>
        </div>
    </div>
</body>
</html>
