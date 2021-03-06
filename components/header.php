<?php
//include('./functions.php');

if (isset($_POST['search'])) {
    $credentials = [
        'server' => "localhost",
        'username' => "root",
        'password' => 'Lestubok84',
        'database' => "task_manager",
        'port' => 3306
    ];


    // Create a connection

    $connection = new mysqli(
        $credentials['server'],
        $credentials['username'],
        $credentials['password'],
        $credentials['database'],
        $credentials['port']
    );

    // Check connection

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM Tasks WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    $result = mysqli_connect($connection, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>
                        <h3>" . $row['title'] . "</h3>
                        <p>" . $row['description'] . "</p>
                    </div>";
        }
    } else {
        echo "There are no results matching your search";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/journal/bootstrap.min.css" media="screen,projection" />
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title><?php echo (isset($page_title)) ? $page_title : 'Taskmanager' ?></title>
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-dark bg-primary header">
        <div class="logo">Taskmanager</div>
        <form action="" method="POST">
            <input type="search" name="search-input" placeholder="Search.." />
            <input type="submit" name="search" value="search" />
        </form>
        <form action="/components/new_task.php" method="POST">
            <input type="submit" class="btn btn-secondary my-2 my-sm-0" value="Add a task!" />
        </form>

    </header>
</body>

</html>