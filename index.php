<?php
require 'class_bank_account.php';
include 'db_config.php';

//Person from class in the person.php line 4,   $person was the variablke going to used in calling

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_id = $_POST['account_id'];
  $action = $_POST['action'];
  $amount = $_POST['amount'];

  $bank = new bank_account($account_id, null, 0, null, null); 
    
  if ($action === "inquire") {
    $balance = $bank->inquire();
    echo "Current Balance: $balance";
  } elseif ($action === "deposit") {
    $result = $bank->deposit($amount);
    echo $result;
  } elseif ($action === "withdraw") {
    $result = $bank->withdraw($amount);
    echo $result;
  }
}
$sql = "SELECT account_id,account_name, balance, account_type FROM bank_account";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<h2>Accounts</h2>';
  echo '<table border="1">';
  echo '<tr>
  <th>Account Id</th>
    <th>Account Name</th>
    <th>Account Type</th>
    <th>Balance</th>
    
  </tr>';

  while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['account_id'] . '</td>';
    echo '<td>' . $row['account_name'] . '</td>';
    echo '<td>' . $row['account_type'] . '</td>';
    echo '<td>' . $row['balance'] . '</td>';
    
    echo '</tr>';
  }

  echo '</table>';
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bank Operations</title>
</head>
<body>  
   
    <h2>Bank Operations</h2>
  <form action="index.php" method="post">
    <label for="account_id">Account Id:</label>
    <input type="text" name="account_id" id="account_id" required><br>

    <label for="action">Action:</label>
    <select name="action" id="action">
      <option value="deposit">Deposit</option>
      <option value="withdraw">Withdraw</option>
      <option value="inquire">Inquire</option>
    </select><br>

    <label for="amount">Amount:</label>
    <input type="text" name="amount" id="amount"><br>

    <input type="submit" value="Submit">
  </form>

</body>
</html>
