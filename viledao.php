<?php
include("connection.php");
include("vileoop.php");


class vileDAO {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_vile(){
        $query = "SELECT * FROM vile";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $vileData = $stmt->fetchAll();
        $vile= array();
        foreach ($vileData as $P) {
            $vile[] = new vile($P["nom_vil"]
            );
        }
        return $vile;

    }
    public function insert_vile($vile)
    {
        $query = "INSERT INTO vile(nom_vil)  
                  VALUES (:nom_vil)";

        $stmt = $this->db->prepare($query);

        $name = $vile->getnom_vil();
       
        

        $stmt->bindParam(':nom_vil', $nom_vil);
     
        


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
       
    }

    public function delete_vile($id)
    {
        $query = "UPDATE vile WHERE name = :nom_vil";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nom_vil', $id);

        try {
            $stmt->execute();
            echo "Record deleted successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>