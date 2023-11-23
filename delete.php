<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $taskId = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");

    if ($stmt === false) {
        die('Ошибка подготовки запроса (' . $conn->errno . ') ' . $conn->error);
    }

    $stmt->bind_param('i', $taskId);

    if ($stmt->execute() === false) {
        die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
    }

    $stmt->close();
}

header('Location: index.php');
exit();
?>
