<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Instructors</title>
</head>
<body>

<div class="container">
    <h2>Manage Instructors</h2>

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
            $sql = "SELECT * FROM instructor";
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
        
        <select id="specialization" name="specialization" required class="form-input">
            <option value=""></option>
            <option value="Cross Fit">Cross Fit</option>
            <option value="Body Building">Body Building</option>
            <option value="Power Lifting">Power Lifting</option>
            <option value="Self Defense">Self Defense</option>
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
