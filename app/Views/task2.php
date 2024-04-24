<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2 API Test</title>
</head>

<body>
    <h1>Task 2 API Test</h1>

    <!-- Form to generate JWT token -->
    <form action="<?= base_url('task2/generateToken') ?>" method="post">
        <button type="submit">Generate Token</button>
    </form>

    <hr>

    <!-- Form to get user details -->
    <form action="<?= base_url('task2/getUserDetails') ?>" method="get">
        <label for="page">Page:</label>
        <input type="number" name="page" id="page" value="1">
        <label for="perPage">Per Page:</label>
        <input type="number" name="per_page" id="perPage" value="10">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search">
        <button type="submit">Get User Details</button>
    </form>

    <hr>

    <!-- Link to get duplicate percentage -->
    <a href="<?= base_url('task2/getDuplicatePercentage') ?>">Get Duplicate Percentage</a>
</body>

</html>