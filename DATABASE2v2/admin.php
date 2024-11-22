<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

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

// Function to handle errors
function handleError($message) {
    echo "Error: " . $message . "<br>" . $GLOBALS['conn']->error;
}

// Handling Members
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
   // Add new member
   if ($action === 'add_member') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password
    $type = $_POST['membership_type']; 

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO members (name, email, password, membership_type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $type); 

    if ($stmt->execute()) {
        header("Location: members.php");
        exit;
    } else {
        handleError($stmt->error);
    }

    $stmt->close();
}




// Reset member password
if ($action === 'reset_password') {
    $member_id = $_POST['member_id'];
    $new_password = password_hash("1", PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE members SET password=? WHERE member_id=?");
    $stmt->bind_param("si", $new_password, $member_id);

    if ($stmt->execute()) {
        header("Location: members.php");
        exit;
    } else {
        handleError($stmt->error);
    }
    $stmt->close();
}


    // Delete member
    if ($action === 'delete_member') {
        $member_id = $_POST['member_id'];
    
        $stmt = $conn->prepare("DELETE FROM members WHERE member_id = ?");
        $stmt->bind_param("i", $member_id);
    
        if ($stmt->execute()) {
            $result = $conn->query("SELECT COUNT(*) AS count FROM members");
            $row = $result->fetch_assoc();
            if ($row['count'] == 0) {
                $conn->query("ALTER TABLE members AUTO_INCREMENT = 1");
            }
            header("Location: members.php");
            exit;
        } else {
            handleError($stmt->error);
        }
    
        $stmt->close();
    } 
}
// Handling Instructors
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    
    if ($action === 'add_instructor') {
        // Only define name and specialization when adding an instructor
        $name = $_POST['name'];
        $specialization = $_POST['specialization'];
        
        $stmt = $conn->prepare("INSERT INTO instructor (name, specialization) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $specialization);
        
        if ($stmt->execute()) {
            header("Location: instructors.php");
            exit;
        } else {
            handleError($stmt->error);
        }
        
        $stmt->close();
    } elseif ($action === 'delete_instructor') {
        $id = $_POST['id'];
        
        // Use the correct table name here; change to `instructor` if needed
        $stmt = $conn->prepare("DELETE FROM instructor WHERE instructor_id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            header("Location: instructors.php");
            exit;
        } else {
            handleError($stmt->error);
        }
        
        $stmt->close();
    }
}

// Handling Workouts
// Adding Workouts
if (isset($_POST['add_workout'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $intensity = $_POST['intensity'];
    $equipment_used = $_POST['equipment_used'];

    $stmt = $conn->prepare("INSERT INTO workouts (name, type, intensity, equipment_used) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $type, $intensity, $equipment_used);

    if ($stmt->execute()) {
        echo "New workout added successfully";
    } else {
        handleError($stmt->error);
    }
    $stmt->close();
}

// Updating Workouts
if (isset($_POST['update_workout'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $intensity = $_POST['intensity'];
    $equipment_used = $_POST['equipment_used'];

    $stmt = $conn->prepare("UPDATE workouts SET name=?, type=?, intensity=?, equipment_used=? WHERE workout_id=?");
    $stmt->bind_param("ssisi", $name, $type, $intensity, $equipment_used, $id);

    if ($stmt->execute()) {
        echo "Workout updated successfully";
    } else {
        handleError($stmt->error);
    }
    $stmt->close();
    }

// Deleting Workouts
if (isset($_POST['delete_workout'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM workouts WHERE workout_id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Workout deleted successfully";
    } else {
        handleError($stmt->error);
    }
    $stmt->close();
    }

    
    // Handling Plans
    if (isset($_POST['add_plan'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
    
        $stmt = $conn->prepare("INSERT INTO plans (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $description);
    
        if ($stmt->execute()) {
            echo "New plan added successfully";
        } else {
            handleError($stmt->error);
        }
        $stmt->close();
    }
    
    if (isset($_POST['update_plan'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    
        $stmt = $conn->prepare("UPDATE plans SET name=?, description=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $description, $id);
    
        if ($stmt->execute()) {
            echo "Plan updated successfully";
        } else {
            handleError($stmt->error);
        }
        $stmt->close();
    }
    
    if (isset($_POST['delete_plan'])) {
        $id = $_POST['id'];
    
        $stmt = $conn->prepare("DELETE FROM plans WHERE id=?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            echo "Plan deleted successfully";
        } else {
            handleError($stmt->error);
        }
        $stmt->close();
    }
    
    // Handling Classes
if (isset($_POST['add_class'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $instructor_id = $_POST['instructor_id'];
    $schedule = $_POST['schedule'];
    $max_participants = $_POST['max_participants'];

    $stmt = $conn->prepare("INSERT INTO classes (name, description, instructor_id, schedule, max_participants) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisi", $name, $description, $instructor_id, $schedule, $max_participants);

    if ($stmt->execute()) {
        echo "New class added successfully";
    } else {
        handleError($stmt->error);
    }
    $stmt->close();
}

if (isset($_POST['update_class'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $instructor_id = $_POST['instructor_id'];
    $schedule = $_POST['schedule'];
    $max_participants = $_POST['max_participants'];

    $stmt = $conn->prepare("UPDATE classes SET name=?, description=?, instructor_id=?, schedule=?, max_participants=? WHERE classes_id=?");
    $stmt->bind_param("ssisii", $name, $description, $instructor_id, $schedule, $max_participants, $id);

    if ($stmt->execute()) {
        echo "Class updated successfully";
    } else {
        handleError($stmt->error);
    }
    $stmt->close();
}

if (isset($_POST['delete_class'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM classes WHERE classes_id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Class deleted successfully";
    } else {
        handleError($stmt->error);
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Membership Management</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
    <header>
        <form action = "logout.php" method = "post">
            <button name = "logout">LOGOUT</button>
        </form>
        <div class="container">
            <h2>WELCOME ADMIN!</h2>
        </div>
    </header>
    <section class="main-content">
        <div class="container">
            <h2>Welcome to Gym Membership Management System</h2>
            <h3>Select a section to manage your gym resources effectively:</h3>
            
            <div class="card-container">
                <div class="card">
                    <h2>Members</h2>
                    <p>Manage gym members, view details, and track progress.</p>
                    <a href="members.php" class="btn">Manage Members</a>
                </div>
                <div class="card">
                    <h2>Instructors</h2>
                    <p>Manage gym instructors and their schedules.</p> <br>
                    <a href="instructors.php" class="btn">Manage Instructors</a> 
                </div>
                <div class="card">
                    <h2>Workouts</h2>
                    <p>Create and manage workout routines.</p> <br>
                    <a href="workouts.php" class="btn">Manage Workouts</a>
                </div>
                <div class="card">
                    <h2>Classes</h2>
                    <p>Organize gym classes and schedules.</p>
                    <a href="classes.php" class="btn">Manage Classes</a>
                </div>
                <div class="card">
                    <h2>Plans</h2>
                    <p>Manage membership plans and pricing.</p>
                    <a href="plans.php" class="btn">Manage Plans</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>