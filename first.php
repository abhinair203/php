<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="pizza-order-page">
        <img class="background-image" src="https://images5.alphacoders.com/101/thumb-1920-1013630.jpg"> 
        <div class="order-form-container">
            <h1>Supreme Pizza</h1>
            <img class="pizza-image" src="https://images8.alphacoders.com/369/369063.jpg"> 
            <form method="post" action="">
                <div class="input-group">
                    <label>Name:</label>
                    <input type="text" name="name">
                </div>
                <div class="input-group">
                    <label>Address:</label>
                    <input type="text" name="address">
                </div>
                <div class="input-group">
                    <label>Pizza Size:</label>
                    <select name="size">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Quantity:</label>
                    <input type="number" name="quantity" min="1">
                </div>
                <input type="submit" name="submit" value="Order Now">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];

        if (empty($name)) {
            echo "Error! You didn't enter the Name.";
        } elseif (empty($address)) {
            echo "Error! You didn't enter the Address.";
        } elseif (empty($size)) {
            echo "Error! You didn't choose the Pizza Size.";
        } elseif (empty($quantity)) {
            echo "Error! You didn't enter the Quantity.";
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pizzaOrderDB";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "INSERT INTO Orders (name, address, size, quantity)
            VALUES ('$name', '$address', '$size', '$quantity')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
    ?>
</body>
</html>
