<?php
class RetirementRequestModel
{
  private $db;
  private $dbHelper;

  function __construct()
  {
    $this->dbHelper = new DbHelper();
    $this->db = $this->dbHelper->connect(); //Conexión a BBDD
  }

  /**
   * Retorna todos los pedidos de retiro de tabla retirement_request.
   */
  function getAll()
  {
    $sql = "SELECT * FROM retirement_request";

    $query = $this->db->prepare($sql);
    $query->execute();

    $retirement_requests = $query->fetchAll(PDO::FETCH_OBJ);
    return $retirement_requests;
  }

  /**
   * Obtiene los pedidos de retiro entra las fechas indicadas de la tabla retirement_request.
   */
  function getRetirementRequestBetweenDates($date1 = null, $date2 = null)
  {
    $query = $this->db->prepare(
      "SELECT * from retirement_request WHERE creation_date BETWEEN ? AND ?"
    );
    $query->execute([$date1, $date2]);

    $retirement_requests = $query->fetchAll(PDO::FETCH_OBJ);
    return $retirement_requests;
  }

  /**
   * Inserta los pedidos enviados por formulario en la base de datos
   */

  function insert($name, $lastName, $address, $movilNumber, $time, $materialsVol, $imageName = null)
  {
    if ($imageName) {
      $sql = 'INSERT INTO retirement_request (name,lastname,address,phone,retirement_time,volume_materials,image) VALUES (?,?,?,?,?,?,?)';
      $params = [$name, $lastName, $address, $movilNumber, $time, $materialsVol, $imageName];
    } else {
      $sql = 'INSERT INTO retirement_request (name,lastname,address,phone,retirement_time,volume_materials) VALUES (?,?,?,?,?,?)';
      $params = [$name, $lastName, $address, $movilNumber, $time, $materialsVol];
    }
    $query = $this->db->prepare($sql);
    $query->execute($params);
    return $this->db->lastInsertId();
  }
}
