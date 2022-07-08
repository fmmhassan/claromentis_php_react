<?php
require "./Contracts/ModelQuery.php";
require "./Contracts/Modelimplementation.php";
require './Configs/DB/Database.php';

abstract class Model implements ModelQuery,Modelimplementation{
    protected $table;
    public $pdo;
    public function __construct() {
        $this->initiateModel();
    }
    public function initiateModel(){
        $this->pdo = new Database($this->table);
    }
}
?>