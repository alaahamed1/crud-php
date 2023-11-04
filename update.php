<?php
    if(isset($_POST['name'])){
        $name = $_POST['name']; 
        $price = $_POST['price']; 
        $imgname = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];
        $id = $_GET['id'];
        move_uploaded_file($tmp,"img/".$imgname);
        $connection =  mysqli_connect("localhost","root","","crud");
        $sql = "UPDATE `add` SET `name` = '$name', `price` = '$price' , `img` = '$imgname' WHERE `id` = $id ";
        // echo($sql) ; die;
        mysqli_query($connection, $sql);
        header("location: show.php");
}else{
    $id = $_GET['id'];
$connection =  mysqli_connect("localhost","root","","crud");

$query = mysqli_query($connection,"SELECT * FROM  `add` WHERE `id` = $id");

$data=  mysqli_fetch_assoc($query);
print_r($data);
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
    <form action="update.php?id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
        <input type="text" value="<?= $data['name']; ?>" name="name" required>
        <input type="text" value="<?= $data['price']; ?>" name='price' required>
        <img  width="100px" height="100px" src="img/<?= $data['img'] ?>" alt="updated img">
        <input type="file" name="img">
        <input type="submit" value="send">
    </form>
</body>

</html>