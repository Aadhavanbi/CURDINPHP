<!-- edit_user.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      
<body>
    <h2>Edit User</h2>
    <form action="<?php echo base_url('updateUserData/'.$user['id']); ?>" method="post" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="userName" name="userName" value="<?php echo $user['userName']; ?>"><br>

        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="<?php echo $user['age']; ?>"><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $user['country']; ?>"><br>


        <label for="image">Image:</label>
        <input type="file" id="image" name="image" value="<?php echo isset($user['image']) ? '/path/to/images/' . $user['image'] : ''; ?>"><br><br>



        <input type="submit" value="Update User">
    </form>
</body>
</html>
