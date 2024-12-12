<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Classes</title>
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
    <h2>Classes</h2>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="id" id="id" value="">

        <label for="name">Class Name:</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required class="form-input">

        <label for="instructor">Instructor:</label>
        <select name="instructor" id="instructor" required class="form-input">
            <option value="Tito Badang">Tito Badang</option>
            <option value="Chou">Chou</option>
            <option value="Paquito">Paquito</option>
            <option value="Otlum">Otlum</option>
            <option value="Baki Hanma">Baki Hanma</option>
            <option value="Arnold Swarsinegro Jr.">Arnold Swarsinegro Jr.</option>
            <option value="Hilda Diaz">Hilda Diaz</option>
            <option value="Mang Kanor">Mang Kanor</option>
        </select>

        <label for="schedule">Schedule:</label>
        <input type="text" name="schedule" id="schedule" required class="form-input">

        <label for="max_participants">Max Participants:</label>
        <input type="number" name="max_participants" id="max_participants" required class="form-input">

        <div class="button-group">
            <button type="submit" name="add_class" class="btn">Add Class</button>
            <button type="submit" name="update_class" class="btn">Update Class</button>
            <button type="submit" name="delete_class" class="btn delete">Delete Class</button>
        </div>
    </form>
</div>

</body>
</html>
