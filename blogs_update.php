<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blogs Update</title>

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php

  error_reporting(1);
  include('connection.php');
  $id = $_GET['id'];
  $blogs_data = "SELECT * FROM blogs WHERE id=$id";
  $blogs_rawdata = $connection->query($blogs_data);
  $blogs_old_data = mysqli_fetch_array($blogs_rawdata);

  $blogs_title = $_POST['title'];
  $blogs_description = $_POST['description'];
  $blogs_date = $_POST['date'];
  $blogs_creator = $_POST['creator'];
  $submit = $_POST['submit'];

  $blogs_old_image = $blogs_old_data['image'];
  $blogs_new_image = $_FILES['image']['name'];

  if (isset($submit)) {
    if ($blogs_new_image) {
      $blogs_image = $blogs_new_image;
      move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $blogs_image);
      if (file_exists('pj_img/' . $blogs_image)) {
        unlink('pj_img/' . $blogs_old_image);
      }
    } else {
      $blogs_image = $blogs_old_image;
    }
    $blogs_data = "UPDATE blogs SET title='$blogs_title',description='$blogs_description',date='$blogs_date',creator='$blogs_creator', image='$blogs_image' WHERE id='$id'";
    $connection->query($blogs_data);
    header('location:blog.php');
  }

  ?>

  <!-- register form start  -->


  <div class="register-form">
    <form method="POST" enctype="multipart/form-data">
      <h3>blogs Service Update</h3>

      <input type="text" name="title" value="<?php echo $blogs_old_data['title'] ?>" class="box" id="blogs_title" required>
      <input type="date" name="date" value="<?php echo $blogs_old_data['date'] ?>" class="box" id="blogs_date" required>
      <input type="text" name="creator" value="<?php echo $blogs_old_data['creator'] ?>" class="box" id="blogs_creator" required>
      <input type="file" name="image" class="box" id="blogs_image" required>
      <textarea name="description" class="box" id="blogs_description"><?php echo $old_data['description'] ?></textarea>
      <input type="submit" onclick="window.location.href='blogs.php'" name="submit" value="Update Now" class="btn">
    </form>
  </div>

  <!-- register form end  -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>