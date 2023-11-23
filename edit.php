<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskId = $_POST['id'];
    $newTaskName = htmlspecialchars($_POST['task']);

    $stmt = $conn->prepare("UPDATE tasks SET task_name = ? WHERE id = ?");
    
    if ($stmt === false) {
        die('Ошибка подготовки запроса (' . $conn->errno . ') ' . $conn->error);
    }

    $stmt->bind_param('si', $newTaskName, $taskId);

    if ($stmt->execute() === false) {
        die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
    }

    $stmt->close();
}

header('Location: index.php');
exit();
?>
