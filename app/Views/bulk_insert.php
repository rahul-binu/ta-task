<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Insert</title>
</head>
<body>
    <h1>Bulk Insert</h1>
    <form action="<?= base_url('task1/uploadFile') ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="csv_file" accept=".csv">
        <button type="submit">Upload CSV File</button>
    </form>
    <p><?= $message ?? '' ?></p>
</body>
</html>