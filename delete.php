<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $connection = mysqli_connect('localhost', 'root', '', 'crud');
    $sql = "DELETE FROM `add` WHERE `id` = $id";
    mysqli_query($connection, $sql);
    header("location: show.php");
}
?>
