<?php
require 'class_bank_account.php';

$bank = new bank_account($conn); //Person from class in the person.php line 4,   $person was the variablke going to used in calling

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    } elseif (isset($_POST['deposit'])) {
        $account_id = $_POST['deposit_id'];
        $amount = $_POST['deposit_amount'];
        $bank->deposit($account_id, $amount);
    } elseif (isset($_POST['withdraw'])) {
        $account_id = $_POST['withdraw_id'];
        $amount = $_POST['withdraw_amount'];
        $bank->withdraw($account_id, $amount);
    }

// Read all persons
$banks = $bank->readaccounts();

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bank Operations</title>
</head>
<body>
    

   
    <h2>Accounts</h2>
    <table border="1">
        <tr>
            <th>Account Name</th>
            <th>Account Type</th>
            <th>Balance</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($banks as $bank) { ?>
        <tr>
            <td><?php echo $bank['account_name']; ?></td>
            <td><?php echo $bank['account_type']; ?></td>
            <td><?php echo $bank['balance']; ?></td>
            <td>
                <form method="POST" action="index.php">
                    <input type="hidden" name="deposit_id" value="<?php echo $bank['account_id']; ?>">
                    <input type="text" name="deposit_amount" placeholder="amount to deposit">
                    <input type="submit" name="deposit" value="Deposit">
                </form>
                <form method="POST" action="index.php">
                <input type="hidden" name="withdraw_id" value="<?php echo $bank['account_id']; ?>">
                    <input type="text" name="withdraw_amount" placeholder="amount to withdraw">
                    <input type="submit" name="withdraw" value="Withdraw">
                </form>
                <form method="POST" action="index.php">
                <input type="hidden" name="inquire_id" value="<?php echo $bank['account_id']; ?>">
                    <input type="text" name="current_balance">
                    <input type="submit" name="inquire" value="Inquire">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>