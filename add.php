<?php


if(isset($_POST['name'])){
    $name = $_POST['name']; 
    $price = $_POST['price']; 
    $imgname = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    // database connection
    $connection = mysqli_connect('localhost','root','','crud');
    $sql = "INSERT INTO `add` (`name`,`price`,`img`) VALUE ('$name','$price','$imgname')";
    mysqli_query($connection,$sql);
    // upload img
    move_uploaded_file($tmp,"img/".$imgname);
    header('Location: show.php');
    exit();
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" required>
        <input type="text" name='price' required>
        <input type="file" name="img">
        <input type="submit" value="send">
    </form>
</body>

</html>