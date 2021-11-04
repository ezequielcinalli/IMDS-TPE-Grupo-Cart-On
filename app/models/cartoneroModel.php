<?php
class CartoneroModel
{
  private $db;
  private $dbHelper;

  function __construct()
  {
    $this->dbHelper = new DbHelper();
    $this->db = $this->dbHelper->connect(); //Conexión a BBDD
  }

  /**
   *  Retorna todos los cartoneros en la db 
   */
  function getAll()
  {
    $sql = "SELECT * FROM cartonero";

    $query = $this->db->prepare($sql);
    $query->execute();

    $cartoneros = $query->fetchAll(PDO::FETCH_OBJ);
    return $cartoneros;
  }

  /**  
   * Returna todos los cartoneros con el nombre indicado 
   */
  function getCartoneroByName($name)
  {
    $sql = "SELECT * FROM cartonero WHERE cartonero.name = $name OR cartonero.surname = $name";

    $query = $this->db->prepare($sql);
    $query->execute();

    $cartoneros = $query->fetchAll(PDO::FETCH_OBJ);
    return $cartoneros;
  }

  /**
   * Inserta un nuevo cartonero en el sistema
   */
  function insert($name, $surname, $email, $address, $birthday)
  {
    $sql = "INSERT INTO cartonero (name, surname, email, address, birthday) VALUES (?,?,?,?,?)";
    $params = [$name, $surname, $email, $address, $birthday];

    $query = $this->db->prepare($sql);
    $query->execute($params);
    return $this->db->lastInsertId();
  }
}
