<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Manage Plans</title>
</head>
<body>

<div class="container">
    <h2>Manage Plans</h2>
    <form method="post" action="admin.php" class="form-container">
        <input type="hidden" name="id" value="">

        <label for="name">Plan Name:</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required class="form-input">

        <div class="button-group">
            <button type="submit" name="add_plan" class="btn">Add Plan</button>
            <button type="submit" name="update_plan" class="btn">Update Plan</button>
            <button type="submit" name="delete_plan" class="btn delete">Delete Plan</button>
        </div>
    </form>
</div>

</body>
</html>
