<?php
$conn = new mysqli('localhost', 'root', '123456','to-do-list');
if(!$conn){
    die(mysqli_error($conn));
}
?>
