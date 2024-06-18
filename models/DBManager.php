<?php

class DBManager
{
  private $db;
  private static $instance;

  private function __construct()
  {
      try {
          $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
          $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          error_log('Connection failed: ' . $e->getMessage());
          die('Database connection error.');
      }
  }

  public static function getInstance() : DBManager
  {
    if (!self::$instance) {
      self::$instance = new DBManager();
    }
    return self::$instance;
  }

  public function getPDO() : PDO 
  {
    return $this->db;
  }

  public function query(string $statement, ?array $params = null) : PDOStatement
  {
    if ($params == null) {
      $query = $this->db->query($statement);
    } else {
      $query = $this->db->prepare($statement);
      $query->execute($params);
    }
    return $query;
  }
}