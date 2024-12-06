<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$sql = "SELECT * FROM workouts LIMIT 10 OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
    echo ""; 
}

$conn->close();
?>
