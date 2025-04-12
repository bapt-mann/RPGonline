<?php
namespace Core;

use \PDO;

class Model
{
    protected $table;
    public static $pdo;

    public static function connect(): PDO
    {
        $db = getenv("DB_NAME");
        $login = getenv("DB_LOGIN");
        $passwd = getenv("DB_PASSWD");
        $host = getenv("DB_HOST");
        $pdo = new PDO("mysql:host=$host;dbname=$db", $login, $passwd);
        $pdo->exec("SET NAMES utf8");
        return $pdo;
    }
    public static function disconnect()
    {
        $pdo = null;
    }

    public function update($pdo, $data, $keyFilter, $valueFitler)
    {
        $sql = "UPDATE $this->table SET ";
        foreach ($data as $key => $value)
        {
            $sql.="$key=$value,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= "WHERE $keyFilter = $valueFitler";
        $request = $pdo->prepare($sql);
        if ($request->execute()) return true;
        return false;
    }
    public static function load($name)
    {
        require_once ROOT."model/" . ucfirst($name) . ".php";
        $myModel = ucfirst($name);
        return new $myModel();
    }

    public function insert($pdo, $data)
    {
        $stmtArray = array();
        $sql1 = "";
        $sql2 = "";

        foreach($data as $key => $value)
        {
            // Already inputing the SQL prepared statement
            $stmtArray[$key] = $value;

            $sql1 .= $key . ",";    
            $sql2 .= ":" . $key . ",";
        }

        $sql1 = substr($sql1, 0, -1);
        $sql2 = substr($sql2, 0, -1);
        $sql = "INSERT INTO $this->table (" . $sql1 . ")
        VALUES (" . $sql2 . ");";

        $stmt = $pdo->prepare($sql);
        if ($stmt->execute($stmtArray)) return true;
        return false;
    }

    public function delete($pdo, $data = array(), $keyFilter = null, $valueFilter = null)
    {
        $sql = "DELETE FROM $this->table";
        $sql .= " WHERE " . $keyFilter . "='" . $valueFilter . "';";

        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) return true;
        return false;
    }

    public function find($pdo, $data = array())
    {
        $condition = " WHERE " . ($data["condition"] ?? "1=1");
        $champs = $data["champs"] ?? "*";
        $limit = $data["limit"] ? " LIMIT " . $data["limit"] : "";
        $order = $data["order"] ? " ORDER BY " . $data["order"] : "";
        $join = $data["join"] ?? "";
        $sql = "SELECT $champs FROM $this->table$join$condition$order$limit;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}
?>