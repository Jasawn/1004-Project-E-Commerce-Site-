<?php
//Branson's Function

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saveMemberToDB()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
    
    //Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
    
    // Check connection
    if ($conn->connect_error)
    {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;    
    }
    else
    {
        // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO project_members (fname, lname, email, password) VALUES (?, ?, ?, ?)");
        
        // Bind & execute the query statement:
        $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
        if (!$stmt->execute())
        {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    
    $conn->close();
}

function authenticateUser()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
    
    // Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);

    // Check connection
    if ($conn->connect_error)
    {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    }
    else
    {
    // Prepare the statement:
    $stmt = $conn->prepare("SELECT * FROM project_members WHERE email=?");

    // Bind & execute the query statement: 
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
        // Note that email field is unique, so should only have 
        // one row in the result set.
        $row = $result->fetch_assoc();
        $fname = $row["fname"];
        $lname = $row["lname"];
        $pwd_hashed = $row["password"];
        
        // Check if the password matches:
        if (!password_verify($_POST["pwd"], $pwd_hashed))
        {
            // Don't be too specific with the error message - hackers don't 
            // need to know which one they got right or wrong. 🙂 
            $errorMsg = "Email not found or password doesn't match...";
            $success = false;
            
        }    
    }
        else 
        {
            $errorMsg = "Email not found or password doesn't match.";
            $success = false;
        }
        $stmt->close();
        }
        $conn->close();
}

//Jason's Function

$action = $_POST['action'];
if (!empty($action))
{
    switch($action)
    {
        case 'deleteall':
            removeallitems();
            break;
        case 'deleteindiv':
            $id = $_POST['id'];
            removeindiv($id);
            break;
        case 'updateDB':
            $id = $_POST['id'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            updateDB($id,$quantity,$price);
            break;
        case 'addToCart':
            $id = $_POST['id'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $quantity = $_POST['quantity'];
            addToCart($id, $price, $image, $name, $desc, $quantity);
            break;
    }
}

function connDB(){
    global $config,$conn;
    
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
}


function readDB() {
    global $printdata,$config,$conn,$statement;
    
    connDB();
    
    if ($conn->connect_error) {
        echo "WRONG";
    } else {
        $statement = $conn->prepare("SELECT * FROM items");
        $statement->execute();
        $printdata = $statement->get_result();
    }
}

function addToCart($id, $price, $image, $name, $desc, $quantity){
    global $config, $conn;
    
    connDB();
    
    if ($conn->connect_error) {
        echo "WRONG";
    } else {
        $stmt = $conn->prepare("INSERT INTO items (product_id, price, product_image, product_name, product_desc, quantity) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ddsssd", $id, $price, $image, $name, $desc, $quantity);
        $stmt->execute();
    }
    $stmt->close();
    $conn->close();
}

function loadcartitems() {
    global $printdata,$config,$conn,$statement;
    
    readDB();
    while ($row = $printdata->fetch_assoc()) {
        $dropcartitems = " 
        <li class = \"items\">
            <div class =\"drop-cart-image\">
                <img src ='". $row['product_image'] ."' alt='" . $row['product_desc'] ."'>
                <span id = ". $row['product_id'] ." class = \"item-name\">". $row['product_name'] ."</span>
                <span> SGD $</span><span class=\"cart-price\">". $row['price'] ."</span>
                <span> Quantity: </span><span class=\"item-quantity\">". $row['quantity'] ."</span>
            </div>
        <li>";
        echo $dropcartitems;
    }
    $statement->close();
    $conn->close();
}

function loadcartpage() {
    global $printdata,$config,$conn,$statement;
    
    readDB();
    while ($row = $printdata->fetch_assoc()) {
        $cartpageitems = "
                <div class =\"cart-page-items\" id = ". $row['product_id'] .">
                    <div class=\"col-sm\">
                        <div class=\"cart-page-image\">
                            <img src ='". $row['product_image'] ."' alt='". $row['product_desc'] ."'>
                        </div>
                    </div>
                    <div class=\"col-sm\">
                        <div class=\"cart-page-productinfo\">
                            <span class =\"cart-page-productname\">". $row['product_name'] ."</span>
                        </div>
                    </div>
                    <div class=\"col-sm\">
                        <div class=\"cart-page-counter\">
                            <div class=\"cart-page-counter-btn-plus\"> + </div>
                            <div class=\"cart-page-count\">". $row['quantity'] ."</div>
                            <div class=\"cart-page-counter-btn-minus\"> - </div>
                        </div>
                    </div>
                    <div class=\"col-sm\">
                        <div class=\"cart-page-productprice\">
                            <span> SGD $</span><span class=\"cart-page-price\">". $row['price'] ."</span>
                            <div class=\"cart-page-wishlist\"><u>Add to Wish-list</u></div>
                            <div class=\"cart-page-remove\"><u>Remove</u></div>
                        </div>
                    </div>
                </div>
            ";
        echo $cartpageitems;
    }
    $statement->close();
    $conn->close();
}

function loadorderpage() {
    global $printdata,$config,$conn,$statement;
    
    readDB();
    while ($row = $printdata->fetch_assoc()) {
        $orderpageitems = "
            <li>
                <div class =\"cart-page-items\">
                    <div class=\"cart-page-image\">
                        <img src ='". $row['product_image'] ."' alt='". $row['product_desc']. "'>
                    </div>
                    <div class=\"cart-page-productinfo\">
                        <span class =\"cart-page-productname\">". $row['product_name'] ."</span>
                    </div>
                    <div class=\"cart-page-counter\">
                        <div class=\"cart-page-count\">". $row['quantity'] ."Pcs</div>
                    </div>
                    <div class=\"cart-page-productprice\">
                        <span>$</span><span class=\"cart-page-price\">". $row['price'] ."</span>
                    </div>
                </div>
            </li> 
            ";
        echo $orderpageitems;
    }
    $statement->close();
    $conn->close();
}

function removeindiv($id) {
    global $removeindiv,$config,$conn;

    connDB();
    
    if ($conn->connect_error) {
        echo "WRONG";
    } else {
        $removeindiv = $conn->prepare("DELETE FROM items WHERE product_id = ?");
        $removeindiv -> bind_param("i", $id);
        $removeindiv -> execute();
    }
    $removeindiv->close();
    $conn->close();
}

function removeallitems() {
    global $removealldata,$config,$conn;
    
    connDB();
    
    if ($conn->connect_error) {
        echo "WRONG";
    } else {
        $removealldata = $conn->prepare("DELETE FROM items");
        $removealldata -> execute();
    }
    $removealldata->close();
    $conn->close();
}

function updateDB($id,$quantity,$price){
    global $config,$conn;
    
    connDB();
    if ($conn->connect_error) {
        echo "WRONG";
    }  
    $updatedata = $conn->prepare("UPDATE items SET price=?, quantity=? WHERE product_id=?");    
    for($loop = 0; $loop<sizeof($id); $loop++)
    {
        $updatedata->bind_param("iii",$price[$loop],$quantity[$loop],$id[$loop]);
        $updatedata->execute();
    }
    $updatedata->close();
    $conn->close();
}
?>