<?php

if (isset($_POST['edit'])) {
    $task_id = $_POST['ID'];
    header('Location: /components/edit_task.php/?ID=' . $task_id, true, ($permanent === true) ? 301 : 302);
    update_task($task_id);
}

include('./functions.php');
include('./components/header.php');

?>
<?php $tasks =  get_all_tasks(); ?>
<?php if (empty($tasks)) : ?>
    <div class="alert alert-dismissible alert-success no-task-msg"><?php echo "The task board is empty! Come on let's make some plans!" ?></div>
<?php endif; ?>
<div class="container-frontpage">
    <div class="to-do">
        <h3>To Do</h3>

        <!-- If the tasks variable/array is not empty loop threw 
            the data and display in a card (task_card.php) -->

        <?php if (!empty($tasks)) : ?>
            <?php foreach ($tasks as $i => $task) : ?>

                <?php include('./components/task_card.php'); ?>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="doing">
        <h3>Doing</h3>
    </div>
    <div class="done">
        <h3>Done</h3>
    </div>
</div>