<?php
include("connection.php");
include("horaireoop.php");


class horaireDAO {
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_horaire(){
        $query = "SELECT * FROM horaire";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $horaireData = $stmt->fetchAll();
        $horaire= array();
        foreach ($horaireData as $P) {
            $horaire[] = new horaire($P["bus_id"],$P["date"],$P["horaire_id"],$P["hr_arv"],$P["hr_dep"],  $P["prix"],$P["route_id"],$P["sieges_dispo"]
            );
        }
        return $horaire;

    }
    public function insert_categories($horaire)
    {
        $query = "INSERT INTO horaire(bus_id, date, horaire_id, hr_arv, hr_dep, prix, route_id, susges_dispo) 
                  VALUES (:bus_id, ;date, :horaire_id, :hr_arv, :hr_dep, :prix, :route_id, :susges_dispoe)";

        $stmt = $this->db->prepare($query);

        $name = $horaire->getbus_id();
        $descr = $horaire->getdate();
        $img = $horaire->gethoraire_id();
        $img = $horaire->gethr_arv();
        $img = $horaire->gethr_dep();
        $img = $horaire->getprix();
        $img = $horaire->getroute_id();
        $img = $horaire->getsusges_dispoe();
        

        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':horaire_id', $horaire_id);
        $stmt->bindParam(':hr_arv', $hr_arv);
        $stmt->bindParam(':hr_dep', $hr_dep);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':route_id', $route_id);
        $stmt->bindParam(':susges_dispoe', $susges_dispoe);
        


        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
       
}
public function update_horaire($horaire)
    {
        $query = "UPDATE horaire SET 
                  bus_id = :bus_id, 
                  date = :date,
                  horaire = :horaire,
                  hr_arv = :hr_arv,
                  hr_dep = :hr_dep,
                  prix = :prix,
                  route_id = :route_id,
                  susges_dispoe = :susges_dispoe,
                  WHERE bus_id = :bus_id";

        $stmt = $this->db->prepare($query);

        $name = $horaire->getbus_id();
        $descr = $horaire->getdate();
        $img = $horaire->gethoraire_id();
        $isHide = $horaire->gethr_arv();
        $isHide = $horaire->gethr_dep();
        $isHide = $horaire->getprix();
        $isHide = $horaire->getroute_id();
        $isHide = $horaire->getsieges_dispo();
       

        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':horaire_id', $horaire_id);
        $stmt->bindParam(':hr_arv', $hr_arv);
        $stmt->bindParam(':th_dep', $th_dep);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':route_id', $route_id);
        $stmt->bindParam(':sieges_dispo', $sieges_dispo);
       

        try {
            $stmt->execute();
            echo "Record updated successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function delete_horaire($id)
    {
        $query = "UPDATE horaire WHERE name = :bus_id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':bus_id', $id);

        try {
            $stmt->execute();
            echo "Record deleted successfully.";
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>