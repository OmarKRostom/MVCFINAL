 <?php

class DB
{

  private static $_instance = null;
  private $_pdo,
          $_error = false,
          $_query,
          $_results,
          $_count = 0;
  private $sql;

  //Concerning connecting to the database.
  private function __construct()
  {
      try {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=dashboard_db;charset=utf8','root','');
      } catch (PDOException $e) {
        die($e->getMessage());
      }

  }

  function getInstance() {
      if(!isset(self::$_instance)) {
        self::$_instance = new DB();
      }
      return self::$_instance;
  }

  function query($thesql,$params = array(),$typeofquery = 0) {
    $this->_error = false;
    if($this->_query = $this->_pdo->prepare($thesql)) {

      if($this->_query->execute($params) && $typeofquery===0) {
        $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
      } else if($this->_query->execute($params) && $typeofquery===1) {
        $this->_results = $this->_query->fetch(PDO::FETCH_OBJ);
      }
     } else {
      $this->_error = true;
     }
     return $this;
   }

  function action($act,$what,$table,$where = array(),$limit = array(),$typeofquery = 0) {
    $limitclause = !empty($limit) ? 'LIMIT ' . $limit[0] .', '. $limit[1] : '';
    if(!empty($where)) {
      $field = $where[0];
      $operator = $where[1];
      $values = $where[2];

      $this->sql = "{$act} {$what} FROM {$table} WHERE {$field} {$operator} ? " . $limitclause;
      $this->query($this->sql,array($values),$typeofquery);
        
    } else {
      $this->sql = "{$act} {$what} FROM {$table} " . $limitclause;
      $this->query($this->sql,array(),$typeofquery);
    }

    return $this;
  }

  function insert($table,$data) {
    if(!empty($data)) {
      $keys = array_keys($data);
      $vals = array_values($data);
      $values = '';
      $count = 1;

      foreach ($data as $value) {
        $values .= '?';
        if($count<count($data)) {
          $values .= ' ,';
        }
        $count++;
      }

      $this->sql = "INSERT INTO {$table} (`" . implode('`, `',$keys) . "`) VALUES ({$values})";
      if($this->query($this->sql,$vals)) {
        return true;
      } else {
        return false;
      }
    }
  }

  function printSQL() {
    echo $this->sql;
  }

  function update($table,$where,$set) {
    if(!empty($where) && !empty($set)) {
      $values = '';
      $count = 1;
      $x=1;

      foreach($set as $key=>$value) {
        $values .= $key;
        if($count<count($set)) {
          $values .= '= ? ';
        }
        if($x!=count($set)) $values .= ',';
        echo(count($set));
        $x++;
      }
      $whereOperand = $where[0];
      $whereOperator = $where[1];
      $whereValue = $where[2];
      $this->sql = "UPDATE {$table} SET {$values} WHERE {$whereOperand} {$whereOperator} ?";
      echo $this->sql;
      $bindVals = array_values($set);
      array_push($bindVals, $whereValue);
      if($this->query($this->sql,$bindVals)) {
        return true;
      } else {
        return false;
      }
    }
  }

  function retrive($what,$table,$where = array(),$limit = array(),$typeofquery = 0) {
    return $this->action("SELECT",$what,$table,$where,$limit,$typeofquery);
  }

  function delete($table,$where) {
    if(!empty($where)) {
      $field = $where[0];
      $operator = $where[1];
      $val = $where[2];

      $this->sql = "DELETE FROM {$table} WHERE {$field} {$operator} ?";

      if($this->query($this->sql,array($val))) {
        return true;
      } else {
        return false;
      }
    }
  }

  function getresults() {
    return $this->_results;
  }

  function fillInput($table,$field) {
    $data = $this->retrive($field,$table)->getresults();
    foreach($data as $item) {
      echo "<option>". $item->en_name ."</option>";
    }
  }

  function countrows($table) {
    return $this->query("SELECT COUNT(*) as rows FROM {$table};",array($table))->getresults();
  }

}


 ?>
