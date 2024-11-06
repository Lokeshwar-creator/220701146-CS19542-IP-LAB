<?php
// Database Connection
$host = "localhost";
$dbname = "banking_app";
$username = "root";  // Replace with your MySQL username
$password = "";      // Replace with your MySQL password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Form Handling for Inserting Customer
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_customer"])) {
    $cname = trim($_POST["cname"]);
    if (!empty($cname)) {
        $stmt = $conn->prepare("INSERT INTO CUSTOMER (CNAME) VALUES (:cname)");
        $stmt->bindParam(':cname', $cname);
        $stmt->execute();
        echo "Customer added successfully.<br>";
    } else {
        echo "Please enter a valid customer name.<br>";
    }
}

// Form Handling for Inserting Account
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_account"])) {
    $atype = $_POST["atype"];
    $balance = $_POST["balance"];
    $cid = $_POST["cid"];

    // Validation: Check if customer exists
    $checkCustomer = $conn->prepare("SELECT * FROM CUSTOMER WHERE CID = :cid");
    $checkCustomer->bindParam(':cid', $cid);
    $checkCustomer->execute();

    if ($checkCustomer->rowCount() > 0) {
        $stmt = $conn->prepare("INSERT INTO ACCOUNT (ATYPE, BALANCE, CID) VALUES (:atype, :balance, :cid)");
        $stmt->bindParam(':atype', $atype);
        $stmt->bindParam(':balance', $balance);
        $stmt->bindParam(':cid', $cid);
        $stmt->execute();
        echo "Account added successfully.<br>";
    } else {
        echo "Customer ID does not exist.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Banking Application</title>
</head>
<body>
    <h1>Banking Application</h1>
    
    <!-- Form to Insert Customer -->
    <h2>Add Customer</h2>
    <form method="post" action="">
        Customer Name: <input type="text" name="cname" required>
        <input type="submit" name="add_customer" value="Add Customer">
    </form>

    <!-- Form to Insert Account -->
    <h2>Add Account</h2>
    <form method="post" action="">
        Account Type: 
        <select name="atype">
            <option value="S">Savings</option>
            <option value="C">Current</option>
        </select>
        Balance: <input type="number" step="0.01" name="balance" required>
        Customer ID: <input type="number" name="cid" required>
        <input type="submit" name="add_account" value="Add Account">
    </form>

    <!-- Display Customer Information -->
    <h2>Customer Information</h2>
    <?php
    $stmt = $conn->query("SELECT * FROM CUSTOMER");
    echo "<ul>";
    while ($row = $stmt->fetch()) {
        echo "<li>ID: {$row['CID']} - Name: {$row['CNAME']}</li>";
    }
    echo "</ul>";
    ?>

    <!-- Display Account Information -->
    <h2>Account Information</h2>
    <?php
    $stmt = $conn->query("SELECT ACCOUNT.ANO, ACCOUNT.ATYPE, ACCOUNT.BALANCE, CUSTOMER.CNAME 
                          FROM ACCOUNT 
                          JOIN CUSTOMER ON ACCOUNT.CID = CUSTOMER.CID");
    echo "<ul>";
    while ($row = $stmt->fetch()) {
        echo "<li>Account No: {$row['ANO']} - Type: {$row['ATYPE']} - Balance: {$row['BALANCE']} - Customer: {$row['CNAME']}</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>
