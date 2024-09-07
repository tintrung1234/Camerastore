<?php
require_once("config.php");

class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    public function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->link->connect_error) {
            $this->error = "Connection failed: " . $this->link->connect_error;
            return false;
        }
        return true;
    }

    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // Insert data
    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_row) {
            return $this->link->insert_id; // Return the ID of the inserted row
        } else {
            return false;
        }
    }

    // Update data
    public function update($query)
    {
        $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($update_row) {
            return $this->link->affected_rows; // Return the number of affected rows
        } else {
            return false;
        }
    }

    // Delete data
    public function delete($query)
    {
        $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($delete_row) {
            return $this->link->affected_rows; // Return the number of affected rows
        } else {
            return false;
        }
    }
}
