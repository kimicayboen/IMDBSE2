<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="container">
    <h2>Manage Members</h2>

    <!-- Member List -->
    <table border="1" class="member-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Membership Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gym";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch all members from the database
            $sql = "SELECT * FROM members";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) {
                    // Check if each key exists in $row; set a default empty string if it doesn't
                    $id = isset($row['member_id']) ? $row['member_id'] : '';
                    $name = isset($row['name']) ? $row['name'] : '';
                    $email = isset($row['email']) ? $row['email'] : '';
                    $membership_type = isset($row['membership_type']) ? $row['membership_type'] : '';

                    echo "<tr>
                            <td>{$id}</td>
                            <td>{$name}</td>
                            <td>{$email}</td>
                            <td>{$membership_type}</td>
                            <td>
                                <form method='post' action='admin.php' style='display:inline-block;'>
                                    <input type='hidden' name='member_id' value='{$id}'>
                                    <input type='hidden' name='name' value='{$name}'>
                                    <input type='hidden' name='email' value='{$email}'>
                                    <input type='hidden' name='type' value='{$membership_type}'>
                                    <button type='submit' name='action' value='reset_password'>Reset</button>
                                </form>
                                <form method='post' action='admin.php' style='display:inline-block;'>
                                    <input type='hidden' name='member_id' value='{$id}'>
                                    <button type='submit' name='action' value='delete_member' class='delete' onclick='confirmDelete(event)'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No members found</td></tr>";
            }
            

            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Member Form -->
    <h3>Add New Member</h3>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="member_id" value="">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required class="form-input">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required class="form-input">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required class="form-input">

        <label for="membership_type">Membership Type:</label>
        <select id="membership_type" name="membership_type" required class="form-input">
            <option value="">---</option>
            <option value="Basic">BASIC</option>
            <option value="PREMIUM">PREMIUM</option>
            <option value="ANNUAL BASIC">ANNUAL BASIC</option>
            <option value="ANNUAL PREMIUM">ANNUAL PREMIUM</option>
        </select>
        <div class="button-group">
            <button type="submit" name="action" value="add_member" class="btn">Add Member</button>
        </div>
    </form>
</div>
<script>
    function confirmDelete(event) {
        const confirmed = confirm("Are you sure you want to delete this member?");
        if (!confirmed) {
            event.preventDefault();
        }
    }
</script>

</body>
</html>
