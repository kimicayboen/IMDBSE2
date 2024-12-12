<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<nav class="navbar">
    <div class="navbar-container">
        <a href="admin.php" class="navbar-logo">Gym Management</a>
        <ul class="navbar-menu">
            <li><a href="members.php" class="navbar-link">Manage Members</a></li>
            <li><a href="instructors.php" class="navbar-link">Manage Instructors</a></li>
            <li><a href="workouts.php" class="navbar-link">Manage Workouts</a></li>
            <li><a href="classes.php" class="navbar-link">Manage Classes</a></li>
            <li><a href="plans.php" class="navbar-link">Manage Plans</a></li>
            <li><a href="login.php" class="navbar-link">Logout</a></li>
        </ul>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>
<div class="container">
    <h2>Members</h2>

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
                    $membership_type = isset($row['type']) ? $row['type'] : '';

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
    <?php
    // Fetch membership types from the membership table
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $membership_sql = "SELECT membership_id, type FROM membership";
    $membership_result = $conn->query($membership_sql);

    if ($membership_result->num_rows > 0) {
        while ($membership_row = $membership_result->fetch_assoc()) {
            echo "<option value='{$membership_row['type']}'>{$membership_row['type']}</option>";
        }
    }
    $conn->close();
    ?>
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
    const mobileMenu = document.getElementById('mobile-menu');
    const navbarMenu = document.querySelector('.navbar-menu');

    mobileMenu.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
    });
</script>

</body>
</html>
