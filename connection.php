<?php
class MyConnection {
    private $conn;
    private $dsn = "mysql:host=localhost;dbname=e-learning;charset=utf8";
    private $user = "root";
    private $password = "root"; // ใส่รหัสผ่านของผู้ใช้ root หากมี

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getPdo() {
        return $this->conn;
    }
}
?>
