<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blogs Create</title>

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php

  error_reporting(1);
  include('connection.php');
  $blogs_title = $_POST['title'];
  $blogs_description = $_POST['description'];
  $blogs_date = $_POST['date'];
  $blogs_creator = $_POST['creator'];
  $blogs_image = $_FILES['image']['name'];
  $submit = $_POST['submit'];

  if (isset($submit)) {
    $blogs_data = "INSERT INTO blogs (title,description,date,creator,image) VALUES('$blogs_title','$blogs_description','$blogs_date','$blogs_creator','$blogs_image')";
    move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $blogs_image);
    $connection->query($blogs_data);
    header('location:blog.php');
  }

  ?>

  <!-- blogs section start -->

  <div class="register-form">
    <form method="POST" enctype="multipart/form-data">
      <h3>blogs Create Form</h3>

      <input type="text" name="title" placeholder="Enter your tilte" class="box" required>
      <input type="date" name="date" class="box" required>
      <input type="text" name="creator" placeholder="Enter your creator" class="box" required>
      <input type="file" name="image" class="box" required>
      <textarea name="description" class="box" placeholder="Enter your description" id="blogs_description"></textarea>
      <input type="submit" name="submit" value="Create Now" class="btn">
    </form>
  </div>

  <!-- blogs section end -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>