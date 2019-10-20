<?php
include('../functions.php');

// Initilize input variables 

$title = $description = $due_date = '';

// Initilize error variables

$title_error = $description_error = $priority_error = $due_date_error = "";

// Initilize error count

$error_count = 0;

// Initilize success indicator 

$success = false;

// Form submition

if (isset($_POST['submit'])) {
    create_task($_POST);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    // Validations 

    $title_max_length = 10;
    if (empty($title)) {
        $title_error = "Please put in a title.";
        $error_count++;
    } else if (strlen($title > $title_max_length)) {
        $characters_over_limit = strlen($title) - $title_max_length;
        $title_error = "The title is $characters_over_limit too long";
        $error_count++;
    }

    $description_max_length = 70;
    if (empty($description)) {
        $description_error = "Please put in a description.";
        $error_count++;
    } else if (strlen($description > $description_max_length)) {
        $characters_over_limit = strlen($description) - $description_max_length;
        $description_error = "The description is $characters_over_limit too long";
        $error_count++;
    }

    if (empty($due_date)) {
        $due_date_error = "Please put in a date.";
        $error_count++;
    }

    // Check if the form was submitted, if so we clear the input fields 

    if ($error_count === 0) {
        $title = $description = $due_date = $priority = '';


        // This is the way we would safe our data in a JSON file 

        // Create a variable that contains the json data

        ////$task_str_in = @file_get_contents('tasks.json');

        // We check if the variable with the json data exsists if it doesn't
        // We create an empty array $task_array

        ////if (!$task_str_in) {
        ////$task_array = [];
        ////} else {

        // Else = But if the json data exsists we convert it into an object

        ////$task_array = json_decode($task_str_in, true);
        ////}

        // Here we add the new task to the json file from the form $_POST

        ////array_push($task_array, $_POST);

        // Here we convert the data from the $_POST to json format

        ////$task_str_out = json_encode($task_array, true);

        // And here we safe the data to the tasks.json file 

        ////file_put_contents('tasks.json', $task_str_out);

        // If the form was successfully posted without errors we change the 
        // $success variable to true and display the success message

        $success = true;
    }
}
?>
<?php include('./header.php') ?>
<?php if ($success) : ?>
    <div class="alert alert-dismissible alert-success no-task-msg">You're task was successfully added!</div>
<?php endif; ?>
<div class="container">
    <form action="" method="POST">
        <h2 class="heading">Add a new task!</h2>
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
        <input name="submit" type="submit" value="Add Task" class="btn btn-primary" />
    </form>
</div>