<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Create</title>

    <?php include('css.php'); ?>
</head>

<body>

    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>

    <?php

    error_reporting(1);
    include('connection.php');
    $categories_name = $_POST['name'];
    $categories_image = $_FILES['image']['name'];
    $submit = $_POST ['submit'];

    if (isset($submit)) {
        $categories_data = "INSERT INTO categories (name,image) VALUES('$categories_name','$categories_image')";
        move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $categories_image);
        $connection->query($categories_data);
        header('location:shop.php');
    }

    ?>

    <!-- register form start  -->


    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Categories Create Form</h3>

            <input type="text" name="name" placeholder="Enter your name" class="box" required>
            <input type="file" name="image" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>