<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
<body>
    <h1>User List</h1>
    <div>
        <!-- Add user link -->
        <a href="<?php echo base_url('addUser'); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add User</a>
    </div>
    <table border="">
        <thead>
            <tr>
                <th>Username</th>
                <th>Age</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Photo</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['userName']; ?></td>
                    <td><?php echo $user['age']; ?></td>
                    <td><?php echo $user['country']; ?></td>
                    <td><?php echo $user['state']; ?></td>
                    <td><?php echo $user['city']; ?></td>
                    <td>
                        <?php if (!empty($user['image'])): ?>
                            <img src="<?php echo base_url('uploads/' . $user['image']); ?>" alt="User Photo" style="width: 100px; height: auto;">
                        <?php else: ?>
                            No photo available
                        <?php endif; ?>
                    </td>
                    <td><a class="btn-floating btn-large cyan pulse" href="<?php echo base_url('editUser/'.$user['id']); ?>"><i class="material-icons">edit</i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
