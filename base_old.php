<!-- 測試的時候到了 -->

<?php

session_start();
date_default_timezone_set("Asia/Taipei");

// class establish
class DB
{
    private $table;
    private $pdo;
    private $dsn = "mysql:local=host;charset=utf8;dbname=db02";
    private $root = "root";
    private $password = "";
    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->root, $this->password);
    }

    // search data
    public function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table ";
        if (!empty($arg[0]) && is_array(($arg[0]))) {
            foreach ($arg[0] as $key => $value) $tmp[] = sprintf("`%s`='%s'", $key, $value);
            $sql .= " WHERE " . implode(" && ", $tmp);
        }
        if (!empty($arg[1])) $sql .= $arg[1];
        return $this->pdo->query($sql)->fetchAll();
    }

    // delete data
    public function del($arg)
    {
        $sql = "DELETE FROM $this->table ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) $tmp[] = sprintf("`%s`='%s'", $key, $value);
            $sql .= " WHERE " . implode(" && ", $tmp);
        } else $sql .= " WHERE `id` = '$arg'";
        return $this->pdo->exec($sql);
    }

    // search specific data
    public function find($arg)
    {
        $sql = "SELECT * FROM $this->table ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) $tmp[] = sprintf("`%s`='%s'", $key, $value);
            $sql .= " WHERE " . implode(" && ", $tmp);
        } else $sql .= " WHERE `id` = '$arg'";
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // count data numbers
    public function count(...$arg)
    {
        $sql = "SELECT COUNT(*) FROM $this->table ";
        if (is_array($arg[0])) {
            foreach ($arg[0] as $key => $value) $tmp[] = sprintf("`%s`='%s'", $key, $value);
            $sql .= " WHERE " . implode(" && ", $tmp);
        }
        if (isset($arg[1])) $sql .= $arg[1];
        return $this->pdo->query($sql)->fetchColumn();
    }

    // query
    public function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll();
    }

    // insert or update data by ID
    public function save($arg)
    {
        if (isset($arg['id'])) {
            foreach ($arg as $key => $value) $tmp[] = sprintf("`%s`='%s'", $key, $value);
            //update
            $sql = "UPDATE " . $this->table . " SET " . implode(",", $tmp) . " WHERE `id`='" . $arg['id'] . "'";
            //insert
        } else $sql = "INSERT INTO " . $this->table . " (`" . implode("`,`", array_keys($arg)) . "`) VALUES ('" . implode("','", $arg) . "')";
        // echo $sql;
        return $this->pdo->exec($sql);
    }
}

function to($url)
{
    header("location:" . $url);
}


//沒幾行程式碼賺十分，不可忘記
if (empty($_SESSION['total'])) {

    $db = new DB('total');
    $visit = $db->find("1");
    $visit['total']++;
    $_SESSION['total'] = $visit['total'];
    $db->save($visit);
}
