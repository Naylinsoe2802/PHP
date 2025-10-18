<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Create</title>

    <?php include('css.php'); ?>
</head>

<body>

    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>

    <?php

    error_reporting(1);
    include('connection.php');
    $products_name = $_POST['name'];
    $products_price = $_POST['price'];
    $products_quantity = $_POST['quantity'];
    $products_image = $_FILES['image']['name'];
    $submit = $_POST['submit'];

    if (isset($submit)) {
        $products_data = "INSERT INTO products (name,price,quantity,image) VALUES('$products_name','$products_price','$products_quantity','$products_image')";
        move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $products_image);
        $connection->query($products_data);
        header('location:shop.php');
    }

    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Product Create Form</h3>

            <input type="text" name="name" placeholder="Enter your product name" class="box" required>
            <input type="number" name="price" placeholder="Enter your price" class="box" required>
            <input type="number" name="quantity" placeholder="Enter your quantity" class="box" required>
            <input type="file" name="image" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>