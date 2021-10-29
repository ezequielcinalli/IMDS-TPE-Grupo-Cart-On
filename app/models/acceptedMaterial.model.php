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

    /****************************  SECRETARY   ************************************** */
    /**
     * Inserta el material reciclable en DB
     */
    function insert($material, $deliveryMethod, $img=null) { 

      if($img){ //si existe
        $sql = 'INSERT INTO accepted_material(material, deliveryMethod, image) VALUES (?,?,?)';
        $params = [$material, $deliveryMethod, $img];
      } else{ //si no existe
        $sql = 'INSERT INTO accepted_material(material, deliveryMethod) VALUES (?,?)';
        $params = [$material, $deliveryMethod];

      }

      // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
      $query = $this->db->prepare($sql);
      $query->execute($params); 

      // 3. obtiene y devuelve ID del material nuevo
      return $this->db->lastInsertId(); 
    }
}