<!DOCTYPE html>
<html>
    <head>
        <title>Admin Area</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body id="menu">
        <?php require_once('../header.php'); ?>
        <div id="admin">
            <aside>
                <!-- sidebar -->
            </aside>
            <content>
                <h1>Admin Area</h1>
                <form action="db/db.php" method="post">
                    <label for="item">Item Name:</label>
                    <input type="text" required name="item" class="item">
                    <br>
                    <label for="desc">Description:</label>
                    <input type="text" required name="desc" class="desc">
                    <br>
                    <label for="type">Item type:</label>
                    <select required name="type" id="">
                        <option value="pizza">Pizza</option>
                        <option value="sides">Sides</option>
                        <option value="drinks">Drinks</option>
                        <option value="dessert">Desserts</option>
                    </select>
                    <br>
                    <label for="price">Price:</label>
                    <input required type="text" name="price" class="price">
                    <label for="image"></label>
                    <input required type="file" name="image" class="image">
                    <input type="submit" name="add" value="Submit">
                </form>
            </content>
            <aside>
                <!-- right sidebar -->
            </aside>
        </div>
    </body>
</html>