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
