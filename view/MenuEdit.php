<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form method="post" action="">
        <label>Item Name:</label>
        <input type="text" name="item_name" value="<?php echo htmlspecialchars($item['item_name']); ?>" required>
        <br>
        <label>Price:</label>
        <input type="text" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" required>
        <br>
        <input type="submit" value="Update Item">
    </form>
    <br>
    <a href="index.php">Back to Menu List</a>
</body>
</html>
