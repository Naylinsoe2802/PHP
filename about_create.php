<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Create</title>

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php

    error_reporting(1);
    include('connection.php');
    $about_title = $_POST['title'];
    $about_description = $_POST['description'];
    $about_image = $_FILES['image']['name'];
    $submit = $_POST ['submit'];

    if (isset($submit)) {
        $about_data = "INSERT INTO about (title,description,image) VALUES('$about_title','$about_description','$about_image')";
        move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $about_image);
        $connection->query($about_data);
        header('location:about.php');
    }

    ?>

  <!-- about section start -->

  <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>About Create Form</h3>

            <input type="text" name="name" placeholder="Enter your name" class="box" required>
            <input type="file" name="image" class="box" required>
            <textarea name="description" class="box" placeholder="Enter your description" id="about_description"></textarea>
            <input type="submit" name="submit" value="Create Now" class="btn">
        </form>
    </div>

  <!-- about section end -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>