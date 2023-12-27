<<?php

include '../../Classes/Bus.php';

interface BusDao {

    public function getAllBuses();
    public function createBus(Bus $bus);
    public function updateBus(Bus $bus);
    public function deleteBus($id);

}