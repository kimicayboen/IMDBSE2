<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Instructors</title>
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
    <h2>Instructors</h2>

    <!-- Instructor List Table -->
    <table border="1" class="instructor-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
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

            // Fetch instructors from the database
            $sql = "SELECT * FROM instructors";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    $id = $row['instructor_id'];
                    $name = $row['name'];
                    $specialization = $row['specialization'];

                    echo "<tr>
                            <td>{$id}</td>
                            <td>{$name}</td>
                            <td>{$specialization}</td>
                            <td>
                                <form method='post' action='admin.php' style='display:inline-block;'>
                                    <input type='hidden' name='id' value='{$id}'>
                                    <input type='hidden' name='name' value='{$name}'>
                                    <input type='hidden' name='specialization' value='{$specialization}'>
                                </form>
                                <form method='post' action='admin.php' style='display:inline-block;'>
                                    <input type='hidden' name='id' value='{$id}'>
                                    <button type='submit' name='action' value='delete_instructor' onclick='confirmDelete(event)'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No instructors found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Add New Instructor Form -->
    <h3>Add New Instructor</h3>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="id" value="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required class="form-input">
        
        <label for="specialization">Specialization:</label>
        <select name="specialization" id="specialization" required class="form-input">
            <option value="Yoga">Yoga</option>
            <option value="PowerLifting">PowerLifting</option>
            <option value="WeightLifting">WeightLifting</option>
            <option value="CrossFit">CrossFit</option>
            <option value="BodyBuilding">BodyBuilding</option>
            <option value="Muay Thai">Muay Thai</option>
            <option value="Boxing">Boxing</option>
            <option value="MMA">MMA</option>
        </select>
        
        <div class="button-group">
            <button type="submit" name="action" value="add_instructor" class="btn">Add Instructor</button>
        </div>
    </form>
</div>

<script>
    function confirmDelete(event) {
        // Show confirmation dialog
        const confirmed = confirm("Are you sure you want to delete this instructor?");
        
        // Prevent form submission if canceled
        if (!confirmed) {
            event.preventDefault();
        }
    }
</script>

</body>
</html>
