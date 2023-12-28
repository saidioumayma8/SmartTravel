<?php
include("connection.php");
include("entrepriseoop.php");


class entrepriseDAO {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_horaire(){
        $query = "SELECT * FROM entreprice";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $entrepriseData = $stmt->fetchAll();
        $entreprise= array();
        foreach ($entrepriseData as $P) {
            $entreprise[] = new entreprise($P["idEn"],$P["img"],$P["nameEn"]
            );
        }
        return $entreprise;

    }
    public function insert_entreprise($entreprise)
    {
        $query = "INSERT INTO entreprise(idEn, img, nameEn) 
                  VALUES (:idEn, ;img, :nameEn)";

        $stmt = $this->db->prepare($query);

        $name = $entreprise->getidEn();
        $name = $entreprise->getimg();
        $name = $entreprise->getnameEn();
        
       
        

        $stmt->bindParam(':idEn', $idEn);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':nameEn', $nameEn);
    
        


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
       
}
public function update_entreprise($entreprise)
    {
        $query = "UPDATE entreprise SET 
                  idEn = :idEn, 
                  img = :img,
                  nameEn = :nameEn,
                  WHERE idEn = :idEn";

        $stmt = $this->db->prepare($query);

        $name = $entreprise->getidEn();
        $name = $entreprise->getimg();
        $name = $entreprise->getnameEn();
       

        $stmt->bindParam(':idEn', $idEn);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':nameEn', $nameEn);

       

        try {
            $stmt->execute();
            echo "Record updated successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function delete_entreprise($id)
    {
        $query = "UPDATE entreprise WHERE name = :idEn";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':idEn', $id);

        try {
            $stmt->execute();
            echo "Record deleted successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>