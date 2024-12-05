<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Workouts</title>
    <script>
        let offset = 10; 
        let limit = 10; 

        function loadMore() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `scripts/load_more.php?offset=${offset}`, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const newRows = xhr.responseText;
                    document.querySelector('tbody').insertAdjacentHTML('beforeend', newRows);
                    offset += limit; 
                    document.getElementById("show-less").style.display = "inline"; 
                }
            };
            xhr.send();
        }

        function showLess() {
            const tableBody = document.querySelector('tbody');
            const rows = tableBody.querySelectorAll('tr');
            if (rows.length > limit) {
                for (let i = rows.length - 1; i >= limit; i--) {
                    tableBody.removeChild(rows[i]); 
                }
                offset = limit; 
                document.getElementById("show-less").style.display = "none"; 
            }
        }
    </script>
</head>
<body>

<div class="container">
    <!-- Workout List -->
    <table border="1" class="member-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Intensity</th>
                <th>Equipment Used</th>
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

            $sql = "SELECT * FROM workouts LIMIT 10"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['workout_id'];
                    $name = $row['name'];
                    $type = $row['type'];
                    $intensity = $row['intensity'];
                    $equipment_used = $row['equipment_used'];

                    echo "<tr>
                            <td>{$id}</td>
                            <td>{$name}</td>
                            <td>{$type}</td>
                            <td>{$intensity}</td>
                            <td>{$equipment_used}</td>
                            <td>
                                <form method='post' action='admin.php' style='display:inline-block;'>
                                    <input type='hidden' name='workout_id' value='{$id}'>
                                    <button type='submit' name='delete_workout' value='delete_workout' class='delete' onclick='confirmDelete(event)'>Delete</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No workouts found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <div class="button-group">
        <button onclick="loadMore()" class="btn">Show More</button>
        <button id="show-less" onclick="showLess()" class="btn" style="display: none;">Show Less</button>
    </div>

    <h2>Manage Workouts</h2>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="id" id="id" value="">

        <label for="name">Workout Name:</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="type">Type:</label>
        <select name="type" id="type" required class="form-input">
            <option value="">Select Type</option>
            <option value="CrossFit">CrossFit</option>
            <option value="Power Lifting">Power Lifting</option>
            <option value="Body Building">Body Building</option>
            <option value="Self Defense">Self Defense</option>
        </select>

        <label for="intensity">Intensity:</label>
        <select name="intensity" id="intensity" required class="form-input">
            <option value="">Select Intensity</option>
            <option value="None">None</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>

        <label for="equipment_used">Equipment Used:</label>
        <select name="equipment_used" id="equipment_used" required class="form-input">
            <option value="">Select Equipment</option>
            <option value="None">None</option>
            <option value="Dumbbells">Dumbbells</option>
            <option value="Resistance Bands">Resistance Bands</option>
            <option value="Treadmill">Treadmill</option>
            <option value="Yoga Mat">Yoga Mat</option>
            <option value="Box">Box</option>
            <option value="Jump Rope">Jump Rope</option>
            <option value="Barbell">Barbell</option>
            <option value="Squat Rack">Squat Rack</option>
            <option value="Kettle Ball">Kettle Ball</option>
            <option value="Calf Raise Machine">Calf Raise Machine</option>
            <option value="Row Machine">Row Machine</option>
            <option value="Lat Pulldown Machine">Lat Pulldown Machine</option>
        </select>

        <div class="button-group">
            <button type="submit" name="add_workout" class="btn">Add Workout</button>
        </div>
    </form>
</div>
<script>
    function confirmDelete(event) {
        const confirmed = confirm("Are you sure you want to delete this workout?");
        if (!confirmed) {
            event.preventDefault();
        }
    }
</script>

</body>
</html>
