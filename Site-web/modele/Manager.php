<?php

// Inclusion de la page contenant les paramètres de connexion à la base de données
require_once ('params.php');

abstract class Manager {

    protected $pdo;

    public function __construct() {

        try
        {
            $pdo = new PDO('mysql:host='.$_HOST.';dbname='.$_DB.';charset=utf8', ''.$_USER.'', ''.$_PASSWORD.'');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

    }

}
