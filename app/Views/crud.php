<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Item List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a{
            color: white;
        }

        form {
            margin-bottom: 20px;
        }

        form input[type="text"] {
            width: 200px;
            padding: 5px;
            margin-right: 10px;
        }

        form input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    // $items = [
    //     ['id' => 1, 'name' => 'Item 1', 'description' => 'Description of item 1'],
    //     ['id' => 2, 'name' => 'Item 2', 'description' => 'Description of item 2'],
    //     ['id' => 3, 'name' => 'Item 3', 'description' => 'Description of item 3'],
    //     // Add more dummy items as needed
    // ];
    ?>
    <div class="container m-5">
        <h1>Item List</h1>
        <!-- Form for inserting new items -->
        <form action="<?php echo site_url('store'); ?>" method="post">
            <input type="text" name="name" placeholder="Item Name" required>
            <input type="text" name="description" placeholder="Item Description" required>
            <input type="submit" value="Add Item">
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['description']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary"
                                onclick="openEditModal(<?php echo $item['id']; ?>, '<?php echo $item['name']; ?>', '<?php echo $item['description']; ?>')">
                                Edit
                            </button>
                            <button class="btn btn-danger">
                                <a href="<?php echo base_url('CrudController/delete/' . $item['id']); ?>"
                                    onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="editItemId" name="id">
                        <div class="form-group">
                            <label for="editItemName">Item Name</label>
                            <input type="text" class="form-control" id="editItemName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editItemDescription">Item Description</label>
                            <input type="text" class="form-control" id="editItemDescription" name="description"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to open the edit modal with item details
        function openEditModal(itemId, itemName, itemDescription) {
            document.getElementById("editItemId").value = itemId;
            document.getElementById("editItemName").value = itemName;
            document.getElementById("editItemDescription").value = itemDescription;
            $('#editModal').modal('show');
            // Set the form action dynamically
            document.getElementById("editForm").action = "<?php echo site_url('update'); ?>/" + itemId;
        }
    </script>
</body>

</html>