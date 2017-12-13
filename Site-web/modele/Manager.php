<?php

abstract class Manager {

    protected $pdo;
    public function __construct() {

        // Paramètres de connexion à la base de données
        $_HOST = "localhost:3306";
        $_DB = "projetudev";
        $_USER = "root";
        $_PASSWORD = "root";

        try
        {
            $this->pdo = new PDO('mysql:host='.$_HOST.';dbname='.$_DB.';charset=utf8', ''.$_USER.'', ''.$_PASSWORD.'');
        }
        catch (PDOException $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }

}
