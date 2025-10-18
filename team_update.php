<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Update</title>

  <?php include('css.php'); ?>
</head>

<body>

  <?php include('header.php'); ?>
  <?php include('navbar.php'); ?>

  <?php

  error_reporting(1);
  include('connection.php');
  $id = $_GET['id'];
  $team_data = "SELECT * FROM team WHERE id=$id";
  $team_rawdata = $connection->query($team_data);
  $team_old_data = mysqli_fetch_array($team_rawdata);

  $team_name = $_POST['name'];
  $team_position = $_POST['position'];
  $submit = $_POST['submit'];

  $team_old_image = $team_old_data['image'];
  $team_new_image = $_FILES['image']['name'];

  if (isset($submit)) {
    if ($team_new_image) {
      $team_image = $team_new_image;
      move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $team_image);
      if (file_exists('pj_img/' . $team_image)) {
        unlink('pj_img/' . $team_old_image);
      }
    } else {
      $team_image = $team_old_image;
    }
    $team_data = "UPDATE team SET name='$team_name', position='$team_position', image='$team_image' WHERE id='$id'";
    $connection->query($team_data);
    header('location:team.php');
  }

  ?>

  <!-- register form start  -->


  <div class="register-form">
    <form method="POST" enctype="multipart/form-data">
      <h3>team Service Update</h3>

      <input type="text" name="name" value="<?php echo $team_old_data['name'] ?>" class="box" id="team_name" required>
      <input type="file" name="image" class="box" id="team_image" required>
      <textarea name="position" class="box" id="team_position"><?php echo $old_data['position'] ?></textarea>
      <input type="submit" onclick="window.location.href='team.php'" name="submit" value="Update Now" class="btn">
    </form>
  </div>

  <!-- register form end  -->

  <?php include('footer.php'); ?>
  <?php include('js.php'); ?>

</body>

</html>