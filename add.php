<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskName = $_POST['task'];

   
    $stmt = $conn->prepare("INSERT INTO tasks (task_name) VALUES (?)");
    $stmt->bind_param('s', $taskName);
    $stmt->execute();
    $stmt->close();
}

header('Location: index.php');
exit();
?>
