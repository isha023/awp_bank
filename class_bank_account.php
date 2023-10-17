<?php
require 'db_config.php';

class bank_account {
    private $account_id;
  private $account_name;
  private $balance;
  private $account_type;
  private $password;

  public function __construct($account_id, $account_name, $balance, $account_type, $password)
  {
    $this->account_id = $account_id;
    $this->account_name = $account_name;
    $this->balance = $balance;
    $this->account_type = $account_type;
    $this->password = $password;
  }
    public function createbankaccount($account_name, $balance,$account_type,$password) {
        $account_name = mysqli_real_escape_string($this->conn, $account_name);
        $account_type = mysqli_real_escape_string($this->conn, $account_type);
        $balance = (int)$balance;
        $password = mysqli_real_escape_string($this->conn, $password);
        
        $query = "INSERT INTO bank_account (account_name, balance,account_type,password) VALUES ('$account_name', '$balance','$account_type','$password')";
        return mysqli_query($this->conn, $query);
    }
    public function inquire()
  {
    global $conn;
    $sql = "SELECT balance FROM bank_account WHERE account_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $this->account_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['balance'];
  }
    public function deposit($amount)
    {
      global $conn;
      $sql = "UPDATE bank_account SET balance = balance + ? WHERE account_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("di", $amount, $this->account_id);
  
      if ($stmt->execute()) {
        return "Deposit successful.";
      } else {
        return "Error depositing: " . $stmt->error;
      }
    }
  
    public function withdraw($amount)
    {
      global $conn;
      $sql = "UPDATE bank_account SET balance = balance - ? WHERE account_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("di", $amount, $this->account_id);
  
      if ($stmt->execute()) {
        return "Withdrawal successful.";
      } else {
        return "Error withdrawing: " . $stmt->error;
      }
    }
    }

    ?>