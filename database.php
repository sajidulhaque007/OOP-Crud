<?php
class database{

    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();

    }

    public function connectDB(){
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            $this->error = "Connection Failed" .$this->link->connect_error;
            return false;
        }
    }
        // Select or Read data 
    public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        } else {
            return false;
        }
    }
    // Insert data 
    public function insert($query){
        $insert = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert){
            header("location: index.php?msg=".urlencode('Data Inserted Successfully.'));
            exit();
        } else {
            return false;
        }
    }
    // Update data 
    public function update($query){
        $update = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update){
            header("location: index.php?msg=".urlencode('Data Updated Successfully.'));
            exit();
        } else {
            return false;
        }
    }
    // Delete data 
    public function delete($query){
        $delete = $this->link->query($query) or die($this->link->error.__LINE__);
        if($delete){
            header("location: index.php?msg=".urlencode('Data Deleted Successfully.'));
            exit();
        } else {
            return false;
        }
    }
}