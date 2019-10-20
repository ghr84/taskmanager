<?php
include('./header.php');
include('../functions.php');
if (isset($_POST['submit'])) {
    update_task($_POST);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];
    $id = $_POST['ID'];
}

$task = get_task($_GET['ID']);
$title = $task['title'];
$description = $task['description'];
$priority = $task['priority'];
$due_date = $task['due_date'];
$status = $task['status'];
$id = $task['ID'];
?>

<div class="container">
    <div class="task-card">
        <form action="" method="POST">
            <h2 class="heading">Edit Task</h2>
            <div class="form-group">
                <label class="h3" name="title">Title</label><br>
                <input name="title" type="text" class="form-control" value='<?php echo $title; ?>' />
                <?php if (!empty($title_error)) : ?>
                    <div class="badge badge-pill badge-danger"><?php echo ($title_error); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="h3" name="description">Description</label>
                <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                <?php if (!empty($description_error)) : ?>
                    <div class="badge badge-pill badge-danger"><?php echo ($description_error); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="h3" name="priority">Priority</label>
                <select name="priority" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
                <?php if (!empty($priority_error)) : ?>
                    <div class="badge badge-pill badge-danger"><?php echo ($priority_error); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="h3" name="due_date">Due Date</label>
                <input name="due_date" type="date" class="form-control" value='<?php echo $due_date; ?>' />
                <?php if (!empty($due_date_error)) : ?>
                    <div class="badge badge-pill badge-danger"><?php echo ($due_date_error); ?></div>
                <?php endif; ?>
            </div>
            <input type="hidden" name="ID" value="<?php echo $id; ?>" />
            <input name="submit" type="submit" value="Edit Task" class="btn btn-primary" />
        </form>
    </div>
</div>