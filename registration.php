<?php
require 'class_bank_account.php';

$bank_account = new bank_account($conn); //Person from class in the person.php line 4,   $person was the variablke going to used in calling

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) { //button name
        // Create a new person  
        $account_name = $_POST['account_name'];
        $balance = $_POST['balance'];
        $account_type = $_POST['account_type'];
        $password = $_POST['password'];
        $bank_account->createbankaccount($account_name, $balance,$account_type,$password);//createPerson is a method on person.php line 11
    // } elseif (isset($_POST['update'])) {
    //     // Update a person
    //     $id = $_POST['update_id'];
    //     $name = $_POST['update_name'];
    //     $age = $_POST['update_age'];
    //     $person->updatePerson($id, $name, $age);
    // } elseif (isset($_POST['delete'])) {
    //     // Delete a person
    //     $id = $_POST['delete_id'];
    //     $person->deletePerson($id);
    // }
}

}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bank Account</title>
</head>
<body>
    
    <!-- Create Person Form -->
    <h2>Create Bank Account</h2>
    <form method="POST" action="registration.php">
        <label for="account_name">Account Name:</label>
        <input type="text" id="account_name" name="account_name" required>
        <label for="account_type">Account Type:</label>
        <input type="text" id="account_type" name="account_type" required>
        <label for="balance">Balance:</label>
        <input type="number" id="balance" name="balance" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" name="create" value="Create">
    </form>

    
</body>
</html>