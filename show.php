<?php


$connection = mysqli_connect("localhost","root","","crud");
$sql = "SELECT * FROM `add`";
$query = mysqli_query($connection,$sql);
$data = mysqli_fetch_all($query,MYSQLI_ASSOC);


// echo "<pre>";
// print_r($data);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>img</th>
            <th>delete</th>
        </tr>
        <?php foreach($data as $x){ ?>
        <tr>
            <td><?php echo $x['id'] ?></td>
            <td><?php echo $x['name'] ?></td>
            <td><?php echo $x['price'] ?></td>
            <td> <img width="100px" height="100px" src="img/<?php echo $x['img'] ?>"></td>
            <td> <a href="delete.php?id=<?php echo $x['id'] ?>">Delete</a></td>
            <td> <a href="update.php?id=<?php echo $x['id'] ?>">Update</a></td>
        </tr>
        <?php }  ?>
    </table>
</body>

</html>