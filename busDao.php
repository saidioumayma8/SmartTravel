<?php
include("connection.php");
include("busoop.php");


class busDAO {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_bus(){
        $query = "SELECT * FROM clients ";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $busData = $stmt->fetchAll();
        $bus= array();
        foreach ($busData as $P) {
            $bus[] = new bus($P["num_bus"], $P["immat"], $P["id"] ,$P["fk_entreprice"], $P["capacite"]
            );
        }
        return $bus;

    }
    public function insert_bus($bus)
    {
        $query = "INSERT INTO bus(num_bus, immat, id, fk_entreprice, capacite) 
                  VALUES (:num_bus, ;immat, :id, :fk_entreprice, :capacite)";

        $stmt = $this->db->prepare($query);

        $name = $bus->getnum_bus();
        $name = $bus->getimmat();
        $name = $bus->getid();
        $name = $bus->getfk_entreprice();
        $name = $bus->getcapacite();
    
       
        

        $stmt->bindParam(':num_bus', $num_bus);
        $stmt->bindParam(':immat', $immat);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fk_entreprice', $fk_entreprice);
        $stmt->bindParam(':capacite', $capacite);
        


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
       
}
public function update_bus($bus)
    {
        $query = "UPDATE bus SET 
                  num_bus = :num_bus, 
                  immat = :immat,
                  id = :id,
                  fk_entreprice = :fk_entreprice,
                  capacite = :capacite,
                  WHERE id = :id";
    

        $stmt = $this->db->prepare($query);

        $name = $bus->getnum_bus();
        $name = $bus->getimmat();
        $name = $bus->getid();
        $name = $bus->getfk_entreprice();
        $name = $bus->getcapacite();
       

        $stmt->bindParam(':num_bus', $num_bus);
        $stmt->bindParam(':immat', $immat);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fk_entreprice', $fk_entreprice);
        $stmt->bindParam(':capacite', $capacite);

       

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