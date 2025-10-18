<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

  <?php include('css.php'); ?>

</head>

<body>

  <?php include('connection.php'); ?>

  <?php include('header.php'); ?>


  <?php include('navbar.php'); ?>



  <!-- heading section start -->

  <section class="heading">
    <h3>our shop</h3>
    <p><a href="index.php">home</a> / <span>team</span></p>
  </section>

  <!-- heading section end -->

  <!-- team section start -->

  <section class="team">

    <h1 class="title"> <span>our team</span> <button onclick="window.location.href='team_create.php'" class="btn title-btn">Add new team</button></h1>

    <div class="box-container">

      <div class="box-container">

        <?php
        error_reporting(1);
        include('connection.php');
        $team_data = "SELECT * FROM team";
        $team_rawdata = $connection->query($team_data);
        while (list($id, $team_name, $team_image, $team_position) = mysqli_fetch_array($team_rawdata)) {
        ?>

          <div class="box" method="POST" enctype="multipart/form-data">
            <div class="share">
              <a href="team_update.php?id=<?php echo $id ?>" class="fa-solid fa-pen"></a>
              <a href="team_delete.php?id=<?php echo $id ?>&image=<?php echo $blogs_image ?>" class="fa-solid fa-trash"></a>
            </div>
            <div class="image">
              <img src="pj_img/<?php echo $team_image ?>" alt="">
            </div>
            <div class="user">
              <h3><?php echo $team_name ?></h3>
              <span><?php echo $team_position ?></span>
            </div>
          </div>

        <?php
        }
        ?>

      </div>
  </section>

  <!-- team section end -->







  <?php include('footer.php'); ?>

  <?php include('js.php'); ?>

</body>

</html>