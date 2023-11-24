<?php
include('connect.php');

$result = $conn->query("SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>

    <div class="form-container">
        <form action="add.php" method="post">
            <input type="text" name="task" placeholder="Добавить новую задачу" required>
            <button type="submit"><i class="fas fa-plus"></i></button>
        </form>
    </div>

    <ul>
        <?php
        while ($row = $result->fetch_assoc()) {
            $taskId = $row['id'];
            $taskStatus = $row['completed'] ? 'done' : 'undone';
            echo "<li class='task $taskStatus'>";
            echo $row['task_name'];

            echo "<form action='edit.php' method='post'>";
            echo "<input type='hidden' name='id' value='$taskId'>";
            echo "<input type='text' name='task' placeholder='Новое название' required>";
            echo "<button type='submit' class='edit-btn'><i class='fas fa-edit'></i></button>";
            echo "</form>";

            echo "<a href='delete.php?id=$taskId' class='delete-btn'><i class='fas fa-trash'></i></a>";

            echo "</li>";
        }
        ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
