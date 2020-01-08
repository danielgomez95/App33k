<?php

class Dbcon
{
    public static $host = '127.0.0.1';
    public static $username = 'root';
    public static $password = '';
    public static $dbname = 'student_management';
    public static $conn;
    static $error;

    public static function connect()
    {
        try {
            self::$conn = mysqli_connect(self::$host, self::$username, self::$password, self::$dbname);
        } catch (Exception $e) {
            echo "<pre>{$e}</pre>";
        }
    }

    public static function query_update($table, $data = [], $where = [])
    {
        $sql = "
            UPDATE 
                {$table} 
            SET 
        ";
        $x = 1;
        foreach ($data as $key => $value) {
            if ($x === count($data)) {
                $sql .= " {$key} = '{$value}' ";
            } else {
                $sql .= " {$key} = '{$value}', ";
            }
            $x++;
        }
        $sql .= "
            WHERE 
                TRUE
        ";
        foreach ($where as $key => $value) {
            $sql .= " 
                AND 
                    {$key} = '{$value}'
            ";
        }
        return self::execute($sql);
    }

    public static function query_insert($table, $data)
    {
        $fields = implode(',', array_keys($data));
        $data = implode("','", $data);

        $sql = "
            INSERT INTO 
                {$table} 
                ({$fields}) 
            VALUES 
                ('{$data}')
        ";
        try {
            self::connect();
            mysqli_query(self::$conn, $sql);
            return mysqli_insert_id(self::$conn);
        } catch (Exception $e) {
            self::$error = mysqli_error(self::$conn);
            return false;
        }
    }

    public static function execute($sql)
    {
        self::connect();
        if ($result = mysqli_query(self::$conn, $sql)) {
            return $result;
        } else {
            self::$error = mysqli_error(self::$conn);
            return false;
        }
    }

    public static function query_fetch_all_assoc($object)
    {
        if (!empty($object)) {
            $result = mysqli_fetch_all($object, MYSQLI_ASSOC);
            mysqli_free_result($object);
            self::close();
            return $result;
        }
    }

    public static function query_fetch_all_array($object)
    {
        if (!empty($object)) {
            $result = mysqli_fetch_all($object, MYSQLI_NUM);
            mysqli_free_result($object);
            static::close();
            return $result;
        }
    }

    public function query_fetch_array($object)
    {
        if (!empty($object)) {
            $result = mysqli_fetch_array($object, MYSQLI_NUM);
            mysqli_free_result($object);
            static::close();
            return $result;
        }
    }

    public static function query_fetch_assoc($object)
    {
        if (!empty($object)) {
            $result = mysqli_fetch_assoc($object);
            mysqli_free_result($object);
            self::close();
            return $result;
        }
    }

    public function query_fetch_row($object)
    {
        if (!empty($object)) {
            $result = mysqli_fetch_row($object);
            mysqli_free_result($object);
            self::close();
            return $result;
        }
    }

    public static function query_delete($table, $where)
    {
        $sql = "
            DELETE FROM 
                {$table} 
            WHERE 
                TRUE ";
        foreach ($where as $key => $value) {
            $sql .= "
                AND 
                    {$key} = '{$value}' ";
        }
        self::execute($sql);
    }

    function debug($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

    public static function clean($x)
    {
        self::connect();
        if ($x <> null) {
            $x = stripcslashes($x);
            $x = mysqli_real_escape_string(self::$conn, $x);
            return $x;
        } else {
            return false;
        }
    }

    public static function close()
    {
        mysqli_close(self::$conn);
    }
}
//EOF