<?php
require 'db_config.php';

class bank_account {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function createbankaccount($account_name, $balance,$account_type,$password) {
        $account_name = mysqli_real_escape_string($this->conn, $account_name);
        $account_type = mysqli_real_escape_string($this->conn, $account_type);
        $balance = (int)$balance;
        $password = mysqli_real_escape_string($this->conn, $password);
        
        $query = "INSERT INTO bank_account (account_name, balance,account_type,password) VALUES ('$account_name', '$balance','$account_type','$password')";
        return mysqli_query($this->conn, $query);
    }
    public function readaccounts() {
        $query = "SELECT * FROM bank_account";
        $result = mysqli_query($this->conn, $query);

        $banks = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $banks[] = $row;
        }

        return $banks;
    }
    public function deposit($account_id, $amount) {
        $account_id = (int)$account_id;
        $amount = (float)$amount;
        
        // Fetch the current balance
        $query = "SELECT balance FROM bank_account WHERE account_id = $account_id";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $currentBalance = (float)$row['balance'];
    
            // Update the balance with the deposit amount
            $newBalance = $currentBalance + $amount;
    
            // Update the balance in the database
            $updateQuery = "UPDATE bank_account SET balance = $newBalance WHERE account_id = $account_id";
            return mysqli_query($this->conn, $updateQuery);
        } else {
            // Handle account not found or other errors
            return false;
        }
    }
    
    public function withdraw($account_id, $amount) {
        $account_id = (int)$account_id;
        $amount = (float)$amount;
    
        // Fetch the current balance
        $query = "SELECT balance FROM bank_account WHERE account_id = $account_id";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $currentBalance = (float)$row['balance'];
    
            // Check if there is enough balance to withdraw
            if ($currentBalance >= $amount) {
                // Update the balance by subtracting the withdrawal amount
                $newBalance = $currentBalance - $amount;
    
                // Update the balance in the database
                $updateQuery = "UPDATE bank_account SET balance = $newBalance WHERE account_id = $account_id";
                return mysqli_query($this->conn, $updateQuery);
            } else {
                // Handle insufficient balance error
                return false;
            }
        } else {
            // Handle account not found or other errors
            return false;
        }
    }
    
    
    }

    ?>