<?php

// Delete a card

if (isset($_POST['delete'])) {
    $task_id = $_POST['ID'];
    delete_task($task_id);
}
?>
<?php

?>

<div class="task-card">
    <h3 class="title"><?php echo $task['title']; ?></h3>
    <p class="description"><?php echo $task['description']; ?></p>
    <span class="priority">Priority: <?php echo $task['priority']; ?></span>
    <select class="form-control card-drop-down">
        <option>To Do</option>
        <option>Doing</option>
        <option>Done</option>
    </select>
    <span class="created_date"><?php echo $task['created_date']; ?></span>
    <span class="due_date"><?php echo $task['due_date']; ?></span>
    <span class="status"><?php echo $task['status']; ?></span>
    <form action="" method="POST">
        <input type="hidden" name="ID" class="ID" value="<?php echo $task['ID']; ?>">
        <div class="btn-holder">
            <button type="submit" name="edit" class="btn btn-secondary">Edit</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete</button>
        </div>
    </form>
</div>