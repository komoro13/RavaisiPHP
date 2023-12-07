<?php
require "DataBaseConfig.php";
ini_set("default_charset", "UTF-8");
class DataBase
{
    public $connect;
    public $data ;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->dbname = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->dbname = $dbc->dbname;
    }

    function db_connect()
    {
        $this->connect = mysqli_connect($this->servername,$this->username, $this->password, $this->dbname);
        //mysqli_set_charset($this->connect, "utf8");
        return $this->connect;
    }
    function prepare_string($data)
    {
        return mysqli_real_escape_string($this->connect,stripslashes(htmlspecialchars($data)));
    }
    
    function add_product($table, $name, $price, $category, $toppings)
    {
        $table = $this->prepare_string($table);
        $name = $this->prepare_string($name);
        $price = $this->prepare_string($price);
        $category = $this->prepare_string($category);

        $this->sql = "INSERT INTO ".$table." (name, price, category, toppings) VALUES ('". $name."','".$price."','".$category."','".$toppings."')";
        if (mysqli_query($this->db_connect(),$this->sql))
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    function add_category($table, $name)
    {
        $table = $this->prepare_string($table);
        $name = $this->prepare_string($name);
        $this->sql= "INSERT INTO ".$table." (name) VALUES ('".$name."')";
        if(mysqli_query($this->db_connect(), $this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    function add_topping($table, $name, $price)
    {
        $table = $this->prepare_string($table);
        $name = $this->prepare_string($name);
        $price = $this->prepare_string($price);
        $this->sql = "INSERT INTO ".$table." (name, extra) VALUES ('".$name."','".$price."')";
        if (mysqli_query($this->db_connect(), $this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    function get_items($table, $prod)
    {
        if ($table == "items")
        {
            $table = "products";
        }
        $table = $this->prepare_string($table);
        $prod = $this->prepare_string($prod);
        $res = "";
        $this->sql = "SELECT * from ".$table;
        $result = mysqli_query($this->db_connect(), $this->sql);
        $rows = mysqli_fetch_all($result, MYSQLI_BOTH);

        if ($table == "categories")
            foreach ($rows as $row)
            {
                $res = $res.$row['name']."_";   
            }
        elseif ($table == "products")
        {
            foreach ($rows as $row)
            {
                $res = $res.$row['name']."/".$row['price']."/".$row['category']."/".$row['toppings']."_";
            }
        }
        elseif ($table == "items")
        {         
            $this->sql = "SELECT toppings from products WHERE name="."'".$prod."'";
            $result = mysqli_query($this->db_connect(), $this->sql);
            $rows = mysqli_fetch_all($result, MYSQLI_BOTH);
            foreach ($rows as $row)
            {
                $res = $res.$rows['toppings']."_";
            } 
        }
        elseif ($table == "toppings")
        {
            foreach ($rows as $row)
            {
                $res = $res.$row['name']."/".$row['extra']."_";
            }
        }        
        
        return $res;

    }
    function sendOrder($table, $order_string,$order_table, $price)
    {
        $table = $this->prepare_string($table);
        $order_string = $this->prepare_string($order_string);
        $order_table =  $this->prepare_string($order_table);
        $price = $this->prepare_string($price);
        $date_time = date("Y-m-d h:i:sa");
        $this->sql = "SELECT order_index FROM ".$table. " WHERE order_table = "."'".$order_table."' AND closed=0 ORDER BY order_index DESC LIMIT 1";
        $result = mysqli_query($this->db_connect(), $this->sql);
        $res = "";
        $order_index = "";
        if ($result == "")
        {
        $this->sql = "INSERT INTO ".$table." (order_string, date_time, order_table, price ) VALUES ('".$order_string."','".$date_time."','".$order_table."','".$price."')";
        if (mysqli_query($this->db_connect(), $this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }
        }   
        else
        {
            $row = mysqli_fetch_assoc($result);
            $res = intval($row["order_index"]);
            $res = $res + 1;
            $order_index = $this->prepare_string($res);
            $this->sql = "INSERT INTO ".$table." (order_string, date_time, order_table, price, order_index ) VALUES ('".$order_string."','".$date_time."','".$order_table."','".$price."','".$order_index."')";
            if (mysqli_query($this->db_connect(), $this->sql))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    
    function getOrders($table)
    {
        $table = $this->prepare_string($table);
        $this->sql = "SELECT * FROM ".$table." WHERE closed = 0 AND order_index = 1";
        $result = mysqli_query($this->db_connect(), $this->sql);
        $rows = mysqli_fetch_all($result, MYSQLI_BOTH);
        $res = "";
        foreach ($rows as $row)
        {
            $res = $res.$row['order_table']."_"; 
        }
        return $res;
    }
    function getStringOrders($table, $order_table)
    {
        $table = $this->prepare_string($table);
        $order_table = $this->prepare_string($order_table);
        $this->sql = "SELECT * FROM ".$table." WHERE closed = 0 AND order_table='".$order_table."'";
        $result = mysqli_query($this->db_connect(), $this->sql);
        $rows = mysqli_fetch_all($result, MYSQLI_BOTH);
        $res = "";
        foreach ($rows as $row)
        {
            $res = $res.$row['order_string']."%"; 
        }
        return $res;
    }
    function getOrder($table, $order_table)
    {
        $table = $this->prepare_string($table);
        $order_table = $this->prepare_string($order_table);
        $this->sql = "SELECT * FROM ".$table." WHERE closed = 0 AND order_table = "."'".$order_table."'";
        $result = mysqli_query($this->db_connect(), $this->sql);
        $row = mysqli_fetch_assoc($result);
        $res = $row["order_string"];
        return $res;
    }
    function getProductToppings($table, $name )
    {
        $table = $this->prepare_string($table);
        $name = $this->prepare_string($name);
        $this->sql = "SELECT * FROM ".$table." WHERE name = "."'".$name."'";
        $result = mysqli_query($this-> db_connect(), $this->sql);
        $row = mysqli_fetch_assoc($result);
        $res = $row["toppings"];
        return $res;
    }
    function deleteItem($table, $name)
    {
        $table = $this->prepare_string($table);
        $name = $this->prepare_string($name);
        $this->sql = "DELETE FROM ".$table." WHERE name = '".$name."'";
        if (mysqli_query($this->db_connect(), $this->sql))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


?>