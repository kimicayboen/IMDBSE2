<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Workouts</title>
</head>
<body>

<div class="container">
    <h2>Manage Workouts</h2>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="id" id="id" value="">

        <label for="name">Workout Name:</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" required class="form-input">

        <label for="intensity">Intensity:</label>
        <input type="number" name="intensity" id="intensity" required class="form-input">

        <label for="equipment_used">Equipment Used:</label>
        <input type="text" name="equipment_used" id="equipment_used" required class="form-input">

        <div class="button-group">
            <button type="submit" name="add_workout" class="btn">Add Workout</button>
            <button type="submit" name="update_workout" class="btn">Update Workout</button>
            <button type="submit" name="delete_workout" class="btn delete">Delete Workout</button>
        </div>
    </form>
</div>

</body>
</html>
