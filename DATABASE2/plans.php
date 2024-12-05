<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Plans</title>
</head>
<body>

<div class="container">
    
<h3>Existing Plans</h3>
    <table border="1" class="member-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gym";
            
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM plans";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['plan_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['description']}</td>
                            <td>₱{$row['price']}</td>
                            <td>
                                <form method='post' action='admin.php' style='display:inline-block;'>
                                    <input type='hidden' name='id' value='{$row['plan_id']}'>
                                    <button type='submit' name='delete_plan' class='btn delete'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No plans found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <h2>Manage Plans</h2>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="id" id="id" value="">

        <label for="name">Plan Name:</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required class="form-input">

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" required class="form-input">

        <div class="button-group">
            <button type="submit" name="add_plan" class="btn">Add Plan</button>
            <button type="submit" name="update_plan" class="btn">Update Plan</button>
            <button type="submit" name="delete_plan" class="btn delete">Delete Plan</button>
        </div>
    </form>

</div>

</body>
</html>
