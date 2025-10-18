<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categories Update</title>

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php

  error_reporting(1);
  include('connection.php');
  $id = $_GET['id'];
  $categories_data = "SELECT * FROM categories WHERE id=$id";
  $categories_rawdata = $connection->query($categories_data);
  $categories_old_data = mysqli_fetch_array($categories_rawdata);

  $categories_name = $_POST['name'];
  $submit = $_POST['submit'];

  $categories_old_image = $categories_old_data['image'];
  $categories_new_image = $_FILES['image']['name'];

  if (isset($submit)) {
    if ($categories_new_image) {
      $categories_image = $categories_new_image;
      move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $categories_image);
      if (file_exists('pj_img/' . $categories_image)) {
        unlink('pj_img/' . $categories_old_image);
      }
    } else {
      $categories_image = $categories_old_image;
    }
    $categories_data = "UPDATE categories SET name='$categories_name', image='$categories_image' WHERE id='$id'";
    $connection->query($categories_data);
    header('location:shop.php');
  }

  ?>

  <!-- register form start  -->


  <div class="register-form">
    <form method="POST" enctype="multipart/form-data">
      <h3>Our Categories Update</h3>

      <input type="text" name="name" value="<?php echo $categories_old_data['name'] ?>" class="box" id="categories_name" required>
      <input type="file" name="image" class="box" id="categories_image" required>
      <input type="submit"  onclick="window.location.href='shop.php'"  name="submit" value="Update Now" class="btn">
    </form>
  </div>

  <!-- register form end  -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>