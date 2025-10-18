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
        <p><a href="index.php">home</a> / <span>about</span></p>
    </section>

    <!-- heading section end -->


    <!-- services section start -->

    <section class="services">

        <h1 class="title"> <span>our services</span> <button onclick="window.location.href='about_create.php'" class="btn title-btn">Add new services</button></h1>

        <div class="box-container">

            <?php
            error_reporting(1);
            include('connection.php');
            $about_data = "SELECT * FROM about";
            $about_rawdata = $connection->query($about_data);
            while (list($id, $about_title, $about_description, $about_image) = mysqli_fetch_array($about_rawdata)) {
            ?>

                <div class="box">
                    <img src="pj_img/<?php echo $about_image ?>" alt="">
                    <h3><?php echo $about_title ?></h3>
                    <p><?php echo $about_description ?></p>
                    <a href="#" class="btn">read more</a>
                    <div>
                        <a onclick="window.location.href='about_update.php?id=<?php echo $id ?>'" class="btn title-btn">Update</a>
                        <a onclick="window.location.href='about_delete.php?id=<?php echo $id ?>&image=<?php echo $about_image ?>'" class="btn title-btn">Delete</a>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>

    </section>

    <!-- services section end -->






    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>