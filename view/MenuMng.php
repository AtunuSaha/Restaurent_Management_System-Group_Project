
<?php $TITLE = "MenuMng"; include "./partials/header.php"; ?>

<div class="MenuMng-page">
	<h3></h3>
</div>

<img class="content" src="../Icons/Menue.png" alt="">

<?php include "./partials/footer.php"; ?>


<body class="content">
    <h1>Menu List</h1>
    <a href="index.php?action=add">Add New Item</a>
    <table border="1" class="content">
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['item_name']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $item['id']; ?>">Edit</a>
                <a href="index.php?action=delete&id=<?php echo $item['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

