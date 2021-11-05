<?php
class MaterialDepositModel
{
  private $db;
  private $dbHelper;

  function __construct()
  {
    $this->dbHelper = new DbHelper();
    $this->db = $this->dbHelper->connect(); //Conexión a BBDD
  }

  /**
   * Inserta el material ingresado por un cartonero en la base de datos
   */

  function insert($id_cartonero, $id_material, $weight)
  {

    $sql = 'INSERT INTO material_deposit (id_cartonero, id_material, weight) VALUES (?,?,?)';
    $params = [$id_cartonero, $id_material, $weight];

    $query = $this->db->prepare($sql);
    $query->execute($params);
    return $this->db->lastInsertId();
  }
}
