<?php


function connect()
{
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
}

function create_task($task_data)
{

    $sql = "INSERT INTO Tasks (";
    $sql .= "title,";
    $sql .= "description,";
    $sql .= "priority,";
    $sql .= "due_date)";
    $sql .= " VALUES (";
    $sql .= "'" . $task_data['title'] . "',";
    $sql .= "'" . $task_data['description'] . "',";
    $sql .= $task_data['priority'] . ",";
    $sql .= "'" . $task_data['due_date'] . " 00:00:00'";
    $sql .= ")";


    $connection = connect();
    if ($connection->query($sql) === TRUE) {
        // echo "New task created successfully";
    } else {
        die("Error: " . $sql . "<br>" . $connection->error);
    }
}
function get_task($task_id)
{
    var_dump($task_id);
    if (!$task_id) {
        die('No ID available');
    }

    $connection = connect();
    $sql = "SELECT * FROM Tasks WHERE ID = $task_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['ID'] . "<br>";
            echo "Title: " . $row['title'] . "<br>";
            echo "Description: " . $row['description'] . "<br>";
            echo "Priority: " . $row['priority'] . "<br>";
            echo "Due date: " . $row['due_date'] . "<br>";
            echo "Created date: " . $row['created_date'] . "<br>";
            echo "Status: " . $row['status'] . "<br>";
            return $row;
        }
    }
}

function update_task($edit_card_data)
{
    $sql = "UPDATE Tasks SET ";
    $sql .= "title = '" . $edit_card_data['title'] . "',";
    $sql .= "description = '" . $edit_card_data['description'] . "',";
    $sql .= "priority = '" . $edit_card_data['priority'] . "',";
    $sql .= "due_date = '" . $edit_card_data['due_date'] . "'";
    //$sql .= "status = '" . $edit_card_data['status'] . "'";
    $sql .= "WHERE ID = " . $edit_card_data['ID'];


    $connection = connect();
    if ($connection->query($sql) === TRUE) {
        //echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
function delete_task($task_id) // Skoða að setja inn $form_id sem parameter og setja $_POST info þegar við köllum á functionið
{

    // sql to delete a record

    $sql = "DELETE FROM Tasks WHERE ID = $task_id";

    $connection = connect();
    if ($connection->query($sql) === TRUE) {
        // echo "Task deleted successfully";
    } else {
        die("Error deleting record: " . $connection->error);
    }
}

function get_all_tasks()
{
    $connection = connect();

    $sql = "SELECT * FROM Tasks";
    $result = $connection->query($sql);
    $tasks = [];

    if ($result->num_rows > 0) {
        // output data of each row 
        while ($row = $result->fetch_assoc()) {
            array_push($tasks, $row);
        }
    } else {
        // echo "0 results";
    }
    return $tasks;
}
