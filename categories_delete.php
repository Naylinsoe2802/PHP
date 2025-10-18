<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categories Delete</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php 
  error_reporting(1);
  include('connection.php');
  ?>
  <?php
  $id = $_GET['id'];
  $categories_image = $_GET['image'];
  $sumbit = $_POST['submit'];

  if (isset($sumbit)) {
    $categories_data = "DELETE FROM categories WHERE id=$id";
    if (file_exists('pj_img/' . $categories_image)) {
      unlink('pj_img/' . $categories_image);
    }
    $connection->query($categories_data);
    header('location:shop.php');
  }
  ?>

 <!-- register form start  -->
  
  <div class="container my-5">
    <h1 class="text-center">Categories Delete</h1>

    <div>
      <div class="modal-dialog">
        <form method="POST" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="window.location.href='shop.php'" class="btn btn-danger" data-bs-dismiss="modal">No</button>
            <button type="submit" name="submit" class="btn btn-success">Yes</button>
          </div>
        </form>
      </div>
    </div>

  </div>
<!-- register form end  -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>