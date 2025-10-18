<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>team Create</title>

    <?php include('css.php'); ?>
</head>

<body>

    <?php include('header.php'); ?>
    <?php include('navbar.php'); ?>

    <?php

    error_reporting(1);
    include('connection.php');
    $team_name = $_POST['name'];
    $team_image = $_FILES['image']['name'];
    $team_position = $_POST['position'];
    $submit = $_POST['submit'];

    if (isset($submit)) {
        $team_data = "INSERT INTO team (name,image,position) VALUES('$team_name', '$team_image', '$team_position')";
        move_uploaded_file($_FILES['image']['tmp_name'], 'pj_img/' . $team_image);
        $connection->query($team_data);
        header('location:team.php');
    }

    ?>

    <!-- register form start  -->

    <div class="register-form">
        <form method="POST" enctype="multipart/form-data">
            <h3>Team Create Form</h3>

            <input type="text" name="name" placeholder="Enter your team name" class="box" required>
            <input type="file" name="image" class="box" required>
            <input type="text" name="position" placeholder="Enter your position" class="box" required>
            <input type="submit" name="submit" value="Create Now" class="btn">
        </form>
    </div>

    <!-- register form end  -->

    <?php include('footer.php'); ?>
    <?php include('js.php'); ?>

</body>

</html>