<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Classes</title>
</head>
<body>

<div class="container">
    <h2>Manage Classes</h2>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="id" id="id" value="">

        <label for="name">Class Name:</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required class="form-input">

        <label for="instructor_id">Instructor ID:</label>
        <input type="text" name="instructor_id" id="instructor_id" required class="form-input">

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
