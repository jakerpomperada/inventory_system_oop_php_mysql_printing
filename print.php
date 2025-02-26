<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body class="container mt-4">
    <h2 class="mb-3">Inventory List</h2>

    <!-- Print Button -->
    <button onclick="window.print()" class="btn btn-primary no-print mb-3">Print Page</button>

<a href="index.php" class="btn btn-primary  no-print mb-3">Back</a>

    <!-- Inventory Table -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "Item.php";
            $item = new Item();
            $items = $item->getAllItems();
            $totalPrice = 0;

            foreach ($items as $row):
                $itemTotal = $row['quantity'] * $row['price'];
                $totalPrice += $itemTotal;
            ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= number_format($row['price'], 2) ?></td>
                    <td><?= number_format($itemTotal, 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Total Price -->
    <h4 class="text-end">Total Price: <strong><?= number_format($totalPrice, 2) ?></strong></h4>

    <!-- Footer -->
    <footer class="text-center mt-4 p-3 bg-primary text-white">
        <p class="mb-0">&copy; 2025 by Dr. Jake Rodriguez Pomperada, PhD. All Rights Reserved.</p>
    </footer>
</body>
</html>
