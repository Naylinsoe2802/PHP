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

    <?php
    // session_start();

    // if (!isset($_SESSION['username'])) {
    //     header('Location: login.php');
    //     exit();
    // }
    ?>

    <?php include('header.php'); ?>


    <?php include('navbar.php'); ?>

    <!-- heading section start -->

    <section class="heading">
        <h3>our shop</h3>
        <p><a href="index.php">home</a> / <span>blog</span></p>
    </section>

    <!-- heading section end -->

    <!-- blog section start -->

    <section class="blog">
        <h1 class="title"> <span>our blogs</span> <button onclick="window.location.href='blogs_create.php'" class="btn title-btn">Add new blogs</button></h1>

        <div class="box-container">

            <?php
            error_reporting(1);
            include('connection.php');
            $blogs_data = "SELECT * FROM blogs";
            $blogs_rawdata = $connection->query($blogs_data);
            while (list($id, $blogs_title, $blogs_description, $blogs_date, $blogs_creator, $blogs_image) = mysqli_fetch_array($blogs_rawdata)) {
            ?>

                <div class="box">
                    <div class="image">
                        <img src="pj_img/<?php echo $blogs_image ?>" alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $blogs_title ?></h3>
                        <p><?php echo $blogs_description ?></p>
                        <a href="#" class="btn">read more</a>
                        <div>
                            <a onclick="window.location.href='blogs_update.php?id=<?php echo $id ?>'" class="btn title-btn">Update</a>
                            <a onclick="window.location.href='blogs_delete.php?id=<?php echo $id ?>&image=<?php echo $blogs_image ?>'" class="btn title-btn">Delete</a>
                        </div>
                        <div class="icons">
                            <a href="#"> <i class="fas fa-calendar"></i> <?php echo $blogs_date ?></a>
                            <a href="#"> <i class="fas fa-user"></i> <?php echo $blogs_creator ?></a>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </section>

    <!-- blog section end -->



    <?php include('footer.php'); ?>

    <?php include('js.php'); ?>

</body>

</html>