<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function handleError($message) {
    echo "Error: " . $message . "<br>" . $GLOBALS['conn']->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    //handling members
    // Add new member
    if ($action === 'add_member') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $membership_type = $_POST['membership_type'];

        $stmt = $conn->prepare("INSERT INTO members (name, email, password, type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $membership_type);
        
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
        $stmt = $conn->prepare("DELETE FROM members WHERE member_id=?");
        $stmt->bind_param("i", $member_id);

        if ($stmt->execute()) {
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
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];

    if ($action === 'add_instructor') {
        $stmt = $conn->prepare("INSERT INTO instructors(name, specialization) VALUES (?, ?)");
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
        $stmt = $conn->prepare("DELETE FROM instructors WHERE instructor_id=?");
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
            header("Location: workouts.php");
            exit;
        } else {
            handleError($stmt->error);
        }
        $stmt->close();
    }

    // Deleting Workouts
    if (isset($_POST['delete_workout'])) {
        $id = $_POST['workout_id'];

        $stmt = $conn->prepare("DELETE FROM workouts WHERE workout_id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: workouts.php");
            exit;
        } else {
            handleError($stmt->error);
        }
        $stmt->close();
    }


    
    // Handling Plans
    // Add a new plan
if (isset($_POST['add_plan'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO plans (name, description) VALUES ('$name', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "Plan added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update an existing plan
if (isset($_POST['update_plan'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "UPDATE plans SET name='$name', description='$description' WHERE plan_id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Plan updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete a plan
if (isset($_POST['delete_plan'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM plans WHERE plan_id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Plan deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
<div class="navbar-container">
        <a href="admin.php" class="navbar-logo">Gym Management</a>
        <ul class="navbar-menu">
            <li><a href="login.php" class="navbar-link">Logout</a></li>
        </ul>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
    <!-- Header -->
    <header>
        <div class="container">
            <h2>WELCOME ADMIN!</h2>
        </div>
    </header>
    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <h2>Welcome to Gym Membership Management System</h2>
            <h3>Select a section to manage your gym resources effectively:</h3>
            
            <!-- Card Container -->
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