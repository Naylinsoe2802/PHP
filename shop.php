<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include('css.php'); ?>

</head>

<body>

    <?php include('header.php'); ?>

    <?php include('navbar.php'); ?>

    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>shop</span></p>
    </section>

    <!-- heading section end -->


    <!-- category section start -->

    <section class="category">
        <h1 class="title"> <span>our categories</span> <a href="categories_create.php" class="btn title-btn">Add new category</a> </h1>

        <div class="box-container">

            <?php
            error_reporting(1);
            include('connection.php');
            $categories_data = "SELECT * FROM categories";
            $categories_rawdata = $connection->query($categories_data);
            while (list($id, $categories_name, $categories_image) = mysqli_fetch_array($categories_rawdata)) {
            ?>

                <div class="box">

                    <img src="pj_img/<?php echo $categories_image ?>" alt="">
                    <h3><?php echo $categories_name ?></h3>
                <div>
                    <a onclick="window.location.href='categories_update.php?id=<?php echo $id ?>'" class="btn title-btn">Update</a>
                   <a onclick="window.location.href='categories_delete.php?id=<?php echo $id ?>&image=<?php echo $categories_image ?>'" class="btn title-btn">Delete</a>
                </div>
                </div>
                <?php
            }
                ?>
        </div>
    </section>

    <!-- category section end -->

    <!-- products section start -->

    <section class="products">
        <h1 class="title"> <span>our products</span> <button onclick="window.location.href='product_create.php'" class="btn title-btn">Add new product</button></h1>

        <div class="box-container">

            <?php
            error_reporting(1);
            include('connection.php');
            $products_data = "SELECT * FROM products";
            $products_rawdata = $connection->query($products_data);
            while (list($id, $products_name, $products_price, $products_quantity, $products_image) = mysqli_fetch_array($products_rawdata)) {
            ?>

                <div class="box">
                    <div class="icons">
                        <a href="#" class="ri-shopping-cart-line"></a>
                        <a href="#" class="ri-heart-line"></a>
                        <a href="#" class="ri-eye-line"></a>
                    </div>
                    <div class="image">
                        <img src="pj_img/<?php echo $products_image ?>" alt="">
                    </div>
                    <div class="content">
                        <div class="price"><?php echo $products_price ?></div>
                        <h3><?php echo $products_name ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span><?php echo $products_quantity ?></span>
                        </div>
                    </div>
                    <a onclick="window.location.href='products_update.php?id=<?php echo $id ?>'" class="btn title-btn">Update</a>
                    <a onclick="window.location.href='products_delete.php?id=<?php echo $id ?>&image=<?php echo $products_image ?>'" class="btn title-btn">Delete</a>
                </div>
            <?php
            }
            ?>

        </div>
    </section>

    <!-- products section end -->


    <?php include('footer.php'); ?>

    <?php include('js.php'); ?>

</body>

</html>

