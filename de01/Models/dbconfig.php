<?php

class Database
{
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $dbname = 'de01';
    private static $conn = NULL;

    //connect
    public function connect()
    {
        self::$conn = new mysqli(self::$host, self::$user, self::$pass, self::$dbname);
        
        if(self::$conn){
            mysqli_set_charset(self::$conn, 'utf8');
        }
        else{
            echo "Failed to connect".mysqli_connect_error();
        }

        return self::$conn;
    }

    //exec
    public function execute($sql)
    {
        return self::$conn->query($sql);
    }

    //get data
    public function getData($table, $condition = null)
    {
        if ($condition == null)
            $sql    = "SELECT * FROM $table;";
        else
            $sql    = "SELECT * FROM $table WHERE $condition;";

        $result = self::execute($sql);
        $data   = array();

        if (mysqli_num_rows($result) > 0)
            while ($record = mysqli_fetch_object($result))
                $data[] = $record;

        return $data;
    }

    //get data by id
    public function getDataByID($table, $id)
    {
        $sql    = "SELECT * FROM $table WHERE id = $id;";
        $result = self::execute($sql);
        $data   = mysqli_fetch_object($result);

        return $data;
    }
    
    //add a record
    public function addData($table, $data)
    {
        $fields     = array();
        $records    = array();

        foreach($data as $key => $value){
            $fields[]   = "`$key`";
            $records[]  = "'$value'";
        }
        $field      = implode(", ", $fields);
        $record     = implode(", ", $records);

        $sql = "INSERT INTO $table($field) VALUES ($record);";

        return self::execute($sql);
    }

    //edit a record
    public function editData($table, $data, $condition)
    {
        $fields     = array();

        foreach($data as $key => $value){
            $fields[]   = "`$key`"." = "."'$value'";
        }
        $field      = implode(", ", $fields);

        $sql = "UPDATE $table SET $field WHERE $condition;";
        
        return self::execute($sql);
    }

    //delete a record
    public function delData($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition;";
        return self::execute($sql);
    }
}

?>