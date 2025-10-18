<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products Update</title>

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php

  error_reporting(1);
  include('connection.php');
  $id = $_GET['id'];
  $products_data = "SELECT * FROM products WHERE id=$id";
  $products_rawdata = $connection->query($products_data);
  $products_old_data = mysqli_fetch_array($products_rawdata);

  $products_name = $_POST['name'];
  $products_price = $_POST['price'];
  $products_quantity = $_POST['quantity'];
  $submit = $_POST['submit'];

  $products_old_image = $products_old_data['image'];
  $products_new_image = $_FILES['image']['name'];

  if (isset($submit)) {
    if ($products_new_image) {
      $products_image = $products_new_image;
      move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $products_image);
      if (file_exists('pj_img/' . $products_image)) {
        unlink('pj_img/' . $products_old_image);
      }
    } else {
      $products_image = $products_old_image;
    }
    $products_data = "UPDATE products SET name='$products_name',price='$products_price',quantity='$products_quantity', image='$products_image' WHERE id='$id'";
    $connection->query($products_data);
    header('location:shop.php');
  }

  ?>

  <!-- register form start  -->


  <div class="register-form">
    <form method="POST" enctype="multipart/form-data">
      <h3>Our Products Update</h3>

      <input type="text" name="name" value="<?php echo $products_old_data['name'] ?>" class="box" id="products_name" required>
      <input type="number" name="price" value="<?php echo $products_old_data['price'] ?>" class="box" id="products_price" required>
      <input type="number" name="quantity" value="<?php echo $products_old_data['quantity'] ?>" class="box" id="products_quantity" required>
      <input type="file" name="image" class="box" id="products_image" required>
      <input type="submit" onclick="window.location.href='shop.php'" name="submit" value="Update Now" class="btn">
    </form>
  </div>

  <!-- register form end  -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>