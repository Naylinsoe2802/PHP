<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Service Update</title>

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php

  error_reporting(1);
  include('connection.php');
  $id = $_GET['id'];
  $about_data = "SELECT * FROM about WHERE id=$id";
  $about_rawdata = $connection->query($about_data);
  $about_old_data = mysqli_fetch_array($about_rawdata);

  $about_title = $_POST['title'];
  $about_description = $_POST['description'];
  $submit = $_POST['submit'];

  $about_old_image = $about_old_data['image'];
  $about_new_image = $_FILES['image']['name'];

  if (isset($submit)) {
    if ($about_new_image) {
      $about_image = $about_new_image;
      move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $about_image);
      if (file_exists('pj_img/' . $about_image)) {
        unlink('pj_img/' . $about_old_image);
      }
    } else {
      $about_image = $about_old_image;
    }
    $about_data = "UPDATE about SET title='$about_title',description='$about_description', image='$about_image' WHERE id='$id'";
    $connection->query($about_data);
    header('location:about.php');
  }

  ?>

  <!-- register form start  -->


  <div class="register-form">
    <form method="POST" enctype="multipart/form-data">
      <h3>About Service Update</h3>

      <input type="text" name="title" value="<?php echo $about_old_data['title'] ?>" class="box" id="about_title" required>
      <input type="file" name="image" class="box" id="about_image" required>
      <textarea name="description" class="box" id="about_description"><?php echo $old_data['description'] ?></textarea>
      <input type="submit" onclick="window.location.href='about.php'" name="submit" value="Update Now" class="btn">
    </form>
  </div>

  <!-- register form end  -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>