<?php
class AcceptedMaterialModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DbHelper();
        $this->db = $this->dbHelper->connect(); //Conexión a BBDD
    }

    /**
     * Retorna todos los materiales aceptados de tabla accepted_material.
     */
    function getAll($params =null) { 
        $sql= 'SELECT * FROM accepted_material';
  
        if(isset($params['order'])){
          $sql .= ' ORDER BY '. $params['order'];
  
          if(isset($params['sort'])){
            $sql .= ' '. $params['sort'];
          }
        }
        $query = $this->db->prepare($sql); 
        $query->execute();

        $accepted_material = $query->fetchAll(PDO::FETCH_OBJ); //array of accepted materials
        return $accepted_material;
    }

    /**
     * Obtiene la imagen de un material de tabla accepted_material.
     */
    function getImgAcceptedMaterial($id){
        $query = $this->db->prepare('SELECT accepted_material.image WHERE accepted_material.id=?'); 
        $query->execute([$id]);
        $image = $query->fetch(PDO::FETCH_OBJ); 
  
        return $image;
    }

    /**
     * Obtiene un material por id de la tabla accepted_material.
     */
    function getMaterial($id){
        $query = $this->db->prepare('SELECT * FROM accepted_material WHERE accepted_material.id=?'); 
        $query->execute([$id]);
        $material = $query->fetch(PDO::FETCH_OBJ);
  
        return $material;
      }

}