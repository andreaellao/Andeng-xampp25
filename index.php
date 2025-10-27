<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP CRUD</title>
    <style>
    body { font-family: Arial; margin: 30px; }
    table { border-collapse: collapse; width: 70%; margin-top: 20px; }
    th, td {border: 1px solid #888; padding: 8px; text-align: center; }
    th {background-color: #f2f2f2; }
    form { margin-top: 20px; }
    input[type="text"], input[type="email"], input[type="number"] {padding: 5px; width: 200px; }
    input[type="submit"]  { padding: 5px 10px; margin-top: 5px; }
    </style>
</head>
<body>
    <h2>Simple CRUD Application (PHP + MYSQL)</html>
    <h3> add New User</h3>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="number" placeholder="Number" required>
        <input type="age" name="age" placeholder="Age" required>
        <input type="submit" name="add" value="Add User">
    </form>

    <?php


    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $conn->query("INSERT INTO users (name,email,age) VALUES ('$name', '$email,' '$age')");
        echo "<meta http-equiv='refresh' content='0'>";
    }
     if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $conn->query("DELETE FROM users WHERE id=$id");
        echo "<meta http-equiv='refresh' content='0'>";
     }
     if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $res = $conn->query("SELECT * FROM users WHERE id=$id");
        $data = $res->fetch_assoc();
     }
     if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $res = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $conn->query("UPDATE users SET name='$name',email='$email, age='$age' WHERE id=$id");
        echo "<meta http-equiv='refresh' content='0'>";
     }
     $result = $conn->query("SELECET * FROM users");
?>
    <?php if (isset($data)): ?>
     <h3>Edit User</h3>
     <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required>
        <input type="number" name="number" value="<?php echo $data['number']; ?>" required>
        <input type="submit" name="update" value="Update"> 
 </form>
<?php endif; ?>

<h3>User List</h3>
<table>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
     <tr>
       <td><?= $row['id']; ?></td>
       <td><?= $row['name']; ?></td>
       <td><?= $row['email']; ?></td>
       <td><?=$row['age']; ?></td>
       <td>
        <a href="?edit=<?= $row['id']; ?>">Edit</a>
        <a href="?delete=<?= $row['id']; ?>" oclick="return confirm('Delete this user?');">Delete</a>
       </td>
    </tr>
   <?php endwhile; ?>
</table>
    
    